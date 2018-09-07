<!-- 
*****************************************************************
*   Сайт разработан компанией OX2 (http://ox2.ru/) (2018 год)   *
*****************************************************************
-->
<title>{$head_title|stripslashes|default:$set->title|stripslashes}</title>
<link rel="shortcut icon" href="{$host_url}favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content='{$head_desc|stripslashes|strip_tags|truncate:249|default:''|stripslashes|strip_tags|truncate:249}' />
<meta name="keywords" content='{$head_key|stripslashes|default:''|stripslashes|strip_tags}' />
<meta name="viewport" content="width=1024" /> 
{*<script src="{$host_url}js/jquery-1.7.2.min.js" type="text/javascript"></script>*}
{*<script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>*}
{*<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script> *}
<script src="/js/jquery.min.js"></script>
<link href='{$host}fonts.googleapis.com/css?family=Open+Sans:400,600,300&subset=latin,cyrillic-ext,cyrillic' rel='stylesheet' type='text/css'>
<style type="text/css">
    @import url({$host}fonts.googleapis.com/css?family=Open+Sans:400,600,300&subset=latin,cyrillic-ext,cyrillic);
</style>

{*<link href='{$host}fonts.googleapis.com/css?family=Open+Sans:400,600,300&subset=latin,cyrillic-ext,cyrillic' rel='stylesheet' type='text/css'>*}

{*<script type="text/javascript" src="{$lib_url}srcoll.js"></script>*}
<script type='text/javascript' src='{$lib_url}js.js?v1.2'></script>
<script src="/js/jquery.validate.min.js" type="text/javascript" charset="utf-8"></script>
{*<script src="/js/jquery.stickr.js" type="text/javascript" charset="utf-8"></script>*}
{*<link rel="stylesheet" href="/js/jquery.stickr.css" type="text/css" media="screen" />*}
<script src="/js/jcarousellite.js"></script>

<script type='text/javascript' src='{$lib_url}lib.js?v1'></script>
<script src="{$host_url}js/prettyPhoto/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>

<link rel="stylesheet" type="text/css" href="/css/base/catalog.css"  charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="/css/base/products.css" />
<link rel="stylesheet" type="text/css" href="/css/base/all.css" />
<link rel="stylesheet" type="text/css" href="/css/main.css?v1" />
{*<link rel="stylesheet" type="text/css" href="/css/base/auth.css" />*}

<link href="/css/style.css?v1.4" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="/css/base/basket.css?v1.1" />
{if $smarty.get.is_modal == 1}<link rel="stylesheet" type="text/css" href="/css/base/modal.css" />{/if}
{*<link href="/css/cusel.css" rel="stylesheet" />*}


<script type="text/javascript">
    $(document).ready(function () {
        $('#wrapper').css({
            minHeight: $(window).height() - 66
        })
    })
    var url = '{$host_url}';
    var catalog_dir = '{$catalog_dir}';
    var base_url = url;
    shop_type = {$shop_type}
    session_id = '{$session_id}'
</script>