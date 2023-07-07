<section>
    <div class="default-page member-list-page">
        <div class="breadcrumb-block" style="display: none;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="https://www.dmcr.go.th"><span class="fa fa-home"></span>หน้าแรก</a></li>
                            <li><a href="{$ul}/register">ระบบลงทะเบียนออนไลน์</a></li>
                            <li><a href="{$ul}/registerDetail/{$infoQuestionare.id}">{$infoQuestionare.subject}</a></li>
                            <li class="active">รายชื่อผู้ลงทะเบียนออนไลน์</li>
                        </ol>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                       <div class="back">
                              <a onclick="window.history.back();" class="btn btn-default btn-small">กลับ</a>
                          </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="default-wrapper">
                <div class="default-title">
                    รายชื่อผู้ลงทะเบียนออนไลน์ {$infoQuestionare.subject}
                </div>
                <div class="questionare-detail">
                    <div class="editor-content">
                        <div class="header">
                            <div class="row" style="padding-bottom: 30px;">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="assessment-form member-list">
                                            <div class="qa x">
                                                <table class="assessment" width="100%" id="dataList">
                                                    <thead>
                                                        <tr>
                                                            <td class="num" width="8%">ลำดับ</td>
                                                            {foreach from=$arrayQues.title item=listQues key=key name=numberQues}
                                                            {if $arrayQues.status[$key] neq 'Enable'}
                                                            {else}
                                                                <td class="name" style="text-align: center;">{$listQues}</td>
                                                             {/if}
                                                            {/foreach}
                                                            <td class="date" width="15%">วันที่ลงทะเบียน</td>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        {foreach from=$arrayQues.list item=listQues key=key name=numberQues}
                                                        <tr>
                                                            <td data-title="ลำดับ" class="num"  text-align="center"><span>{$smarty.foreach.numberQues.iteration|number_format}</span></td>
                                                            {foreach from=$listQues item=subList key=keySub}
                                                            {if !empty($subList.val)}
                                                                {if $arrayQues.status[$keySub] neq 'Enable'}
                                                                    <td data-title="Volume" style="text-align: left;" class="name"  text-align="left" > </td>                                                            
                                                                {else}
                                                                    <td data-title="{$arrayQues.title[$keySub]}" style="text-align: left;" class="name"  text-align="left"  ><span>{$subList.val}</span></td>
                                                                {/if}
                                                            {else}
                                                                    <td data-title="Volume" style="text-align: left;" class="name"  text-align="left"> </td>
                                                             {/if}
                                                            {/foreach}
                                                            <td class="date" data-title="วันที่ลงทะเบียน"  style="text-align: left;" ><span><i class="fa fa-calendar-o"></i>{$arrayQues.credate[$key]}</span></td>
                                                        </tr>
                                                        {/foreach}
                                                    </tbody>
                                                            
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
