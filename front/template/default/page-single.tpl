{if $fileInclude|default:null}
{include file="{$fileInclude|templateInclude}" title=pageContent}
  {if $incjs|default:null}
    {include file="$incjs" title=title}
  {/if}
  {strip}
    {if {$assignjs_ps|default:null}}
        {foreach $assignjs_ps as $addAssetScript}
            {$addAssetScript}
        {/foreach}
    {/if}
{/strip}
{/if}
