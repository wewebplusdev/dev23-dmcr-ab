<section>
    <div class="default-page">

        <div class="breadcrumb-block">
            <div class="container">
                <div class="row-table">
                    <div class="col">
                        <ol class="breadcrumb" data-aos="fade-right" data-aos-once="true">
                            <li><a href="https://www.dmcr.go.th"><span class="fa fa-home"></span>หน้าแรก</a></li>
                            <li><a href="{$ul}">ระบบลงทะเบียนออนไลน์</a></li>
                            <li class="active">{$infoQuestionare.subject}</li>
                        </ol>
                    </div>
                    <div class="col-auto">
                        <div class="back" data-aos="fade-left" data-aos-once="true">
                            <a onclick="window.history.back();" class="btn btn-default btn-small">กลับ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="default-wrapper" style="display:none;" data-aos="fade-up" data-aos-once="true">
                <div class="default-title" data-aos="fade-up" data-aos-delay="600" data-aos-once="true">ระบบลงทะเบียนออนไลน์</div>
                <div class="questionare-detail" data-aos="fade-up" data-aos-delay="800" data-aos-once="true">
                    <div class="header">
                        <h3 class="title">{$infoQuestionare->fields['subject']}</h3>
                        <p class="desc" style="line-height:20px;">
                            {$infoQuestionare->fields['title']|nl2br}
                        </p>
                    </div>

                    <form class="form-default" id="myFormQuse" name="myFormQuse" data-toggle="validator" method="post">
                        <input name="action" id="action" type="hidden" value="addnew">
                        <input name="f" id="f" type="hidden" value="{$id_quse}">
                        <input name="myid" id="myid" type="hidden" value="{$myid}">
                        {$infoQuseList = $id_quse|callQuesList}
                        <div class="form-default">
                            {if $infoQuseList->fields neq ''}
                            {foreach $infoQuseList as $listQuseList name=numOfQuseList}
                            <input name="inputQuest{$listQuseList['id']}" id="inputQuest{$listQuseList['id']}" type="hidden" value="{$listQuseList['id']}">
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
                        </div>

                        <div class="form-action">
                            <div class="wrapper">
                                <div>
                                    <input value="ยืนยัน" type="submit" name="" class="btn btn-primary btn-medium">
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
                <div class="default-title wnd" data-aos="fade-up" data-aos-delay="600" data-aos-once="true">
                    <span>{$infoQuestionare.subject}</span><a href="{$ul}/registerDetail/list/{$infoQuestionare.id}" target="_blank" class="btn btn-primary btn-medium">รายชื่อผู้ลงทะเบียน</a>
                </div>
                <div class="questionare-detail" data-aos="fade-up" data-aos-delay="800" data-aos-once="true">
                    <div class="">
                        <div class="header">
                        
                          {if !empty($infoQuestionare.pic)}
                            <div class="row">
                                <div class="col-md-12 editor-img">
                                    <figure >
                                        <img src="{$infoQuestionare.pic|fileinclude:"pictures":{$infoQuestionare.masterkey}:"link"}" alt="{$infoQuestionare.subject}">
                                    </figure>
                                    <p class="desc" style="line-height:20px; padding:20px;"></p>
                                </div>
                            </div>
                            {/if}
                            <div class="row">   
                                <div class="col-md-12 editor-contents">
                                    
                                    {*<p class="desc" style="line-height:20px; padding:20px;"></p>*}
                                        {strip}
                                                {$infoQuestionare.htmlfilename|fileinclude:"html":$infoQuestionare.masterkey|callHtml}
                                        {/strip} 
                                    
                                </div>
                            </div>
                        </div>

                        {if $infofileForm->_numOfRows neq 0}
                          <div class="other-block">
                            <div class="download-block">
                              <div class="download-list-title">
                                <h2 class="head-title text-primary">เอกสารแนบ</h2>
                              </div>
                              <div class="download-list">
                                <div class="row">
                                  {foreach $infofileForm as $listfileattach}
                                  {$fileinfo = $listfileattach.2|fileinclude:"file":$listfileattach.1|get_Icon}
                                  <div class="col-sm-6">
                                    <div class="wrapper">
                                      <div class="title text-primary">
                                        {$listfileattach.3}{$fileinfo.type}
                                      </div>
                                      <div class="info">
                                        <span>ประเภทไฟล์ : <span class="text-primary">{$fileinfo.type}</span></span>
                                        <span>ขนาด : <span class="text-primary">{$listfileattach.2|fileinclude:"file":$infoQuestionare.masterkey|get_IconSize}</span></span>
                                        <span>จำนวนดาวน์โหลด : <span class="text-primary">{$listfileattach.4|default:0}</span></span>
                                      </div>
                                      <div class="action">
                                        <a title="ดาวน์โหลด" href="{$ul}/download/{$listfileattach.2|fileinclude:"file":{$infoQuestionare.masterkey}:"download"}&n={$listfileattach.3}&t={$listfileattach.td|encodeStr}&type={1|encodeStr}&up={0|encodeStr}" class="btn btn-primary" {if $fileinfo.type eq '.pdf' || $fileinfo.type eq '.PDF'} target="_blank" {/if}><i class="fa fa-download"></i>ดาวน์โหลด</a>
                                      </div>
                                    </div>
                                  </div>
                                  {/foreach}
                                </div>
                              </div>
                            </div>
                          </div>
                      {/if}

                    </div>

                    {if $totalAns >= $infoQuestionare.quality}
                    <div class="total-limit" style="padding: 80px; text-align: center; font-size: 18px;color: #464646;">
                        ขออภัยขณะนี้มีผู้ลงทะเบียนครบแล้ว
                    </div>
                    {else}
                    <form class="" id="myFormQuse_form" name="myFormQuse_form" data-toggle="validator" method="post">
                        <input name="action" id="action" type="hidden" value="addnew">
                        <input name="f" id="f" type="hidden" value="{$id_quse}">
                        <input name="myid" id="myid" type="hidden" value="{$myid}">


                      
                        
                        {if $sectionidMain >= 1}
                        {*############ Start Data Section  ##############*}
                        <div class="form-default">
                            	{foreach $infoFormSectionNew as $listFormSectionNew name=numFormSectionNew}
                              

                                <div class="sectionQusMain">
                                    <div  class="sectionQusSubject">{$listFormSectionNew.subject}</div>
                                     <div class="sectionQusTitle">{$listFormSectionNew.title|nl2br} </div>
                                </div>
                                {$infoQuseList = $id_quse|callFormQuesListNews:$listFormSectionNew.id}
                        {if $infoQuseList->_numOfRows > 0}

                            {foreach $infoQuseList as $listQuseList name=numOfQuseList}
                            <input name="inputQuest[{$listQuseList.id}]" id="inputQuest-{$listQuseList.id}" type="hidden" value="{$listQuseList.id}">

                                {if $listQuseList.type eq 1 } {*Radio*}
                                {$infoAnsName = $listQuseList.id|callFormAnsName}
                                <div class="form-group redio">
                                    <label class="control-label">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}{if $listQuseList.request eq 1}<span class="request">*</span>{/if}</label>
                                    <div class="help-block with-errors">{if $listQuseList.request eq 1} {$listQuseList.request_title} {/if}</div>
                                    {foreach from=$infoAnsName item=listAnsName name=numOfAnsName}
                                        <div class="radio-control">
                                            <input type="radio" name="inputAns[{$listQuseList.id}]" id="inputAns-{$listQuseList.id}" value="{$listAnsName.id}" {if $listQuseList.request eq 1} required {/if}> {* {if $smarty.foreach.numOfAnsName.iteration eq 1} checked{/if}*}
                                            <span class="icon"></span>
                                            <span class="txt">
                                                {$listAnsName.name}
                                            </span>
                                        </div>
                                       
                                    {/foreach}
                                    <div style="clear:both;"></div>
                                    
                                </div>
                                {elseif $listQuseList.type eq 2} {*Text Box*}
                                {$infoOpText = $listQuseList.id|callFormText}
                                        <div class="form-group text-input">
                                            <label class="control-label">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}{if $listQuseList.request eq 1}<span class="request">*</span>{/if}</label>
                                            <div class="help-block with-errors alertErrorData-{$listQuseList.id}">{if $listQuseList.request eq 1} {$listQuseList.request_title} {/if}</div>
                                            <div class="block-control">
                                                <input class="form-control checkOption" 
                                                        type="{$infoOpText['type']}" 
                                                        id="inputAns-{$listQuseList.id}" 
                                                        name="inputAns[{$listQuseList.id}]" 
                                                        value="" 
                                                        placeholder="" 
                                                        data-id="{$listQuseList.id}" 
                                                        data-fid="{$id_quse}" 
                                                        data-option='{$infoOpText['option']|json_encode}' 
                                                        data-cid="{$infoOpText['check']}"
                                                        data-request="{$listQuseList.request}"
                                                       {*  {if $infoOpText['check']}
                                                        data-remote="{$ul}/registerDetail/checkData?valID={$listQuseList.id}&valFID={$id_quse}"
                                                        data-remote-error='ข้อมูลซ้ำในระบบ กรุณากรอกข้อมูลใหม่อีกครั้ง'
                                                        {/if} *}
                                                        {if $listQuseList.request eq 1} data-error="{if empty($listQuseList.request_title)}โปรดกรอกข้อมูลในช่องนี้{else}{$listQuseList.request_title}{/if}" required {/if}
                                                >
                                                <span class="form-control-feedback " aria-hidden="true"></span>
                                                {if $infoOpText['check']}
                                                <input type="hidden" class="check_error check_error_{$listQuseList.id}" name="check_error[{$listQuseList.id}]" value="1">
                                                {/if}
                                            </div>
                                            
                                            
                                        </div>
                                {elseif $listQuseList.type eq 3} {*List Box*}
                                {$infoAnsName = $listQuseList.id|callFormAnsName}
                                <div class="form-group select">
                                    <label class="control-label">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}{if $listQuseList.request eq 1}<span class="request">*</span>{/if}</label>
                                    <div class="help-block with-errors">{if $listQuseList.request eq 1} {$listQuseList.request_title} {/if}</div>
                                    <div class="default-block">
                                        <select class="select-control changeSelect" id="inputAns-{$listQuseList.id}" name="inputAns[{$listQuseList.id}]" style="width: 100%;" {if $listQuseList.request eq 1} required {/if}>
                                            <option selected {if $listQuseList.request eq 1}disabled{else}value="0"{/if}>เลือกคำตอบ</option>
                                            {foreach from=$infoAnsName item=listAnsName name=numOfAnsName}
                                                <option value="{$listAnsName.id}" >{$listAnsName.name}</option>
                                            {/foreach}
                                            {if $listQuseList.other eq 1}
                                            <option value="999999" >อื่น ๆ</option>
                                            {/if}
                                        </select>
                                        
                                    </div>

                                 <div class="inputOther"  style="display:none;">
                                    <label class="control-label">ระบุ</label>
                                    <div class="block-control">
                                        <input class="form-control" 
                                            type="text" 
                                            id="inputAnsOther" 
                                            name="inputAnsOther[{$listQuseList.id}]" 
                                            value="" 
                                            placeholder="" 
                                            data-error="โปรดระบุข้อมูลเพิ่มเติม"
                                            >
                                        <span class="form-control-feedback " aria-hidden="true"></span>
                                    </div>
                                </div>
                               
                                    
                                </div>
                                {elseif $listQuseList.type eq 4} {*Check Box*}
                                {$infoAnsName = $listQuseList.id|callFormAnsName}
                                    <div class="form-group checkbox">
                                        <label class="control-label">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}{if $listQuseList.request eq 1}<span class="request">*</span>{/if}</label>
                                        <div class="help-block with-errors errors-{$listQuseList.id}">{if $listQuseList.request eq 1} {$listQuseList.request_title} {/if}</div>
                                        <div class="checkbox-list">
                                            <ul class="item-list {if $listQuseList.request eq 1}{$listQuseList.id}{/if}">
                                            {foreach from=$infoAnsName item=listAnsName name=numOfAnsName}
                                                <li>
                                                    <div class="checkbox-control">
                                                        <input type="checkbox" name="inputAns[{$listQuseList.id}][]" id="inputAns-{$listQuseList.id}" value="{$listAnsName.id}" class="{if $listQuseList.request eq 1}required-chb{/if}" data-id ='{$listQuseList.id}' />
                                                        <div class="icon"></div>
                                                        <h4 class="title">{$listAnsName.name}</h4>
                                                    </div>
                                                </li>
                                            {/foreach}
                                            </ul>
                                        </div>
                                        <div style="clear:both;"></div>
                                    
                                        
                                    </div>
                                {elseif $listQuseList.type eq 5} {*Matrix*}
                                {if $listQuseList.matrix_type eq 1}
                                    {$infoAnsMatrix = $listQuseList.id|callFormMatrixGroup}
                                    {* {$arr_title_chois = $infoAnsMatrix.title_chois}
                                    {$infoAnsMatrix|print_pre}
                                    {$arr_title_chois|print_pre} *}
                                    <div class="form-group">
                                        <div class="assessment-form member-list">
                                            <label class="control-label" style="white-space: normal; margin-bottom: 1rem;">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}{if $listQuseList.request eq 1}<span class="request">*</span>{/if}</label><br />
                                            <div class="qa">
                                            {foreach from=$infoAnsMatrix item=listAnsMatrix key=keyAnsMatrix }
                                            {$arr_title_chois = $listAnsMatrix.title_chois}
                                            <div class="table-group">
                                                <div class="title-group-name">{$listAnsMatrix.name_group}</div>
                                                <table class="assessment" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <td>รายการ</td>
                                                            {foreach from=$listAnsMatrix.title_chois item=title_chois}
                                                            <td width="12%">{$title_chois}</td>
                                                            {/foreach}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    {foreach from=$listAnsMatrix.chois item=listAnsName name=numOfAnsName}
                                                        <tr>
                                                            <td data-title="รายการ" class="question">{$smarty.foreach.numOfAnsName.iteration}. {$listAnsName.subject} </td>
                                                            {foreach from=$listAnsName.chois item=val_chois key=key_chois}
                                                                <td data-title="{$arr_title_chois[{$key_chois}]}">
                                                                    <div class="radio-box">
                                                                    <div class="radio-control">
                                                                        <input type="radio" name="inputAns[{$listAnsName.id}]" id="inputAns-{$listAnsName.id}" value="{$val_chois}" {if $listQuseList.request eq 1}required{/if}>
                                                                        <span class="icon"></span>

                                                                    </div>
                                                                    </div>
                                                                </td>
                                                            {/foreach}
                                                            
                                                        </tr>
                                                    {/foreach}
                                                    </tbody>
                                                </table>
                                            </div>
                                            {/foreach}
                                            </div>
                                        </div>
                                    </div>
                                {else}
                                    {$infoAnsMatrix = $listQuseList.id|callFormMatrix}
                                    {$arr_title_chois = $infoAnsMatrix.title_chois}
                                    {* {$infoAnsMatrix|print_pre} *}
                                        <div class="form-group">
                                            <div class="assessment-form member-list">
                                                <label class="control-label" style="white-space: normal; margin-bottom: 1rem;">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}{if $listQuseList.request eq 1}<span class="request">*</span>{/if}</label><br />
                                                <div class="qa">
                                                    <table class="assessment" width="100%">
                                                        
                                                        <thead>
                                                            <tr>
                                                                <td>รายการ</td>
                                                                {foreach from=$infoAnsMatrix.title_chois item=title_chois}
                                                                <td width="12%">{$title_chois}</td>
                                                                {/foreach}
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                        {foreach from=$infoAnsMatrix.chois item=listAnsName name=numOfAnsName}
                                                            <tr>
                                                                <td data-title="รายการ" class="question">{$smarty.foreach.numOfAnsName.iteration}. {$listAnsName.subject} </td>
                                                                {foreach from=$listAnsName.chois item=val_chois key=key_chois}
                                                                    <td data-title="{$arr_title_chois[{$key_chois}]}">
                                                                        <div class="radio-box">
                                                                        <div class="radio-control">
                                                                            <input type="radio" name="inputAns[{$listAnsName.id}]" id="inputAns-{$listAnsName.id}" value="{$val_chois}" {if $listQuseList.request eq 1}required{/if}>
                                                                            <span class="icon"></span>

                                                                        </div>
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
                                {/if}
                                
                                {elseif $listQuseList.type eq 6} {*Text Area*}
                                <div class="form-group text-area">
                                    <label class="control-label">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}{if $listQuseList.request eq 1}<span class="request">*</span>{/if}</label>
                                    <div class="help-block with-errors">{if $listQuseList.request eq 1} {$listQuseList.request_title} {/if}</div>
                                    <textarea class="form-control" rows="4" name="inputAns[{$listQuseList.id}]" id="inputAns-{$listQuseList.id}"  {if $listQuseList.request eq 1} data-error="{if empty($listQuseList.request_title)}โปรดกรอกข้อมูลในช่องนี้{else}{$listQuseList.request_title}{/if}" required {/if}></textarea>
                                    
                                </div>
                                {elseif $listQuseList.type eq 7} {*File*}
                                {* <div class="form-group text-area">
                                    <label class="control-label">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}{if $listQuseList.request eq 1}<span class="request">*</span>{/if}</label>
                                    <input type="file" name="inputAns[{$listQuseList.id}]" id="inputAns-{$listQuseList.id}" {if $listQuseList.request eq 1} data-error="{$listQuseList.request_title}" required {/if}>
                                    <div class="help-block with-errors"></div>
                                </div> *}
                                <div class="upload-file">
                                    <div class="form-group">
                                        <label class="control-label" for="">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}{if $listQuseList.request eq 1}<span class="request">*</span>{/if}</label>
                                        <div class="upload-file-block">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="upload-file-btn form-form-att">
                                                         <input type="file" name="inputFileUpload-{$listQuseList.id}" id="inputFileUpload-{$listQuseList.id}" onchange="ajaxFileUploadDoc({$myid},{$listQuseList.id});"  size="50"  accept="image/png, image/gif, image/jpeg, image/jpg,application/pdf,.zip,.rar"  value="" {if $listQuseList.request eq 1} data-error="{$listQuseList.request_title}" required {/if}>
                                                        <div class="btn btn-file" data-id="{$listQuseList.id}">เลือกไฟล์..</div>
                                                        <input type="hidden" name="inputAns[{$listQuseList.id}]" id="inputAns-{$listQuseList.id}" value=""  {if $listQuseList.request eq 1} data-error="{$listQuseList.request_title}"  required {/if}>
                                                        <input name="msKey" value="{$listQuseList.masterkey}" type="hidden">
                                                        <input name="randid" value="{$myid}" type="hidden">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12" id="boxFileNew-{$listQuseList.id}">
                                                </div>
                                                    
                                            </div>
                                        </div>
                                        <div class="help-block">เฉพาะไฟล์ PDF, PNG, JPG, JPEG, ZIP, RAR  และขนาดไฟล์ต้องไม่เกิน 10 Mb</div>
                                    </div>
                                </div>
                                {/if}
                            {/foreach}
                            
                        {/if}
                                {/foreach}
                            
                        </div>
                        {*############ End Data Section  ##############*}
                        {else}
                        {*############ Start Data Non Section  ##############*}
                        <div class="form-default">
                        {$infoQuseList = $id_quse|callFormQuesList}
                        {if $infoQuseList->_numOfRows > 0}

                            {foreach $infoQuseList as $listQuseList name=numOfQuseList}
                            <input name="inputQuest[{$listQuseList.id}]" id="inputQuest-{$listQuseList.id}" type="hidden" value="{$listQuseList.id}">

                                {if $listQuseList.type eq 1 } {*Radio*}
                                {$infoAnsName = $listQuseList.id|callFormAnsName}
                                <div class="form-group redio">
                                    <label class="control-label">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}{if $listQuseList.request eq 1}<span class="request">*</span>{/if}</label>
                                    <div class="help-block with-errors">{if $listQuseList.request eq 1} {$listQuseList.request_title} {/if}</div>
                                    {foreach from=$infoAnsName item=listAnsName name=numOfAnsName}
                                        <div class="radio-control">
                                            <input type="radio" name="inputAns[{$listQuseList.id}]" id="inputAns-{$listQuseList.id}" value="{$listAnsName.id}" {if $listQuseList.request eq 1} required {/if}> {* {if $smarty.foreach.numOfAnsName.iteration eq 1} checked{/if}*}
                                            <span class="icon"></span>
                                            <span class="txt">
                                                {$listAnsName.name}
                                            </span>
                                        </div>
                                       
                                    {/foreach}
                                    <div style="clear:both;"></div>
                                    
                                </div>
                                {elseif $listQuseList.type eq 2} {*Text Box*}
                                {$infoOpText = $listQuseList.id|callFormText}
                                        <div class="form-group text-input">
                                            <label class="control-label">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}{if $listQuseList.request eq 1}<span class="request">*</span>{/if}</label>
                                            <div class="help-block with-errors alertErrorData-{$listQuseList.id}">{if $listQuseList.request eq 1} {$listQuseList.request_title} {/if}</div>
                                            <div class="block-control">
                                                <input class="form-control checkOption" 
                                                        type="{$infoOpText['type']}" 
                                                        id="inputAns-{$listQuseList.id}" 
                                                        name="inputAns[{$listQuseList.id}]" 
                                                        value="" 
                                                        placeholder="" 
                                                        data-id="{$listQuseList.id}" 
                                                        data-fid="{$id_quse}" 
                                                        data-option='{$infoOpText['option']|json_encode}' 
                                                        data-cid="{$infoOpText['check']}"
                                                        data-request="{$listQuseList.request}"
                                                       {*  {if $infoOpText['check']}
                                                        data-remote="{$ul}/registerDetail/checkData?valID={$listQuseList.id}&valFID={$id_quse}"
                                                        data-remote-error='ข้อมูลซ้ำในระบบ กรุณากรอกข้อมูลใหม่อีกครั้ง'
                                                        {/if} *}
                                                        {if $listQuseList.request eq 1} data-error="{if empty($listQuseList.request_title)}โปรดกรอกข้อมูลในช่องนี้{else}{$listQuseList.request_title}{/if}" required {/if}
                                                >
                                                <span class="form-control-feedback " aria-hidden="true"></span>
                                                {if $infoOpText['check']}
                                                <input type="hidden" class="check_error check_error_{$listQuseList.id}" name="check_error[{$listQuseList.id}]" value="1">
                                                {/if}
                                            </div>
                                            
                                            
                                        </div>
                                {elseif $listQuseList.type eq 3} {*List Box*}
                                {$infoAnsName = $listQuseList.id|callFormAnsName}
                                <div class="form-group select">
                                    <label class="control-label">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}{if $listQuseList.request eq 1}<span class="request">*</span>{/if}</label>
                                    <div class="help-block with-errors">{if $listQuseList.request eq 1} {$listQuseList.request_title} {/if}</div>
                                    <div class="default-block">
                                        <select class="select-control changeSelect" id="inputAns-{$listQuseList.id}" name="inputAns[{$listQuseList.id}]" style="width: 100%;" {if $listQuseList.request eq 1} required {/if}>
                                            <option selected {if $listQuseList.request eq 1}disabled{else}value="0"{/if}>เลือกคำตอบ</option>
                                            {foreach from=$infoAnsName item=listAnsName name=numOfAnsName}
                                                <option value="{$listAnsName.id}" >{$listAnsName.name}</option>
                                            {/foreach}
                                            {if $listQuseList.other eq 1}
                                            <option value="999999" >อื่น ๆ</option>
                                            {/if}
                                        </select>
                                        
                                    </div>

                                 <div class="inputOther"  style="display:none;">
                                    <label class="control-label">ระบุ</label>
                                    <div class="block-control">
                                        <input class="form-control" 
                                            type="text" 
                                            id="inputAnsOther" 
                                            name="inputAnsOther[{$listQuseList.id}]" 
                                            value="" 
                                            placeholder="" 
                                            data-error="โปรดระบุข้อมูลเพิ่มเติม"
                                            >
                                        <span class="form-control-feedback " aria-hidden="true"></span>
                                    </div>
                                </div>
                               
                                    
                                </div>
                                {elseif $listQuseList.type eq 4} {*Check Box*}
                                {$infoAnsName = $listQuseList.id|callFormAnsName}
                                    <div class="form-group checkbox">
                                        <label class="control-label">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}{if $listQuseList.request eq 1}<span class="request">*</span>{/if}</label>
                                        <div class="help-block with-errors errors-{$listQuseList.id}">{if $listQuseList.request eq 1} {$listQuseList.request_title} {/if}</div>
                                        <div class="checkbox-list">
                                            <ul class="item-list {if $listQuseList.request eq 1}{$listQuseList.id}{/if}">
                                            {foreach from=$infoAnsName item=listAnsName name=numOfAnsName}
                                                <li>
                                                    <div class="checkbox-control">
                                                        <input type="checkbox" name="inputAns[{$listQuseList.id}][]" id="inputAns-{$listQuseList.id}" class="{if $listQuseList.request eq 1}required-chb{/if}" value="{$listAnsName.id}" data-id ='{$listQuseList.id}' />
                                                        <div class="icon"></div>
                                                        <h4 class="title">{$listAnsName.name}</h4>
                                                    </div>
                                                </li>
                                            {/foreach}
                                            </ul>
                                        </div>
                                        <div style="clear:both;"></div>
                                    
                                        
                                    </div>
                                {elseif $listQuseList.type eq 5} {*Matrix*}
                                {if $listQuseList.matrix_type eq 1}
                                    {$infoAnsMatrix = $listQuseList.id|callFormMatrixGroup}
                                    {* {$arr_title_chois = $infoAnsMatrix.title_chois}
                                    {$infoAnsMatrix|print_pre}
                                    {$arr_title_chois|print_pre} *}
                                    <div class="form-group">
                                        <div class="assessment-form member-list">
                                            <label class="control-label" style="white-space: normal; margin-bottom: 1rem;">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}{if $listQuseList.request eq 1}<span class="request">*</span>{/if}</label><br />
                                            <div class="qa">
                                            {foreach from=$infoAnsMatrix item=listAnsMatrix key=keyAnsMatrix }
                                            {$arr_title_chois = $listAnsMatrix.title_chois}
                                            <div class="table-group">
                                                <div class="title-group-name">{$listAnsMatrix.name_group}</div>
                                                <table class="assessment" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <td>รายการ</td>
                                                            {foreach from=$listAnsMatrix.title_chois item=title_chois}
                                                            <td width="12%">{$title_chois}</td>
                                                            {/foreach}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    {foreach from=$listAnsMatrix.chois item=listAnsName name=numOfAnsName}
                                                        <tr>
                                                            <td data-title="รายการ" class="question">{$smarty.foreach.numOfAnsName.iteration}. {$listAnsName.subject} </td>
                                                            {foreach from=$listAnsName.chois item=val_chois key=key_chois}
                                                                <td data-title="{$arr_title_chois[{$key_chois}]}">
                                                                    <div class="radio-box">
                                                                    <div class="radio-control">
                                                                        <input type="radio" name="inputAns[{$listAnsName.id}]" id="inputAns-{$listAnsName.id}" value="{$val_chois}" {if $listQuseList.request eq 1}required{/if}>
                                                                        <span class="icon"></span>

                                                                    </div>
                                                                    </div>
                                                                </td>
                                                            {/foreach}
                                                            
                                                        </tr>
                                                    {/foreach}
                                                    </tbody>
                                                </table>
                                            </div>
                                            {/foreach}
                                            </div>
                                        </div>
                                    </div>
                                {else}
                                    {$infoAnsMatrix = $listQuseList.id|callFormMatrix}
                                    {$arr_title_chois = $infoAnsMatrix.title_chois}
                                    {* {$infoAnsMatrix|print_pre} *}
                                        <div class="form-group">
                                            <div class="assessment-form member-list">
                                                <label class="control-label" style="white-space: normal; margin-bottom: 1rem;">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}{if $listQuseList.request eq 1}<span class="request">*</span>{/if}</label><br />
                                                <div class="qa">
                                                    <table class="assessment" width="100%">
                                                        
                                                        <thead>
                                                            <tr>
                                                                <td>รายการ</td>
                                                                {foreach from=$infoAnsMatrix.title_chois item=title_chois}
                                                                <td width="12%">{$title_chois}</td>
                                                                {/foreach}
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                        {foreach from=$infoAnsMatrix.chois item=listAnsName name=numOfAnsName}
                                                            <tr>
                                                                <td data-title="รายการ" class="question">{$smarty.foreach.numOfAnsName.iteration}. {$listAnsName.subject} </td>
                                                                {foreach from=$listAnsName.chois item=val_chois key=key_chois}
                                                                    <td data-title="{$arr_title_chois[{$key_chois}]}">
                                                                        <div class="radio-box">
                                                                        <div class="radio-control">
                                                                            <input type="radio" name="inputAns[{$listAnsName.id}]" id="inputAns-{$listAnsName.id}" value="{$val_chois}" {if $listQuseList.request eq 1}required{/if}>
                                                                            <span class="icon"></span>

                                                                        </div>
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
                                {/if}
                                
                                {elseif $listQuseList.type eq 6} {*Text Area*}
                                <div class="form-group text-area">
                                    <label class="control-label">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}{if $listQuseList.request eq 1}<span class="request">*</span>{/if}</label>
                                    <div class="help-block with-errors">{if $listQuseList.request eq 1} {$listQuseList.request_title} {/if}</div>
                                    <textarea class="form-control" rows="4" name="inputAns[{$listQuseList.id}]" id="inputAns-{$listQuseList.id}"  {if $listQuseList.request eq 1} data-error="{if empty($listQuseList.request_title)}โปรดกรอกข้อมูลในช่องนี้{else}{$listQuseList.request_title}{/if}" required {/if}></textarea>
                                    
                                </div>
                                {elseif $listQuseList.type eq 7} {*File*}
                                {* <div class="form-group text-area">
                                    <label class="control-label">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}{if $listQuseList.request eq 1}<span class="request">*</span>{/if}</label>
                                    <input type="file" name="inputAns[{$listQuseList.id}]" id="inputAns-{$listQuseList.id}" {if $listQuseList.request eq 1} data-error="{$listQuseList.request_title}" required {/if}>
                                    <div class="help-block with-errors"></div>
                                </div> *}
                                <div class="upload-file">
                                    <div class="form-group">
                                        <label class="control-label" for="">{$smarty.foreach.numOfQuseList.iteration}. {$listQuseList.subject}{if $listQuseList.request eq 1}<span class="request">*</span>{/if}</label>
                                        <div class="upload-file-block">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="upload-file-btn form-form-att">
                                                         <input type="file" name="inputFileUpload-{$listQuseList.id}" id="inputFileUpload-{$listQuseList.id}" onchange="ajaxFileUploadDoc({$myid},{$listQuseList.id});"  size="50"  accept="image/png, image/gif, image/jpeg, image/jpg,application/pdf,.zip,.rar"  value="" {if $listQuseList.request eq 1} data-error="{$listQuseList.request_title}" required {/if}>
                                                        <div class="btn btn-file" data-id="{$listQuseList.id}">เลือกไฟล์..</div>
                                                        <input type="hidden" name="inputAns[{$listQuseList.id}]" id="inputAns-{$listQuseList.id}" value=""  {if $listQuseList.request eq 1} data-error="{$listQuseList.request_title}"  required {/if}>
                                                        <input name="msKey" value="{$listQuseList.masterkey}" type="hidden">
                                                        <input name="randid" value="{$myid}" type="hidden">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12" id="boxFileNew-{$listQuseList.id}">
                                                </div>
                                                    
                                            </div>
                                        </div>
                                        <div class="help-block">เฉพาะไฟล์ PDF, PNG, JPG, JPEG, ZIP, RAR  และขนาดไฟล์ต้องไม่เกิน 10 Mb</div>
                                    </div>
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
                            {*############ End Data Non Section  ##############*}

                        {/if}


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
                    {/if}
                </div>
            </div>
            <!--############################################################# -->
        </div>
    </div>
</section>