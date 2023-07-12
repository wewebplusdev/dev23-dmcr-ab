
  <p>
    <a class="btn btn-primary" role="button" href="{$ul}/follow?m=1f">
        ติดตามปะการังเทียม
    </a>
    <a class="btn btn-primary" role="button" href="{$ul}/follow?m=2f">
        ติดตามทุ่นในทะเล
    </a>
    <a class="btn btn-primary" role="button" href="{$ul}/follow?m=3f">
        ติดตามจุดจมเรือ
    </a>
  </p>
  <div>
    <div class="row">
        {foreach $followListC as $KeyfollowList => $valuefollowList}
        <div class="card col-3">
            <img class="card-img-top" src="{$valuefollowList.6|fileinclude:"pictures":{$valuefollowList.1}:"link"}" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">{$valuefollowList.credate|DateThai:'13':{$langon}:'shot'}</p>
              <h5 class="card-title">{$valuefollowList.subject}</h5>
              
              <small class="card-text">{$valuefollowList.title}</small>
              <br>
              <a href="{$ul}/follow/detail/{$valuefollowList.id}?m={$masterkey}" class="btn btn-primary">detail</a>
            </div>
          </div>
        {/foreach}
        </div>
        {include file="pagination.tpl" title=title}
  </div>