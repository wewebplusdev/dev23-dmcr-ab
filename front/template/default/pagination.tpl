{if $pagination|default:null}
    <div class="pagination-block" data-aos="fade-up">
        <div class="align-items-center row">
            <div class="col">
                <div class="pagination-label">จำนวนทั้งหมด <span class="text-primary">{$pagination.total|number_format}</span> รายการ</div>
            </div>
            <div class="col-md-auto">
                <ul class="pagination">
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
                        <li class="page-item">
                            <a class="page-link" role="button" tabindex="0" href="{$ul}/{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}1">
                                <span class="fa fa-angles-left"></span>
                                <span class="visually-hidden">First</span>
                            </a>
                        </li>
                    {/if}
                    {if $pagination.curent-1 > 0}
                        <li class="page-item">
                            <a class="page-link" role="button" tabindex="0" href="{$ul}/{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$pagination.curent-1}">
                                <span class="fa fa-chevron-left"></span>
                                <span class="visually-hidden">Previous</span>
                            </a>
                        </li>
                    {/if}
                    {for $current=$pageStartShow to $pageEndShow}
                        <li class="page-item{if $current == $pagination.curent} active{/if}">
                            <a class="page-link" role="button" tabindex="0" href="{$ul}/{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$current}" title="{$txtLang['tools:page']} {$current}">{$current}</a>
                        </li>
                    {/for}
                    <li class="page-item pagination-jumpPage">
                        <select class="select-control" onchange="window.location = $(this).val()" style="width:95px">
                            <option value="javascript:void(0)">ไปหน้า</option>
                            {for $current=1 to $pagination.totalpage}
                                <option value="{$ul}/{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$current}">
                                    {$current}
                                </option>
                            {/for}
                        </select>
                    </li>
                    {if $pagination.curent+1 < $pagination.totalpage}
                        <li class="page-item">
                            <a class="page-link" role="button" tabindex="0" href="{$ul}/{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$pagination.curent+1}">
                                <span class="fa fa-chevron-right"></span>
                                <span class="visually-hidden">Next</span>
                            </a>
                        </li>
                    {/if}
                    {if $pagination.curent+2 < $pagination.totalpage}                  
                        <li class="page-item">
                            <a class="page-link" role="button" tabindex="0" href="{$ul}/{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$pagination.totalpage}">
                                <span class="fa fa-angles-right"></span>
                                <span class="visually-hidden">Last</span>
                            </a>
                        </li>
                    {/if}
                </ul>
            </div>
        </div>
    </div>
{/if}