<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 15:25:18
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/table_size/templates/table_size.tpl" */ ?>
<?php /*%%SmartyHeaderCode:173916419555d475ae3c5df9-17886925%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4831013f89c2377c54b442807eb579e262342c9e' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/table_size/templates/table_size.tpl',
      1 => 1423307976,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173916419555d475ae3c5df9-17886925',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d475ae406e78_31406938',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d475ae406e78_31406938')) {function content_55d475ae406e78_31406938($_smarty_tpl) {?><?php echo '<script'; ?>
 type="text/javascript">
    function showSize(is_size) {
        if (is_size == 2) {
            $('#niz_id').fadeIn('slow', function() {
                $('#vverx_id').fadeOut('slow');
                document.getElementById('size_field_1').value = null;
                document.getElementById('size_field_2').value = null;
            });
        }
        else {
            $('#vverx_id').fadeIn('slow', function() {
                $('#niz_id').fadeOut('slow');
                document.getElementById('size_field_1').value = null;
                document.getElementById('size_field_2').value = null;
            });
        }
    }
    function getSize(v) {
        var type_size = document.getElementById('type_size').options[document.getElementById('type_size').selectedIndex].value
        v = parseInt(v);
        if (type_size == 1) {
            $('#result_size').fadeOut('fast', function() {
                if (v >= 88 && v <= 91)
                    document.getElementById('result_size').innerHTML = '44';
                else if (v >= 92 && v <= 95)
                    document.getElementById('result_size').innerHTML = '46';
                else if (v >= 96 && v <= 99)
                    document.getElementById('result_size').innerHTML = '48';
                else if (v >= 100 && v <= 103)
                    document.getElementById('result_size').innerHTML = '50';
                else if (v >= 104 && v <= 107)
                    document.getElementById('result_size').innerHTML = '52';
                else if (v >= 108 && v <= 111)
                    document.getElementById('result_size').innerHTML = '54';
                else if (v >= 112 && v <= 115)
                    document.getElementById('result_size').innerHTML = '56';
                else if (v >= 116 && v <= 119)
                    document.getElementById('result_size').innerHTML = '58';
                else if (v >= 120 && v <= 123)
                    document.getElementById('result_size').innerHTML = '60';
                else if (v >= 124 && v <= 127)
                    document.getElementById('result_size').innerHTML = '62';
                else if (v >= 128 && v <= 131)
                    document.getElementById('result_size').innerHTML = '64';
                else if (v >= 132 && v <= 135)
                    document.getElementById('result_size').innerHTML = '66';
                else if (v >= 136 && v <= 140)
                    document.getElementById('result_size').innerHTML = '68';
                else if (v >= 141 && v <= 144)
                    document.getElementById('result_size').innerHTML = '70';
                else if (v >= 145 && v <= 149)
                    document.getElementById('result_size').innerHTML = '72';
                else if (v >= 150 && v <= 155)
                    document.getElementById('result_size').innerHTML = '74';
                else
                    document.getElementById('result_size').innerHTML = 'не найден';
                document.getElementById('result_size').innerHTML = "Ваш размер: <b>" + document.getElementById('result_size').innerHTML + "</b>";

                $('#result_size').fadeIn('fast');
            });
        }
        if (type_size == 2) {
            $('#result_size').fadeOut('fast', function() {
                if (v >= 96 && v <= 99)
                    document.getElementById('result_size').innerHTML = '44';
                else if (v >= 100 && v <= 103)
                    document.getElementById('result_size').innerHTML = '46';
                else if (v >= 104 && v <= 107)
                    document.getElementById('result_size').innerHTML = '48';
                else if (v >= 108 && v <= 111)
                    document.getElementById('result_size').innerHTML = '50';
                else if (v >= 112 && v <= 115)
                    document.getElementById('result_size').innerHTML = '52';
                else if (v >= 116 && v <= 119)
                    document.getElementById('result_size').innerHTML = '54';
                else if (v >= 120 && v <= 123)
                    document.getElementById('result_size').innerHTML = '56';
                else if (v >= 124 && v <= 127)
                    document.getElementById('result_size').innerHTML = '58';
                else if (v >= 128 && v <= 131)
                    document.getElementById('result_size').innerHTML = '60';
                else if (v >= 132 && v <= 135)
                    document.getElementById('result_size').innerHTML = '62';
                else if (v >= 136 && v <= 139)
                    document.getElementById('result_size').innerHTML = '64';
                else if (v >= 140 && v <= 143)
                    document.getElementById('result_size').innerHTML = '66';
                else if (v >= 144 && v <= 150)
                    document.getElementById('result_size').innerHTML = '68';
                else if (v >= 151 && v <= 154)
                    document.getElementById('result_size').innerHTML = '70';
                else if (v >= 155 && v <= 158)
                    document.getElementById('result_size').innerHTML = '72';
                else if (v >= 159 && v <= 164)
                    document.getElementById('result_size').innerHTML = '74';
                else
                    document.getElementById('result_size').innerHTML = 'не найден';
                document.getElementById('result_size').innerHTML = "Ваш размер: <b>" + document.getElementById('result_size').innerHTML + "</b>";
                $('#result_size').fadeIn('fast');
            });
        }

    }

    
    <?php echo '</script'; ?>
>
    <?php if ($_GET['is_modal']==1) {?>
        <h1>Таблица размеров для товара</h1>
    <?php }?>
    <table cellpadding="2" cellspacing="1" border="0" class="table-size">
        <tr>
            <td valign="middle" align="right" style="width: 200px;">
                Размер для: 
            </td>
            <td valign="middle" align="left">
                <select id="type_size" onchange="showSize(this.options[this.selectedIndex].value)">
                    <option value="1">Верх женской одежды</option>
                    <option value="2">Низ женской одежды</option>
                </select>
            </td>
        </tr>
        <tbody id="vverx_id">
            <tr>
                <td valign="middle" align="right">
                    Введите объем груди:
                </td>
                <td valign="middle" align="left">
                    <input type="text" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" onkeyup="getSize(this.value)" id="size_field_1"  value="" style="width: 70px;"/>
                </td>
            </tr>
        </tbody>
        <tbody id="niz_id" style="display: none;">
            <tr>
                <td valign="middle" align="right">
                    Введите объем бедер:
                </td>
                <td valign="middle" align="left">
                    <input type="text" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" value="" onkeyup="getSize(this.value)" id="size_field_2"  style="width: 70px;"/>
                </td>
            </tr>
        </tbody>
    </table>
    <div id="result_size" class="h3" style="text-align: left;padding-left:50px;margin-top: 0px;overflow: hidden;"></div>
    <?php if ($_GET['is_modal']!=1) {?><div class="border-desc" style="clear: none; width: 400px; margin: 20px auto; overflow: hidden;">&nbsp;</div><?php }?><?php }} ?>
