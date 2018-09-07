<div id="stat_menu">
    
    <div>Интернет магазин</div>
    <ul>
        <li><a href="/stat/profile/"{if $smarty.server.REQUEST_URI == "/stat/profile/"} class="active"{/if}>Мой профиль</a></li>
        <li><a href="/stat/orders/"{if $smarty.server.REQUEST_URI|strpos:"/stat/orders/" !== false} class="active"{/if}>Мои заказы</a></li>
        <li><a href="/stat/delivery/post/"{if $smarty.server.REQUEST_URI|strpos:"/stat/delivery/post/" !== false} class="active"{/if}>Отследить заказ</a></li>
        <li><a href="/stat/password/"{if $smarty.server.REQUEST_URI|strpos:"/stat/password/" !== false} class="active"{/if}>Сменить пароль</a></li>
    </ul>

</div>