<!DOCTYPE html>
<html lang="{$langon}">

<head>
   {include file="{$incfile.metatag}" title=title}
   {include file="{$incfile.style}" title=title}
</head>

<body>
   <div class="layout-global">
      {if $fileInclude|default:null}
         {include file="{$incfile.header}" title=title}
         {include file="{$fileInclude|templateInclude:$settemplate}" title=pageContent}
      {/if}
   </div>
   {include file="{$incfile.pdpa}" title=title}
   {include file="{$incfile.loadscript}" title=title}
   {include file="{$incfile.modal}" title=title}
</body>

</html>