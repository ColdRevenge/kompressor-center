{if $is_mobile == 1}
    <div id="breadcrumbs-block">
        <div id="bread-back"><a href="/">Назад</a></div>
        <h1>Сменить пароль</h1>
        <div class="clear">&nbsp;</div>
    </div>

    <ul id="profile-link">
        <li><a href="/stat/delivery/post/">Отследить заказ (Почта России)</a></li>
        <li><a href="/stat/orders/">Мои заказы</a></li>
        <li><a href="/stat/profile/">Мой профиль</a></li>
        <li><a href="/auth/exit/?back_url={$url}{$smarty.server.REQUEST_URI|ltrim:"/"}">Выход</a></li>
    </ul>

    <div class="text">
        {include file=$template_message message=$message error=$error mclass="message"}

        {*    <div id='register-block'>
                
        </div>*}
        <form method="post" action="">
            <table cellpadding="0" cellspacing="2" border="0" id="register" class="table_fields">
                <tr>
                    <td valign="middle" align="left"><input type="password" size="30" class="text" name="password" placeholder="Новый пароль"   maxlength="255" /></td>
                </tr>
                <tr>
                    <td valign="middle" align="left"><input type="password" class="text" size="30" name="is_password" placeholder="Подтвержение пароля"   maxlength="255" /></td>
                </tr>
                <tr>
                    <td valign="middle" align="left"><input type="password" size="30" class="text" name="old_password" placeholder="Старый пароль"   maxlength="255"  /></td>
                </tr>
                <tr>
                    <td valign="middle" align="right" colspan="2" style="text-align: right">
                        <input type="hidden" value="1" name="change_pass" />
                        <button class="change">&nbsp;</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

{else}
    <div id="stat-left-menu">
        {include file="stat_menu.tpl"}
    </div>
    <div id="stat_content">        
        <div class="breadcrumbs-block">

            <ul class="clearfix">
                <li><a href="{$url}">Главная</a><span>/</span></li>
                <li>Сменить пароль</li>
            </ul>
        </div>
        <h1>Сменить пароль</h1>

        <div class="text">
            {include file=$template_message message=$message error=$error mclass="message"}
            <form method="post" action="">
                <table cellpadding="0" cellspacing="2" border="0" id="register" style="margin-left: 80px;  width: 440px;" class="table_fields">
                    <tr>
                        <td valign="middle" align="right" style="text-align: right">Новый пароль:<span class="asterix">*</span></td>
                        <td valign="middle" align="left"><input type="password" size="30" class="text" name="password"  style="width: 200px"  maxlength="255"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"/></td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" style="text-align: right">Подтвержение пароля:<span class="asterix">*</span></td>
                        <td valign="middle" align="left"><input type="password" class="text" size="30" name="is_password"  style="width: 200px" maxlength="255"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"/></td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" style="text-align: right; width: 220px;">Старый пароль:<span class="asterix">*</span></td>
                        <td valign="middle" align="left"><input type="password" size="30" class="text" name="old_password"  style="width: 200px"  maxlength="255"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"/></td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" colspan="2" style="text-align: right">
                            <input type="hidden" value="1" name="change_pass" />
                            <button class="change">&nbsp;</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
{/if}

<br/><br/>