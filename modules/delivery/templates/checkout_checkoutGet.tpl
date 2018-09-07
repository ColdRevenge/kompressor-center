<script src="{$url}js/jquery.autocomplete.js"></script>
{literal}    
    <input type="hidden" value="" id="delivery_fias_id" name="fias_id" />
    <input type="hidden" value="" id="delivery_fias_street_id" name="fias_street_id" />
    
    
    
    

    <div id="result_delivery">

    </div>
    <script type="text/javascript">

        $('#city').autocomplete({
            serviceUrl: '{/literal}{$url}{literal}delivery/checkout/place/',
            minChars: 2, // Минимальная длина запроса для срабатывания автозаполнения
            delimiter: /(,|;)\s*/, // Разделитель для нескольких запросов, символ или регулярное выражение
            maxHeight: 1200, // Максимальная высота списка подсказок, в пикселях
            width: 300, // Ширина списка
            zIndex: 9999, // z-index списка
            deferRequestBy: 0, // Задержка запроса (мсек), на случай, если мы не хотим слать миллион запросов, пока пользователь печатает. Я обычно ставлю 300.
            noCache: false,
            onSelect: function (value) {
                $('#delivery_fias_id').val(value.id);
                AjaxRequest('result_delivery', '{/literal}{$url}{literal}delivery/checkout/calculate/?fias=' + value.id);

                $('#street').autocomplete({
                    serviceUrl: '{/literal}{$url}{literal}delivery/checkout/street/?placeId=' + value.id,
                    minChars: 2, // Минимальная длина запроса для срабатывания автозаполнения
                    delimiter: /(,|;)\s*/, // Разделитель для нескольких запросов, символ или регулярное выражение
                    maxHeight: 1200, // Максимальная высота списка подсказок, в пикселях
                    width: 300, // Ширина списка
                    zIndex: 9999, // z-index списка
                    deferRequestBy: 0, // Задержка запроса (мсек), на случай, если мы не хотим слать миллион запросов, пока пользователь печатает. Я обычно ставлю 300.
                    noCache: false,
                    onSelect: function (value) {
                        $('#delivery_fias_street_id').val(value.id)
                    },
                });
            },
        });

    </script> 
{/literal}
<script type="text/javascript">
</script>

