<?php
ob_start();
?>
<table class="specific">
    <tbody>
        <tr>
            <td>Процессор</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Чипсет</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Операционная система</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Оперативная память</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Экран</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Разрешение экрана</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Жесткий диск</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Оптический привод</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Видеокарта</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Звук</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Связь</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Беспроводная связь</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Порты</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Слоты расширения</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Камера</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Батарея</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Время автономной работы, ч</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Габариты Д х Ш х В</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Вес, кг</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Комплект поставки</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Дополнительная информация</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Ссылка на сайт производителя</td>
            <td>&nbsp;</td>
        </tr>
    </tbody>
</table>
<?php

echo iconv("cp1251","utf-8",ob_get_clean());
?>