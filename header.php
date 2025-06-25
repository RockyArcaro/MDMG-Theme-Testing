<!DOCTYPE html>
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php 
	wp_head();
?>
<?php
// 获取当前页面的路径
$current_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$current_path = explode('/', $current_path);
$page_slug = '';

// 从URL路径中提取页面标识
if (count($current_path) > 0) {
    // 如果路径包含index.php，获取后面的页面名
    $index_key = array_search('index.php', $current_path);
    if ($index_key !== false && isset($current_path[$index_key + 1])) {
        $page_slug = $current_path[$index_key + 1];
    } else {
        // 否则获取第一个非空路径段
        foreach ($current_path as $path_segment) {
            if (!empty($path_segment) && $path_segment !== 'music') {
                $page_slug = $path_segment;
                break;
            }
        }
    }
}

// 函数：检查是否为当前页面
function is_current_page($page_name) {
    global $page_slug;
    
    // 首页判断
    if ($page_name === 'home') {
        return is_front_page() || empty($page_slug) || $page_slug === 'music';
    }
    
    // 其他页面判断
    return $page_slug === $page_name || 
           is_page($page_name) || 
           (is_single() && get_post_type() == $page_name) ||
           is_singular($page_name);
}
?>
<style>
    /* 主导航样式 */
    .main-navigation {
        background-color: #373e53;
        width: 100%;
        position: relative;
    }
    
    .navbar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 121px;
        padding: 0;
        position: relative;
    }
    
    .site-logo {
        display: flex;
        align-items: center;
        padding-left: 30px;
        height: 100%;
    }
    
    .logo-img {
        width: 300px;
        height: auto;
    }
    
    /* 桌面端导航菜单 */
    .navbar-collapse {
        display: flex;
        flex-basis: auto;
        align-items: center;
        position: static;
    }
    
    .main-menu {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
        height: 120px;
        align-items: flex-end;
    }
    
    .main-menu li {
        margin: 0;
        height: 68%;
        display: flex;
        align-items: center;
    }
    
    .main-menu a {
        color: white;
        text-decoration: none;
        font-size: 18px;
        padding: 0 25px;
        font-weight: 400;
        transition: all 0.2s ease;
        height: 100%;
        display: flex;
        align-items: center;
    }
    
    .main-menu a:hover {
        background-color: rgba(198, 199, 225, 0.2);
    }
    
    .current-menu-item a {
        background-color: #c6c7e1;
        color: #ff5bb0;
    }
    
    /* 汉堡菜单按钮 - 默认隐藏 */
    .hamburger-menu {
        display: none;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 45px;
        height: 45px;
        cursor: pointer;
        margin-right: 25px;
        padding: 8px;
        z-index: 1001;
        background: rgba(255, 255, 255, 0.15);
        border: 2px solid rgba(255, 255, 255, 0.4);
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    
    .hamburger-menu:hover {
        background: rgba(255, 255, 255, 0.25);
        border-color: rgba(255, 255, 255, 0.6);
        transform: scale(1.05);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }
    
    .hamburger-menu span {
        display: block;
        width: 24px;
        height: 4px;
        background-color: #ffffff;
        margin: 1px 0;
        transition: all 0.3s ease-in-out;
        border-radius: 2px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        position: relative;
    }
    
    .hamburger-menu.active {
        background: rgba(255, 255, 255, 0.25);
        transform: scale(1.05);
        border-color: rgba(255, 255, 255, 0.6);
    }
    
    .hamburger-menu.active span:nth-child(1) {
        transform: rotate(-45deg) translate(-6px, 7px);
        background-color: #ffffff;
    }
    
    .hamburger-menu.active span:nth-child(2) {
        opacity: 0;
        transform: scale(0);
    }
    
    .hamburger-menu.active span:nth-child(3) {
        transform: rotate(45deg) translate(-6px, -7px);
        background-color: #ffffff;
    }
    
    /* 主体内容容器 */
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #c6c7e1;
    }
    
    .site-content {
        max-width: 100%;
        margin: 0;
        padding: 0;
    }
    
    /* 移动端菜单项动画 */
    @keyframes slideInDown {
        from {
            opacity: 0;
            transform: translateY(-15px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* 响应式样式 */
    @media (max-width: 768px) {
        .follow-us-button{
            display: none;
        }
        .navbar-header {
            height: 80px;
            flex-wrap: wrap;
        }
        
        .site-logo {
            padding-left: 20px;
            width: auto;
            height: 80px;
        }
        
        .logo-img {
            width: 200px;
        }
        
        /* 在移动端显示汉堡菜单 */
        .hamburger-menu {
            display: flex !important;
        }
        
        /* 移动端折叠菜单样式 */
        .navbar-collapse {
            position: absolute;
            top: 80px;
            left: 0;
            width: 100%;
            background-color: #373e53;
            z-index: 1000;
            box-shadow: 0 8px 16px rgba(0,0,0,0.25);
            border-top: 2px solid rgba(255, 255, 255, 0.1);
        }
        
        .navbar-collapse:not(.show) {
            display: none !important;
        }
        
        .navbar-collapse.show {
            display: block !important;
        }
        
        .main-menu {
            flex-direction: column;
            height: auto;
            align-items: center;
            width: 100%;
            padding: 20px 0;
            max-width: none;
        }
        
        .main-menu li {
            height: auto;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            width: 85%;
            text-align: center;
            margin: 2px 0;
            border-radius: 6px;
            overflow: hidden;
            animation: slideInDown 0.4s ease-out forwards;
            opacity: 0;
        }
        
        .main-menu li:last-child {
            border-bottom: none;
        }
        
        .navbar-collapse.show .main-menu li:nth-child(1) { animation-delay: 0.1s; }
        .navbar-collapse.show .main-menu li:nth-child(2) { animation-delay: 0.15s; }
        .navbar-collapse.show .main-menu li:nth-child(3) { animation-delay: 0.2s; }
        .navbar-collapse.show .main-menu li:nth-child(4) { animation-delay: 0.25s; }
        .navbar-collapse.show .main-menu li:nth-child(5) { animation-delay: 0.3s; }
        .navbar-collapse.show .main-menu li:nth-child(6) { animation-delay: 0.35s; }
        
        .main-menu a {
            display: block;
            width: 100%;
            padding: 20px 25px;
            height: auto;
            font-size: 18px;
            text-align: center;
            justify-content: center;
            font-weight: 500;
            letter-spacing: 0.8px;
            transition: all 0.3s ease;
            border-radius: 6px;
            margin: 0;
            box-sizing: border-box;
            min-height: 60px;
            line-height: 1.2;
            align-items: center;
            color: white;
            text-decoration: none;
        }
        
        .main-menu a:hover {
            background-color: #c6c7e1;
            color: #ff5bb0;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        
        .main-menu .current-menu-item a {
            background-color: #c6c7e1;
            color: #ff5bb0;
            font-weight: 600;
            border-left: 4px solid #ff5bb0;
            border-radius: 0 6px 6px 0;
        }
        
        /* 确保移动端点击区域覆盖整个菜单项 */
        .main-menu li:hover {
            background-color: transparent;
        }
        
        .main-menu li:hover a {
            background-color: #c6c7e1;
            color: #ff5bb0;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
    }
    
    @media (max-width: 480px) {
        .site-logo {
            padding-left: 15px;
        }
        
        .logo-img {
            width: 150px;
        }
        
        .hamburger-menu {
            margin-right: 15px;
            width: 40px;
            height: 40px;
        }
        
        .hamburger-menu span {
            width: 22px;
        }
        
        .main-menu {
            padding: 15px 0;
        }
        
        .main-menu a {
            padding: 16px 20px;
            font-size: 16px;
        }
    }
</style>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<header class="main-navigation">
		<div class="navbar-header">
			<a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
				<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Mad Dragon Music Group" class="logo-img">
			</a>
			
			<!-- 汉堡菜单按钮 -->
			<div class="hamburger-menu" id="hamburger-menu">
				<span></span>
				<span></span>
				<span></span>
			</div>
			
			<!-- 桌面端导航菜单 -->
			<nav class="navbar-collapse collapse" id="navbar-collapse">
				<ul class="main-menu">
					<li class="<?php if(is_front_page()) echo 'current-menu-item'; ?>"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
					<!-- 根据页面路径判断是否为当前页面 -->
					<li class="<?php if(is_current_page('artists')) echo 'current-menu-item'; ?>"><a href="<?php echo esc_url(home_url('/index.php/artists/')); ?>">Artists</a></li>
					<li class="<?php if(is_current_page('events')) echo 'current-menu-item'; ?>"><a href="<?php echo esc_url(home_url('/index.php/events/')); ?>">Events</a></li>
					<li class="<?php if(is_current_page('blog') || is_current_page('blog-page')) echo 'current-menu-item'; ?>"><a href="<?php echo esc_url(home_url('/index.php/blog/')); ?>">Blog</a></li>
					<li class="<?php if(is_current_page('store')) echo 'current-menu-item'; ?>"><a href="<?php echo esc_url(home_url('/index.php/store/')); ?>">Store</a></li>
					<li class="<?php if(is_current_page('about-us')) echo 'current-menu-item'; ?>"><a href="<?php echo esc_url(home_url('/index.php/about-us/')); ?>">About Us</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<div id="content" class="site-content"> 