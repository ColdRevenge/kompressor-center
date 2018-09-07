{if !$smarty.post.send}
    <ul class="question">
        {foreach from = $questions item = 'question' name="question"}
            {if $question->answer}
                <li><a href="javascript:void(0)" onclick="showJQuery('answer_{$question->id}')">{$question->subject}</a>
                    <div class="answer" id="answer_{$question->id}" style="display: none; ">
                        {if $question->question}<b>Вопрос:</b>
                            {$question->question}<br/>
                            <b>Ответ:</b>{/if}
                            <div style="margin: 4px 0px;">{$question->answer}</div>
                        </div>
                    </li>
                {/if}
                {/foreach}
                </ul>
                {/if}


                    {include file=$template_message message=$message error=$error}
                    {if !$message}
                        <div style="margin: auto; margin-top: 20px; width: 560px;" id="result_question">
                            <form method="post" id="form_question" action="">
                                <h2>Задать вопрос: </h2>
                                <table cellpadding="2" cellspacing="0" border="0" style="margin: 7px 0px 0px 10px;" class="table_fields">
                                    <tr>
                                        <td valign="middle" align="right">ФИО: <span class="asterix">*</span></td>
                                        <td valign="middle" align="left"><input type="text" name="fio" style="width: 450px;" maxlength="255" value="{$smarty.post.fio}"  onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"/></td>
                                    </tr>
                                    <tr>
                                        <td valign="middle" align="right">E-Mail:</td>
                                        <td valign="middle" align="left"><input type="text" name="mail" style="width: 450px;" maxlength="255" value="{$smarty.post.mail}"  onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"/></td>
                                    </tr>
                                    {*   <tr>
                                    <td valign="middle" align="right">Тема:</td>
                                    <td valign="middle" align="left"><input type="text" name="subject" style="width: 450px;" maxlength="255" value="{$smarty.post.subject}"  onfocus="this.className='selInput'" onblur = "this.className = 'text'"/></td>
                                    </tr>*}
                                    <tr>
                                        <td valign="top" align="right" style="vertical-align: top">Вопрос:&nbsp;<span class="asterix">&ast;</span></td>
                                        <td valign="middle" align="left">
                                            <textarea rows="8" cols="12" name="subject"  style="width: 450px;" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'">{$smarty.post.subject}</textarea>
                                        </td>
                                    </tr>
                                    {* <tr>
                                    <td valign="top" align="right">Вопрос: <span class="asterix">&ast;</span></td>
                                    <td valign="middle" align="left">
                                    <textarea rows="8" cols="12" name="question"  style="width: 450px;" onfocus="this.className='selInput'" onblur = "this.className = 'text'">{$smarty.post.question}</textarea>
                                    </td>
                                    </tr>*}
                                    <tr>
                                        <td valign="middle" align="right" colspan="2" style="text-align: right">
                                            <input type="hidden" name="send" value="1" />
                                            <button id="send_answer" class="send" onclick="AjaxFormQuery('result_question', 'form_question', '{$url}faq/add/');
                                                    return false;"></button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    {/if}

