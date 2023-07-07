<div class="breadcrumb-block">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xs-9">
                <ol class="breadcrumb">
                    <li><a href="{$ul}/home"><span class="fa fa-home"></span>หน้าแรก</a></li>
                    {* <li><a href="{$ul}/information">สารสนเทศ</a></li>
                    <li><a href="{$ul}/information/intranet">ฐานข้อมูลภายใน (Intranet)</a></li> *}
                    <li class="active">แบบสอบถาม</li>
                </ol>
            </div>
            <div class="col-sm-6 col-xs-3">
                <div class="back">
                    <a onclick="window.history.back();" class="btn btn-default btn-small">กลับ</a>
                </div>
            </div>
        </div>
    </div>
</div>

<section>
    <div class="default-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <div class="whead">
                        <div class="thumb">
                            <figure>
                                <img src="{$template}/public/image/icon/icon-anchor.png" alt="">
                            </figure>
                        </div>
                        <div class="title">
                            <h1>DMCR <strong class="text-primary">QUESTIONNAIRE</strong></h1>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="translate">
                        <div id="google_translate_element"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="default-page">
        <div class="container">
            <div class="default-wrapper" style="display:none;">
                <div class="default-title">แบบสอบถาม / ลงทะเบียนเข้าร่วมกิจกรรม</div>
                <div class="questionare-detail">
                    <div class="header">
                        <h3 class="title">{$infoQuestionare->fields['subject']}</h3>
                        <p class="desc" style="line-height:20px;">
                            {$infoQuestionare->fields['title']|nl2br}
                        </p>
                    </div>

                    <form class="" id="myFormQuse" name="myFormQuse" data-toggle="validator" method="post">
                        <input name="action" id="action" type="hidden" value="addnew">
                        <input name="f" id="f" type="hidden" value="{$id_quse}">
                        <input name="myid" id="myid" type="hidden" value="{$myid}">


                        {$infoQuseList = $id_quse|callQuesList}
                        {* {$infoQuseList|print_pre} *}






                        <div class="form-default">


                            {if $infoQuseList->fields neq ''}



                            {foreach $infoQuseList as $listQuseList name=numOfQuseList}

                            {* {$listQuseList|print_pre} *}
                            {* {if $infoAnsName->fields} *}
                            <input name="inputQuest{$listQuseList['id']}" id="inputQuest{$listQuseList['id']}" type="hidden" value="{$listQuseList['id']}">

                            {* <textarea class="form-control" rows="4"></textarea> *}
                            {if $listQuseList['type'] eq 1 }
                            {$infoAnsName = $listQuseList['id']|callansName}
                            <div class="form-group">
                                <label class="control-label">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}</label>
                                <div class="row">
                                    {foreach $infoAnsName as $listAnsName name=numOfAnsName}

                                    <div class="radio-control">
                                        <input type="radio" name="inputNumber{$listQuseList['id']}" id="inputNumber{$listQuseList['id']}" value="{$listAnsName.id}" required>
                                        <span class="icon"></span>
                                        <span class="txt">
                                            {$listAnsName.name}
                                        </span>
                                    </div>
                                    <br />

                                    {/foreach}
                                </div>
                                <div class="help-block with-errors"></div>
                            </div>
                            {else}
                            <div class="form-group">
                                <label class="control-label">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}</label>
                                <textarea class="form-control" rows="4" name="inputNumber{$listQuseList['id']}" id="inputNumber{$listQuseList['id']}" data-error="โปรดใส่ข้อมูล (Please fill out this field) หรือ -" required></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                            {/if}
                            {/foreach}

                            {/if}
                            {* <div class="form-group">
                                <label class="control-label">02. องค์กรปกครองส่วนท้องถิ่นของท่านอยู่ในเขตอำเภอและจังหวัดใด</label>
                                <textarea class="form-control" rows="4"></textarea>
                            </div> *}

                            {* {$c|print_pre} *}
                            {*<div class="captcha form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="control-label" for="">กดเพื่อยืนยัน <span class="require">*</span></label>
                                        <div class="captcha-block">
                                            <div class="col">
                                                <div class="g-recaptcha" data-callback="recaptcha_callback" data-sitekey="{$keyrecaptcha}"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="help-block with-errors">{$register_error.session_captcha|default:""}</div>
                                    </div>
                                </div>
                            </div>*}
                        </div>
                        {*
                        <label class="control-label" for="">รหัสยืนยัน <span class="require">*</span></label>
                        <div class="captcha-block">
                            <input class="form-control" type="text" name="captcha" placeholder="" data-remote-error='Security Code ERROR!' data-remote="{$ul}/captcha" required style="height: 40px;">
                            {include file="captcha.tpl"}
                        </div>
                        *}

                        <div class="form-action">
                            <div class="wrapper">
                                <div>
                                    <input value="ยืนยัน" type="submit" name="" class="btn btn-primary btn-medium"> {*disabled*}
                                </div>
                                <div>
                                    <input value="ล้างฟอร์ม" type="button" name="" onclick="resetMyformInsert()" class="btn btn-info btn-medium textGray">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>


            <!--########################## New QA ########################### -->
            <div class="default-wrapper">
                <div class="default-title">ลงทะเบียนเข้าร่วมกิจกรรม</div>
                <div class="questionare-detail">
                    <div class="editor-content">
                        <div class="header">
                            <div class="row">
                                <div class="col-md-4">
                                    <figure >
                                        <img src="{$infoQuestionare.pic|fileinclude:"pictures":{$infoQuestionare.masterkey}:"link"}" alt="{$infoQuestionare.subject}">
                                    </figure>
                                </div>
                                <div class="col-md-8">
                                    <h3 class="title">{$infoQuestionare.subject}</h3>
                                    <p class="desc" style="line-height:20px;">
                                        {strip}
                                                {$infoQuestionare.htmlfilename|fileinclude:"html":$infoQuestionare.masterkey|callHtml}
                                        {/strip} 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form class="" id="myFormQuse_form" name="myFormQuse_form" data-toggle="validator" method="post">
                        <input name="action" id="action" type="hidden" value="addnew">
                        <input name="f" id="f" type="hidden" value="{$id_quse}">
                        <input name="myid" id="myid" type="hidden" value="{$myid}">


                        {$infoQuseList = $id_quse|callFormQuesList}
                        {* {$infoQuseList|print_pre} *}
                        <div class="form-default">
                        {if $infoQuseList->_numOfRows > 0}



                            {foreach $infoQuseList as $listQuseList name=numOfQuseList}
                            <input name="inputQuest[{$listQuseList.id}]" id="inputQuest-{$listQuseList.id}" type="hidden" value="{$listQuseList.id}">

                                {if $listQuseList.type eq 1 } {*Radio*}
                                {$infoAnsName = $listQuseList.id|callFormAnsName}
                                <div class="form-group redio">
                                    <label class="control-label">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}{if $listQuseList.request eq 1}<span class="request">*</span>{/if}</label><br />
                                    {foreach from=$infoAnsName item=listAnsName name=numOfAnsName}
                                        <div class="radio-control">
                                            <input type="radio" name="inputAns[{$listQuseList.id}]" id="inputAns-{$listQuseList.id}" value="{$listAnsName.id}" {if $listQuseList.request eq 1} required {/if} {if $smarty.foreach.numOfAnsName.iteration eq 1} checked{/if}>
                                            <span class="icon"></span>
                                            <span class="txt">
                                                {$listAnsName.name}
                                            </span>
                                        </div>
                                        <br />
                                    {/foreach}
                                    <div class="help-block with-errors">{if $listQuseList.request eq 1} {$listQuseList.request_title} {/if}</div>
                                </div>
                                {elseif $listQuseList.type eq 2} {*Text Box*}
                                    {if $listQuseList.type_text eq 1} {* TEXT *}
                                        <div class="form-group text-input">
                                            <label class="control-label">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}{if $listQuseList.request eq 1}<span class="request">*</span>{/if}</label>
                                            <div class="block-control">
                                                <input class="form-control" type="text" id="inputAns-{$listQuseList.id}" name="inputAns[{$listQuseList.id}]" value="" placeholder="" {if $listQuseList.request eq 1} data-error="{$listQuseList.request_title}" required {/if}>
                                                <span class="form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </div>
                                    {elseif $listQuseList.type_text eq 2} {* Email *}
                                        <div class="form-group text-input">
                                            <label class="control-label">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}{if $listQuseList.request eq 1}<span class="request">*</span>{/if}</label>
                                            <div class="block-control">
                                                <input class="form-control" type="email" id="inputAns-{$listQuseList.id}" name="inputAns[{$listQuseList.id}]" value="" placeholder="" {if $listQuseList.request eq 1} data-error="{$listQuseList.request_title}" required {/if}>
                                                <span class="form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </div>
                                    {elseif $listQuseList.type_text eq 3} {* Number *}
                                        <div class="form-group text-input">
                                            <label class="control-label">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}{if $listQuseList.request eq 1}<span class="request">*</span>{/if}</label>
                                            <div class="block-control">
                                                <input class="form-control numberOnly" type="text" id="inputAns-{$listQuseList.id}" name="inputAns[{$listQuseList.id}]" value="" placeholder="" {if $listQuseList.request eq 1} data-error="{$listQuseList.request_title}" required {/if}>
                                                <span class="form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </div>
                                    {elseif $listQuseList.type_text eq 4} {* หมายเลขบัตรประจำตัวประชาชน *}
                                        <div class="form-group text-input">
                                            <label class="control-label">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}{if $listQuseList.request eq 1}<span class="request">*</span>{/if}</label>
                                            <div class="block-control">
                                                <input class="form-control numberIDCard" maxlength="13" type="text" id="inputAns-{$listQuseList.id}" name="inputAns[{$listQuseList.id}]" value="" placeholder="" {if $listQuseList.request eq 1} data-error="{$listQuseList.request_title}" required {/if}>
                                                <span class="form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </div>
                                    {/if}
                                {elseif $listQuseList.type eq 3} {*List Box*}
                                {$infoAnsName = $listQuseList.id|callFormAnsName}
                                <div class="form-group select">
                                    <label class="control-label">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}{if $listQuseList.request eq 1}<span class="request">*</span>{/if}</label><br />
                                    <div class="default-block">
                                        <select class="select-control" id="inputAns-{$listQuseList.id}" name="inputAns[{$listQuseList.id}]" style="width: 100%;" {if $listQuseList.request eq 1} required {/if}>
                                            <option selected {if $listQuseList.request eq 1}disabled{else}value="0"{/if}>เลือกคำตอบ</option>
                                            {foreach from=$infoAnsName item=listAnsName name=numOfAnsName}
                                                <option value="{$listAnsName.id}" >{$listAnsName.name}</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                    <br />
                                    <div class="help-block with-errors">{if $listQuseList.request eq 1} {$listQuseList.request_title} {/if}</div>
                                </div>
                                {elseif $listQuseList.type eq 4} {*Check Box*}
                                {$infoAnsName = $listQuseList.id|callFormAnsName}
                                    <div class="form-group checkbox">
                                        <label class="control-label">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}{if $listQuseList.request eq 1}<span class="request">*</span>{/if}</label><br />
                                        <div class="checkbox-list">
                                            <ul class="item-list">
                                            {foreach from=$infoAnsName item=listAnsName name=numOfAnsName}
                                                <li>
                                                    <div class="checkbox-control">
                                                        <input type="checkbox" name="inputAns[{$listQuseList.id}][]" id="inputAns-{$listQuseList.id}" value="{$listAnsName.id}">
                                                        <div class="icon"></div>
                                                        <h4 class="title">{$listAnsName.name}</h4>
                                                    </div>
                                                </li>
                                            {/foreach}
                                            </ul>
                                        </div>
                                        <br />
                                        <div class="help-block with-errors">{if $listQuseList.request eq 1} {$listQuseList.request_title} {/if}</div>
                                    </div>
                                {elseif $listQuseList.type eq 5} {*Matrix*}
                                {$infoAnsMatrix = $listQuseList.id|callFormMatrix}
                                {* {$infoAnsMatrix|print_pre} *}
                                    <div class="form-group">
                                        <div class="assessment-form">
                                            <div class="qa">
                                                <label class="control-label">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}{if $listQuseList.request eq 1}<span class="request">*</span>{/if}</label><br />
                                                <table class="assessment" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <td></td>
                                                            {foreach from=$infoAnsMatrix.title_chois item=title_chois}
                                                            <td width="12%">{$title_chois}</td>
                                                            {/foreach}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    {foreach from=$infoAnsMatrix.chois item=listAnsName name=numOfAnsName}
                                                        <tr>
                                                            <td class="question">{$smarty.foreach.numOfAnsName.iteration}. {$listAnsName.subject}</td>
                                                            {foreach from=$listAnsName.chois item=val_chois}
                                                                <td>
                                                                    <div class="radio-control">
                                                                        <input type="radio" name="inputNumber[{$listAnsName.id}]" id="inputNumber" value="{$val_chois}" required>
                                                                        <span class="icon"></span>

                                                                    </div>
                                                                </td>
                                                            {/foreach}
                                                            
                                                        </tr>
                                                    {/foreach}
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                {elseif $listQuseList.type eq 6} {*Text Area*}
                                <div class="form-group text-area">
                                    <label class="control-label">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}{if $listQuseList.request eq 1}<span class="request">*</span>{/if}</label>
                                    <textarea class="form-control" rows="4" name="inputAns[{$listQuseList.id}]" id="inputAns-{$listQuseList.id}"  {if $listQuseList.request eq 1} data-error="{$listQuseList.request_title}" required {/if}></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                {/if}
                            {/foreach}
                            
                        {/if}
                            {* <div class="form-group text-input">
                                <label class="control-label">Titel</label>
                                <div class="block-control">
                                    <input class="form-control" type="text" id="" name="" value="" placeholder="" data-error="โปรดใส่ข้อมูล (Please fill out this field) หรือ -" required>
                                    <span class="form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div> *}

                            {* <div class="form-group text-area">
                                <label class="control-label">Titel</label>
                                <textarea class="form-control" rows="4" name="inputNumber" id="inputNumber" data-error="โปรดใส่ข้อมูล (Please fill out this field) หรือ -" required></textarea>
                                <div class="help-block with-errors"></div>
                            </div> *}

                            {* <div class="form-group redio">
                                <label class="control-label">Titel</label><br />

                                <div class="radio-control">
                                    <input type="radio" name="inputNumber" id="inputNumber" value="" required>
                                    <span class="icon"></span>
                                    <span class="txt">
                                        คำตอบที่ 1
                                    </span>
                                </div>
                                <br />
                                <div class="radio-control">
                                    <input type="radio" name="inputNumber" id="inputNumber" value="" required>
                                    <span class="icon"></span>
                                    <span class="txt">
                                        คำตอบที่ 2
                                    </span>
                                </div>
                                <br />
                                <div class="radio-control">
                                    <input type="radio" name="inputNumber" id="inputNumber" value="" required>
                                    <span class="icon"></span>
                                    <span class="txt">
                                        คำตอบที่ 3
                                    </span>
                                </div>
                                <br />
                                <div class="radio-control">
                                    <input type="radio" name="inputNumber" id="inputNumber" value="" required>
                                    <span class="icon"></span>
                                    <span class="txt">
                                        คำตอบที่ 4
                                    </span>
                                </div>
                                <br />
                                <div class="radio-control">
                                    <input type="radio" name="inputNumber" id="inputNumber" value="" required>
                                    <span class="icon"></span>
                                    <span class="txt">
                                        คำตอบที่ 5
                                    </span>
                                </div>
                                <br />

                                <div class="help-block with-errors"></div>
                            </div> *}

                            {* <div class="form-group select">
                                <label class="control-label">Titel</label><br />

                                <div class="default-block">
                                    <select class="select-control" style="width: 100%;">
                                        <option selected disabled>เลือกคำตอบ</option>
                                        <option>คำตอบที่ 1</option>
                                        <option>คำตอบที่ 2</option>
                                        <option>คำตอบที่ 3</option>
                                    </select>
                                </div>
                                <br />

                                <div class="help-block with-errors"></div>
                            </div> *}

                            {* <div class="form-group checkbox">
                                <label class="control-label">Titel</label><br />


                                <div class="checkbox-list">
                                    <ul class="item-list">
                                        <li>
                                            <div class="checkbox-control">
                                                <input type="checkbox" name="cb">
                                                <div class="icon"></div>
                                                <h4 class="title">คำตอบที่ 1</h4>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox-control">
                                                <input type="checkbox" name="cb">
                                                <div class="icon"></div>
                                                <h4 class="title">คำตอบที่ 2</h4>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox-control">
                                                <input type="checkbox" name="cb">
                                                <div class="icon"></div>
                                                <h4 class="title">คำตอบที่ 3</h4>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox-control">
                                                <input type="checkbox" name="cb">
                                                <div class="icon"></div>
                                                <h4 class="title">คำตอบที่ 4</h4>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox-control">
                                                <input type="checkbox" name="cb">
                                                <div class="icon"></div>
                                                <h4 class="title">คำตอบที่ 5</h4>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <br />

                                <div class="help-block with-errors"></div>
                            </div> *}
                            {* <div class="form-group">
                                <div class="assessment-form">
                                    <div class="qa">
                                        <label class="control-label">Titel</label><br />
                                        <table class="assessment" width="100%">
                                            <thead>
                                                <tr>
                                                    <td></td>
                                                    <td width="12%">ดีเยี่ยม</td>
                                                    <td width="12%">ดี</td>
                                                    <td width="12%">ปานกลาง</td>
                                                    <td width="12%">ควรปรับปรุง</td>
                                                    <td width="12%">ต้องปรับปรุง</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="question">1. Question</td>
                                                    <td>
                                                        <div class="radio-control">
                                                            <input type="radio" name="inputNumber" id="inputNumber" value="" required>
                                                            <span class="icon"></span>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio-control">
                                                            <input type="radio" name="inputNumber" id="inputNumber" value="" required>
                                                            <span class="icon"></span>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio-control">
                                                            <input type="radio" name="inputNumber" id="inputNumber" value="" required>
                                                            <span class="icon"></span>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio-control">
                                                            <input type="radio" name="inputNumber" id="inputNumber" value="" required>
                                                            <span class="icon"></span>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio-control">
                                                            <input type="radio" name="inputNumber" id="inputNumber" value="" required>
                                                            <span class="icon"></span>

                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="question">2. Question</td>
                                                    <td>
                                                        <div class="radio-control">
                                                            <input type="radio" name="inputNumber" id="inputNumber" value="" required>
                                                            <span class="icon"></span>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio-control">
                                                            <input type="radio" name="inputNumber" id="inputNumber" value="" required>
                                                            <span class="icon"></span>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio-control">
                                                            <input type="radio" name="inputNumber" id="inputNumber" value="" required>
                                                            <span class="icon"></span>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio-control">
                                                            <input type="radio" name="inputNumber" id="inputNumber" value="" required>
                                                            <span class="icon"></span>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="radio-control">
                                                            <input type="radio" name="inputNumber" id="inputNumber" value="" required>
                                                            <span class="icon"></span>

                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div> *}
                        </div>


                        <div class="form-action">
                            <div class="wrapper">
                                <div>
                                    <input value="ยืนยัน" type="submit" name="" class="btn btn-primary btn-medium"> {*disabled*}
                                </div>
                                <div>
                                    <input value="ล้างฟอร์ม" type="button" name="" onclick="resetMyformInsert()" class="btn btn-info btn-medium textGray">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <!--############################################################# -->
        </div>
    </div>
</section>