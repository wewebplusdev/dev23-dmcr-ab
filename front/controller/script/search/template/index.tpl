{include file="front/template/default/inc-herobanner.tpl" title=title}

<div class="default-page about-page" style="position:relative;z-index:1;overflow:hidden">
    <div class="default-head" data-aos="fade-up">
        <div class="container-lg">
            <div class="breadcrumb-block">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item breadcrumb-home"><a href="{$ul}/home">หน้าหลัก</a></li>
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
                                    {for $i=1 to 5}
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
                                    {/for}      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {include file="pagination.tpl" title=title}
        </div>
    </div>
</div>