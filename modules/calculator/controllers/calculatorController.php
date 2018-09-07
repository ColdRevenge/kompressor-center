<?php

class calculatorController extends Controller {

    public function calculatorAction() {
        try {
            Lavra_Loader::LoadModels("Calculator", "calculator");

            $calculator = new Calculator();

            if (isset($this->param['brand_id'])) {
                $this->models = $calculator->getModels($this->param['brand_id']);
            }
            if (isset($_POST['model_id']) && $_POST['model_id'] > 0) {

                $get_sizes = $calculator->getSizeModelId($_POST['model_id']);
                /**
                 * Ищем все размеры модели и заносим их в массив $width_arr и $height_arr
                 */
                $width_arr = array();
                $height_arr = array();
                foreach ($get_sizes as $key => $value) {
//                    print_r($get_size_arr);
                    $get_size_arr = explode('*', $value->name);

                    if (isset($get_size_arr[0]) && isset($get_size_arr[1])) {
                        $width_arr[$get_size_arr[0]] = $get_size_arr[0];
                        $height_arr[$get_size_arr[0]][$get_size_arr[1]] = $get_size_arr[1]; //Первый ключ - ширина!!
                    }
//                    else echo "<br/>Ошибка: " . $value->name;
                }

                $is_standart_width = 0; //Узнаем стандартная ширина или нет
                $is_standart_height = 0; //Узнаем стандартная высота или нет

                if ($_POST['width'] > 0 && $_POST['height'] > 0) {
                    $_POST['width'] = (int) $_POST['width'];
                    $_POST['height'] = (int) $_POST['height'];

                    if (isset($width_arr[$_POST['width']])) { //Если ширина стандартная, то помечаем
                        $is_standart_width = 1;
                    }

                    /* Поиск ближайшего размера по ширине */

                    ksort($width_arr);

                    $near_width = 0; //Ближайшее значение по ширине 
                    $_tmp_width = 0;
                    foreach ($width_arr as $width_value) {
                        //Находим самый большой размер по ширине
                        //Если самый большой не найден, то делаем $_POST['width'] - самым большим значением (исправляем)
                        if ($width_value >= $_POST['width']) {
                            $near_width = $width_value;
                            break;
                        }
                        if ($width_value > $_tmp_width) $_tmp_width = $width_value; //Записываем на случай если клиент ввел самую большую ширину
                    }

                    if ($near_width == 0) { //Если больший размер не найден, выдаем самый большой
                        $near_width = $_tmp_width;
                    }

                    /* Поиск ближайшего по высоте!! */

                    if (isset($height_arr[$near_width])) {

                        if (isset($height_arr[$near_width][$_POST['height']])) { //Если высота стандартная, то помечаем
                            $is_standart_height = 1;
                        }

                        ksort($height_arr[$near_width]);

                        $near_height = 0; //Ближайшая высота
                        $_tmp_height = 0;

                        foreach ($height_arr[$near_width] as $height_value) { //Обходим высоту
                            if ($height_value >= $_POST['height']) {
                                $near_height = $height_value;
                                break;
                            }
                            if ($height_value > $_tmp_height) $_tmp_height = $height_value; //Записываем на случай если клиент ввел самую большую высоту
                        }


                        if ($near_height == 0) { //Если больший размер не найден, выдаем самый большой
                            $near_height = $_tmp_height;
                        }
                    } else {
                        throw new Exception("Ширина не найдена");
                    }
                }

                if ($near_width > 0 && $near_height > 0) {
                    $get_near_model = $calculator->getModelSize($near_width . '*' . $near_height, $_POST['model_id']);

                    if (isset($get_near_model->name)) { //Если модель найдена
                        $this->size = $near_width."x".$near_height;
                        $this->is_standart_width = $is_standart_width;
                        $this->is_standart_height = $is_standart_height;
                        $this->price = $this->_getPrice($get_near_model, $is_standart_width, $is_standart_height);
                        
                        
//                        echo "Размер: " . $get_near_model->name . '<br/>';
//                        if ($is_standart_width == 1) echo "Ширина стандартная";
//                        else echo "Ширина НЕ стандартная";
//                        echo "<br/>";
//                        if ($is_standart_height == 1) echo "Высота стандартная";
//                        else echo "Высота НЕ стандартная";
//                        echo "<br/>";
//                        echo $get_near_model->price . ' ### '. $this->_getPrice($get_near_model, $is_standart_width, $is_standart_height);
                    }
//                    else throw new Exception("Модель не найдена. Ошибка 3004");
                }
//                else throw new Exception("Модель не найдена. Ошибка 3454");
            }
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    private function _getPrice($get_model, $is_standart_width, $is_standart_height) {
        if ($is_standart_width == 1 && $is_standart_height == 1) { //Если размер стандартен
            return $get_model->price;
        }
        switch ($get_model->brand_id) {
            case 30: //Аскона
                if ($is_standart_width == 1 && $is_standart_height == 0) { //Если размер по высоте нестандартен
                    return $get_model->price * 1.1;
                } elseif ($is_standart_width == 0 && $is_standart_height == 1) { //Если размер по ширине нестандартен
                    return $get_model->price * 1.1;
                } elseif ($is_standart_width == 0 && $is_standart_height == 0) { //Если полный нестандарт
                    return $get_model->price * 1.15;
                }
                break;
            case 1: //Орматек
            case 4: //ZigFlex
                if ($is_standart_width == 1 && $is_standart_height == 0) { //Если размер по высоте нестандартен
                    return $get_model->price * 1.05;
                } elseif ($is_standart_width == 0 && $is_standart_height == 1) { //Если размер по ширине нестандартен
                    return $get_model->price * 1.1;
                } elseif ($is_standart_width == 0 && $is_standart_height == 0) { //Если полный нестандарт
                    return $get_model->price * 1.1;
                }
                break;
        }
        return false;
    }

}

/*


  <?php

  mysql_connect("localhost", "root", "");
  mysql_select_db("berrystyle");

  //if(isset($_POST['width']) && isset($_POST['height']))
  //{
  $result = mysql_query("

  SELECT 		product_mod.*
  FROM 		products
  INNER JOIN 	product_mod ON (product_mod.product_id = products.id &&  products.id = '".$_POST['mname']."' && product_mod.is_delete = 0 && products.is_delete = 0 && category_1_id = 933 && brand_id = '".$_GET['brand_id']."' )

  ");

  $width_arr = array();
  while($row = mysql_fetch_assoc($result))
  {
  $ext = explode("*", $row['name']);
  if($ext[0] >= $_POST['width']) {
  $width_arr[$ext[0]] = 1;
  //	echo '<small>'. $row['name'].' // '.$row['price'].' СЂСѓР±. (+10% = '.($row['price']/100*10).' СЂСѓР±.)</small><br/>';
  }
  }
  ksort($width_arr);

  $current_width = key($width_arr);
  $result = mysql_query("

  SELECT 		product_mod.*
  FROM 		products
  INNER JOIN 	product_mod ON (product_mod.product_id = products.id &&  products.id = '".$_POST['mname']."' && product_mod.is_delete = 0 && products.is_delete = 0 && category_1_id = 933 && brand_id = '".$_GET['brand_id']."' )

  ");

  while($row = mysql_fetch_assoc($result))
  {
  $ext = explode("*", $row['name']);
  if($ext[0] == $current_width) {

  if($ext[1] >=  $_POST['height']) {
  $height_arr[$ext[1]] = 1;
  echo '<small>'. $row['name'].' // '.$row['price'].' СЂСѓР±. (+10% = '.($row['price']/100*10).' СЂСѓР±.)</small><br/>';
  }
  }
  }



  ksort($height_arr);

  $current_height = key($height_arr);

  echo $current_width . '#width<br/>';
  echo $current_height . '#height<br/>';

  //}

  $result = mysql_query (" SELECT * FROM products WHERE category_1_id = '933' && brand_id = '".$_GET['brand_id']."' ");
  while($row = mysql_fetch_assoc ($result))
  {
  $array_mastrace[] = $row;
  }

  echo '
  <script>
  function brandCheck(){
  brand = document.getElementById(\'brand\').value;
  location.href=\'/?brand_id=\'+brand+\'\';
  }
  </script>


  <form method="post" action="">
  <select id="brand" name="brand_id" onchange="brandCheck();">
  <option value="">===</option>
  <option value="30" '. (($_GET['brand_id'] == 30) ? 'selected="selected"' : '') .'>Askona</option>
  <option value="1" '. (($_GET['brand_id'] == 1) ? 'selected="selected"' : '') .'>Ormatek</option>
  <option value="4" '. (($_GET['brand_id'] == 4) ? 'selected="selected"' : '') .'>ZigFlex</option>
  </select><br/>
  <select name="mname">
  ';
  foreach($array_mastrace as $value){
  echo '<option value="'.$value['id'].'" '. (($_POST['mname'] == $value['id']) ? 'selected="selected"' : '') .' >'.$value['name'].'</option>';
  }
  echo '
  </select>
  <br/>
  <input type="text" name="width" value="'.$_POST['width'].'" /> x <input type="text" name="height" value="'.$_POST['height'].'" />
  <button>Send</button>
  ';



  ?>


 */
?>