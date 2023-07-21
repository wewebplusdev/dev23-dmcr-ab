<!DOCTYPE html>
<html>
<head>
    {include file="inc-metatag.tpl" title=title}
    {include file="inc-style.tpl" title=title}
</head>
<body>
	
    <div class="global-container">

        {include file="$header" title=title}

        <section class="layout-container">
            {include file="{$fileInclude|templateInclude:$settemplate}" title=pageContent}
        </section>

        {include file="$footer" title=title}
        
    </div>

	{include file="inc-loadscript.tpl" title=title}
</body>
</html>