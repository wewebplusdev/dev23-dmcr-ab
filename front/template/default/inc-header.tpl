<header class="layout-header">
	<div class="top-bar">
		<div class="container-lg">
			<div class="row justify-content-end align-items-center no-gutters">
				<div class="col-auto">
					<div class="nav-size" data-aos="fade-left">
						<div class="row align-items-center no-gutters">
							<div class="col-auto"><label class="control-label">ขนาด</label></div>
							<div class="col">
								<div class="hstack">
									<a id="theme-style-1" title="ขนาดอักษรเล็ก" class="nav-size-small fzSmall" target="_self" href="javascript:void(0);">ก</a>
									<a id="theme-style-2" title="ขนาดอักษรกลาง" class="nav-size-medium fzMedium active" target="_self" href="javascript:void(0);">ก</a>
									<a id="theme-style-3" title="ขนาดอักษรใหญ่" class="nav-size-large fzLarge" target="_self" href="javascript:void(0);">ก</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-auto">
					<div class="nav-lang" data-aos="fade-left">
						<div class="row align-items-center no-gutters">
							<div class="col">
								<div class="hstack">
									<a title="TH" class="nav-lang-th {if $langon eq 'th'}active{/if}" target="_self" href="{$ul}/lang/th">TH</a>
									<a title="EN" class="nav-lang-en {if $langon eq 'en'}active{/if}" target="_self" href="{$ul}/lang/en">EN</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="middle-bar">
		<div class="container-lg">
			<div class="row align-items-end no-gutters overflow-hidden">
				<div class="col">
					<h1 class="title">ฐานข้อมูลปะการังเทียมและทุ่นในทะเล</h1>
					<p class="subtitle">กรมทรัพยากรทางทะเลและชายฝั่ง</p>
				</div>
				<div class="col-auto">
					<div class="action position-relative">
						<div class="hstack gap-3">
							<a class="btn btn-outline-light btn-dmcr" target="_blank" href="https://www.dmcr.go.th">เข้าสู่เว็บ ทช.</a>
							<button type="button" class="btn btn-outline-light btn-search">
								<span class="fa-solid fa-magnifying-glass"></span>
							</button>
						</div>
						<div class="d-lg-block d-none">
							{include file="inc-search.tpl" title=title}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-light">
		<div class="container-lg">
			<a href="/" class="navbar-brand">
				<img alt="DMCR logo" src="{$template}/assets/img/static/logo.png" decoding="async" data-nimg="fill" class="d-inline-block align-top" style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent">
			</a>
			<button type="button" class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#basic-navbar-nav" aria-controls="basic-navbar-nav" aria-label="Toggle navigation">
				<div>
					<span class="bar active"></span>
					<span class="bar active"></span>
					<span class="bar active"></span>
					<span class="bar active"></span>
				</div>
			</button>
			<div class="navbar-collapse collapse" id="basic-navbar-nav">
				<div class="me-auto navbar-nav">
					<div class="d-lg-none d-block navbar-nav">
						{include file="inc-search.tpl" title=title}
					</div>
					<a href="{$ul}/home" title="หน้าหลัก" data-rr-ui-event-key="/" class="{if $menuactive eq 'home'}active{/if} nav-link">หน้าหลัก</a>
					<a href="{$ul}/about" title="เกี่ยวกับเรา" data-rr-ui-event-key="/about" class="{if $menuactive eq 'about'}active{/if} nav-link">เกี่ยวกับเรา</a>
					<a href="{$ul}/activity" title="กิจกรรมที่เกี่ยวข้อง" data-rr-ui-event-key="/activity" class="{if $menuactive eq 'activity'}active{/if} nav-link">กิจกรรมที่เกี่ยวข้อง</a>
					<a href="{$ul}/follow" title="การติดตามการใช้ประโยชน์" data-rr-ui-event-key="/follow" class="{if $menuactive eq 'follow'}active{/if} nav-link">การติดตามการใช้ประโยชน์</a>
					<a href="{$ul}/report" title="รายงานสรุป" data-rr-ui-event-key="/report" class="{if $menuactive eq 'report'}active{/if} nav-link">รายงานสรุป</a>
				</div>
			</div>
		</div>
	</nav>
</header>