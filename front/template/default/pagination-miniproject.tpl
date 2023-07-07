{if $pagination|default:null}
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

<div class="pagination-block">
    <div class="row-table">
        <div class="col-auto">
            <div class="pagination-label">
                <div class="title">
                    จำนวนทั้งหมด <span>{$pagination.total|number_format}</span> รายการ
                </div>
            </div>
        </div>
        <div class="col">
            <div class="pagination">
                <ul>
                    {if $pagination.curent-1 > 0}              
                    <li class="pagination-nav"><a href="{$ul}/{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$pagination.curent-1}" class="link"><span class="feather icon-chevron-left"></span></a></li>
                    {/if}
                    {for $current=$pageStartShow to $pageEndShow}
                        <li class="{if $current == $pagination.curent}active{/if}"><a href="{$ul}/{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$current}" title="{$txtLang['tools:page']} {$current}" class="link">{$current}</a></li>
                    {/for}
                    {if $pagination.curent < $pagination.totalpage}
                        <li class="pagination-nav"><a href="{$ul}/{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$pagination.curent+1}" class="link"><span class="feather icon-chevron-right"></span></a></li>
                    {/if}
                </ul>
            </div>
        </div>
        <div class="col-auto">
            <div class="pagination-search">
                <div class="row-table">
                    {* <div class="col">
                        <div class="title">
                            Go to Page
                        </div>
                    </div>
                    <div class="col-auto">
                        <input class="form-control" type="number">
                    </div>
                    <div class="col">
                        <button class="btn btn-primary">GO</button>
                    </div> *}
                    <div class="col">
                        <select class="select-control" onchange="window.location = $(this).val()">
                            <option value="javascript:void(0)" >ไปหน้า</option>
                            {for $current=1 to $pagination.totalpage}
                            <option value="{$ul}/{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$current}" >{$current}</option>
                            {/for}
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{/if}