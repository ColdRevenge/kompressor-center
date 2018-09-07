<div class="block">
    <div class="page">
        {include file=$template_message message=$message error=$error}
        <h1>Сортировка {if $param_tpl.type == 1}спец. предложений{elseif $param_tpl.type == 1}распродажи{elseif $param_tpl.type == 1}новинок{/if}</h1>
        <form method="post" action="">

            <div style="margin: 5px 0 5px 0;float: left">
                <button>Сохранить</button>
            </div>
            <div class="nav_buttons">
                <a href="{$admin_url}products/param/sort/1/"{if $param_tpl.type == 1} class="active"{/if}>Спец. предложения</a>
                <a href="{$admin_url}products/param/sort/5/"{if $param_tpl.type == 5} class="active"{/if}>Распродажи</a>
                <a href="{$admin_url}products/param/sort/3/"{if $param_tpl.type == 3} class="active"{/if}>Новинки</a>
            </div>

            <div id="products_sort">
                {foreach from=$get_products.result item="product" name="sort"}
                    <div class="product_block" rel="{$smarty.foreach.sort.total-$smarty.foreach.sort.iteration}">
                        <div>
                            <div class="product_img"><img src="/images/gallery/{$product->file}" alt="" title="" /></div>
                            <div class="product_name"><a href="{$url}xadmin/products/edit/0/{$product->category_1_id}/{$product->id}/{$product->id}/?is_modal=1" rel="related" title="Быстрое редактирование товара">{$product->name|stripslashes}</a></div>
                            <div class="product_article">{$product->article}</div>
                            <input type="hidden" name="sort[{$product->id}]" value="1" />
                        </div>
                    </div>
                {/foreach}
                <div class="clear">&nbsp;</div>
            </div>
        </form>
    </div>
</div>

<script src="/lib/jqueryui.js"></script>
<script type="text/javascript">
    $(function () {
        current_drag_obj = new Array();
        current_drag_index = 0;
        $('#products_sort .product_block').draggable({
            containment: "#products_sort",
            snap: "#products_sort .product_block",
            snapMode: "both",
            snapTolerance: 20,
            start: function () {
                $(this).css({
                    opacity: "0.5",
                    zIndex: '10'
                });
                current_drag_index = $(this).attr('rel'); //Индекс перемещаемого объекта
                current_drag_obj[$(this).attr('rel')] = $(this); //Перемещаемый объект
            },
            stop: function () {
                $(this).css({
                    opacity: "1",
                    zIndex: '0'
                });
                current_drag_index = 0;
                $(this).css({
                    left: '0px',
                    top: '0px'
                })

            },
        });
        $('#products_sort .product_block').droppable({
            over: function () {
                $(this).css({
                    backgroundColor: '#eaf2f9',
                    borderLeftColor: "#cccccc"
                })
            },
            out: function () {
                $(this).css({
                    backgroundColor: 'white',
                    borderLeftColor: "#f5f5f5"
                })
            },
            drop: function () {
                $(this).css({
                    backgroundColor: 'white',
                    borderLeftColor: "#f5f5f5"
                })
                $($(current_drag_obj[current_drag_index])).insertBefore(this)
    {*                $(current_drag_obj[current_drag_index]).remove();*}
                current_drag_index = 0;

            }
        });
    });
</script> 