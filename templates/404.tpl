{if $is_mobile == 1}
    {assign var="is_main" value="0"}
    {assign var="content" value='    <div class="wrapper text-page" style="width: 100%;margin-bottom: 20px;margin: auto;">
        <br/><br/><br/><br/><br/><br/><br/>
        <h3 style="text-align: center;">Запрашеваемая страница не найдена :(((&nbsp;</h3>
        <h3 style="text-align: center;">Вы можете ознакомиться с другими товарами на <a href="/" style="color: #f94208; text-decoration: underline">нашем сайте</a>.</h3>
        <br/><br/><br/><br/><br/><br/><br/>
    </div>' }
    {include file="mobile.tpl"}
{else}
    {include file="header.tpl"}

    <div class="wrapper text-page" style="width: 900px;margin-bottom: 20px;margin: auto;">
        <br/><br/><br/><br/><br/><br/><br/>
        <h3 style="text-align: center;">Запрашеваемая страница не найдена :(((&nbsp;</h3>
        <h3 style="text-align: center;">Вы можете ознакомиться с другими товарами на <a href="/" style="color: #f94208; text-decoration: underline">нашем сайте</a>.</h3>
        <br/><br/><br/><br/><br/><br/><br/>
    </div>

    {include file="footer.tpl"}
{/if}