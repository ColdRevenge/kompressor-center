<style type="text/css">{literal}
    h1, .post h1 {font-weight: normal; color:#535353; font-size:20px; border-bottom:2px solid #5d5d5d; margin:0 0 10px; padding-bottom: 5px;}
    {/literal}</style>
    <h1>Калькулятор нестандартных размеров</h1>
    <script type="text/javascript">
        function brandCheck() {
            brand = document.getElementById('brand').options[document.getElementById('brand').selectedIndex].value;
            location.href = '{$url}calculator/' + brand + '/?is_modal=1';
        }
        function modelCheck() {
            brand = document.getElementById('brand').options[document.getElementById('brand').selectedIndex].value;

            if (brand > 0) {
                model = document.getElementById('model').options[document.getElementById('model').selectedIndex].value;
                location.href = '{$url}calculator/' + brand + '/' + model + '/?is_modal=1';
            }
            else {
                alert('Выбире производителя');
            }
        }
    </script>

    <form method="POST" action="">
        <table class="table_fields">
            <tr>
                <td>Производитель</td>
                <td>
                    <select id="brand" name="brand_id" onchange="brandCheck();" style="width: 240px;">
                        <option value="0">Выбрать</option>
                        <option value="30" {if $param_tpl.brand_id == 30}selected="selected"{/if}>Askona</option>
                        <option value="1" {if $param_tpl.brand_id == 1}selected="selected"{/if}>Ormatek</option>
                        <option value="4" {if $param_tpl.brand_id == 4}selected="selected"{/if}>ZigFlex</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Модель</td>
                <td>
                    <select name="model_id" id="model" style="width: 240px;" onchange="modelCheck()">
                        <option value="0">Выбрать</option>
                        {foreach from=$models item="model"}
                            <option value="{$model->id}" {if $param_tpl.model_id == $model->id}selected="selected"{/if}>{$model->name}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            <tr>
                <td>Размер</td>
                <td>

                    <input type="text" name="width" maxlength="3" value="{$smarty.post.width}" style="width: 70px" /> x 
                    <input type="text" name="height" maxlength="3" value="{$smarty.post.height}" style="width: 70px" /> 
                </td>
            </tr>

            <tr>
                <td colspan="2" style="vertical-align: middle">
                    <button class="podbor_button"></button>
                </td>

            </tr>
        </table>
        {if $price}
            <div id="info_calc">
                <div class="calc_price">Стоимость: {$price} руб.</div>
                <div class="calc_size">Размер: {$smarty.post.width}x{$smarty.post.height} руб.</div>

                <div class="calc_notice">Ширина: <b>{if $is_standart_width}стандартная{else} нестандартная{/if}</b>, высота: <b>{if $is_standart_height}стандартная{else} нестандартная{/if}</b></div>
            </div>
        {/if}
    </form>