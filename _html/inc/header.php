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
									<a id="theme-style-1" title="ขนาดอักษรเล็ก" class="nav-size-small fzSmall" target="_self" href="/">ก</a>
									<a id="theme-style-2" title="ขนาดอักษรกลาง" class="nav-size-medium fzMedium active" target="_self" href="/">ก</a>
									<a id="theme-style-3" title="ขนาดอักษรใหญ่" class="nav-size-large fzLarge" target="_self" href="/">ก</a>
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
									<a title="TH" class="nav-lang-th active" target="_self" href="/">TH</a>
									<a title="EN" class="nav-lang-en" target="_self" href="/">EN</a>
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
								<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="magnifying-glass" class="svg-inline--fa fa-magnifying-glass " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
									<path fill="currentColor" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"></path>
								</svg>
							</button>
						</div>
						<div class="search-input position-absolute hide">
							<form action="/search" class="form-default">
								<div class="input-group">
									<label class="floating-label form-label">
										<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="magnifying-glass" class="svg-inline--fa fa-magnifying-glass fa-lg " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
											<path fill="currentColor" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"></path>
										</svg>
									</label>
									<input placeholder="ค้นหา" aria-label="ค้นหา" aria-describedby="ค้นหา" type="text" class="form-control"><button type="button" class="btn-close" aria-label="Close"></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-light">
		<div class="container-lg">
			<a href="/" class="navbar-brand">
				<img alt="DMCR logo" src="<?php echo $core_template; ?>assets/img/static/logo.png" decoding="async" data-nimg="fill" class="d-inline-block align-top" style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent">
			</a>
			<button aria-controls="basic-navbar-nav" type="button" aria-label="Toggle navigation" class="navbar-toggler collapsed">
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
						<div class="search-input">
							<form action="/search" class="form-default">
								<div class="input-group">
									<label class="floating-label form-label"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="magnifying-glass" class="svg-inline--fa fa-magnifying-glass fa-lg " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
											<path fill="currentColor" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"></path>
										</svg>
									</label>
									<input placeholder="ค้นหา" aria-label="ค้นหา" aria-describedby="ค้นหา" type="text" class="form-control"><button type="button" class="btn-close" aria-label="Close"></button>
								</div>
							</form>
						</div>
					</div><a href="/" title="หน้าหลัก" data-rr-ui-event-key="/" class="active nav-link">หน้าหลัก</a><a href="/about" title="เกี่ยวกับเรา" data-rr-ui-event-key="/about" class="nav-link">เกี่ยวกับเรา</a><a href="/activity" title="กิจกรรมที่เกี่ยวข้อง" data-rr-ui-event-key="/activity" class="nav-link">กิจกรรมที่เกี่ยวข้อง</a><a href="/follow" title="การติดตามการใช้ประโยชน์" data-rr-ui-event-key="/follow" class="nav-link">การติดตามการใช้ประโยชน์</a><a href="/report" title="รายงานสรุป" data-rr-ui-event-key="/report" class="nav-link">รายงานสรุป</a>
				</div>
			</div>
		</div>
	</nav>
</header>