

 <div class="pagination-block">
     <div class="pagination">
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
         <ul class="item-list">
            
             <li>
                 <a href="{$ul}{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$pagination.curent-1}" class="link arrow {if $pagination.curent-1 <= 0 }disabled{/if}"><span class="fa-solid fa-angle-left"></span></a>
             </li>
            
             {for $current=$pageStartShow to $pageEndShow}
                <li class="num-page {if $current == $pagination.curent}active{/if}">
                 <a href="{$ul}{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$current}" class="link">{$current}</a>
                </li>
            {/for}
            
             <li>
                 <a href="{$ul}{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$pagination.curent+1}" class="link arrow {if $pagination.curent+1 > $pagination.totalpage}disabled{/if}"><span class="fa-solid fa-angle-right"></span></a>
             </li>
             
         </ul>
     </div>
</div>