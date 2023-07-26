
    {include file="front/template/default/inc-herobanner.tpl" title=title}

<div class="default-page news-page" style="position:relative;z-index:1;overflow:hidden">
   <div class="default-head" data-aos="fade-up">
      <div class="container-lg">
         <div class="breadcrumb-block">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item breadcrumb-home"><a href="{$ul}/home">หน้าหลัก</a></li>
                     <li class="breadcrumb-item"><a href="{$ul}/follow" role="button" tabindex="0">การติดตามการใช้ประโยชน์</a></li>
                     <li class="breadcrumb-item active" aria-current="page">{$followDetail.subject}</li>
                  </ol>
               </nav>
         </div>
      </div>
   </div>
   <div class="default-body">
      <div class="container-lg">
         <div class="body-content">
            <div class="detail-head" data-aos="fade-up">
               <div class="row">
                  <div class="col">
                        <div class="whead mb-0">
                           <h2 class="title">{$followDetail.subject}</h2>
                        </div>
                  </div>
                  <div class="col-md-auto">
                        <div class="hstack gap-4">
                           <div class="province">จังหวัด <span class="text-primary">{$province}</span></div>
                           <div class="year">ปี <span class="text-primary">{$followDetail.year|DateYearThai:{$langon}} </span></div>
                        </div>
                  </div>
               </div>
               <div class="row align-items-center justify-content-between">
                  <div class="col-sm-auto">
                        <div class="hstack gap-4">
                           <div class="date" style="display: flex; align-items: center; gap: 0.5rem;">
                              <div class="icon">
                                    <img alt="facebook icon" src="{$template}/assets/img/icon/icon-calendar.svg" class="lazy" style="color: transparent;" width="20" height="20">
                              </div>
                              {$followDetail.credate|DateThai:'13':{$langon}:'shot'}
                           </div>
                           <div class="view" style="display: flex; align-items: center; gap: 0.5rem;">
                              <div class="icon">
                                    <img alt="facebook icon" src="{$template}/assets/img/icon/icon-eye.svg" class="lazy" style="color: transparent;" width="20" height="20">
                              </div>
                              {$followDetail.view} ครั้ง
                           </div>
                        </div>
                  </div>
                  <div class="col-sm-auto">
                        <div class="share-block">
                           <div class="hstack gap-2">
                              <a class="link print" title="Print" href="/activity/detail">
                                    <div class="icon rounded-circle">
                                       <img alt="print icon" src="{$template}/assets/img/icon/icon-fax-primary.svg" class="lazy" style="color: transparent;" width="20" height="20">
                                    </div>
                              </a>
                              <a class="link fb" title="Facebook" target="_blank" href="https://www.facebook.com/DMCRTH">
                                    <div class="icon rounded-circle">
                                       <img alt="facebook icon" src="{$template}/assets/img/icon/icons-facebook.svg" class="lazy" style="color: transparent;" width="20" height="20">
                                    </div>
                              </a>
                              <a class="link tw" title="Twitter" target="_blank" href="https://twitter.com/dmcrth">
                                    <div class="icon rounded-circle">
                                       <img alt="twitter icon" src="{$template}/assets/img/icon/icons-twitter.svg" class="lazy" style="color: transparent;" width="20" height="20">
                                    </div>
                              </a>
                           </div>
                        </div>
                  </div>
               </div>
            </div>
            {if $followDetail.htmlfilename neq ""}
               <div class="editor-content" data-aos="fade-up">
                  {strip}
                  {$followDetail.htmlfilename|fileinclude:"html":$followDetail.masterkey|callHtml}
                  {/strip}
               </div>
            {/if}

            {if $callalbum->_numOfRows > 0}
            <div class="gallery-list" data-aos="fade-up" id="trigger-video-player">
               <div class="whead" data-aos="fade-left">
                  <div class="subtitle">รูปประกอบ</div>
               </div>
               <div class="swiper gallery-swiper default-swiper" data-aos="fade-up">
                  <div class="swiper-wrapper">
                     {foreach $callalbum as $keycallalbum => $valuecallalbum}
                     <div class="swiper-slide">
                        <a data-fancybox="gallery" href="{$valuecallalbum['filename']|fileinclude:"album":{$followDetail.masterkey}:"link"}">
                           <div class="ratio thumbnail ratio-1x1">
                              <img alt="{$valuecallalbum.subject}" data-src="{$valuecallalbum['filename']|fileinclude:"album":{$followDetail.masterkey}:"link"}" class="rounded lazy">
                           </div>
                        </a>
                     </div>
                     {/foreach}
                  </div>
                  <div class="swiper-pagination"></div>
               </div>
            </div>
            {/if}

            {if $followDetail.url neq '' && $followDetail.url neq '#' && $followDetail.type eq 'url'}
                  {$myUrlArray = "v="|explode:$followDetail.url}
                  {$myUrlCut = $myUrlArray[1]}
                  {$myUrlCutArray = "&"|explode:$myUrlCut}
                  {$myUrlCutAnd= $myUrlCutArray.0}
                  <div class="video-player" data-aos="fade-up" data-aos-anchor="#trigger-video-player" data-aos-anchor-placement="top-top" id="trigger-attach">
                     <div class="row justify-content-center my-xl-5">
                        <div class="col-xl-10">
                            <div class="ratio ratio-16x9">
                                <iframe class="lazy" src="https://www.youtube.com/embed/{$myUrlCutAnd}" title="YouTube video" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                  </div>
            {elseif $followDetail.type eq 'file' && $followDetail.filevdo neq ''}
            <div class="video-player" data-aos="fade-up" data-aos-anchor="#trigger-video-player" data-aos-anchor-placement="top-top" id="trigger-attach">
               <div class="ratio ratio-16x9">
                  <video class="lazy" data-src="{$followDetail.filevdo|fileinclude:"vdo":{$followDetail.masterkey}:"link"}">
                     <source data-src="{$followDetail.filevdo|fileinclude:"vdo":{$followDetail.masterkey}:"link"}" type="video/mp4">
                     Your browser does not support the video tag.
                  </video>
               </div>
               <div class="video-control">
                  <button class="btn btn-play">
                        <span class="fa-solid fa-play fa-6x"></span>
                  </button>
               </div>
            </div>
            {/if}

            {if $callfile->_numOfRows > 0}
            <div class="attachment-list" data-aos="fade-up" data-aos-anchor="#trigger-attach" data-aos-anchor-placement="top-bottom" id="trigger-action">
               <div class="whead">
                  <div class="subtitle">เอกสารแนบ</div>
               </div>
               <div class="swiper attach-swiper default-swiper">
                  <div class="swiper-wrapper">
                     {foreach $callfile as $keycallfile => $valuecallfile}
                     {$fileinfo = $valuecallfile.2|fileinclude:"file":$valuecallfile.1|get_Icon}
                     <div class="swiper-slide">
                        <a title="{$valuecallfile.3}{$fileinfo.type}" class="link attach-item" target="_blank" href="{$ul}/downloadFile/{$valuecallfile.2|fileinclude:"file":$followDetail.masterkey:"download"}&n={$valuecallfile.3}&id={encodeStr($valuecallfile.0)}">
                           <div class="default-card card">
                              <div class="card-body">
                                 <div class="theme-blue">
                                    <div class="align-items-xxl-center gutters-15 row">
                                       <div class="col-sm-auto">
                                          <div class="hexagon-wrapper">
                                             <div class="hexagon-inner">
                                                <div class="icon-wrapper hexagon">
                                                   <div class="icon">
                                                      <img alt="" data-src="{$template}/assets/img/icon/icon-attachment.svg" class="lazy" style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="hexagon-outer"></div>
                                          </div>
                                       </div>
                                       <div class="col">
                                          <div class="inner">
                                             <div class="title text-limit">
                                                <span class="text-primary fw-bold">{$valuecallfile.3}{$fileinfo.type}</span>
                                             </div>
                                             <div class="desc hstack gap-3">
                                                <div class="type">
                                                   ประเภทไฟล์ : <span class="text-primary">{$fileinfo.type}</span>
                                                </div>
                                                <div class="type">
                                                   ขนาด : <span class="text-primary">{$valuecallfile.2|fileinclude:'file':{$followDetail.masterkey}|get_IconSize}</span>
                                                </div>
                                                <div class="download">
                                                   จำนวนดาวน์โหลด : <span class="text-primary">{$valuecallfile.4|default:0}</span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-xxl-auto">
                                          <div class="action">
                                             <button type="button" class="btn btn-outline-primary">ดาวน์โหลด</button>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </a>
                     </div>
                     {/foreach}
                  </div>
                  <div class="swiper-pagination"></div>
               </div>
            </div>
            {/if} 
            <div class="action -back-2-prevoius" style="border-top:1px solid #fff">
               <div class="row justify-content-end">
                  <div class="col-auto">
                        <button type="button" onclick="javascript:window.history.back();" class="btn btn-gray-light">
                           <span class="fa-solid fa-chevron-left"></span>กลับ
                        </button>
                  </div>
               </div>
            </div>
         </div>
         <div class="graphic graphic-inner-page-bottom">
            <div class="bg" style="z-index:0">
               <img alt="" data-src="{$template}/assets/img/background/bg-inner-page-bottom.png" class="lazy">
            </div>
         </div>
      </div>
   </div>
</div>