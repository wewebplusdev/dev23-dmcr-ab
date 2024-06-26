<div class="hero-banner test" data-aos="fade-up">
    <div class="hero-banner-swiper swiper">
        <div class="swiper-wrapper">
            {if $callTGP->_numOfRows >0}
            {foreach $callTGP as $keyTGP => $valueTGP}
            <div class="swiper-slide">
                <figure class="cover">
                    <img
                    alt="{$valueTGP.2}" 
                    src="{$valueTGP.4|fileinclude:"office":{$valueTGP.1}:"link"}" 
                    data-src="{$valueTGP.4|fileinclude:"pictures":{$valueTGP.1}:"link"}" class="img-cover lazy">
                </figure>
                <div class="hero-banner-content">
                    <div class="wrapper">
                        <div class="container-lg">
                            <h2 class="title">ฐานข้อมูลปะการังเทียมและทุ่นในทะเล</h2>
                            <p class="desc">กรมทรัพยากรทางทะเลและชายฝั่ง</p>
                        </div>
                    </div>
                </div>
            </div>
            {/foreach}
            {else}
            <div class="swiper-slide">
                <figure class="cover">
                    <img alt="boats harbour lerici liguria italy"
                        src="{$template}/assets/img/upload/boats-harbour-lerici-liguria-italy-lowQuality.png"
                        data-src="{$template}/assets/img/upload/boats-harbour-lerici-liguria-italy.png" class="lazy">
                </figure>
                <div class="hero-banner-content">
                    <div class="wrapper">
                        <div class="container-lg">
                            <h2 class="title">ฐานข้อมูลปะการังเทียมและทุ่นในทะเล</h2>
                            <p class="desc">กรมทรัพยากรทางทะเลและชายฝั่ง</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <figure class="cover">
                    <img alt="boats harbour lerici liguria italy"
                        src="{$template}/assets/img/upload/boats-harbour-lerici-liguria-italy-lowQuality.png"
                        data-src="{$template}/assets/img/upload/boats-harbour-lerici-liguria-italy.png" class="lazy">
                </figure>
                <div class="hero-banner-content">
                    <div class="wrapper">
                        <div class="container-lg">
                            <h2 class="title">ฐานข้อมูลปะการังเทียมและทุ่นในทะเล</h2>
                            <p class="desc">กรมทรัพยากรทางทะเลและชายฝั่ง</p>
                        </div>
                    </div>
                </div>
            </div>
            {/if}
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <div class="custom-shape-divider-bottom-1684911385">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0V7.23C0,65.52,268.63,112.77,600,112.77S1200,65.52,1200,7.23V0Z" class="shape-fill"></path>
        </svg>
    </div>
</div>