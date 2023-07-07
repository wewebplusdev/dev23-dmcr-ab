<section class="site-container">

    <div class="default-page">
        <div class="breadcrumb-block" style="display: none;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-9">
                        <ol class="breadcrumb">
                            <li><a href="https://www.dmcr.go.th"><span class="fa fa-home"></span>หน้าแรก</a></li>
                            {* <li><a href="{$ul}/information">สารสนเทศ</a></li>
                            <li><a href="{$ul}/information/intranet">ฐานข้อมูลภายใน (Intranet)</a></li> *}
                            <li class="active">ระบบลงทะเบียนออนไลน์</li>
                        </ol>
                    </div>
                    <div class="col-sm-6 col-xs-3">
                        {* <div class="back">
                            <a onclick="window.history.back();" class="btn btn-default btn-small" title="กลับ">กลับ</a>
                        </div> *}
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="wg-into-slider">
                {foreach from=$infoAbout item=$listAbout key=keyAbout}
                
                    {$url = "{$ul}/about/{$listAbout.id}"|checkUrlShap:{$listAbout.typec}:{$listAbout.urlc}}
                    <div class="item">
                        <div class="toolbox">
                            <a class="link" href="{$url}" target="{$listAbout.target|checkTargetCk:{$listAbout.urlc}:{$listAbout.typec}}">
                                <div class="wrapper {(($keyAbout % 3) + 1)|chkClassAbout}">
                                    <figure class="cover">
                                        <img src="{$listAbout.pic|fileinclude:"pictures":{$listAbout.masterkey}:"link"}" class="lazy" alt="">
                                    </figure>
                                    <div class="title">{$listAbout.subject}</div>
                                    <div class="desc">
                                        {$listAbout.title|nl2br}
                                    </div>
                                    <div class="action">
                                        <div class="btn">อ่านต่อ</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                {/foreach}
            </div>

            <div class="row row-20">
                <div class="col-md-8">
                    <div class="toolbox -boxII pjc-box">
                        <div class="wrapper">
                            <div class="h-title">
                                <img class="lazy" src="{$template}/assets/img/icon/i-pjc.svg" alt="">
                                โครงการที่จะเปิดลงทะเบียน
                            </div>
                            <div class="project-close-slider">
                            {foreach $infoQuestionarePin as $listQuesPin}  
                                <div class="item">
                                    <div class="row-table">
                                        <div class="col-auto">
                                        {assign  var=valquality value="{$listQuesPin.quality*1}"}
                                        {assign  var=valqualityAll value="{$listQuesPin.id|checkDataTotal}"}
                                        {$result = ($valqualityAll/$valquality) * 100}

                                        <div data-percent="{$result|number_format}" class="pjc">                                                    
                                                <div class="icon">
                                                {if $listQuesPin.id|checkDataTotal < $listQuesPin.quality}
                                                    {if $listQuesPin.sdate != '0000-00-00 00:00:00' && $listQuesPin.edate != '0000-00-00 00:00:00'}
                                                        {if ($listQuesPin.sdate|strtotime <= $dayreal && $dayreal <= $listQuesPin.edate|strtotime) }
                                                            {if ($listQuesPin.stime|strtotime <= $timeNow && $listQuesPin.etime|strtotime >= $timeNow) || ($listQuesPin.stime == '00:00:00' && $listQuesPin.etime == '00:00:59')}
                                                                <img class="lazy" src="{$template}/assets/img/icon/i-unlock.svg" alt="">
                                                            {else}
                                                                <img class="lazy" src="{$template}/assets/img/icon/i-lock.svg" alt="">
                                                            {/if}
                                                        {else}
                                                                <img class="lazy" src="{$template}/assets/img/icon/i-lock.svg" alt="">
                                                        {/if}
                                                    
                                                    {else}
                                                        {if ($listQuesPin.sdate|strtotime == $dayreal && "" == $listQuesPin.edate|strtotime) }
                                                            {if ($listQuesPin.stime|strtotime <= $timeNow && $listQuesPin.etime|strtotime >= $timeNow) || ($listQuesPin.stime == '00:00:00' && $listQuesPin.etime == '00:00:59')}
                                                                <img class="lazy" src="{$template}/assets/img/icon/i-unlock.svg" alt="">
                                                            {else}
                                                                <img class="lazy" src="{$template}/assets/img/icon/i-lock.svg" alt="">
                                                            {/if}
                                                       {elseif $listQuesPin.edate|strtotime >= $dayreal && "" == $listQuesPin.sdate|strtotime}
                                                            {if ($listQuesPin.stime|strtotime <= $timeNow && $listQuesPin.etime|strtotime >= $timeNow) || ($listQuesPin.stime == '00:00:00' && $listQuesPin.etime == '00:00:59')}
                                                                <img class="lazy" src="{$template}/assets/img/icon/i-unlock.svg" alt="">
                                                            {else}
                                                                <img class="lazy" src="{$template}/assets/img/icon/i-lock.svg" alt="">
                                                            {/if}
                                                        {else}
                                                                <img class="lazy" src="{$template}/assets/img/icon/i-lock.svg" alt="">
                                                        {/if}
                                                    
                                                    {/if}
                                                {else}
                                                                <img class="lazy" src="{$template}/assets/img/icon/i-lock.svg" alt="">
                                                {/if}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="content">
                                                <div class="title">{$listQuesPin.subject}</div>
                                                <div class="desc">
                                                {$listQuesPin.title}
                                                </div>
                                                <div class="date">
                                                    {if $listQuesPin.sdate != '0000-00-00 00:00:00'}
                                                        <i class="fa fa-calendar-o"></i>
                                                        <span class="blue">วันที่ :</span> 
                                                        <span>{$listQuesPin.sdate|DateThai:1:'th':'full'}</span>
                                                        {if $listQuesPin.edate != '0000-00-00 00:00:00'}
                                                            <br>
                                                            <i class="fa fa-calendar-o" style="visibility: hidden;"></i>
                                                            <span class="blue">ถึง :</span> 
                                                            <span>{$listQuesPin.edate|DateThai:1:'th':'full'}</span>
                                                        {/if}
                                                    {elseif $listQuesPin.edate != '0000-00-00 00:00:00'}
                                                        <br>
                                                        <i class="fa fa-calendar-o" style="visibility: hidden;"></i>
                                                        <span class="blue">ถึง :</span> 
                                                        <span>{$listQuesPin.edate|DateThai:1:'th':'full'}</span>
                                                    {/if}
                                                   
                                                </div>
                                                <div class="time">
                                                   
                                                    {if $listQuesPin.stime == '00:00:00' && $listQuesPin.etime == '00:00:59'}
                                                        <i class="fa fa-clock-o"></i>
                                                        <span class="blue">เวลา :</span> 
                                                        <span>ทุกช่วงเวลา</span>
                                                    {else}
                                                        <i class="fa fa-clock-o"></i>
                                                        <span class="blue">เวลา :</span> 
                                                        <span>{$listQuesPin.stime|funcTime}</span>
                                                        {if $listQuesPin.etime != '00:00:59'}
                                                            <span>- {$listQuesPin.etime|funcTime}
                                                        {/if}
                                                         น.</span>
                                                    {/if}
                                                </div>
                                                <div class="num">
                                                {assign  var=valquality value="{$listQuesPin.quality*1}"}
                                                {assign  var=valqualityAll value="{1000000*1}"}
                                                {if $valquality < $valqualityAll}
                                                    {if $listQuesPin.id|checkDataTotal < $listQuesPin.quality}
                                                             
                                                                <i class="fa fa-user-o"></i>
                                                                <span class="blue">{$listQuesPin.id|checkDataTotal}</span><span> / {$listQuesPin.quality|number_format} </span><span class="men">คน</span>
                                                    {else}
                                                            
                                                                <i class="fa fa-user-o"></i>
                                                                <span class="red">{$listQuesPin.id|checkDataTotal}</span><span> / {$listQuesPin.quality|number_format}<span><span class="men">คน</span>
                                                    {/if}
                                                {else}
                                                            
                                                                <i class="fa fa-user-o"></i>
                                                                <span class="men">ไม่จำกัด</span>
                                                            
                                                {/if}
                                                    {* <i class="fa fa-user-o"></i>
                                                    <strong class="blue">2</strong><strong> / 1,000 </strong><span class="men">คน</span> *}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="btn-box">
                                                <a href="{$ul}/registerDetail/list/{$listQuesPin.id}" class="btn btn-register" target="_blank">
                                                    <img src="{$template}/assets/img/icon/i-btn1.svg" alt="">
                                                    รายชื่อผู้ที่ลงทะเบียน 
                                                </a>
                                                
                                                {if $listQuesPin.id|checkDataTotal < $listQuesPin.quality}
                                                    {if $listQuesPin.sdate != '0000-00-00 00:00:00' && $listQuesPin.edate != '0000-00-00 00:00:00'}
                                                        {if ($listQuesPin.sdate|strtotime <= $dayreal && $dayreal <= $listQuesPin.edate|strtotime) }
                                                            {if ($listQuesPin.stime|strtotime <= $timeNow && $listQuesPin.etime|strtotime >= $timeNow) || ($listQuesPin.stime == '00:00:00' && $listQuesPin.etime == '00:00:59')}
                                                                <a href="{$ul}/registerDetail/{$listQuesPin.id}" target="_blank" class="btn btn-primary btn-medium -fluid" title="ลงทะเบียนออนไลน์"><img src="{$template}/assets/img/icon/i-btn2.svg" alt="">ลงทะเบียน</a>
                                                            {else}
                                                                <a href="javascript:void(0)" class="btn btn-warning btn-medium -fluid" title="ปิดการลงทะเบียน" disabled><img src="{$template}/assets/img/icon/i-btn4.svg" alt="">ปิดการลงทะเบียน</a>
                                                            {/if}
                                                        {else}
                                                            <a href="javascript:void(0)" class="btn btn-warning btn-medium -fluid" title="ปิดการลงทะเบียน" disabled><img src="{$template}/assets/img/icon/i-btn4.svg" alt="">ปิดการลงทะเบียน</a>
                                                        {/if}
                                                    
                                                    {else}
                                                    
                                                        {if ($listQuesPin.sdate|strtotime == $dayreal && "" == $listQuesPin.edate|strtotime) }
                                                            {if ($listQuesPin.stime|strtotime <= $timeNow && $listQuesPin.etime|strtotime >= $timeNow) || ($listQuesPin.stime == '00:00:00' && $listQuesPin.etime == '00:00:59')}
                                                                <a href="{$ul}/registerDetail/{$listQuesPin.id}" target="_blank" class="btn btn-primary btn-medium -fluid" title="ลงทะเบียนออนไลน์"><img src="{$template}/assets/img/icon/i-btn2.svg" alt="">ลงทะเบียน</a>
                                                            {else}
                                                                <a href="javascript:void(0)" class="btn btn-warning btn-medium -fluid" title="ปิดการลงทะเบียน" disabled><img src="{$template}/assets/img/icon/i-btn4.svg" alt="">ปิดการลงทะเบียน</a>
                                                            {/if}
                                                       {elseif $listQuesPin.edate|strtotime >= $dayreal && "" == $listQuesPin.sdate|strtotime}
                                                            {if ($listQuesPin.stime|strtotime <= $timeNow && $listQuesPin.etime|strtotime >= $timeNow) || ($listQuesPin.stime == '00:00:00' && $listQuesPin.etime == '00:00:59')}
                                                                <a href="{$ul}/registerDetail/{$listQuesPin.id}" target="_blank" class="btn btn-primary btn-medium -fluid" title="ลงทะเบียนออนไลน์"><img src="{$template}/assets/img/icon/i-btn2.svg" alt="">ลงทะเบียน</a>
                                                            {else}
                                                                <a href="javascript:void(0)" class="btn btn-warning btn-medium -fluid" title="ปิดการลงทะเบียน" disabled><img src="{$template}/assets/img/icon/i-btn4.svg" alt="">ปิดการลงทะเบียน</a>
                                                            {/if}
                                                        {else}
                                                                <a href="javascript:void(0)" class="btn btn-warning btn-medium -fluid" title="ปิดการลงทะเบียน" disabled><img src="{$template}/assets/img/icon/i-btn4.svg" alt="">ปิดการลงทะเบียน</a>
                                                        {/if}
                                                    
                                                    {/if}
                                                {else}
                                                     <a href="javascript:void(0)" class="btn btn-danger btn-medium -fluid" title="ผู้ลงทะเบียนเต็ม" disabled><img src="{$template}/assets/img/icon/i-btn3.svg" alt="">ผู้ลงทะเบียนเต็ม</a>
                                                {/if}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {/foreach}
                                {* <div class="item">
                                    <div class="row-table">
                                        <div class="col-auto">
                                            <div data-percent="80" class="pjc">
                                                <div class="icon">
                                                    <img class="lazy" src="{$template}/assets/img/icon/i-unlock.svg" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="content">
                                                <div class="title">ลงชื่อการปฏิบัติงานฯ โควิด-19 (ช่วงเช้า)</div>
                                                <div class="desc">
                                                    เปิดใช้เพื่อลงทะเบียนการมาปฏิบัติงานของข้าราชการและพนักงานราชการ (แบบรายบุคคล)
                                                    เปิดใช้เพื่อลงทะเบียนการมาปฏิบัติงานของข้าราชการและพนักงานราชการ (แบบรายบุคคล)
                                                </div>
                                                <div class="date">
                                                    <i class="fa fa-calendar-o"></i>
                                                    <span class="blue">วันที่ :</span> 
                                                    <span>5 มกราคม 2564</span>
                                                    <br>
                                                    <i class="fa fa-calendar-o" style="visibility: hidden;"></i>
                                                    <span class="blue">ถึง :</span> 
                                                    <span>31 มกราคม 2564</span>
                                                </div>
                                                <div class="time">
                                                    <i class="fa fa-clock-o"></i>
                                                    <span class="blue">เวลา :</span> 
                                                    <span>08:30</span>
                                                    <span>- 19:30 น.</span>
                                                </div>
                                                <div class="num">
                                                    <i class="fa fa-user-o"></i>
                                                    <strong class="blue">2</strong><strong> / 1,000 </strong><span class="men">คน</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="btn-box">
                                                <a href="#" class="btn btn-register">
                                                    <img src="{$template}/public/image/asset/icon-member.png" alt="">
                                                    รายชื่อผู้ที่ลงทะเบียน
                                                </a>
                                                <a href="#" class="btn btn-primary">
                                                    <img src="{$template}/public/image/asset/icon-regis.png" alt="">
                                                    ลงทะเบียน
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div> *}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="toolbox  -boxII pjr-box">
                        <div class="wrapper -bgIV">
                            <figure class="cover">
                                <img src="{$template}/assets/img/upload/pjr.png" class="lazy" alt="">
                            </figure>
                            <div class="h-title">
                                <img class="lazy" src="{$template}/assets/img/icon/i-pjr.svg" alt="">
                                โครงการที่เปิดลงทะเบียน
                            </div>
                            <div class="number">{$infoQuestionare->_numOfRows}</div>
                            <div class="txt">โครงการ</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="h-clear"></div>

            <div class="title-box">
                <div class="default-title">
                    <img src="{$template}/assets/img/icon/i-df-title.svg" class="lazy" alt="">
                    ระบบลงทะเบียนออนไลน์
                </div>
            </div>

            <div class="filter-box">
                <div class="h-title">ค้นหา</div>
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
                                    <label class="control-label search-label" style="width: 100px;">คำค้น</label>
                                    <input name="keyword" class="form-control search-label" placeholder="" value="{$searchKeywords|default:''}" type="text">
                                    <button type="submit" class="btn btn-primary" title="ค้นหา"><span class="fa fa-search"></span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="body-box">
                <div class="table">
                    <div class="thead">
                        <div class="tr">
                            <div class="td title">ชื่อหลักสูตร/โครงการ</div>
                            <div class="td date">เปิดลงทะเบียนวันที่/เวลา</div>
                            <div class="td num">จำนวน</div>
                            <div class="td name">รายชื่อผู้ลงทะเบียน</div>
                            <div class="td action">ลงทะเบียน</div>
                        </div>
                        
                    </div>
                     <div class="tbody">
                     <!--
                     {* {$infoQuestionare|print_pre} *}
                     -->
                     
                        {foreach $infoQuestionare as $listQues}
                        <div class="tr">
                            <div class="td title">
                                    <div class="head-xs">ชื่อหลักสูตร / โครงการ </div>
                                    <div class="body-xs"> 
                                        <div class="thumb">
                                            {* <div class="icon"><img src="{$template}/public/image/asset/icon-write.png" alt=""></div> *}
                                            <img src="{$template}/assets/img/icon/icon-write.svg" alt="">
                                        </div>
                                        <div class="detail-box">
                                        <div class="title">{$listQues.subject}</div>
                                        <div class="desc">
                                            <div class="detail">{$listQues.title}</div>
                                        </div>
                                    </div> 
                            </div>
                            </div>
                            <div class="td date">
                                <div class="head-xs">เปิดลงทะเบียน วันที่ / เวลา</div>
                                <div class="body-xs">
                                <div class="date">
                                    {if $listQues.sdate != '0000-00-00 00:00:00'}
                                        <p>
                                            <i class="fa fa-calendar-o"></i>
                                            <span class="blue">วันที่ :</span> <span>{$listQues.sdate|DateThai:1:'th':'full'}</span>
                                        </p>
                                            {if $listQues.edate != '0000-00-00 00:00:00'}
                                                <p>
                                                    <i class="fa fa-calendar-o" style="visibility: hidden;"></i>
                                                    <span class="blue">ถึง :</span> <span>{$listQues.edate|DateThai:1:'th':'full'}</span>
                                                </p>
                                            {/if}
                                    {elseif $listQues.edate != '0000-00-00 00:00:00'}
                                        <p>
                                            <i class="fa fa-calendar-o"></i><span class="blue">ถึงวันที่ :</span> 
                                            <span>{$listQues.edate|DateThai:1:'th':'full'}</span>
                                        </p>
                                    {/if}

                                    {if $listQues.stime == '00:00:00' && $listQues.etime == '00:00:59'}
                                        <p><i class="fa fa-clock-o"></i>ทุกช่วงเวลา</p>
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
                                
                            </div>
                            <div class="td num">
                                <div class="head-xs"> จำนวน</div>
                                <div class="body-xs">
                                    <div class="detail-etc">
                                            <div class="num">
                                  
                                    {assign  var=valquality value="{$listQues.quality*1}"}
                                    {assign  var=valqualityAll value="{1000000*1}"}
                                    {if $valquality < $valqualityAll}
                                        {if $listQues.id|checkDataTotal < $listQues.quality}
                                                <p> 
                                                    <i class="fa fa-user-o"></i>
                                                    <span class="blue">{$listQues.id|checkDataTotal}</span><span> / {$listQues.quality|number_format} </span><br/><span class="men">คน</span></p>
                                        {else}
                                                <p>
                                                    <i class="fa fa-user-o"></i>
                                                    <span class="red">{$listQues.id|checkDataTotal}</span><span> / {$listQues.quality|number_format}<span><br/><span class="men">คน</span></p>
                                        {/if}
                                        {else}
                                                <p>
                                                    <i class="fa fa-user-o"></i>
                                                    <span class="men">ไม่จำกัด</span>
                                                </p>
                                {/if}
                                        {* <p> <span>{$listQues.id|checkDataTotal} / {$listQues.quality|number_format} </span><br/><span class="men">คน</span></p> *}
                                        </div>
                                    </div>

                                 </div>
                               
                            </div>
                            <div class="td name"> 
                                <div class="head-xs"> รายชื่อผู้ลงทะเบียน</div>
                                <div class="body-xs">
                                    <a href="{$ul}/registerDetail/list/{$listQues.id}" target="_blank" class="btn btn-register btn-medium -fluid name-list" title="รายชื่อผู้ลงทะเบียน">
                                        <img src="{$template}/assets/img/icon/i-btn1.svg" alt="">รายชื่อผู้ลงทะเบียน
                                    </a>
                                 </div>
                                
                            </div>
                            <div class="td action">  
                                <div class="head-xs">ลงทะเบียน</div>
                                <div class="body-xs"> 
                                {if $listQues.id|checkDataTotal < $listQues.quality}
                                    {if $listQues.sdate != '0000-00-00 00:00:00' && $listQues.edate != '0000-00-00 00:00:00'}
                                        {if ($listQues.sdate|strtotime <= $dayreal && $dayreal <= $listQues.edate|strtotime) }
                                            {if ($listQues.stime|strtotime <= $timeNow && $listQues.etime|strtotime >= $timeNow) || ($listQues.stime == '00:00:00' && $listQues.etime == '00:00:59')}
                                                <a href="{$ul}/registerDetail/{$listQues.id}" target="_blank" class="btn btn-primary btn-medium -fluid" title="ลงทะเบียนออนไลน์"><img src="{$template}/assets/img/icon/i-btn2.svg" alt="">ลงทะเบียน</a>
                                            {else}
                                                <a href="javascript:void(0)" class="btn btn-warning btn-medium -fluid" title="ปิดการลงทะเบียน" disabled><img src="{$template}/assets/img/icon/i-btn4.svg" alt="">ปิดการลงทะเบียน</a>
                                            {/if}
                                        {else}
                                            <a href="javascript:void(0)" class="btn btn-warning btn-medium -fluid" title="ปิดการลงทะเบียน" disabled><img src="{$template}/assets/img/icon/i-btn4.svg" alt="">ปิดการลงทะเบียน</a>
                                        {/if}
                                    
                                    {else}
                                    
                                        {if ($listQues.sdate|strtotime == $dayreal && "" == $listQues.edate|strtotime) }
                                            {if ($listQues.stime|strtotime <= $timeNow && $listQues.etime|strtotime >= $timeNow) || ($listQues.stime == '00:00:00' && $listQues.etime == '00:00:59')}
                                                <a href="{$ul}/registerDetail/{$listQues.id}" target="_blank" class="btn btn-primary btn-medium -fluid" title="ลงทะเบียนออนไลน์"><img src="{$template}/assets/img/icon/i-btn2.svg" alt="">ลงทะเบียน</a>
                                            {else}
                                                <a href="javascript:void(0)" class="btn btn-warning btn-medium -fluid" title="ปิดการลงทะเบียน" disabled><img src="{$template}/assets/img/icon/i-btn4.svg" alt="">ปิดการลงทะเบียน</a>
                                            {/if}
                                       {elseif $listQues.edate|strtotime >= $dayreal && "" == $listQues.sdate|strtotime}
                                            {if ($listQues.stime|strtotime <= $timeNow && $listQues.etime|strtotime >= $timeNow) || ($listQues.stime == '00:00:00' && $listQues.etime == '00:00:59')}
                                                <a href="{$ul}/registerDetail/{$listQues.id}" target="_blank" class="btn btn-primary btn-medium -fluid" title="ลงทะเบียนออนไลน์"><img src="{$template}/assets/img/icon/i-btn2.svg" alt="">ลงทะเบียน</a>
                                            {else}
                                                <a href="javascript:void(0)" class="btn btn-warning btn-medium -fluid" title="ปิดการลงทะเบียน" disabled><img src="{$template}/assets/img/icon/i-btn4.svg" alt="">ปิดการลงทะเบียน</a>
                                            {/if}
                                        {else}
                                                <a href="javascript:void(0)" class="btn btn-warning btn-medium -fluid" title="ปิดการลงทะเบียน" disabled><img src="{$template}/assets/img/icon/i-btn4.svg" alt="">ปิดการลงทะเบียน</a>
                                        {/if}
                                    
                                    {/if}
                                {else}
                                     <a href="javascript:void(0)" class="btn btn-danger btn-medium -fluid" title="ผู้ลงทะเบียนเต็ม" disabled><img src="{$template}/assets/img/icon/i-btn3.svg" alt="">ผู้ลงทะเบียนเต็ม</a>
                                {/if}
                                </div>
                           
                            </div>
                        </div>
                        {/foreach}
                    </div>
                </div>

            </div>
          
        </div>
    </div>
</section>
