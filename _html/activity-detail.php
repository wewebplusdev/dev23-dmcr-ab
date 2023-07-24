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

            <div class="default-page news-page" style="position:relative;z-index:1;overflow:hidden">
                <div class="default-head" data-aos="fade-up">
                    <div class="container-lg">
                        <div class="breadcrumb-block">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item breadcrumb-home"><a href="/">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item"><a href="#" role="button" tabindex="0">กิจกรรมที่เกี่ยวข้อง</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">ศูนย์รวบรวมข้อมูลปะการังเทียมจากหน่วยงานที่เกี่ยวข้อง</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="default-body">
                    <div class="container-lg">
                        <div class="body-content">
                            <div class="detail-head">
                                <div class="align-items-center row">
                                    <div class="col">
                                        <div class="whead mb-0">
                                            <h2 class="title">ศูนย์รวบรวมข้อมูลปะการังเทียมจากหน่วยงานที่เกี่ยวข้อง</h2>
                                        </div>
                                    </div>
                                    <div class="col-md-auto">
                                        <div class="hstack gap-4">
                                            <div class="province">จังหวัด <span class="text-primary">ชุมพร</span></div>
                                            <div class="year">ปี <span class="text-primary">2564</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="align-items-center justify-content-between row">
                                    <div class="col-sm-auto">
                                        <div class="hstack gap-4">
                                            <div class="date" style="display: flex; align-items: center; gap: 0.5rem;">
                                                <div class="icon">
                                                    <img alt="facebook icon" src="<?php echo $core_template; ?>assets/img/icon/icon-calendar.svg" class="lazy" style="color: transparent;" width="20" height="20">
                                                </div>
                                                23 มิถุนายน 2560
                                            </div>
                                            <div class="view" style="display: flex; align-items: center; gap: 0.5rem;">
                                                <div class="icon">
                                                    <img alt="facebook icon" src="<?php echo $core_template; ?>assets/img/icon/icon-eye.svg" class="lazy" style="color: transparent;" width="20" height="20">
                                                </div>
                                                10 ครั้ง
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto">
                                        <div class="share-block">
                                            <div class="hstack gap-2">
                                                <a class="link print" title="Print" href="/activity/detail">
                                                    <div class="icon rounded-circle">
                                                        <img alt="print icon" src="<?php echo $core_template; ?>assets/img/icon/icon-fax-primary.svg" class="lazy" style="color: transparent;" width="20" height="20">
                                                    </div>
                                                </a>
                                                <a class="link fb" title="Facebook" target="_blank" href="https://www.facebook.com/DMCRTH">
                                                    <div class="icon rounded-circle">
                                                        <img alt="facebook icon" src="<?php echo $core_template; ?>assets/img/icon/icons-facebook.svg" class="lazy" style="color: transparent;" width="20" height="20">
                                                    </div>
                                                </a>
                                                <a class="link tw" title="Twitter" target="_blank" href="https://twitter.com/dmcrth">
                                                    <div class="icon rounded-circle">
                                                        <img alt="twitter icon" src="<?php echo $core_template; ?>assets/img/icon/icons-twitter.svg" class="lazy" style="color: transparent;" width="20" height="20">
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="editor-content">
                                <p>This is Editor Content</p>
                                <p>Commodo adipisicing anim non minim fugiat amet laborum minim aute. Anim irure quis Lorem fugiat veniam deserunt anim nostrud irure Lorem ipsum duis fugiat do. Officia ea deserunt dolor ad mollit aliqua cillum do velit. Anim minim dolore ut occaecat magna cupidatat amet incididunt consectetur laboris.</p>
                            </div>
                            <div class="gallery-list" data-aos="fade-up" id="trigger-video-player">
                                <div class="whead" data-aos="fade-left">
                                    <div class="subtitle">รูปประกอบ</div>
                                </div>
                                <div>
                                    <div class="swiper gallery-swiper default-swiper" data-aos="fade-up">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <a data-fancybox="gallery" href="https://lipsum.app/id/60/1600x1200">
                                                    <div class="ratio thumbnail ratio-1x1">
                                                        <img alt="Description of image is here image1" src="https://lipsum.app/id/60/1600x1200" class="rounded lazy">
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="video-player" data-aos="fade-up" data-aos-anchor="#trigger-video-player" data-aos-anchor-placement="top-top" id="trigger-attach">
                                <div class="ratio ratio-16x9">
                                    <video>
                                        <source src="<?php echo $core_template; ?>assets/video/istockphoto-1305339327-640_adpp_is.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="video-control">
                                    <button class="btn btn-play">
                                        <span class="fa-solid fa-play fa-6x"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="attachment-list" data-aos="fade-up" data-aos-anchor="#trigger-attach" data-aos-anchor-placement="top-bottom" id="trigger-action">
                                <div class="whead">
                                    <div class="subtitle">เอกสารแนบ</div>
                                </div>
                                <div class="swiper attach-swiper default-swiper">
                                    <div class="swiper-wrapper">
                                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                                            <div class="swiper-slide">
                                                <a title="โครงการจุดวางเรือ" class="link attach-item" target="_blank" href="https://lipsum.app/id/60/1600x1200">
                                                    <div class="default-card card">
                                                        <div class="card-body">
                                                            <div class="theme-blue">
                                                                <div class="align-items-xxl-center gutters-15 row">
                                                                    <div class="col-sm-auto">
                                                                        <div class="hexagon-wrapper">
                                                                            <div class="hexagon-inner">
                                                                                <div class="icon-wrapper hexagon">
                                                                                    <div class="icon">
                                                                                        <img alt="" data-src="<?php echo $core_template; ?>assets/img/icon/icon-attachment.svg" class="lazy" style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="hexagon-outer"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="inner">
                                                                            <div class="title text-limit"><span class="text-primary fw-bold">โครงการจุดวางเรือ.pdf
                                                                                </span>
                                                                            </div>
                                                                            <div class="desc hstack gap-3">
                                                                                <div class="type">
                                                                                    ประเภทไฟล์ : <span class="text-primary">.pdf</span>
                                                                                </div>
                                                                                <div class="type">
                                                                                    ขนาด : <span class="text-primary">0.06 mb</span>
                                                                                </div>
                                                                                <div class="download">
                                                                                    จำนวนดาวน์โหลด : <span class="text-primary">65</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xxl-auto">
                                                                        <div class="action">
                                                                            <button type="button" class="btn btn-outline-primary">ดาวน์โหลด</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                            <div class="action -back-2-prevoius" style="border-top:1px solid #fff">
                                <div class="row justify-content-end">
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-gray-light">
                                            <span class="fa-solid fa-chevron-left"></span>กลับ
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="graphic graphic-inner-page-bottom">
                            <div class="bg" style="z-index:0">
                                <img alt="" data-src="<?php echo $core_template; ?>assets/img/background/bg-inner-page-bottom.png" class="lazy">
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