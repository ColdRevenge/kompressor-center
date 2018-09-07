{if $user->id}
    <h2>{$user->name} {$user->last_name} {$user->middle_name}</h2>
    {if $user->is_jur_person == 2} {* Юр лицо *}
            <h1>Юр. лицо </h1>
            <div style="margin-bottom:4px;">Логин: <b>{$user->login|stripslashes}</b></div>
            <div style="margin-bottom:4px;">Пароль: <b>{$user->password|stripslashes}</b></div>
            <div style="margin-bottom:4px;">Телефон: <b>{$user->phone|stripslashes}</b></div>
            <div style="margin-bottom:4px;">Почта: <b>{$user->email|stripslashes}</b></div>
            <div style="margin-bottom:4px;">Адрес: <b>{$user->adress|stripslashes|nl2br}</b></div>
            <div style="margin-bottom:4px;">Информация: <b>{$user->info|stripslashes|nl2br}</b></div>
            <div style="margin-bottom:4px;font-style: italic">{if $user->is_email_tender == 1}Получает уведомления о тендерах{else}Не получает уведомления о тендерах{/if}</div>
            <div style="margin-bottom:4px;">Зарегистрирован: <b>{$user->created|date_format:"%d.%m.%Y"}</b></div>
            <br/>
            <h2>Информация о компании</h2>
            <div style="margin-bottom:4px;">Наименование организации: <b>{$user->company_name}</b></div>
            <div style="margin-bottom:4px;">Факс: <b>{$user->company_fax}</b></div>
            <div style="margin-bottom:4px;">ИНН: <b>{$user->company_inn}</b></div>
            <div style="margin-bottom:4px;">Юридический адрес организации: <b>{$user->company_ur_adress}</b></div>
            <div style="margin-bottom:4px;">Банк: <b>{$user->company_bank}</b></div>
            <div style="margin-bottom:4px;">БИК: <b>{$user->company_bik}</b></div>
            <div style="margin-bottom:4px;">P/c: <b>{$user->company_rs}</b></div>
            <div style="margin-bottom:4px;">К/c: <b>{$user->company_ks}</b></div>
            <div style="margin-bottom:4px;">КПП: <b>{$user->company_kpp}</b></div>
            <div style="margin-bottom:4px;">ОКПО: <b>{$user->company_okpo}</b></div>
            <div style="margin-bottom:4px;">ОКНХ: <b>{$user->company_oknx}</b></div>
            <div style="margin-bottom:4px;">ФИО Генерального директора: <b>{$user->company_fio_director}</b></div>
            <div style="margin-bottom:4px;">ФИО Гл. бухгалтера: <b>{$user->company_fio_accountant}</b></div>
        {else}
            <h1>Физ. лицо </h1>
            <div style="margin-bottom:4px;">Логин: <b>{$user->login|stripslashes}</b></div>
            <div style="margin-bottom:4px;">Пароль: <b>{$user->password|stripslashes}</b></div>
            <div style="margin-bottom:4px;">Телефон: <b>{$user->phone|stripslashes}</b></div>
            <div style="margin-bottom:4px;">Почта: <b>{$user->email|stripslashes}</b></div>
            <div style="margin-bottom:4px;">Адрес: <b>{$user->adress|stripslashes|nl2br}</b></div>
            <div style="margin-bottom:4px;">Информация: <b>{$user->info|stripslashes|nl2br}</b></div>
            <div style="margin-bottom:4px;">{if $user->is_email_tender == 1}Получает уведомления о тендерах{else}Не получает уведомления о тендерах{/if}</div>
            <div style="margin-bottom:4px;">Зарегистрирован: <b>{$user->created|date_format:"%d.%m.%Y"}</b></div>
        {/if}    

    {/if}