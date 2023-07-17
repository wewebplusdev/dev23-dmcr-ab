<p>
    {$followDetail.credate|DateThai:'13':{$langon}:'shot'}
    <br>
    จำนวนเข้าชม {$followDetail.view} ครั้ง
    <br>
    จังหวัด {$province}
    <br>
    ปี {$followDetail.year|DateYearThai:{$langon}} 
    <br>
    <h4>{$followDetail.subject}</h4>
    <br>
    {$followDetail.title}
    <br>
    
    
    </p>
    {if $followDetail.htmlfilename neq ""}
    <div class="editor-content">
        {strip}
        {$followDetail.htmlfilename|fileinclude:"html":$followDetail.masterkey|callHtml}
        {/strip}
    </div>
    {/if}
    
    album
    {if !empty($callalbum)}
    <div class="row">
    {foreach $callalbum as $keycallalbum => $valuecallalbum}
    <div class="col-3">
        <a href="{$valuecallalbum['filename']|fileinclude:" album":{$followDetail.masterkey}:"link"}"
            class="link" data-fancybox="gallery">
            <div class="ratio ratio-16x9">
                <img src="{$valuecallalbum['filename']|fileinclude:" album":{$followDetail.masterkey}:"link"}"
                alt="{$valuecallalbum.subject}" />
            </div>
        </a>
    </div>
    {/foreach}
    </div>
    {/if}

    video
    {if $followDetail.type}
        {if $followDetail.type eq url && $followDetail.url neq ''}
        {$myUrlArray = "v="|explode:$followDetail.url}
        {$myUrlCut = $myUrlArray[1]}
        {$myUrlCutArray = "&"|explode:$myUrlCut}
        {$myUrlCutAnd= $myUrlCutArray[0]}
            <div class="vdoYoutube large">
                <div class="wrapper iframe-container">
                    <iframe class="responsive-iframe" src="https://www.youtube.com/embed/{$myUrlCutAnd}" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        {else if $followDetail.type eq file && $followDetail.filevdo neq ''}
            <div class="vdo ">
                <div class="iframe-container">
                    <video id="my-video" class="responsive-iframe" controls preload poster="{$followDetail.pic|fileinclude:"real":{$followDetail.masterkey}:"link"}">
                    <source src="{$followDetail.filevdo|fileinclude:"vdo":{$followDetail.masterkey}:"link"}" type='video/mp4'>
                </video>
                </div>
            </div>
        {/if}
    {/if}
    
    file
    {if !empty($callfile)}
    <div class="row">
    {foreach $callfile as $keycallfile => $valuecallfile}
    {$fileinfo = $valuecallfile.2|fileinclude:"file":$valuecallfile.1|get_Icon}
    <div class="col-4" style="border: 1px solid black;">
    <a href="{$ul}/downloadFile/{$valuecallfile.2|fileinclude:"file":$followDetail.masterkey:"download"}&n={$valuecallfile.3}&id={encodeStr($valuecallfile.0)}" class="wrapper" title="{$valuecallfile.3}{$fileinfo.type}">
    download
    </a>
    <ul>
        <li>
            <div class="row align-items-center no-gutters">
               
               <div class="col">
                  <div class="text">ชื่อไฟล์ : {$valuecallfile.3}{$fileinfo.type}</div>
               </div>
            </div>
         </li>
        <li>
           <div class="row align-items-center no-gutters">
              
              <div class="col">
                 <div class="text">ประเภทไฟล์ : {$fileinfo.type}</div>
              </div>
           </div>
        </li>
        <li>
           <div class="row align-items-center no-gutters">
              
              <div class="col">
                 <div class="text">ขนาดไฟล์ : {$valuecallfile.2|fileinclude:'file':{$followDetail.masterkey}|get_IconSize}</div>
              </div>
           </div>
        </li>
        <li>
           <div class="row align-items-center no-gutters">
              
              <div class="col">
                 <div class="text">จำนวนการดาวน์โหลด {$valuecallfile.4|default:0} ครั้ง</div>
              </div>
           </div>
        </li>
     </ul>    
    
    </div>
    {/foreach}
    </div>
    {/if}