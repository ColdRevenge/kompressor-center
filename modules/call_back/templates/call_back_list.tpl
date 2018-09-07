{include file=$template_message message=$message error=$error}

<h1>Заявки с сайта</h1>

<form method="post" action="">
    <table cellpadding="3" cellspacing="0" border="0" style="margin: auto; margin-top: 10px;">
        <tr>
            <td valign="middle" align="right">Дата заполнения: </td>
            <td valign="middle" align="left">с &nbsp;&nbsp;{$form_start_date}&nbsp;&nbsp; по &nbsp;&nbsp;{$form_end_date}
                <input type="submit" value="Сформировать" name="sunmit" /></td>
            <td><input style="cursor:pointer;" type="submit" onClick="javascript:window.print();" value="Печатать"></td>
        </tr>
    </table>
</form>
<br/>

<table cellpadding="5" cellspacing="1" border="0" class="table_list" style="width: 100%;">
    <tbody class="table_header_list">
        <tr>
            <td valign="middle" align="center"><b>Дата:</b></td>
            <td valign="middle" align="center"><b>ФИО: </b></td>
            <td valign="middle" align="center"><b>Телефон: </b></td>
            <td valign="middle" align="center"><b>E-mail: </b></td>
            <td valign="middle" align="center"><b>Номер лиц. счета:</b></td>
            <td valign="middle" align="center"><b>Тип: </b></td>
            <td valign="middle" align="center"><b>Сообщение: </b></td>
        </tr>
    </tbody>
    {foreach from = $requests item = 'request' name="request"}
    <tbody class="tbody">
        <tr>
            <td valign="middle" align="center">{$request->created|date_format:"%d.%m.%Y %H:%M"}</td>
            <td valign="middle" align="center">{$request->name}</td>
            <td valign="middle" align="center">{$request->phone}</td>
            <td valign="middle" align="center">{$request->email}</td>
            
            <td valign="middle" align="center">{$request->number}</td>
            <td valign="middle" align="center">{$request->subject}</td>
            <td valign="middle" align="center">{$request->message}</td>
            
        </tr>
    </tbody>
    {/foreach}
</table>
