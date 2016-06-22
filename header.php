<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- 
        ,@@@@@...
     ,@@@@@@@@@@@@@@..
   ,@@@@~'        `~@@@.
  @@@@                `~
 @@@@@        (_O
@@@@@@@.       /\
@@@@@@@@@..   |\_,-'   
@@@@@@@@@@@@@='~
@@@@@@@@@@@@@@@@@@@@@@@==......__
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@=...__
@@@@@@@@ SITE BY BRIANHOLT.CA @@@@@@@@@=...__
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@=...__
-->
	<title><?php echo get_bloginfo('name'); wp_title(' | '); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" />
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ekko-lightbox.min.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ekko-lightbox-dark-theme.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
	<?php wp_head(); ?>
</head>
<body>

<nav id="main-nav" <?php if (!is_page_template() && !is_search() && !is_404()) {echo 'class="main-nav-green-bg"';};?>>
  <div class="container">
    <a id="logo" href="<?php echo home_url(); ?>" title="<?php bloginfo('description'); ?>">
      <img src="<?php bloginfo('template_url'); ?>/images/logos/YQ-logo-reverse.png" title="<?php bloginfo('description'); ?>">
    </a>
    <button type="button" class="btn btn-menu visible-xs pull-right" data-toggle="collapse" data-target="#header-menu-div">
      <span class="glyphicon glyphicon-list"></span>
    </button>
    <div id="header-menu-div" class="collapse">
      <?php wp_nav_menu( array( 'theme_location' => 'header-menu',
                                'container' => '',
                                'menu_id' => 'header-menu'
      ) ); ?>
    </div>
    <div class="clearfix"> </div>   
  </div>
</nav>