
<!doctype html>
<html lang="<?php echo (app()->getLocale() == 'en' ? 'en-US' : 'vi-VN')  ?>">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<link rel='stylesheet' id='classic-theme-styles-css' href="/frontEnd/wp-includes/css/classic-themes.min3781.css?ver=6.2.2" type='text/css' media='all' />
	<style id='global-styles-inline-css' type='text/css'>
		body{--wp--preset--color--black: #000000;--wp--preset--color--cyan-bluish-gray: #abb8c3;--wp--preset--color--white: #ffffff;--wp--preset--color--pale-pink: #f78da7;--wp--preset--color--vivid-red: #cf2e2e;--wp--preset--color--luminous-vivid-orange: #ff6900;--wp--preset--color--luminous-vivid-amber: #fcb900;--wp--preset--color--light-green-cyan: #7bdcb5;--wp--preset--color--vivid-green-cyan: #00d084;--wp--preset--color--pale-cyan-blue: #8ed1fc;--wp--preset--color--vivid-cyan-blue: #0693e3;--wp--preset--color--vivid-purple: #9b51e0;--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%);--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%);--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%);--wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%);--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%);--wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg,rgb(74,234,220) 0%,rgb(151,120,209) 20%,rgb(207,42,186) 40%,rgb(238,44,130) 60%,rgb(251,105,98) 80%,rgb(254,248,76) 100%);--wp--preset--gradient--blush-light-purple: linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%);--wp--preset--gradient--blush-bordeaux: linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 50%,rgb(107,0,62) 100%);--wp--preset--gradient--luminous-dusk: linear-gradient(135deg,rgb(255,203,112) 0%,rgb(199,81,192) 50%,rgb(65,88,208) 100%);--wp--preset--gradient--pale-ocean: linear-gradient(135deg,rgb(255,245,203) 0%,rgb(182,227,212) 50%,rgb(51,167,181) 100%);--wp--preset--gradient--electric-grass: linear-gradient(135deg,rgb(202,248,128) 0%,rgb(113,206,126) 100%);--wp--preset--gradient--midnight: linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%);--wp--preset--duotone--dark-grayscale: url('#wp-duotone-dark-grayscale');--wp--preset--duotone--grayscale: url('#wp-duotone-grayscale');--wp--preset--duotone--purple-yellow: url('#wp-duotone-purple-yellow');--wp--preset--duotone--blue-red: url('#wp-duotone-blue-red');--wp--preset--duotone--midnight: url('#wp-duotone-midnight');--wp--preset--duotone--magenta-yellow: url('#wp-duotone-magenta-yellow');--wp--preset--duotone--purple-green: url('#wp-duotone-purple-green');--wp--preset--duotone--blue-orange: url('#wp-duotone-blue-orange');--wp--preset--font-size--small: 13px;--wp--preset--font-size--medium: 20px;--wp--preset--font-size--large: 36px;--wp--preset--font-size--x-large: 42px;--wp--preset--spacing--20: 0.44rem;--wp--preset--spacing--30: 0.67rem;--wp--preset--spacing--40: 1rem;--wp--preset--spacing--50: 1.5rem;--wp--preset--spacing--60: 2.25rem;--wp--preset--spacing--70: 3.38rem;--wp--preset--spacing--80: 5.06rem;--wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);--wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);--wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);--wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);--wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);}:where(.is-layout-flex){gap: 0.5em;}body .is-layout-flow > .alignleft{float: left;margin-inline-start: 0;margin-inline-end: 2em;}body .is-layout-flow > .alignright{float: right;margin-inline-start: 2em;margin-inline-end: 0;}body .is-layout-flow > .aligncenter{margin-left: auto !important;margin-right: auto !important;}body .is-layout-constrained > .alignleft{float: left;margin-inline-start: 0;margin-inline-end: 2em;}body .is-layout-constrained > .alignright{float: right;margin-inline-start: 2em;margin-inline-end: 0;}body .is-layout-constrained > .aligncenter{margin-left: auto !important;margin-right: auto !important;}body .is-layout-constrained > :where(:not(.alignleft):not(.alignright):not(.alignfull)){max-width: var(--wp--style--global--content-size);margin-left: auto !important;margin-right: auto !important;}body .is-layout-constrained > .alignwide{max-width: var(--wp--style--global--wide-size);}body .is-layout-flex{display: flex;}body .is-layout-flex{flex-wrap: wrap;align-items: center;}body .is-layout-flex > *{margin: 0;}:where(.wp-block-columns.is-layout-flex){gap: 2em;}.has-black-color{color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-color{color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-color{color: var(--wp--preset--color--white) !important;}.has-pale-pink-color{color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-color{color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-color{color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-color{color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-color{color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-color{color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-color{color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-color{color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-color{color: var(--wp--preset--color--vivid-purple) !important;}.has-black-background-color{background-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-background-color{background-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-background-color{background-color: var(--wp--preset--color--white) !important;}.has-pale-pink-background-color{background-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-background-color{background-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-background-color{background-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-background-color{background-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-background-color{background-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-background-color{background-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-background-color{background-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-background-color{background-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-background-color{background-color: var(--wp--preset--color--vivid-purple) !important;}.has-black-border-color{border-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-border-color{border-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-border-color{border-color: var(--wp--preset--color--white) !important;}.has-pale-pink-border-color{border-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-border-color{border-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-border-color{border-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-border-color{border-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-border-color{border-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-border-color{border-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-border-color{border-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-border-color{border-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-border-color{border-color: var(--wp--preset--color--vivid-purple) !important;}.has-vivid-cyan-blue-to-vivid-purple-gradient-background{background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;}.has-light-green-cyan-to-vivid-green-cyan-gradient-background{background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;}.has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;}.has-luminous-vivid-orange-to-vivid-red-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;}.has-very-light-gray-to-cyan-bluish-gray-gradient-background{background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;}.has-cool-to-warm-spectrum-gradient-background{background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;}.has-blush-light-purple-gradient-background{background: var(--wp--preset--gradient--blush-light-purple) !important;}.has-blush-bordeaux-gradient-background{background: var(--wp--preset--gradient--blush-bordeaux) !important;}.has-luminous-dusk-gradient-background{background: var(--wp--preset--gradient--luminous-dusk) !important;}.has-pale-ocean-gradient-background{background: var(--wp--preset--gradient--pale-ocean) !important;}.has-electric-grass-gradient-background{background: var(--wp--preset--gradient--electric-grass) !important;}.has-midnight-gradient-background{background: var(--wp--preset--gradient--midnight) !important;}.has-small-font-size{font-size: var(--wp--preset--font-size--small) !important;}.has-medium-font-size{font-size: var(--wp--preset--font-size--medium) !important;}.has-large-font-size{font-size: var(--wp--preset--font-size--large) !important;}.has-x-large-font-size{font-size: var(--wp--preset--font-size--x-large) !important;}
		.wp-block-navigation a:where(:not(.wp-element-button)){color: inherit;}
		:where(.wp-block-columns.is-layout-flex){gap: 2em;}
		.wp-block-pullquote{font-size: 1.5em;line-height: 1.6;}
	</style>
	<link rel='stylesheet' id='bootstrap-css' href="/frontEnd/cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min3781.css?ver=6.2.2" type='text/css' media='all' />
	<link rel='stylesheet' id='swiper-css' href="/frontEnd/unpkg.com/swiper@8.4.7/swiper-bundle.min.css?ver=6.2.2" type='text/css' media='all' />
	<link rel='stylesheet' id='core-css' href="/frontEnd/wp-content/themes/zeit-theme-dev/core3781.css?ver=6.2.2" type='text/css' media='all' />
	<link rel='stylesheet' id='font-awesome-official-css' href="/frontEnd/fontawesome/all.css" type='text/css' />
	<link rel='stylesheet' id='font-awesome-official-v4shim-css' href="/frontEnd/fontawesome/v4-shims.css" type='text/css' media='all'/>
	<style id='font-awesome-official-v4shim-inline-css' type='text/css'>
	@font-face {
	font-family: "FontAwesome";
	font-display: block;
	src: url("/frontEnd/use.fontawesome.com/releases/v5.15.4/webfonts/fa-brands-400.eot"),
		url("/frontEnd/use.fontawesome.com/releases/v5.15.4/webfonts/fa-brands-400.eot?#iefix") format("embedded-opentype"),
		url("/frontEnd/use.fontawesome.com/releases/v5.15.4/webfonts/fa-brands-400.woff2") format("woff2"),
		url("/frontEnd/use.fontawesome.com/releases/v5.15.4/webfonts/fa-brands-400.woff") format("woff"),
		url("/frontEnd/use.fontawesome.com/releases/v5.15.4/webfonts/fa-brands-400.ttf") format("truetype"),
		url("/frontEnd/use.fontawesome.com/releases/v5.15.4/webfonts/fa-brands-400.svg#fontawesome") format("svg");
	}
</style>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="Trang chủ - MiTech">
    <meta property="og:type" content="article">
    <meta property="og:url" content="index.html">
    <meta property="og:description" content="">
    <meta property="og:site_name" content="">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Trang chủ - MiTech">
    <meta name="twitter:description" content="">

    <meta property="og:image" content="">
    <meta name="twitter:image:src" content="">
    <meta name="msapplication-TileImage" content="/frontEnd/wp-content/uploads/2022/07/Web-Clip.png">
    <link rel="icon" href="/frontEnd/wp-content/uploads/2022/07/Web-Clip.png" sizes="32x32">
    <link rel="icon" href="/frontEnd/wp-content/uploads/2022/07/Web-Clip.png" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="/frontEnd/wp-content/uploads/2022/07/Web-Clip.png">

    <link rel="alternate" href="index.html" hreflang="en">
    <script type="text/javascript">
        var ajax_url = 'wp-admin/admin-ajax.html';
        var ajax_nonce = 'f20497c790';
    </script>
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <link rel="alternate" hreflang="en" href="en/index.html" />
    <link rel="alternate" hreflang="vi" href="index.html" />
    <link rel="alternate" hreflang="x-default" href="index.html" />

    <title>MiTech - Thạch cao đến từ Hàn Quốc | MiTech Việt Nam</title>
    <meta name="description" content="MiTech tự hào là nhà phân phối tấm thạch cao hàng đầu đến từ Hàn Quốc. MiTech mang đến giải pháp thạch cao và thi công thông minh" />
    <link rel="canonical" href="index.html" />
    <meta property="og:locale" content="<?php echo (app()->getLocale() == 'en' ? 'en-US' : 'vi-VN')  ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="MiTech - Thạch cao đến từ Hàn Quốc | MiTech Việt Nam" />
    <meta property="og:description" content="MiTech tự hào là nhà phân phối tấm thạch cao hàng đầu đến từ Hàn Quốc. MiTech mang đến giải pháp thạch cao và thi công thông minh" />
    <meta property="og:url" content="{{ URL::current() }}" />
    <meta property="og:site_name" content="MiTech" />
    <meta property="article:publisher" content="https://www.facebook.com/ThachcaoZeit/" />
    <meta property="article:modified_time" content="2023-07-03T09:31:49+00:00" />
    <meta name="twitter:card" content="summary_large_image" />
    <script src="/frontEnd/wp-content/themes/zeit-theme-dev/js/yoast-schema-graph.js"></script>
    <link rel='stylesheet' id='classic-theme-styles-css' href="/frontEnd/wp-includes/css/classic-themes.min3781.css?ver=6.2.2" type='text/css' media='all' />
    <link rel='stylesheet' id='global-styles-inline-css' href="/frontEnd/wp-content/themes/zeit-theme-dev/global-styles-inline-css.css" type='text/css' media='all' />
    <link rel='stylesheet' id='bootstrap-css' href="/frontEnd/cdn.jsdelivr.net/npm/bootstrap%405.0.2/dist/css/bootstrap.min3781.css?ver=6.2.2" type='text/css' media='all' />
    <link rel='stylesheet' id='swiper-css' href="/frontEnd/unpkg.com/swiper%408.4.7/swiper-bundle.min.css?ver=6.2.2" type='text/css' media='all' />
    <link rel='stylesheet' id='core-css' href="/frontEnd/wp-content/themes/zeit-theme-dev/core3781.css?ver=6.2.2" type='text/css' media='all' />
    <link rel='stylesheet' id='font-awesome-official-css' href="/frontEnd/fontawesome/all.css" type='text/css' media='all' />
    <script type='text/javascript' src='https://www.googletagmanager.com/gtag/js?id=UA-206244908-2' id='google_gtagjs-js' async></script>
    <script type='text/javascript' id='google_gtagjs-js-after'>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('set', 'linker', {
            "domains": ["zeitgypsum.com"]
        });
        gtag("js", new Date());
        gtag("set", "developer_id.dZTNiMT", true);
        gtag("config", "UA-206244908-2", {
            "anonymize_ip": true
        });
        gtag("config", "G-833TL9Z0DJ");
    </script>

    <link rel="https://api.w.org/" href="wp-json/index.html" />
    <link rel="alternate" type="application/json" href="/frontEnd/wp-json/wp/v2/pages/7.json" />
    <link rel='shortlink' href='index.html' />
    <link rel="alternate" type="application/json+oembed" href="/frontEnd/wp-json/oembed/1.0/embedbe3b.json?url=https%3A%2F%2Fzeitgypsum.com%2F" />
    <link rel="alternate" type="text/xml+oembed" href="/frontEnd/wp-json/oembed/1.0/embedc64b?url=https%3A%2F%2Fzeitgypsum.com%2F&amp;format=xml" />
    <meta name="generator" content="WPML ver:4.5.12 stt:1,57;" />
    <link rel='stylesheet' id='wp-custom-css' href="/frontEnd/wp-content/themes/zeit-theme-dev/wp-custom-css.css" type='text/css' media='all' />
    <meta name="generator" content="Site Kit by Google 1.84.0" />
    <meta name="google-site-verification" content="9T_7RAN6v3R7HNsKnENIiWh3bCYiA1dwcqOlbf2FnBQ" />
	<style>[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style>
	<link rel='stylesheet' id='tpl-calculation-css' href="/frontEnd/wp-content/themes/zeit-theme-dev/tpl-calculation/tpl-calculation3781.css?ver=6.2.2" type='text/css' media='all' />
</head>
<body class="home page-template page-template-tpl-home page-template-tpl-hometpl-home-php page page-id-7 sub">
	<header class="header" class="header">
		<nav class="navbar navbar-expand-xl navbar-light">
			<a class="navbar-brand" href="/">
				<img class="zeit-logo" src="/frontEnd/wp-content/themes/zeit-theme-dev/images/zeit-logo.svg">
			</a>
			<button class="btn navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
				aria-label="Toggle navigation">
				<span></span>
				<span></span>
			</button>
			<div class="collapse navbar-collapse navbar-nav-scroll" id="navbarScroll">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<?php    
					foreach($menus as $menu) {
						if($menu->id == 3) {
					?>
						<li class="nav-item has-megamenu">
							<a class="nav-link <?php echo request()->is('products-solutions') ? 'active' : '' ?>" aria-current="page"
								href="<?php echo $currentLocale ?>/<?php echo $menu->slug ?>"><?php echo $menu->menu_name ?></a>
							<div class="mega-menu">
								<div class="container">
									<div class="mega-wrapper">
										<div class="link-list">
											<h3 class="display-2 text-blue nav-title">Sản phẩm &#038; Giải pháp</h3>
											<div class="list">
												<?php 
													foreach($menu->children as $child) {
												?>
												<p class="item">
													<a
														href="<?php echo $currentLocale ?>/<?php echo $menu->slug ?>/<?php echo $child->menuTransateDefault->first()->slug ?>"><?php echo $child->menuTransateDefault->first()->menu_name ?></a>
												</p>
												<?php } ?>
											</div>
										</div>
										<div class="thumb">
											<img
												src="/frontEnd/wp-content/themes/zeit-theme-dev/images/mega-2.jpg">
											<div class="content">
												<p class="sub">Sản Phẩm và Giải Pháp</p>
												<h5 class="name heading-1">Thạch cao Hàn Quốc của riêng bạn</h5>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
					<?php } else if($menu->id == 4) { ?>
						<li class="nav-item has-megamenu">
							<a class="nav-link <?php echo request()->is('documents*') ? 'active' : '' ?>" aria-current="page"
								href="<?php echo $currentLocale ?>/<?php echo $menu->slug ?>"><?php echo $menu->menu_name ?></a>
							<div class="mega-menu">
								<div class="container">
									<div class="mega-wrapper">
										<div class="link-list">
											<h3 class="display-2 text-blue nav-title"><?php echo $menu->menu_name ?></h3>
											<div class="list">
												<?php 	
													foreach($menu->children as $child) {
														if($child->is_menu == 1 || $child->is_menu == 3  || $child->is_menu == 4) {
												?>
													<p class="item">
														<a
															href="<?php echo $currentLocale ?>/<?php echo $menu->slug ?>/<?php echo $child->menuTransateDefault->first()->slug ?>">
															<?php echo $child->menuTransateDefault->first()->menu_name ?>
														</a>
													</p>
												<?php 
														}
													} 
												?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
					<?php } else { ?> 
						<li class="nav-item">
							<a class="nav-link <?php echo request()->is($menu->slug) ? 'active' : '' ?>" aria-current="page"
								href="<?php echo $currentLocale ?>/<?php echo $menu->slug ?>"><?php echo $menu->menu_name ?></a>
						</li>
				<?php 
						} 
					} 
				?>
				</ul>
				<div class="right-col">
					<button class="btn btn-default btn-search"><span class="icon-search"></span></button>
					<div class="dropdown">
						<a class="btn dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
							data-bs-toggle="dropdown" aria-expanded="false">
							<div class="icon-globe"></div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarScrollingDropdown">
							<li><a class="dropdown-item"
									href="<?php echo render_link('vi') ?>">VI</a></li>
							<li><a class="dropdown-item"
									href="<?php echo render_link('en') ?>">EN</a></li>
						</ul>
					</div>
				</div>
				<div class="search-bar">
					<form action="<?php echo get_link($slugs, 4) ?>" id="topSearch" class="searchForm">
						<span class="icon-search text-blue"></span>
						<input class="search-input" type="text" name="search" placeholder="<?php echo __('message.search_placeholder') ?>" value="">
						<button class="btn btn-submit" type="submit"><span class="icon icon-right-arrow"></span></button>
					</form>
				</div>
			</div>
		</nav>
	</header>

<main class="main" ng-app="ZeitApp" ng-controller="calculator">
	<input type="hidden" ng-init='tcxcpt = <?php echo json_encode($materials['tcxcpt'] ?? []) ?>;'/>
	<input type="hidden" ng-init='tcxccc = <?php echo json_encode($materials['tcxccc'] ?? []) ?>;'/>
	<input type="hidden" ng-init='tcddpt = <?php echo json_encode($materials['tcddpt'] ?? []) ?>;'/>
	<input type="hidden" ng-init='tcddcc = <?php echo json_encode($materials['tcddcc'] ?? []) ?>;'/>
	<input type="hidden" ng-init='tnpt = <?php echo json_encode($materials['tnpt'] ?? []) ?>;'/>
	<input type="hidden" ng-init='vc = <?php echo json_encode($materials['vc'] ?? []) ?>;'/>
	<input type="hidden" ng-init='vcc1 = <?php echo json_encode($materials['vcc1'] ?? []) ?>;'/>
	<input type="hidden" ng-init='vcc2 = <?php echo json_encode($materials['vcc2'] ?? []) ?>;'/>
	<input type="hidden" ng-init="triggeredSearch = false"/>
	<section class="estimation-sect has-cover-img" style="background-image: url('/frontEnd/wp-content/themes/zeit-theme-dev/img/calculation.png')">
		<div class="container">
		<div class="wrapper">
					<div class="wrapper-form">
						<div class="top wow fadeInUp" data-wow-delay="0.3s">
							<h6 class="category text-uppercase"><?php echo __('message.estimation_of') ?></h6>
							<h3 class="heading-1 text-uppercase text-blue has-blue-underline"><?php echo __('message.material_cost') ?></h3>
						</div>
						<form action="/calculation" class="estimate-form wow fadeInUp" data-wow-delay="0.6s">
							<div class="groups" ng-init="est_opt = 1">
								<p class="type"><?php echo __('message.est_type') ?></p>
								<div class="inputs-group">
									<div class="form-group-checkbox">
										<input type="radio" value="1" id="estimate-bottom-ceil"  ng-model="est_opt" checked ng-change="triggeredSearch = false" ng-class="est_opt == 1 ? 'active' : ''">
										<label for="estimate-bottom-ceil"><?php echo __('message.concealed_ceiling') ?></label>
									</div>
									<div class="form-group-checkbox">
										<input type="radio" value="2" id="estimate-top-ceil"  ng-model="est_opt" ng-change="triggeredSearch = false" ng-class="est_opt == 2 ? 'active' : ''">
										<label for="estimate-top-ceil"><?php echo __('message.exposed_ceilling') ?></label>
									</div>
									<div class="form-group-checkbox">
										<input type="radio" value="3" id="estimate-wall" ng-model="est_opt" ng-change="triggeredSearch = false" ng-class="est_opt == 3 ? 'active' : ''">
										<label for="estimate-wall"><?php echo __('message.drywall') ?></label>
									</div>
								</div>
							</div>
							<div class="groups">
								<p class="type"><?php echo __('message.area_to_be_covered') ?></p>
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item" role="presentation">
										<button class="nav-link btn-tab active" id="estimate-dimension-tab" data-bs-toggle="tab" data-bs-target="#estimate-dimension" type="button" role="tab" aria-controls="estimate-dimension" aria-selected="true"><?php echo __('message.by_length_width') ?></button>
									</li>
									<li class="nav-item" role="presentation">
										<button class="nav-link btn-tab " id="estimate-area-tab" data-bs-toggle="tab" data-bs-target="#estimate-area" type="button" role="tab" aria-controls="estimate-area" aria-selected="false"><?php echo __('message.by_square_meter') ?></button>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade show active" id="estimate-dimension" role="tabpanel" aria-labelledby="estimate-dimension-tab">
										<div class="form-controls">
											<div class="control-item">
												<label for="estimate-length" class="type"><?php echo __('message.length') ?>(m):</label>
												<input type="number" id="estimate-length" value="0" name="estimate-length" ng-model="length" ng-change="triggeredSearch = false"
															ng-init="length = 0">
											</div>
											<div class="control-item">
												<label for="estimate-width" class="type"><?php echo __('message.width') ?>(m):</label>
												<input type="number" id="estimate-width" value="0" name="estimate-width" ng-model="width" ng-change="triggeredSearch = false"
															ng-init="width = 0">
											</div>
										</div>
									</div>
									<div class="tab-pane fade " id="estimate-area" role="tabpanel" aria-labelledby="estimate-area-tab">
										<div class="form-controls">
											<div class="control-item">
												<label for="estimate-area-input" class="type"><?php echo __('message.square_meter') ?>(m2):</label>
												<input type="number" id="estimate-area-input" name="estimate-area" ng-model="area" ng-change="setSize()" ng-init="area = 0">
											</div>
										</div>
									</div>
								</div>
							</div>
							<button type="button" class="btn btn-primary btn-submit has-brand-icon" ng-click="startCalculation()"><span><?php echo __('message.calculate') ?></span></button>
						</form>
					</div>
					<div class="content">
						<h3 class="heading">
							<?php echo htmlspecialchars_decode(__('message.estimate_material_costs')) ?>
						</h3>
						<p class="para">
							<?php echo htmlspecialchars_decode(__('message.note_material_costs')) ?>
						</p>
					</div>
				</div>
			</div>
		</section>

	<section class="estimate-result-sect wow fadeInUp" data-wow-delay="0.6s" ng-show="triggeredSearch == true">
		<div class="container">
		<div class="common-result">
			<h3 class="heading-3 mb-4 text-uppercase"><?php echo __('message.calculation_result') ?>:</h3>
			<span class="filter-name filter-category">
			<span class="text-blue"><?php echo __('message.est_type') ?></span>
			<span class="value" ng-show="est_opt == 1"><?php echo __('message.concealed_ceiling') ?></span>
			<span class="value" ng-show="est_opt == 2"><?php echo __('message.exposed_ceilling') ?></span>
			<span class="value" ng-show="est_opt == 3"><?php echo __('message.drywall') ?></span>
			</span>
			<span class="filter-name filter-width">
			<span class="text-blue"><?php echo __('message.length') ?>(m):</span>
			<span class="value">{{length| number : 2}}</span>
			</span>
			<span class="filter-name filter-height">
			<span class="text-blue"><?php echo __('message.width') ?>(m):</span>
			<span class="value">{{width| number : 2}}</span>
			</span>
			<span class="filter-name filter-area">
			<span class="text-blue"><?php echo __('message.square_meter') ?> (m2):</span>
			<span class="value">{{length * width| number : 2}}</span>
			</span>
		</div>
		<p class="heading-3 mb-4"><?php echo __('message.customize') ?></p>
		<div class="product-results">
			<div class="advanced-filter">
			<div ng-show="est_opt == 1">
							<label class="lbl text-blue"><?php echo __('message.quality') ?> {{tc_q_opt}}</label>
							<div class="switch">
								<div class="switch-field" ng-class="tc_q_opt == 1 ? 'active' : ''">
									<input id="tc-quality-1" type="radio" name="tc_q_opt" ng-model="tc_q_opt" value="1" ng-change="startCalculation()">
									<label for="tc-quality-1"><?php echo __('message.standard') ?></label>
								</div>
								<div class="switch-field" ng-class="tc_q_opt == 2 ? 'active' : ''">
									<input id="tc-quality-2" type="radio" name="tc_q_opt" ng-model="tc_q_opt" value="2" ng-change="startCalculation()">
									<label for="tc-quality-2"><?php echo __('message.premier') ?></label>
								</div>
							</div>

							<div class="form-group full">
								<label class="lbl text-blue"><?php echo __('message.type_of_metal_frame') ?></label>
								<select class="form-select"
										ng-model="tc_t_opt"
										ng-options="opt.name for opt in type_options"
										ng-init="tc_t_opt = type_options[0]"
										ng-change="startCalculation()"></select>
							</div>
						</div>

						<div class="form-group full" ng-show="est_opt == 3">
							<label class="lbl text-blue"><?php echo __('message.functions') ?> {{v_opt.name}}</label>
							<select class="form-select"
									ng-model="v_opt"
									ng-options="opt.name for opt in vach_options"
									ng-init="v_opt = vach_options[0]"
									ng-change="startCalculation()"></select>
						</div>
					</div>
					<?php $language = app()->getLocale() ?>
					<div class="tbl-block">
						<ul class="responsive-table">
							<li class="table-header">
								<div class="col t-col-1"><?php echo __('message.product_description') ?> </div>
								<div class="col t-col-2"><?php echo __('message.unit') ?></div>
								<div class="col t-col-3"><?php echo __('message.quantity_product') ?></div>
								<div class="col t-col-4"><?php echo __('message.price') ?> *</div>
								<div class="col t-col-5"><?php echo __('message.total_quotation') ?></div>
							</li>
							<li class="table-row" ng-repeat="item in tcxcpt" ng-show="est_opt == 1 && tc_q_opt == 1 && tc_t_opt.value == 1">
								<div class="col t-col-1 text-black-4"><a class="name" href="#"><?php if($language == 'vi') { ?>{{item.name}}<?php } else { ?> {{item.name_en}} <?php } ?></a></div>
								<div class="col t-col-2 text-black-4"><?php if($language == 'vi') { ?>{{item.unit}}<?php } else { ?> {{item.unit_en}} <?php } ?></div>
								<div class="col t-col-3 text-black-1">{{item.quantity| number : 2}}</div>
								<div class="col t-col-4">{{item.price| number : 0}} VNĐ</div>
								<div class="col t-col-5">{{item.total_cost| number : 0}} VNĐ</div>
							</li>
							<li class="table-row" ng-repeat="item in tcxccc" ng-show="est_opt == 1 && tc_q_opt == 2 && tc_t_opt.value == 1">
								<div class="col t-col-1 text-black-4"><a class="name" href="#"><?php if($language == 'vi') { ?>{{item.name}}<?php } else { ?> {{item.name_en}} <?php } ?></a></div>
								<div class="col t-col-2 text-black-4"><?php if($language == 'vi') { ?>{{item.unit}}<?php } else { ?> {{item.unit_en}} <?php } ?></div>
								<div class="col t-col-3 text-black-1">{{item.quantity| number : 2}}</div>
								<div class="col t-col-4">{{item.price| number : 0}} VNĐ</div>
								<div class="col t-col-5">{{item.total_cost| number : 0}} VNĐ</div>
							</li>
							<li class="table-row" ng-repeat="item in tcddpt" ng-show="est_opt == 1 && tc_q_opt == 1 && tc_t_opt.value == 2">
								<div class="col t-col-1 text-black-4"><a class="name" href="#"><?php if($language == 'vi') { ?>{{item.name}}<?php } else { ?> {{item.name_en}} <?php } ?></a></div>
								<div class="col t-col-2 text-black-4"><?php if($language == 'vi') { ?>{{item.unit}}<?php } else { ?> {{item.unit_en}} <?php } ?></div>
								<div class="col t-col-3 text-black-1">{{item.quantity| number : 2}}</div>
								<div class="col t-col-4">{{item.price| number : 0}} VNĐ</div>
								<div class="col t-col-5">{{item.total_cost| number : 0}} VNĐ</div>
							</li>

							<li class="table-row" ng-repeat="item in tcddcc" ng-show="est_opt == 1 && tc_q_opt == 2 && tc_t_opt.value == 2">
								<div class="col t-col-1 text-black-4"><a class="name" href="#"><?php if($language == 'vi') { ?>{{item.name}}<?php } else { ?> {{item.name_en}} <?php } ?></a></div>
								<div class="col t-col-2 text-black-4"><?php if($language == 'vi') { ?>{{item.unit}}<?php } else { ?> {{item.unit_en}} <?php } ?></div>
								<div class="col t-col-3 text-black-1">{{item.quantity| number : 2}}</div>
								<div class="col t-col-4">{{item.price| number : 0}} VNĐ</div>
								<div class="col t-col-5">{{item.total_cost| number : 0}} VNĐ</div>
							</li>
							<li class="table-row" ng-repeat="item in tnpt" ng-show="est_opt == 2">
								<div class="col t-col-1 text-black-4"><a class="name" href="#"><?php if($language == 'vi') { ?>{{item.name}}<?php } else { ?> {{item.name_en}} <?php } ?></a></div>
								<div class="col t-col-2 text-black-4"><?php if($language == 'vi') { ?>{{item.unit}}<?php } else { ?> {{item.unit_en}} <?php } ?></div>
								<div class="col t-col-3 text-black-1">{{item.quantity| number : 2}}</div>
								<div class="col t-col-4">{{item.price| number : 0}} VNĐ</div>
								<div class="col t-col-5">{{item.total_cost| number : 0}} VNĐ</div>
							</li>
							<li class="table-row" ng-repeat="item in vc" ng-show="est_opt == 3 && v_opt.value == 1">
								<div class="col t-col-1 text-black-4"><a class="name" href="#"><?php if($language == 'vi') { ?>{{item.name}}<?php } else { ?> {{item.name_en}} <?php } ?></a></div>
								<div class="col t-col-2 text-black-4"><?php if($language == 'vi') { ?>{{item.unit}}<?php } else { ?> {{item.unit_en}} <?php } ?></div>
								<div class="col t-col-3 text-black-1">{{item.quantity| number : 2}}</div>
								<div class="col t-col-4">{{item.price| number : 0}} VNĐ</div>
								<div class="col t-col-5">{{item.total_cost| number : 0}} VNĐ</div>
							</li>
							<li class="table-row" ng-repeat="item in vcc1" ng-show="est_opt == 3 && v_opt.value == 2">
								<div class="col t-col-1 text-black-4"><a class="name" href="#"><?php if($language == 'vi') { ?>{{item.name}}<?php } else { ?> {{item.name_en}} <?php } ?></a></div>
								<div class="col t-col-2 text-black-4"><?php if($language == 'vi') { ?>{{item.unit}}<?php } else { ?> {{item.unit_en}} <?php } ?></div>
								<div class="col t-col-3 text-black-1">{{item.quantity| number : 2}}</div>
								<div class="col t-col-4">{{item.price| number : 0}} VNĐ</div>
								<div class="col t-col-5">{{item.total_cost| number : 0}} VNĐ</div>
							</li>
							<li class="table-row" ng-repeat="item in vcc2" ng-show="est_opt == 3 && v_opt.value == 3">
								<div class="col t-col-1 text-black-4"><a class="name" href="#"><?php if($language == 'vi') { ?>{{item.name}}<?php } else { ?> {{item.name_en}} <?php } ?></a></div>
								<div class="col t-col-2 text-black-4"><?php if($language == 'vi') { ?>{{item.unit}}<?php } else { ?> {{item.unit_en}} <?php } ?></div>
								<div class="col t-col-3 text-black-1">{{item.quantity| number : 2}}</div>
								<div class="col t-col-4">{{item.price| number : 0}} VNĐ</div>
								<div class="col t-col-5">{{item.total_cost| number : 0}} VNĐ</div>
							</li>
						</ul>
						<p class="text-blue text-small fst-italic mt-2"> * <?php echo __('message.vnd_unit') ?> (VNĐ)</p>
						<p class="price-total mt-5"><?php echo __('message.material_cost') ?>: <span class="heading-3 text-blue ms-5">{{material_cost| number : 0}} VNĐ</span></p>
						<p class="price-total mt-5"><?php echo __('message.labor_costs') ?>: <span class="heading-3 text-blue ms-5">{{employee_fee| number : 0}} VNĐ</span></p>
						<p class="price-total mt-5"><?php echo __('message.total') ?>: <span class="heading-3 text-blue ms-5">{{total_cost| number : 0}} VNĐ</span></p>
			<div class="content">
				<p class="para"><?php echo __('message.note_material_costs') ?></p>
						</div>
					</div>
				</div>
			</div>
	</section>

		<section class="grid-nav-section wow fadeInUp">
		<div class="wrapper">
			<div class="left-col has-cover-img" style="background-image: url('/frontEnd/wp-content/themes/zeit-theme-dev/img/bg-1.png')">
				<h5 class="heading-1"><?php echo __('message.faq_heading-1') ?></h5>
			</div>
			<div class="right-col">
				<?php
				foreach ($menus as $key => $menu) {
					if($menu->id == 4) {
						foreach ($menu->children as $key => $child) {
							if($child->is_menu == 0 || $child->is_menu == 3 ) {
						?>
							<a href="<?php echo $currentLocale ?>/<?php echo $menu->slug ?>/<?php echo $child->menuTransateDefault->first()->slug ?>" class="item">
								<h6 class="name"><?php echo $child->menuTransateDefault->first()->menu_name ?> <?php echo htmlspecialchars_decode($child->icon) ?></h6>
								<div class="desc">
									<p><?php echo $child->menuTransateDefault->first()->description ?></p>
								</div>
							</a>
						<?php 
							}
						}
					}
				}  
			?>
			</div>
	</main>
	<footer class="footer wow fadeInUp" data-wow-delay=".3s">
			<div class="container">
				<div class="wrapper">
					<div class="left-column">
						<div class="top">
							<img class="zeit-logo" src="/frontEnd/wp-content/themes/zeit-theme-dev/images/zeit-logo.svg" alt="#">
							<div class="desc mt-2">
								<p></p>
							</div>
						</div>
					</div>
					<div class="right-column">
						<div class="links-block">
							<p class="text-blue text-uppercase block-title"><?php echo __('message.about-us') ?></p>
							<ul>
								<?php
									foreach($menus as $key => $menu) {
										if($menu->is_footer == 1) {
											echo '<li><a href="'. $currentLocale . '/' . $menu->slug . '">' . $menu->menu_name . '</a></li>';
										}
									}
								?>
							</ul>
						</div>
						<div class="links-block">
							<p class="text-blue text-uppercase block-title"><?php echo __('message.documents') ?></p>
							<ul>
								<?php
									foreach ($menus as $key => $menu) {
										foreach ($menu->children as $child) {
											if($child->is_footer == 2) {
												echo '<li><a href="' . $currentLocale. '/' . $menu->slug . '/' . $child->menuTransateDefault->first()->slug .'">'.$child->menuTransateDefault->first()->menu_name .'</a></li>';
											}
										}
									}
								?>
							</ul>
						</div>
						<div class="links-block">
							<p class="text-blue text-uppercase block-title"><?php echo __('message.contact-us') ?></p>
							<ul>
								<?php
									foreach($menus as $key => $menu) {
										if($menu->is_footer == 3) {
											echo '<li><a href="'. $currentLocale . '/' . $menu->slug . '">' . $menu->menu_name . '</a></li>';
										}
									}
								?>
							</ul>
						</div>
					</div>
				</div>
				<div class="download-block">
					<p class="label"><?php echo __('message.download') ?></p>
					<div class="download-btns">
						<a href="https://bit.ly/3WQTXzE" class="btn btn-primary" target="_blank"><span class="icon-google me-2"></span>Google Play</a>
						<a href="https://bit.ly/3loOCkM" class="btn btn-outline-primary" target="_blank"><span class="icon-apple me-2"></span>App Store</a>
					</div>
				</div>
			</div>

			<div class="very-bottom-footer">
				<div class="container">
					<div class="bottom-wrapper">
						<span class="copyright-text">© MiTech 2021</span>
						<div class="internal-links">
							<div class="links">
							</div>
						</div>
						<div class="socials">
							<a href="<?php echo $trans['social_1'] ?>" target="_blank" class="social-item"><span class="icon-facebook-2"></span></a>
						</div>
					</div>
				</div>
			</div>
		</footer>

	<a href="tel:<?php echo $trans['phone_number'] ?>" title="Hotline" class="al-hotline"><?php echo $trans['phone_number'] ?><span></span></a>
	<div id="al-cta-icon">
		<a class="al-cta-phone" title="Hotline" href="tel:<?php echo $trans['phone_number'] ?>"><i class="al-ico-phone"></i></a>
		<a href="<?php echo $trans['social_2'] ?>" title="Messenger" target="_blank" class="al-cta-messenger"><i class="al-ico-messenger"></i></a>
		<a href="<?php echo $trans['social_3'] ?>" title="Zalo" target="_blank" class="al-cta-zalo"><i class="al-ico-zalo"></i></a>
	</div>
<script type='text/javascript' src="/frontEnd/code.jquery.com/jquery-3.5.13781.js?ver=6.2.2" id='jquery351-js'></script>
<script type='text/javascript' src="/frontEnd/cdn.jsdelivr.net/npm/%40popperjs/core%402.9.2/dist/umd/popper.min3781.js?ver=6.2.2" id='popper-js'></script>
<script type='text/javascript' src="/frontEnd/cdn.jsdelivr.net/npm/bootstrap%405.0.2/dist/js/bootstrap.min3781.js?ver=6.2.2" id='bootstrap-js'></script>
<script type='text/javascript' src="/frontEnd/unpkg.com/swiper@8.4.7/swiper-bundle.min.js?ver=6.2.2" id='swiper-js'></script>
<script type='text/javascript' src="/frontEnd/unpkg.com/current-device%400.10.2/umd/current-device.min.js?ver=6.2.2" id='device-js'></script>
<script type='text/javascript' src="/frontEnd/wp-content/themes/zeit-theme-dev/js/core3781.js?ver=6.2.2" id='corejs-js'></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.js?ver=36d5ba" id="angularjs-js"></script>
<script type='text/javascript' src="/frontEnd/wp-content/themes/zeit-theme-dev/tpl-calculation/tpl-calculation3781.js?ver=6.2.2" id='tpl-calculation-js'></script>
