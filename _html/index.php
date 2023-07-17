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

            <div class="section section-i" style="overflow:hidden">
                <div class="container-lg">
                    <div class="wg-overview">
                        <div class="ov-list">
                            <div class="row">
                                <div class="ov-item theme-purple col-sm-4">
                                    <div class="thumbnail">
                                        <div class="hexagon-wrapper">
                                            <div class="hexagon-inner">
                                                <div class="icon-wrapper hexagon">
                                                    <div class="icon">
                                                        <img alt="ปะการังเทียม" src="<?php echo $core_template; ?>assets/img/icon/artificial-coral.svg" loading="lazy">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hexagon-outer"></div>
                                        </div>
                                    </div>
                                    <div class="inner">
                                        <h2 class="title">ปะการังเทียม</h2>
                                        <div class="shadow-inset p-3 rounded">
                                            <div class="amount">456</div>
                                        </div>
                                        <div class="measure">จุด</div>
                                    </div>
                                </div>
                                <div class="ov-item theme-orange col-sm-4">
                                    <div class="thumbnail">
                                        <div class="hexagon-wrapper">
                                            <div class="hexagon-inner">
                                                <div class="icon-wrapper hexagon">
                                                    <div class="icon">
                                                        <img alt="ทุ่นในทะเล" src="<?php echo $core_template; ?>assets/img/icon/buoy.svg" loading="lazy">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hexagon-outer"></div>
                                        </div>
                                    </div>
                                    <div class="inner">
                                        <h2 class="title">ทุ่นในทะเล</h2>
                                        <div class="shadow-inset p-3 rounded">
                                            <div class="amount">459</div>
                                        </div>
                                        <div class="measure">จุด</div>
                                    </div>
                                </div>
                                <div class="ov-item theme-blue col-sm-4">
                                    <div class="thumbnail">
                                        <div class="hexagon-wrapper">
                                            <div class="hexagon-inner">
                                                <div class="icon-wrapper hexagon">
                                                    <div class="icon">
                                                        <img alt="จุดวางเรือ" src="<?php echo $core_template; ?>assets/img/icon/boat.svg" loading="lazy">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hexagon-outer"></div>
                                        </div>
                                    </div>
                                    <div class="inner">
                                        <h2 class="title">จุดวางเรือ</h2>
                                        <div class="shadow-inset p-3 rounded">
                                            <div class="amount">420</div>
                                        </div>
                                        <div class="measure">จุด</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="graphic">
                        <div class="object-i" style="z-index:3"></div>
                        <div class="object-ii" style="z-index:2"></div>
                        <div class="wave-i" style="z-index:-1">
                            <svg data-name="wave-i" xmlns="http://www.w3.org/2000/svg" width="1771.15" height="563.473" viewBox="0 0 1771.15 563.473">
                                <path d="M0,634.874S81.364,614.5,244.455,642.71c170.224,29.447,260.251-56.424,405.127-57.992,149.091-1.612,333.707,65.437,445.29,48.588,83.28-12.575,164.56-55.5,282.323-53.877,112.636,1.554,190.783,61.888,276.082,69.937,49.882,4.707,117.872-20.762,117.872-20.762v514.253H0Z" transform="translate(0 -579.384)" fill="#e8f4ff"></path>
                            </svg>
                        </div>
                        <div class="wave-ii" style="z-index:2">
                            <svg data-name="wave-ii" xmlns="http://www.w3.org/2000/svg" width="2142.258" height="386.187" viewBox="0 0 2142.258 386.187">
                                <path d="M17859.258,16026.653s-204.309-54.487-413.18,0-520.367,44-726.822,0-546.377-70.835-706.205,16.346-296.051-41.773-296.051-41.773v370.517h2142.258Z" transform="translate(-15717 -15985.556)" fill="#c6e5ff"></path>
                            </svg>
                        </div>
                        <div class="wave-iii" style="z-index:2">
                            <svg data-name="wave-iii" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                            </svg>
                        </div>
                        <div class="wave-iv" style="z-index:4">
                            <svg data-name="wave-iv" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <?php include('inc/footer.php'); ?>
    </div>

    <?php include('inc/loadscript.php'); ?>

    <script>
        // swal("Hello world!");
    </script>

</body>

</html>