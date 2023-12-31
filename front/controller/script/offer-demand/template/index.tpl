{include file="front/template/default/inc-herobanner.tpl" title=title}

<div class="default-page about-page sitekey" style="position:relative;z-index:1;overflow:hidden" data-id="{$sitekey}">
    <div class="default-head" data-aos="fade-up">
        <div class="container-lg">
            <div class="breadcrumb-block">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item breadcrumb-home"><a href="{$ul}/home">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active" aria-current="page">เสนอความต้องการ</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="default-body">
        <div class="container-lg">
            <div class="body-content">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8 col-sm-10 col-11" data-aos="fade-up">
                        <div class="step-progress -step-progress-i">
                            <div class="progress">
                                <div role="progressbar" class="progress-bar" style="width:20%" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="steps">
                                <div class="step -step-i active">
                                    <div class="hexagon-wrapper">
                                        <div class="hexagon-inner">
                                            <div class="txt-wrapper hexagon">
                                                <div class="txt">01</div>
                                            </div>
                                        </div>
                                        <div class="hexagon-outer"></div>
                                    </div>
                                    <div class="title">เสนอความต้องการ</div>
                                </div>
                                <div class="step -step-ii">
                                    <div class="hexagon-wrapper">
                                        <div class="hexagon-inner">
                                            <div class="txt-wrapper hexagon">
                                                <div class="txt">02</div>
                                            </div>
                                        </div>
                                        <div class="hexagon-outer"></div>
                                    </div>
                                    <div class="title">ส่งความต้องการ</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col" data-aos="fade-up">
                        <div class="content-step-i" id="step-i">
                            <div class="form-offer-demand">
                                <div class="default-card overflow-hidden card">
                                    <div class="form-head">เสนอความต้องการ</div>
                                    <div class="card-body">
                                        <form class="form-default needs-validation" id="demand-form" data-toggle="validator" role="form" method="post">
                                            <input placeholder="" name="msKey" type="hidden" id="msKey" class="form-control" value="1c">
                                            <input placeholder="" name="randid" type="hidden" id="randid" class="form-control" value="{$myid}">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label class="form-label" for="validationFormik01">ชื่อผู้เสนอความต้องการ <span class="text-danger">*</span></label>
                                                    <input name="name" type="text" id="validationFormik01" class="form-control" value="" required>
                                                    <div class="invalid-feedback">กรุณากรอกข้อมูล-ชื่อ</div>
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="validationFormik01">เลขที่ <span class="text-danger">*</span></label>
                                                    <input name="address" type="text" id="validationFormik01" class="form-control" value="" required>
                                                    <div class="invalid-feedback">กรุณากรอกข้อมูล-ที่อยู่</div>
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="validationFormik02">จังหวัด <span class="text-danger">*</span></label>
                                                    <select class="select-control" name="province" id="validationFormik02" data-placeholder="จังหวัด" style="width: 100%;" onchange="selectAmphur('#validationFormik02','#validationFormik03')" required>
                                                        <option></option>
                                                        {foreach $province as $keypro => $valpro}
                                                        <option value="{$valpro.id}">{$valpro.name}</option>
                                                        {/foreach}
                                                    </select>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="validationFormik03">อำเภอ <span class="text-danger">*</span></label>
                                                    <select class="select-control" name="amphoe" id="validationFormik03" data-placeholder="อำเภอ" style="width: 100%;" onchange="selectDistric('#validationFormik03','#validationFormik04')" required>
                                                        <option></option>

                                                    </select>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="validationFormik04">ตำบล <span class="text-danger">*</span></label>
                                                    <select class="select-control" name="subDistrict" id="validationFormik04" data-placeholder="ตำบล" style="width: 100%;" onchange="selectDiscode('#validationFormik04','#validationFormik05')" required>
                                                        <option></option>

                                                    </select>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="validationFormik05">รหัสไปรษณีย์ <span class="text-danger">*</span></label>
                                                    <input placeholder="" name="zip" type="text" id="validationFormik05" class="form-control" value="" required>
                                                    <div class="invalid-feedback">กรุณากรอกข้อมูล<!-- -->รหัสไปรษณีย์</div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="validationFormik06">เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                                                    <input placeholder="" name="telephone" type="text" id="validationFormik06" class="form-control" value="" required>
                                                    <div class="invalid-feedback">กรุณากรอกข้อมูล<!-- -->เบอร์โทรศัพท์</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-subtitle">กลุ่มผู้สนับสนุน</div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="validationFormik07">ชื่อผู้สนับสนุน <span class="text-danger">*</span></label>
                                                    <input name="sponsorName" type="text" id="validationFormik07" class="form-control" value="" required>
                                                    <div class="invalid-feedback">กรุณากรอกข้อมูล<!-- -->ชื่อ</div>
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="validationFormik08">งบประมาณ (บาท) <span class="text-danger">*</span></label>
                                                    <input placeholder="" name="sponsorAmount" type="number" id="validationFormik08" class="form-control" value="0" required>
                                                    <div class="invalid-feedback">กรุณากรอกข้อมูล</div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="validationFormik01">เลขที่ <span class="text-danger">*</span></label>
                                                    <input name="address2" type="text" id="validationFormik01" class="form-control" value="" required>
                                                    <div class="invalid-feedback">กรุณากรอกข้อมูล-ที่อยู่</div>
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="validationFormik09">จังหวัด <span class="text-danger">*</span></label>
                                                    <select class="select-control" name="province1" id="validationFormik09" data-placeholder="จังหวัด" style="width: 100%;" onchange="selectAmphur('#validationFormik09','#validationFormik10')" required>
                                                        <option></option>
                                                        {foreach $province as $keypro => $valpro}
                                                        <option value="{$valpro.id}">{$valpro.name}</option>
                                                        {/foreach}
                                                    </select>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="validationFormik10">อำเภอ <span class="text-danger">*</span></label>
                                                    <select class="select-control" name="amphoe1" id="validationFormik10" data-placeholder="อำเภอ" style="width: 100%;" onchange="selectDistric('#validationFormik10','#validationFormik11')" required>
                                                        <option></option>

                                                    </select>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="validationFormik11">ตำบล <span class="text-danger">*</span></label>
                                                    <select class="select-control" name="subDistrict1" id="validationFormik11" data-placeholder="ตำบล" style="width: 100%;" onchange="selectDiscode('#validationFormik11','#validationFormik12')" required>
                                                        <option></option>

                                                    </select>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="validationFormik12">รหัสไปรษณีย์ <span class="text-danger">*</span></label>
                                                    <input placeholder="" name="sponsorZip" type="text" id="validationFormik12" class="form-control" value="" required>
                                                    <div class="invalid-feedback">กรุณากรอกข้อมูล<!-- -->รหัสไปรษณีย์</div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="validationFormik13">เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                                                    <input placeholder="" name="sponsorTelephone" type="text" id="validationFormik13" class="form-control" value="" required>
                                                    <div class="invalid-feedback">กรุณากรอกข้อมูล<!-- -->เบอร์โทรศัพท์</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-subtitle">ข้อมูลเสนอความต้องการ</div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="validationFormik14">หน่วยงานดำเนินการ <span class="text-danger">*</span></label>
                                                    <input name="agency" type="text" id="validationFormik14" class="form-control" value="" required>
                                                    <div class="invalid-feedback">กรุณากรอกข้อมูล<!-- -->หน่วยงานดำเนินการ</div>
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="validationFormik15">ประเภทการเสนอความต้องการ <span class="text-danger">*</span></label>
                                                    <select class="select-control" name="tpyeDemand" id="tpyeDemand" data-placeholder="ประเภทการเสนอความต้องการ" style="width: 100%;" required>
                                                        <option></option>
                                                        {foreach $grouptype as $keyGroupType => $valueGroupType}
                                                        <option value="{$valueGroupType.id}">{$valueGroupType.subject}</option>
                                                        {/foreach}
                                                    </select>
                                                    <div class="invalid-feedback">กรุณากรอกข้อมูล<!-- -->ประเภทการเสนอความต้องการ</div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="form-label" for="validationFormik16">สถานที่วาง/ดำเนินการ <span class="text-danger">*</span></label>
                                                    <input placeholder="" name="locationExecution" type="text" id="validationFormik16" class="form-control" value="" required>
                                                    <div class="invalid-feedback">กรุณากรอกข้อมูล<!-- -->สถานที่วาง/ดำเนินการ</div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="form-label" for="validationFormik17">ชนิดขนาด และจำนวนวัสดุที่ใช้วาง/ดำเนินการ <span class="text-danger">*</span></label>
                                                    <input placeholder="" name="typeExecution" type="text" id="validationFormik17" class="form-control" value="" required>
                                                    <div class="invalid-feedback">กรุณากรอกข้อมูล</div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="validationFormik18">ขนาดพื้นที่จัดวาง/ดำเนินการ <span class="text-danger">*</span></label>
                                                    <input placeholder="" name="sizeExecution" type="text" id="validationFormik18" class="form-control" value="" required>
                                                    <div class="invalid-feedback">กรุณากรอกข้อมูล</div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="validationFormik19">งบประมาณ (บาท) <span class="text-danger">*</span></label>
                                                    <input placeholder="" name="budget" type="text" id="validationFormik19" class="form-control" value="0" required>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="validationFormik20">ลักษณะพื้นทะเล <span class="text-danger">*</span></label>
                                                    <input placeholder="" name="seaFloorFeatures" type="text" id="validationFormik20" class="form-control" value="" required>
                                                    <div class="invalid-feedback">กรุณากรอกข้อมูล</div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="validationFormik21">ระดับความลึกของนํ้า <span class="text-danger">*</span></label>
                                                    <input placeholder="" name="waterDepth" type="text" id="validationFormik21" class="form-control" value="" required>
                                                    <div class="invalid-feedback">กรุณากรอกข้อมูล</div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="validationFormik22">ระดับความลึกของนํ้า <span class="text-danger">*</span></label>
                                                    <input placeholder="" name="coastDistance" type="text" id="validationFormik22" class="form-control" value="" required>
                                                    <div class="invalid-feedback">กรุณากรอกข้อมูล</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group input-file col-12">
                                                    <div class="form-label">ผังการจัดวาง </div>
                                                    <div class="align-items-center row">
                                                        <div class="col-sm-auto form-form-att">
                                                            <input placeholder="" name="inputFileUpload-0" type="file" id="inputFileUpload-0" data-class="0" class="form-control" hidden="" onchange="ajaxFileUploadDoc({$myid},0,this)">
                                                            <label class="btn btn-secondary form-label" for="inputFileUpload-0" style="cursor:pointer"><span class="material-symbols-rounded">upload</span>เลือกไฟล์</label>
                                                        </div>
                                                        <div class="col" id="boxFileNew-0"><span class="input-group-text"></span></div>
                                                    </div>
                                                    <div class="align-items-center row">
                                                        <div class="col">
                                                            <span class="input-group-text">* หมายเหตุ : กรุณาเลือกอัพโหลดไฟล์ที่มีขนาดเหมาะสมไม่ใหญ่เกินไป เนื่องจากหากไฟล์ขนาดใหญ่จะส่งผลให้เกินความล่าช้าในการอัพโหลดไฟล์</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group input-file col-12">
                                                    <div class="form-label">แผนที่พื้นที่วาง </div>
                                                    <div class="align-items-center row">
                                                        <div class="col-sm-auto">
                                                            <input placeholder="" name="inputFileUpload-1" type="file" id="inputFileUpload-1" data-class="1" class="form-control" hidden="" onchange="ajaxFileUploadDoc({$myid},1,this)">
                                                            <label class="btn btn-secondary form-label" for="inputFileUpload-1" style="cursor:pointer"><span class="material-symbols-rounded">upload</span>เลือกไฟล์</label>
                                                        </div>
                                                        <div class="col" id="boxFileNew-1"><span class="input-group-text"></span></div>
                                                    </div>
                                                    <div class="align-items-center row">
                                                        <div class="col">
                                                            <span class="input-group-text">* หมายเหตุ : กรุณาเลือกอัพโหลดไฟล์ที่มีขนาดเหมาะสมไม่ใหญ่เกินไป เนื่องจากหากไฟล์ขนาดใหญ่จะส่งผลให้เกินความล่าช้าในการอัพโหลดไฟล์</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="form-label" for="validationFormik25">รายละเอียดอื่น ๆ </label>
                                                    <input placeholder="" name="details" type="text" id="validationFormik25" class="form-control">
                                                    <div class="invalid-feedback">กรุณากรอกข้อมูล</div>
                                                </div>
                                                <div class="form-group input-file col-12">
                                                    <div class="form-label">แนบไฟล์ </div>
                                                    <div class="align-items-center row">
                                                        <div class="col-sm-auto">
                                                            <input placeholder="" name="inputFileUpload-2" type="file" id="inputFileUpload-2" data-class="2" class="form-control" hidden="" onchange="ajaxFileUploadDoc({$myid},2,this)">
                                                            <label class="btn btn-secondary form-label" for="inputFileUpload-2" style="cursor:pointer"><span class="material-symbols-rounded">upload</span>เลือกไฟล์</label>
                                                        </div>
                                                        <div class="col" id="boxFileNew-2"><span class="input-group-text"></span></div>
                                                    </div>
                                                    <div class="align-items-center row">
                                                        <div class="col">
                                                            <span class="input-group-text">* หมายเหตุ : กรุณาเลือกอัพโหลดไฟล์ที่มีขนาดเหมาะสมไม่ใหญ่เกินไป เนื่องจากหากไฟล์ขนาดใหญ่จะส่งผลให้เกินความล่าช้าในการอัพโหลดไฟล์</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="form-action justify-content-center row">
                                                <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                                                <div class="mb-md-4 mb-3 col-md-auto col-sm-6"><button type="submit" class="btn btn-secondary">ตกลง</button></div>
                                                <div class="mb-md-4 mb-3 col-md-auto col-sm-6"><button type="button" class="btn btn-gray">ยกเลิก</button></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-step-ii" id="step-ii" style="display: none;">
                            <div class="form-offer-demand">
                                <div class="default-card overflow-hidden card">
                                    <div class="form-head">ส่งความต้องการ</div>
                                    <div class="card-body" style="text-align:center">
                                        <div class="status status-success">
                                            <div role="alert" class="fade alert alert-light show">
                                                <div class="icon"><span class="material-symbols-rounded">check_circle</span></div>
                                                <div class="alert-heading h4">ยืนยันการเสนอความต้องการ</div>
                                                <p>ขอบพระคุณที่ใช้บริการ</p>
                                            </div>
                                            <div class="action"><a class="btn btn-secondary" href="{$ul}/home">กลับสู่หน้าหลัก</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="graphic graphic-inner-page-bottom">
                <div class="bg" style="z-index:0">
                    <img alt="" data-src="{$template}/assets/img/background/bg-inner-page-bottom.png" class="lazy">
                </div>
            </div>
        </div>
    </div>
</div>