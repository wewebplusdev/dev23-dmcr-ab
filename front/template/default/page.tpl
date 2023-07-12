<!DOCTYPE html>
<html>
<head>
    {include file="inc-style.tpl" title=title}
</head>
<body>
	
    <div class="global-container">
        {include file="$header" title=title}

        <section class="site-container" style="margin-top: 150px;">
            {include file="{$fileInclude|templateInclude:$settemplate}" title=pageContent}
        </section>

        
    </div>

	{include file="inc-loadscript.tpl" title=title}
</body>
</html>