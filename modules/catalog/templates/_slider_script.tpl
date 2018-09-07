
<script type="text/javascript">
    var min_price = {$min|default:0};
    var max_price = {$max|default:1000};
    var unit = ' р.'

    jQuery("{$slider_id}").slider({
        min: min_price,
        max: max_price,
        values: [{$min_name|default:"min_price"},{$max_name|default:"max_price"}],
        step: 10,
        range: true,
        stop: function(event, ui) {
            jQuery("input{$min_id}").val(jQuery("{$slider_id}").slider("values", 0));
            jQuery("input{$max_id}").val(jQuery("{$slider_id}").slider("values", 1));
            jQuery("#minCostLabel_{$category_id}").html(jQuery("{$slider_id}").slider("values", 0) + unit);
            jQuery("#maxCostLabel_{$category_id}").html(jQuery("{$slider_id}").slider("values", 1) + unit);
            $('#podbor button').click();
        },
        slide: function(event, ui) {
            jQuery("input{$min_id}").val(jQuery("{$slider_id}").slider("values", 0));
            jQuery("input{$max_id}").val(jQuery("{$slider_id}").slider("values", 1));
            jQuery("{$min_id}Label").html(jQuery("{$slider_id}").slider("values", 0) + unit);
            jQuery("{$max_id}Label").html(jQuery("{$slider_id}").slider("values", 1) + unit);
        }
    });

    function validateField() {
        var value1 = parseInt(jQuery("input{$min_id}").val());
        var value2 = parseInt(jQuery("input{$max_id}").val());

        if (isNaN(value1)) {
            value1 = min_price;
            jQuery("input{$min_id}").val(value1);
            jQuery("{$min_id}Label").html(value1);
        }
        else {
            jQuery("input{$min_id}").val(value1)
            jQuery("{$min_id}Label").html(value1);
        }

        if (isNaN(value2)) {
            value2 = max_price;
            jQuery("input{$max_id}").val(value2);
            jQuery("{$max_id}Label").html(value2);
        }
        else {
            jQuery("input{$max_id}").val(value2)
            jQuery("{$max_id}Label").html(value2);
        }
    }


    jQuery("input{$min_id}").change(function() {
        validateField()
        var value1 = parseInt(jQuery("input{$min_id}").val());
        var value2 = parseInt(jQuery("input{$max_id}").val());

        if (value1 < min_price) {
            value1 = min_price;
            jQuery("input{$min_id}").val(value1)
        }
        if (parseInt(value1) > parseInt(value2)) {
            value1 = value2;
            jQuery("input{$min_id}").val(value1);
        }
        jQuery("{$slider_id}").slider("values", 0, value1);
    });


    jQuery("input{$max_id}").change(function() {
        validateField();
        var value1 = parseInt(jQuery("input{$min_id}").val());
        var value2 = parseInt(jQuery("input{$max_id}").val());

        if (value2 > max_price) {
            value2 = max_price;
            jQuery("input{$max_id}").val(value2)
        }

        if (parseInt(value1) > parseInt(value2)) {
            value2 = value1;
            jQuery("input{$max_id}").val(value2);
        }
        jQuery("{$slider_id}").slider("values", 1, value2);
    });
</script>