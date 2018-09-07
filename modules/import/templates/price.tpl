<div class="block">
    <div class="page">
        {include file=$template_message message=$message error=$error}
        <h1>Импортировать цены</h1>

        <h2>Загрузка excel-файла</h2>

        <form action="" method="post" enctype="multipart/form-data">
            <table cellpadding="4" cellspacing="1" border="0" class="table" style="margin: 10px 0px 20px 30px;">
                <tbody class="table_header">
                    <tr>
                        <td valign="middle" align="center">Выберите файл</td>
                    </tr>
                </tbody>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right">
                            <input type="file" name="file_price" />
                            <div style="margin-top: 7px;">
                                <button onclick="this.style.display = 'none';">Импортировать на сайт</button>
                            </div>
                            <br/>

                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>