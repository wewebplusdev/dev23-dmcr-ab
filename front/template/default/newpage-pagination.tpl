{if $pagination.total > 0}

		  {$setPage = 1}
          {$pageStartShow = $PageShow - $setPage}
          {$pageEndShow = $PageShow + $setPage}

          {if $pageStartShow < 1}
              {$pageStartShow = 1}
          {/if}

          {if $pageStartShow - 2 < 0}
              {$pageEndShow = $pageEndShow + {$setPage + {$pageStartShow - $PageShow}}}
          {/if}

          {if $pageEndShow >= $pagination.totalpage}
              {$pageEndShow = $pagination.totalpage}
          {/if}

          {if $pagination.total - $PageShow < 2}
              {$startAdd = $setPage - {$pagination.totalpage - $PageShow}}
              {$pageStartShow = $pageStartShow - $startAdd}
          {/if}

          {if $pageStartShow < 1}
              {$pageStartShow = 1}
          {/if}




    <div class="pagination-block mt0 border-no">
        <div class="row">
            <div class="col-sm-4">
                <div class="pagination-label">
                    จำนวนทั้งหมด {$pagination.total|default:0} รายการ
                </div>
            </div>




            <div class="col-sm-8">
                <div class="pagination">
                    <ul class="pagination-ul">
                        {if $pagination.curent-1 > 0}
                            <li class="pagination-nav">
                                <a href="{$ul}/{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$pagination.curent-1}" aria-label="Previous">
                                    <span aria-hidden="true">&lsaquo;</span>
                                </a>
                            </li>
                        {/if}
                        {for $current=$pageStartShow to $pageEndShow}
                            <li class="{if $current == $pagination.curent}active{/if}">
                                <a href="{$ul}/{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$current}"  title="{$txtLang['tools:page']} {$current}">{$current}</a>
                            </li>
                        {/for}
                        <li class="newpagination-jumpPage"> 
                            <select class="select-control" >
                                <option value="javascript:void(0)" >ไปหน้า</option>
                                {for $current=1 to $pagination.totalpage}
                                <option value="{$ul}/{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$current}" >{$current}</option>
                                {/for}
                            </select>
                        </li>
                        {if $pagination.curent+1 < $pagination.totalpage}
                            <li class="pagination-nav">
                                <a href="{$ul}/{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$pagination.curent+1}" aria-label="Next">
                                    <span aria-hidden="true">&rsaquo;</span>
                                </a>
                            </li>
                        {/if}
                    </ul>

                </div>
            </div>
        </div>
    </div>


    
{/if}
