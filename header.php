<?php if ( ! defined( 'ABSPATH' ) ) exit; 
/**
 * boxmoe.com
 */
?>
<html <?php language_attributes(); ?>>  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo  boxmoe_title(); ?></title>
	<?php echo boxmoe_keywords()?>
    <?php echo boxmoe_description()?>
	<?php if(get_boxmoe('favicon_src')){?><?php echo  boxmoe_favicon();?><?php } ?> 
	<link rel="stylesheet" id="theme"  href="<?php echo boxmoe_load_style();?>/assets/css/themes.min.css" type="text/css" media="all" />
    <link rel="stylesheet" id="style"  href="<?php echo boxmoe_load_style();?>/assets/css/style.css" type="text/css" media="all" />	
    <script src="<?php echo boxmoe_load_style();?>/assets/js/jquery.min.js"></script>
	<?php wp_head(); ?>
  </head>  
  <body>
    <header class="header-global">
      <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
        <div class="container">
          <a class="navbar-brand mr-lg-5" href="<?php echo home_url(); ?>">
            <?php echo boxmoe_logo();?></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="navbar-collapse collapse" id="navbar_global">
            <div class="navbar-collapse-header">
              <div class="row">
                <div class="col-6 collapse-brand">
                  <a href="<?php echo home_url(); ?>">
                    <?php echo boxmoe_logo();?></a>
                </div>
                <div class="col-6 collapse-close">
                  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                  </button>
                </div>
              </div>
            </div>
            <ul class="navbar-nav navbar-nav-hover align-items-lg-center ml-lg-auto">
              <?php boxmoe_nav_menu() ;?>
              <li class="nav-item">
                <a href="#search" class="nav-link">
                  <i class="fa fa-search"></i>Search</a>
              </li>            
			<?php if( get_boxmoe('sign_f') & is_user_logged_in() ){ global $current_user; wp_get_current_user(); ?> 
              <li class="nav-item dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle  nav-link" aria-haspopup="true"><i class="fa fa-user-circle-o"></i>Hello,<?php echo $current_user->nickname; ?></a>
              <ul class="dropdown-menu">
              <li class="nav-item">
			  <a href="<?php get_user_url(); ?>" class="dropdown-item"><i class="fa fa-address-card-o"></i>会员中心</a>
			  </li>
              <li class="nav-item">
                <a href="<?php echo wp_logout_url( home_url() ); ?>" class="dropdown-item"><i class="fa fa-sign-out"></i>注销登录</a>
              </li>
			  </ul>
			  </li>
			  <?php } ?></ul><?php if( get_boxmoe('sign_f') & !is_user_logged_in() ){ ?>
            <div class="my-2">
              <div class="boxmoe-user-login hidden-sm">
                <div class="boxmoe_user-wrapper">
                  <span class="boxmoe_user-loader">
                    <a href="<?php get_login_url(); ?>?r=<?php get_user_url(); ?>" class="signin-loader z-bor">登录</a>
                    <b class="middle-text">
                      <span class="middle-inner">or</span></b>
                  </span>
                  <span class="boxmoe_user-loader">
                    <a href="<?php get_reg_url(); ?>" class="signup-loader l-bor">注册</a></span>
                </div>
                <i class="up-new"></i>
              </div>
            </div><?php } ?>
          </div>
        </div>
      </nav>
    </header>  
    <section class="section-blog-cover section-shaped my-0" <?php echo boxmoe_banner();?>>
      <div class="shape shape-style-1 shape-primary alpha-4">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="separator separator-bottom separator-skew">
        <canvas id="canvas"></canvas>
      </div>
    </section>  
    <main class="boxmoe_blog"> 