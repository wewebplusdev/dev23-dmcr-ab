<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('inc/metatag.php'); ?>
    <?php include('inc/loadstyle.php'); ?>
</head>

<body>
    <div class="global-container">
        <?php include('inc/header.php'); ?>
        <section class="layout-container">
            <?php include('inc/components/herobanner.php'); ?>
            <div class="default-head">
                <div class="container-lg">
                    <div class="breadcrumb-block">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item breadcrumb-home"><a href="/">หน้าหลัก</a></li>
                                <li class="breadcrumb-item active" aria-current="page">เสนอความต้องการ</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="default-body">
                <div class="container-lg">
                    <div class="justify-content-center row">
                        <div class="col-lg-5 col-md-8 col-sm-10 col-11">
                            <div class="step-progress -step-progress-i">
                                <div class="progress">
                                    <div role="progressbar" class="progress-bar" style="width:2%" aria-valuemin="0" aria-valuemax="100"></div>
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
                        <div class="col">
                            <div class="content-step-i">
                                <div class="form-offer-demand">
                                    <div class="default-card overflow-hidden card">
                                        <div class="form-head">เสนอความต้องการ</div>
                                        <div class="card-body">
                                            <form class="form-default needs-validation" novalidate="">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label class="form-label" for="validationFormik01">ชื่อผู้เสนอความต้องการ <span class="text-danger">*</span></label>
                                                        <input name="name" type="text" id="validationFormik01" class="form-control" value="" required>
                                                        <div class="invalid-feedback">กรุณากรอกข้อมูล-ชื่อ</div>
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="validationFormik02">จังหวัด <span class="text-danger">*</span></label>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="validationFormik03">อำเภอ <span class="text-danger">*</span></label>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="validationFormik04">ตำบล <span class="text-danger">*</span></label>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="validationFormik05">รหัสไปรษณีย์ <span class="text-danger">*</span></label>
                                                        <input placeholder="" name="zip" type="text" id="validationFormik05" class="form-control" value="">
                                                        <div class="invalid-feedback">กรุณากรอกข้อมูล<!-- -->รหัสไปรษณีย์</div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="validationFormik06">เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                                                        <input placeholder="" name="telephone" type="text" id="validationFormik06" class="form-control" value="">
                                                        <div class="invalid-feedback">กรุณากรอกข้อมูล<!-- -->เบอร์โทรศัพท์</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-subtitle">กลุ่มผู้สนับสนุน</div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="validationFormik07">ชื่อผู้สนับสนุน <span class="text-danger">*</span></label>
                                                        <input name="sponsorName" type="text" id="validationFormik07" class="form-control" value="test">
                                                        <div class="invalid-feedback">กรุณากรอกข้อมูล<!-- -->ชื่อ</div>
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="validationFormik08">งบประมาณ (บาท) <span class="text-danger">*</span></label>
                                                        <input placeholder="" name="sponsorAmount" type="number" id="validationFormik08" class="form-control" value="0">
                                                        <div class="invalid-feedback">กรุณากรอกข้อมูล</div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="validationFormik09">จังหวัด <span class="text-danger">*</span></label>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="validationFormik10">อำเภอ <span class="text-danger">*</span></label>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="validationFormik11">ตำบล <span class="text-danger">*</span></label>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="validationFormik12">รหัสไปรษณีย์ <span class="text-danger">*</span></label>
                                                        <input placeholder="" name="sponsorZip" type="text" id="validationFormik12" class="form-control" value="">
                                                        <div class="invalid-feedback">กรุณากรอกข้อมูล<!-- -->รหัสไปรษณีย์</div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="validationFormik13">เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                                                        <input placeholder="" name="sponsorTelephone" type="text" id="validationFormik13" class="form-control" value="">
                                                        <div class="invalid-feedback">กรุณากรอกข้อมูล<!-- -->เบอร์โทรศัพท์</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-subtitle">ข้อมูลเสนอความต้องการ</div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="validationFormik14">หน่วยงานดำเนินการ <span class="text-danger">*</span></label>
                                                        <input name="agency" type="text" id="validationFormik14" class="form-control" value="">
                                                        <div class="invalid-feedback">กรุณากรอกข้อมูล<!-- -->หน่วยงานดำเนินการ</div>
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="validationFormik15">ประเภทการเสนอความต้องการ <span class="text-danger">*</span></label>
                                                        <div class="invalid-feedback">กรุณากรอกข้อมูล<!-- -->ประเภทการเสนอความต้องการ</div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label class="form-label" for="validationFormik16">สถานที่วาง/ดำเนินการ <span class="text-danger">*</span></label>
                                                        <input placeholder="" name="locationExecution" type="text" id="validationFormik16" class="form-control" value="">
                                                        <div class="invalid-feedback">กรุณากรอกข้อมูล<!-- -->สถานที่วาง/ดำเนินการ</div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label class="form-label" for="validationFormik17">ชนิดขนาด และจำนวนวัสดุที่ใช้วาง/ดำเนินการ <span class="text-danger">*</span></label>
                                                        <input placeholder="" name="typeExecution" type="text" id="validationFormik17" class="form-control" value="">
                                                        <div class="invalid-feedback">กรุณากรอกข้อมูล</div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="validationFormik18">ขนาดพื้นที่จัดวาง/ดำเนินการ <span class="text-danger">*</span></label>
                                                        <input placeholder="" name="sizeExecution" type="text" id="validationFormik18" class="form-control" value="">
                                                        <div class="invalid-feedback">กรุณากรอกข้อมูล</div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="validationFormik19">งบประมาณ (บาท) <span class="text-danger">*</span></label>
                                                        <input placeholder="" name="budget" type="text" id="validationFormik19" class="form-control" value="10">
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="validationFormik20">ลักษณะพื้นทะเล <span class="text-danger">*</span></label>
                                                        <input placeholder="" name="seaFloorFeatures" type="text" id="validationFormik20" class="form-control" value="">
                                                        <div class="invalid-feedback">กรุณากรอกข้อมูล</div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="validationFormik21">ระดับความลึกของนํ้า <span class="text-danger">*</span></label>
                                                        <input placeholder="" name="waterDepth" type="text" id="validationFormik21" class="form-control" value="">
                                                        <div class="invalid-feedback">กรุณากรอกข้อมูล</div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="validationFormik22">ระดับความลึกของนํ้า <span class="text-danger">*</span></label>
                                                        <input placeholder="" name="coastDistance" type="text" id="validationFormik22" class="form-control" value="">
                                                        <div class="invalid-feedback">กรุณากรอกข้อมูล</div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group input-file col-12">
                                                        <div class="form-label">ผังการจัดวาง <span class="text-danger">*</span></div>
                                                        <div class="align-items-center row">
                                                            <div class="col-sm-auto">
                                                                <input placeholder="" name="layout" type="file" id="validationFormik23" class="form-control" hidden="">
                                                                <label class="btn btn-secondary form-label" for="validationFormik23" style="cursor:pointer"><span class="material-symbols-rounded">upload</span>เลือกไฟล์</label>
                                                            </div>
                                                            <div class="col">
                                                                <span class="input-group-text">* หมายเหตุ : กรุณาเลือกอัพโหลดไฟล์ที่มีขนาดเหมาะสมไม่ใหญ่เกินไป เนื่องจากหากไฟล์ขนาดใหญ่จะส่งผลให้เกินความล่าช้าในการอัพโหลดไฟล์</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group input-file col-12">
                                                        <div class="form-label">แผนที่พื้นที่วาง <span class="text-danger">*</span></div>
                                                        <div class="align-items-center row">
                                                            <div class="col-sm-auto">
                                                                <input placeholder="" name="placementAreaMap" type="file" id="validationFormik24" class="form-control" hidden="">
                                                                <label class="btn btn-secondary form-label" for="validationFormik24" style="cursor:pointer"><span class="material-symbols-rounded">upload</span>เลือกไฟล์</label>
                                                            </div>
                                                            <div class="col">
                                                                <span class="input-group-text">* หมายเหตุ : กรุณาเลือกอัพโหลดไฟล์ที่มีขนาดเหมาะสมไม่ใหญ่เกินไป เนื่องจากหากไฟล์ขนาดใหญ่จะส่งผลให้เกินความล่าช้าในการอัพโหลดไฟล์</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label class="form-label" for="validationFormik25">รายละเอียดอื่น ๆ <span class="text-danger">*</span></label>
                                                        <input placeholder="" name="details" type="text" id="validationFormik25" class="form-control">
                                                        <div class="invalid-feedback">กรุณากรอกข้อมูล</div>
                                                    </div>
                                                    <div class="form-group input-file col-12">
                                                        <div class="form-label">แนบไฟล์ <span class="text-danger">*</span></div>
                                                        <div class="align-items-center row">
                                                            <div class="col-sm-auto">
                                                                <input placeholder="" name="attachment" type="file" id="validationFormik26" class="form-control" hidden="">
                                                                <label class="btn btn-secondary form-label" for="validationFormik26" style="cursor:pointer"><span class="material-symbols-rounded">upload</span>เลือกไฟล์</label>
                                                            </div>
                                                            <div class="col">
                                                                <span class="input-group-text">* หมายเหตุ : กรุณาเลือกอัพโหลดไฟล์ที่มีขนาดเหมาะสมไม่ใหญ่เกินไป เนื่องจากหากไฟล์ขนาดใหญ่จะส่งผลให้เกินความล่าช้าในการอัพโหลดไฟล์</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-8">
                                                        <label class="form-label" for="validationFormik25">รหัสยืนยัน <span class="text-danger">*</span></label>
                                                        <div class="align-items-center row">
                                                            <div class="col">
                                                                <input placeholder="captcha จ้าาาาา" name="details" type="text" id="validationFormik25" class="form-control">
                                                            </div>
                                                            <div class="col-sm-auto">
                                                                <div class="captcha d-flex gap-3">
                                                                    <div class="captcha-content">
                                                                        <img alt="" src="/_next/static/media/captcha.1e04ebdd.png" decoding="async" data-nimg="1" loading="lazy" style="color:transparent" width="94" height="41">
                                                                    </div>
                                                                    <div class="captcha-reload">
                                                                        <a href="/offer-demand"><span class="material-symbols-rounded">autorenew</span></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="invalid-feedback">กรุณากรอกข้อมูล</div>
                                                    </div>
                                                </div>
                                                <div class="form-action justify-content-center row">
                                                    <div class="mb-md-4 mb-3 col-md-auto col-sm-6"><button type="submit" class="btn btn-secondary">ตกลง</button></div>
                                                    <div class="mb-md-4 mb-3 col-md-auto col-sm-6"><button type="button" class="btn btn-gray">ยกเลิก</button></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="content-step-ii">
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
                                                <div class="action"><a class="btn btn-secondary" href="/">กลับสู่หน้าหลัก</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include('inc/footer.php'); ?>
    </div>
    <?php include('inc/loadscript.php'); ?>
</body>

</html>