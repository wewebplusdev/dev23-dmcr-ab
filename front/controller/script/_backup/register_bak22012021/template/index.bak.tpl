<div class="breadcrumb-block">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xs-9">
                <ol class="breadcrumb">
                    <li><a href="{$ul}/home"><span class="fa fa-home"></span>หน้าแรก</a></li>
                    {* <li><a href="{$ul}/information">สารสนเทศ</a></li>
                    <li><a href="{$ul}/information/intranet">ฐานข้อมูลภายใน (Intranet)</a></li> *}
                    <li class="active">ระบบลงทะเบียนออนไลน์</li>
                </ol>
            </div>
            <div class="col-sm-6 col-xs-3">
            	<div class="back">
            		<a onclick="window.history.back();" class="btn btn-default btn-small" title="กลับ">กลับ</a>
            	</div>
            </div>
        </div>
    </div>
</div>

<section class="site-container">
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
                            <h1>DMCR <strong class="text-primary">REGISTRATION</strong></h1>
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
            <div class="title-box">
                <div class="default-title">
                    <div class="row">
                        <div class="col-md-3">ระบบลงทะเบียนออนไลน์</div>
                        <div class="col-md-9">
                            <div class="filter">
                                <form class="form-default" method="GET">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label">กลุ่ม</label>
                                                <select class="select-control" style="width: 100%;" name="searchGroup" onchange="this.form.submit()">
                                                    <option value="0" {if $searchGroup eq  0} selected {/if}>กลุ่มระบบลงทะเบียนออนไลน์</option>
                                                    {foreach $infoFormGroup as $listGroup}
                                                    <option value="{$listGroup.id}" {if $searchGroup eq  $listGroup.id} selected {/if}  >{$listGroup.subject}</option>
                                                    {/foreach}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group filter-search">
                                                <label class="control-label search-label" style="width: 60px;">คำค้น</label>
                                                <input name="keyword" class="form-control search-label" placeholder="" value="{$searchKeywords|default:''}" type="text">
                                                <button type="submit" class="btn btn-primary" title="ค้นหา"><span class="fa fa-search"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body-box">
                <div class="table">
                    <div class="thead">
                        <div class="tr">
                            <div class="td title">ชื่อหลักสูตร/โครงการ</div>
                            <div class="td date">วันที่/เวลา</div>
                            <div class="td num">จำนวน</div>
                            <div class="td name">รายชื่อผู้ลงทะเบียน</div>
                            <div class="td action">ลงทะเบียน</div>
                        </div>
                        
                    </div>
                     <div class="tbody">
                        {foreach $infoQuestionare as $listQues}
                        <div class="tr">
                            <div class="td title">
                                <div class="thumb">
                                   {*  <div class="pin"><i class="fa fa-thumb-tack"></i></div> *}
                                   <span class="fa fa-file-text-o"></span>
                                </div>
                                <div class="detail-box">
                                    <div class="title">{$listQues.subject}</div>
                                    <div class="desc">
                                        <div class="detail">
                                        {strip}
                                            {$listQues.htmlfilename|fileinclude:"html":$listQues.masterkey|callHtml}
                                        {/strip}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="td date">
                                <div class="date">
                                    {if $listQues.sdate != '0000-00-00 00:00:00'}
                                        
                                        <p><i class="fa fa-calendar-o"></i><span class="blue">วันที่ :</span> <span>{$listQues.sdate|DateThai:1:'th':'full'}</span></p>
                                            {if $listQues.edate != '0000-00-00 00:00:00'}
                                                <p><i class="fa fa-calendar-o" style="visibility: hidden;"></i><span class="blue">ถึง :</span> <span>{$listQues.edate|DateThai:1:'th':'full'}</span></p>
                                            {/if}
                                    {elseif $listQues.edate != '0000-00-00 00:00:00'}
                                        <p><i class="fa fa-calendar-o"></i><span class="blue">ถึงวันที่ :</span> <span>{$listQues.edate|DateThai:1:'th':'full'}</span></p>
                                    {/if}

                                    {if $listQues.stime == '00:00:00' && $listQues.etime == '00:00:59'}
                                        <p><i class="fa fa-calendar-o"></i>ทุกช่วงเวลา</p>
                                    {else}
                                </div>

                                <div class="time">
                                    {* {if $listQues.stime != '00:00:00'} *}
                                    
                                    <p><i class="fa fa-clock-o"></i><span class="blue">เวลา :</span> <span>{$listQues.stime|funcTime}</span>
                                    {if $listQues.etime != '00:00:59'}
                                        <span>- {$listQues.etime|funcTime}
                                    {/if}น.
                                    </p></span>
                                                {* {elseif $listQues.etime != '00:00:59'}
                                                 ถึงเวลา : {$listQues.etime|funcTime} น.
                                                {/if} *}
                                    {/if}

                                </div>
                            </div>
                            <div class="td num">
                                <div class="detail-etc">
                                    <div class="num">
                                        <p> <span>{$listQues.id|checkDataTotal} / {$listQues.quality|number_format} </span><br/><span class="men">คน</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="td name"> 
                                <a href="{$ul}/registerDetail/list/{$listQues.id}" class="btn btn-primary btn-medium -fluid name-list" title="รายชื่อผู้ลงทะเบียน"><img src="{$template}/public/image/asset/icon-member.png" alt="">รายชื่อผู้ลงทะเบียน</a>
                            </div>
                            <div class="td action">  
                                {if $listQues.id|checkDataTotal < $listQues.quality}
                                    {if ($listQues.stime|strtotime <= $timeNow && $listQues.etime|strtotime >= $timeNow) || ($listQues.stime == '00:00:00' && $listQues.etime == '00:00:59')}
                                        <a href="{$ul}/registerDetail/{$listQues.id}" class="btn btn-primary btn-medium -fluid" title="ลงทะเบียนออนไลน์"><img src="{$template}/public/image/asset/icon-regis.png" alt=""></i></i>ลงทะเบียน</a>
                                    {else}
                                        <a href="javascript:void(0)" class="btn btn-warning btn-medium -fluid" title="ปิดการลงทะเบียน" disabled><img src="{$template}/public/image/asset/icon-clock.png" alt="">ปิดการลงทะเบียน</a>
                                    {/if}
                                {else}
                                    <a href="javascript:void(0)" class="btn btn-danger btn-medium -fluid" title="ผู้ลงทะเบียนเต็ม" disabled><img src="{$template}/public/image/asset/icon-block.png" alt="">ผู้ลงทะเบียนเต็ม</a>
                                {/if}
                            </div>
                        </div>
                        {/foreach}
                    </div>
                </div>

            </div>
            <div class="default-wrapper">
                <div class="default-title">
                    <div class="row">
                        <div class="col-md-3">ระบบลงทะเบียนออนไลน์</div>
                        <div class="col-md-9">
                            <div class="filter">
                                <form class="form-default" method="GET">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label">กลุ่ม</label>
                                                <select class="select-control" style="width: 100%;" name="searchGroup" onchange="this.form.submit()">
                                                    <option value="0" {if $searchGroup eq  0} selected {/if}>กลุ่มระบบลงทะเบียนออนไลน์</option>
                                                    {foreach $infoFormGroup as $listGroup}
                                                    <option value="{$listGroup.id}" {if $searchGroup eq  $listGroup.id} selected {/if}  >{$listGroup.subject}</option>
                                                    {/foreach}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group filter-search">
                                                <label class="control-label search-label" style="width: 60px;">คำค้น</label>
                                                <input name="keyword" class="form-control search-label" placeholder="" value="{$searchKeywords|default:''}" type="text">
                                                <button type="submit" class="btn btn-primary" title="ค้นหา"><span class="fa fa-search"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="questionare-list">
                    <ul>
                    {foreach $infoQuestionare as $listQues}
                        <li>
                            {* {$listQues|print_pre} *}
                            <div class="wrapper">
                                <div class="thumb">
                                    <div class="pin"><i class="fa fa-thumb-tack"></i></div>
                                   <span class="fa fa-file-text-o"></span>
                                </div>
                                <div class="inner">
                                    <div class="title">{$listQues.subject}</div>
                                    <div class="desc">
                                        <div class="detail">
                                           {*  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. *}
                                           {strip}
                                                {$listQues.htmlfilename|fileinclude:"html":$listQues.masterkey|callHtml}
                                            {/strip} 
                                             <div class="date">

                                                {if $listQues.sdate != '0000-00-00 00:00:00'}
                                                <i class="fa fa-calendar-o"></i>
                                                <p>วันที่ : <span>{$listQues.sdate|DateThai:1:'th':'full'}</span></p>
                                                    {if $listQues.edate != '0000-00-00 00:00:00'}
                                                             <p>ถึง : <span>{$listQues.edate|DateThai:1:'th':'full'}</span></p>
                                                    {/if}
                                                    
                                                {elseif $listQues.edate != '0000-00-00 00:00:00'}
                                                        <i class="fa fa-calendar-o"></i><p>ถึงวันที่ : <span>{$listQues.edate|DateThai:1:'th':'full'}</span></p>
                                                {/if}
                                                {if $listQues.stime == '00:00:00' && $listQues.etime == '00:00:59'}
                                                    <i class="fa fa-calendar-o"></i><p>ทุกช่วงเวลา</p>
                                                {else}
                                            </div>
                                            <div class="time">
                                                {* {if $listQues.stime != '00:00:00'} *}
                                                <i class="fa fa-clock-o"></i>
                                                <p>เวลา : <span>{$listQues.stime|funcTime}</span>
                                                    {if $listQues.etime != '00:00:59'}
                                                     <span>- {$listQues.etime|funcTime}
                                                    {/if}
                                                น.</p></span>
                                                {* {elseif $listQues.etime != '00:00:59'}
                                                 ถึงเวลา : {$listQues.etime|funcTime} น.
                                                {/if} *}
                                            {/if}

                                            </div>
                                        </div>

                                        <div class="detail-etc">
                                           
                                            <div class="num">
                                                    <p>จำนวน <span>{$listQues.id|checkDataTotal} / {$listQues.quality|number_format} คน</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="action">
                                   {*  {$ul}/registerDetail/list/{$infoQuestionare.id} *}
                                {*    {$infoQuestionare.id|@print_r} *}
                                   {* {$listQues.id|@print_r} *}
                                    <a href="{$ul}/registerDetail/list/{$listQues.id}" class="btn btn-primary btn-medium -fluid name-list" title="รายชื่อผู้ลงทะเบียน"><i class="fa fa-eye"></i>รายชื่อผู้ลงทะเบียน</a>
                                    {if $listQues.id|checkDataTotal < $listQues.quality}
                                            {if ($listQues.stime|strtotime <= $timeNow && $listQues.etime|strtotime >= $timeNow) || ($listQues.stime == '00:00:00' && $listQues.etime == '00:00:59')}
                                                    <a href="{$ul}/registerDetail/{$listQues.id}" class="btn btn-primary btn-medium -fluid" title="ลงทะเบียนออนไลน์"><i class="fa fa-user-o"></i></i>ลงทะเบียน</a>
                                            {else}
                                                   <a href="javascript:void(0)" class="btn btn-warning btn-medium -fluid" title="ปิดการลงทะเบียน" disabled><i class="fa fa-clock-o"></i>ปิดการลงทะเบียน</a>
                                            {/if}
                                    {else}
                                    <a href="javascript:void(0)" class="btn btn-danger btn-medium -fluid" title="ผู้ลงทะเบียนเต็ม" disabled><i class="fa fa-ban"></i>ผู้ลงทะเบียนเต็ม</a>
                                    {/if}
                                    {* <div class="help-block">
                                    {$callNumberQus = $listQues.id|callFormCountAns}
                                        จำนวนคำถาม <strong class="text-primary">{$callNumberQus|number_format}</strong> ข้อ
                                    </div> *}
                                </div>
                            </div>
                        </li>
                    {/foreach}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
