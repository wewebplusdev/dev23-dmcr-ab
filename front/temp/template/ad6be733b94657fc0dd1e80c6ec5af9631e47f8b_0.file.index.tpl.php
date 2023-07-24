<?php
/* Smarty version 3.1.30, created on 2023-07-24 19:09:49
  from "/Applications/XAMPP/xamppfiles/htdocs/dev23-dmcr-ab/front/controller/script/search/template/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_64be6a0da693d6_25852510',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ad6be733b94657fc0dd1e80c6ec5af9631e47f8b' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/dev23-dmcr-ab/front/controller/script/search/template/index.tpl',
      1 => 1690200571,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:front/template/default/inc-herobanner.tpl' => 1,
    'file:pagination.tpl' => 1,
  ),
),false)) {
function content_64be6a0da693d6_25852510 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:front/template/default/inc-herobanner.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'title'), 0, false);
?>


<div class="default-page about-page" style="position:relative;z-index:1;overflow:hidden">
    <div class="default-head" data-aos="fade-up">
        <div class="container-lg">
            <div class="breadcrumb-block">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item breadcrumb-home"><a href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/home">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ค้นหา</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="default-body">
        <div class="container-lg">
            <div class="body-content">
                <div class="whead page-title text-center" data-aos="fade-up">
                    <h2 class="title">ค้นหา</h2>
                </div>
                <div class="search-filter mb-md-5 mb-4" data-aos="fade-up">
                    <div class="justify-content-lg-center row">
                        <div class="col-lg-8">
                            <form action="" class="form-default">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label visually-hidden" for="agencyNameOptions">ชื่อหน่วยงาน</label>
                                            <select class="select-control" name="agency" id="agencyNameOptions" data-placeholder="ชื่อหน่วยงาน" style="width: 100%;">
                                                <option></option>
                                                <option value="0">test</option>
                                                <option value="1">test</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label visually-hidden" for="provinceOptions">จังหวัด</label>
                                            <select class="select-control" name="province" id="provinceOptions" data-placeholder="จังหวัด" style="width: 100%;">
                                                <option></option>
                                                <option value="0">Alabama</option>
                                                <option value="1">Wyoming</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label visually-hidden" for="years">ปี</label>
                                            <select class="select-control" name="years" id="yearsOptions"
                                                data-placeholder="ปี" style="width: 100%;">
                                                <option></option>
                                                <option value="0">2012</option>
                                                <option value="1">2014</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="form-label visually-hidden" for="keywords"></label>
                                            <input id="keywords" placeholder="ค้นหา" aria-label="ค้นหา" aria-describedby="ค้นหา" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <div class="action">
                                            <button type="button" value="ค้นหา" class="fluid btn btn-secondary">ค้นหา</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="search-result">
                    <div class="search-result-head" data-aos="fade-up">
                        <div class="align-items-center row">
                            <div class="col">
                                <div class="title typo-lg fw-bold">
                                    คำค้นหา <span class="text-primary">"การ"</span> จำนวน <span class="text-primary">41,026</span> รายการ
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-12">
                                <div class="sort-options">
                                    <div class="form-group">
                                        <label class="form-label" for="filterOrder">จัดเรียง</label>
                                        <select class="select-control" name="filter" id="filterOrder" style="width: 100%;">
                                            <option value="0">ตาม ก-ฮ</option>
                                            <option value="1">ตาม ฮ-ก</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="search-result-list">
                        <div class="card" style="border:none">
                            <div class="card-body">
                                <div class="list-group">
                                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 5+1 - (1) : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                                    <div class="list-group-item" data-aos="fade-up">
                                        <a class="link" href="/search">
                                            <div class="wrapper">
                                                <div class="title">
                                                    ประกาศกรมทรัพยากรทางทะเลและชายฝั่ง เรื่อง
                                                    ประกาศผู้ชนะการเสนอราคา
                                                    จ้างเหมาบริการพนักงานขับรถยนต์เดินทางไปราชการระหว่างวันที่ 13 - 17
                                                    กันยายน 2564 ของส่วนสื่อสารองค์กร โดยวิธีเฉพาะเจาะจง
                                                </div>
                                                <div class="desc">
                                                    ประกาศกรมทรัพยากรทางทะเลและชายฝั่ง เรื่อง
                                                    ประกาศผู้ชนะการเสนอราคา
                                                    จ้างเหมาบริการพนักงานขับรถยนต์เดินทางไปราชการระหว่างวันที่ 13 - 17
                                                    กันยายน 2564 ของส่วนสื่อสารองค์กร โดยวิธีเฉพาะเจาะจง
                                                </div>
                                                <div class="linkto text-secondary">
                                                    https://www.dmcr.go.th/detailAll/53178/nws/13
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <?php }
}
?>
      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $_smarty_tpl->_subTemplateRender("file:pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'title'), 0, false);
?>

            <div class="">pagination</div>
        </div>
    </div>
</div><?php }
}
