{if $pagination|default:null}
<div class="pagination-block mt0 border-no">
  <div class="row">
    <div class="col-sm-4">
      <div class="pagination-label">
        จำนวน <span>{$pagination.total|number_format}</span> รายการ
      </div>
    </div>
    <div class="col-sm-8">
      <div class="pagination">
        <ul>
          {$pageStartShow = $pagination.curent - 2}
          {$pageEndShow = $pagination.curent + 2}

          {if $pageStartShow < 1}
              {$pageStartShow = 1}
          {/if}

          {if $pageStartShow - 2 < 0}
              {$pageEndShow = $pageEndShow + {2 + {$pageStartShow - $pagination.curent}}}
          {/if}

          {if $pageEndShow >= $pagination.totalpage}
              {$pageEndShow = $pagination.totalpage}
          {/if}

          {if $pagination.total - $pagination.curent < 2}
              {$startAdd = 2 - {$pagination.totalpage - $pagination.curent}}
              {$pageStartShow = $pageStartShow - $startAdd}
          {/if}


          {if $pageStartShow < 1}
              {$pageStartShow = 1}
          {/if}
          {if $pageStartShow > 1}
              <li class="pagination-nav"><a href="{$ul}/{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}1">หน้าแรก</a></li>
          {/if}
          {if $pagination.curent-1 > 0}
              <li class="pagination-prev"><a href="{$ul}/{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$pagination.curent-1}"><span class="fa fa-angle-left"></span></a></li>
          {/if}

          {for $current=$pageStartShow to $pageEndShow}
              <li class="{if $current == $pagination.curent}active{/if}"><a href="{$ul}/{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$current}" title="{$txtLang['tools:page']} {$current}">{$current}</a></li>
          {/for}
		  <li class="pagination-jumpPage">
			<select class="select-control" onchange="window.location = $(this).val()">
				<option value="javascript:void(0)" >ไปหน้า</option>
				{for $current=1 to $pagination.totalpage}
				<option value="{$ul}/{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$current}" >{$current}</option>
				{/for}
			</select>
		  </li>
          {if $pagination.curent+1 < $pagination.totalpage}
              <li class="pagination-next"><a href="{$ul}/{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$pagination.curent+1}"><span class="fa fa-angle-right"></span></a></li>
          {/if}
          {if $pagination.curent+2 < $pagination.totalpage}
            <li class="pagination-nav"><a href="{$ul}/{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$pagination.totalpage}">หน้าสุดท้าย</a></li>
          {/if}
        </ul>
      </div>
    </div>
  </div>
</div>


{/if}
