<p>
<h4>{$ActivityDetail.subject}</h4>
<br>
{$ActivityDetail.title}
<br>
{$ActivityDetail.credate|DateThai:'13':{$langon}:'shot'}
<br>
จำนวนเข้าชม {$ActivityDetail.view} ครั้ง
</p>
{if $ActivityDetail.htmlfilename neq ""}
<div class="editor-content">
    {strip}
    {$ActivityDetail.htmlfilename|fileinclude:"html":$ActivityDetail.masterkey|callHtml}
    {/strip}
</div>
{/if}

album
{if !empty($callalbum)}
<div class="row">
{foreach $callalbum as $keycallalbum => $valuecallalbum}
<div class="col-3">
    <a href="{$valuecallalbum['filename']|fileinclude:" album":{$ActivityDetail.masterkey}:"link"}"
        class="link" data-fancybox="gallery">
        <div class="ratio ratio-16x9">
            <img src="{$valuecallalbum['filename']|fileinclude:" album":{$ActivityDetail.masterkey}:"link"}"
            alt="{$valuecallalbum.subject}" />
        </div>
    </a>
</div>
{/foreach}
</div>
{/if}

file
{if !empty($callfile)}
<div class="row">
{foreach $callfile as $keycallfile => $valuecallfile}
{$fileinfo = $valuecallfile.2|fileinclude:"file":$valuecallfile.1|get_Icon}
<div class="col-4" style="border: 1px solid black;">
<a href="{$ul}/downloadFile/{$valuecallfile.2|fileinclude:"file":$ActivityDetail.masterkey:"download"}&n={$valuecallfile.3}&id={encodeStr($valuecallfile.0)}" class="wrapper" title="{$valuecallfile.3}{$fileinfo.type}">
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
             <div class="text">ขนาดไฟล์ : {$valuecallfile.2|fileinclude:'file':{$ActivityDetail.masterkey}|get_IconSize}</div>
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