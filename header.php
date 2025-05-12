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
<style>
    /* 主导航样式 */
    .main-navigation {
        background-color: #373e53;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0;
        height: 121px;
        /* box-shadow: 0 2px 5px rgba(0,0,0,0.1); */
		display: flex;
		justify-content: space-between;
		align-items: center;

    }
    
    .site-logo {
        display: flex;
        align-items: center;
        padding-left: 30px;
        height: 100%;
		width: 100px;
    }
    
    .logo-img {
        width: 300px;
        height: auto;
    }
    #site-navigation{

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
    
    /* 响应式 */
    @media (max-width: 768px) {
        .main-navigation {
            flex-direction: column;
            height: auto;
            padding: 15px 0;
        }
        
        .site-logo {
            padding-left: 0;
            margin-bottom: 15px;
        }
        
        .main-menu {
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .main-menu li {
            height: 40px;
        }
        
        .main-menu a {
            padding: 0 15px;
        }
    }
</style>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<header class="main-navigation">
		<a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
			<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Mad Dragon Music Group" class="logo-img">
		</a>
		
		<nav id="site-navigation">
			<ul class="main-menu">
				<li class="<?php if(is_front_page()) echo 'current-menu-item'; ?>"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
				<li class="<?php if(is_page('artists')) echo 'current-menu-item'; ?>"><a href="<?php echo esc_url(home_url('/index.php/artists/')); ?>">Artists</a></li>
				<li class="<?php if(is_page('events') || (is_single() && get_post_type() == 'events')) echo 'current-menu-item'; ?>"><a href="<?php echo esc_url(home_url('/index.php/events/')); ?>">Events</a></li>
				<li class="<?php if(is_page('blog')) echo 'current-menu-item'; ?>"><a href="<?php echo esc_url(home_url('/index.php/blog/')); ?>">Blog</a></li>
				<li class="<?php if(is_page('store')) echo 'current-menu-item'; ?>"><a href="<?php echo esc_url(home_url('/index.php/store/')); ?>">Store</a></li>
				<li class="<?php if(is_page('about-us')) echo 'current-menu-item'; ?>"><a href="<?php echo esc_url(home_url('/index.php/about-us/')); ?>">About Us</a></li>
			</ul>
		</nav>
	</header>

	<div id="content" class="site-content">
