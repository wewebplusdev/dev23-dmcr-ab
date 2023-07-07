{if $pagination.total > 0}


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

    {if $pagination.totalpage - $pagination.curent < 2}
        {$startAdd = 2 - {$pagination.totalpage - $pagination.curent}}
        {$pageStartShow = $pageStartShow - $startAdd}
    {/if}


    {if $pageStartShow < 1}
        {$pageStartShow = 1}
    {/if}



    <div class="pagination-block">
        <div class="row">
            <div class="col-sm-4">
                <div class="pagination-label">
                    จำนวนทั้งหมด {$pagination.total|default:0} รายการ
                </div>
            </div>




            <div class="col-sm-8">
                <div class="pagination">
                    <ul class="pagination">
                        {*    {if $pageStartShow > 1}
    
                        <li class="pagination-nav">
                        <a  href="{$ul}/{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}1" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        </a>
                        </li>
                        {/if}*}
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
                        {if $pagination.curent+1 < $pagination.totalpage}
                            <li class="pagination-nav">
                                <a href="{$ul}/{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$pagination.curent+1}" aria-label="Next">
                                    <span aria-hidden="true">&rsaquo;</span>
                                </a>
                            </li>
                        {/if}
                        {*     {if $pagination.curent+2 < $pagination.totalpage}
                        <li class="last">
                        <a href="{$ul}/{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$pagination.totalpage}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        </a>
                        </li>
                        {/if}*}
                    </ul>


                    {*<ul>
                    <li class="pagination-nav">
                    <a href="#"><span class="fa fa-angle-left"></span></a>
                    </li>
                    {for $current=$pageStartShow to $pageEndShow}
                    <li class="{if $current == $pagination.curent}active{/if}">
                    <a href="{$ul}/{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$current}"  title="{$txtLang['tools:page']} {$current}">{$current}</a>
                    </li>
                    {/for}
                    <li class="pagination-nav">
                    <a href="#"><span class="fa fa-angle-right"></span></a>
                    </li>
                    </ul>*}
                </div>
            </div>
        </div>
    </div>


    
{/if}
