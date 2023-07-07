<header class="layout-header">
	<div class="container">
		<div class="row gutters-20 align-items-center">
			<div class="col-xl-auto col">
				<div class="logo">
					<a href="{$ul}/home" class="link">
						<img src="{$template}/assets/img/upload/logo.png" alt="">
					</a>
				</div>
			</div>
			<div class="col d-none d-xl-block">
				<div class="menu">
					<ul class="nav-list">
						<li>
							<a href="{$ul}/products" class="link {if $segment eq "products"}active{/if}">
								{$lang["menu:product"]} 		
							</a>
						</li>
						<li>
							<a href="{$ul}/company" class="link {if $segment eq "company"}active{/if}">
								{$lang["menu:company"]}	
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-auto">
				<div class="tool">
					<div class="row no-gutters align-items-center justify-content-end">
						<div class="col-auto d-none d-lg-block">
							<a href="{$ul}/contactus" class="link {if $segment eq "contactus"}active{/if}">
								{$lang["menu:contact"]}
							</a>
						</div>
						<div class="col-auto">
							<div class="lang">
								<span class="feather icon-globe"></span>
								<a href="{$ul}/lang/th" class="link {if $langon eq "th"}active{/if}">
									TH
								</a>
								<a href="{$ul}/lang/en" class="link {if $langon eq "en"}active{/if}">
									EN
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="menu-mobile-btn">
					<a href="javascript:void(0);" class="btn-mobile" data-toggle="menu-mobile">
						<span class="bar active"></span>
						<span class="bar active"></span>
						<span class="bar active"></span>
						<span class="bar active"></span>
					</a>
				</div>
				<div class="menu-sm">
					<ul class="nav-list">
						<li>
							<a href="{$ul}/home" class="link {if $segment eq "home"}active{/if}">
								{$lang["menu:home"]}		
							</a>
						</li>
						<li class="d-xl-none">
							<a href="{$ul}/products" class="link {if $segment eq "products"}active{/if}">
								{$lang["menu:product"]}
							</a>
						</li>
						<li class="d-xl-none">
							<a href="{$ul}/company" class="link {if $segment eq "company"}active{/if}">
								{$lang["menu:company"]}	
							</a>
						</li>
						<li>
							<a href="{$ul}/about" class="link {if $segment eq "about"}active{/if}">
								{$lang["menu:about"]}		
							</a>
						</li>
						<li>
							<a href="{$ul}/news" class="link {if $segment eq "news"}active{/if}">
								{$lang["menu:news"]}
							</a>
						</li>
						<!-- <li>
							<a href="{$ul}/career" class="link {if $segment eq "career"}active{/if}">
								{$lang["menu:career"]}
							</a>
						</li> -->
						<li class="d-lg-none">
							<a href="{$ul}/contactus" class="link {if $segment eq "contactus"}active{/if}">
								{$lang["menu:contact"]}
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="overlay" data-toggle="menu-overlay"></div>
</header>