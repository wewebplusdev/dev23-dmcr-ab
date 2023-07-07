{strip}
    {if {$assignjs|default:null}}
        {foreach $assignjs as $addAssetScript}
            {$addAssetScript} 
        {/foreach}
    {/if}
{/strip}