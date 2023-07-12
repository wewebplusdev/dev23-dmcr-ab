<div class="row">
{foreach $ActivityList as $KeyActivityList => $valueActivityList}
<div class="card col-3">
    <img class="card-img-top" src="{$valueActivityList.6|fileinclude:"pictures":{$valueActivityList.1}:"link"}" alt="Card image cap">
    <div class="card-body">
        <p class="card-text">{$valueActivityList.credate|DateThai:'13':{$langon}:'shot'}</p>
      <h5 class="card-title">{$valueActivityList.subject}</h5>
      
      <small class="card-text">{$valueActivityList.title}</small>
      <br>
      <a href="{$ul}/activity/detail/{$valueActivityList.id}" class="btn btn-primary">detail</a>
    </div>
  </div>
{/foreach}
</div>
{include file="pagination.tpl" title=title}