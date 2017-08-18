<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since The Moms Embroidery 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header id="masthead" class="site-header" role="banner">
  <div class="container">
    <div class="logo row">
      <div class="col-md-8">
         <?php if ( is_front_page() && is_home() ) : ?>
                <h1 class="site-title">
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <?php bloginfo( 'name' ); ?>
                  </a>
                </h1>
            <?php else : ?>
                <p class="site-title">
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <?php bloginfo( 'name' ); ?>
                  </a>
                </p>
            <?php endif;?>
      </div>
      <div class="col-md-4 social">
        <div class="socialBox">
          <ul>							
            <li class="facebook"><a target="_blank" href="https://www.facebook.com/Themomsembroidery/">Facebook</a></li>
            <li class="twitter"><a target="_blank" href="https://twitter.com/dmomsembroidery">Twitter</a></li>
            <li class="youtube"><a target="_blank" href="https://www.youtube.com/channel/UC_z3bUPEWfKMAqRT6ggeOTg/videos?shelf_id=0&view=0&sort=dd">Youtube</a></li>
          </ul>
        </div>
        <div class="searchBox">
          <?php get_search_form(); ?>
        </div>
      </div>
    </div>
  </div> 
</header><!-- .site-header -->
<nav id="navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'themomsembroidery' ); ?>">
   <div class="container">
    <div class="row">
      <div class="col-md-12">
          <div class="navbar navbar-default">               
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                  
                  </div>
                   <?php
                      wp_nav_menu( array(
                          'theme_location' => 'primary',
                          'menu_class'     => 'nav navbar-nav',
                          'container_class' => 'collapse navbar-collapse',
                          'container_id' => 'bs-example-navbar-collapse-1',
                          'walker' => new wp_bootstrap_navwalker()
                       ) );
                  ?> 
              </div>
        </div>
    </div>
  </div>
</nav>
<div id="main-content">
  <div class="container">
    <div class="row">
      <?php $pageSluG = get_page_template_slug( $post->ID ); ?>
      <?php if($pageSluG == "video-page.php"){ ?>
       <div class="col-md-12">
      <?php } else{ ?>
         <div class="col-md-8">
      <?php } ?>
           
      <?php if(is_home()){ ?>
     
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
             <img class="banner-img" alt="" src="http://www.themomsembroidery.com/wp-content/uploads/2014/09/DSC_4399.jpg">      
            </div>
            <div class="item">
              <img class="banner-img" alt="" src="http://www.themomsembroidery.com/wp-content/uploads/2014/09/DSC_4402.jpg">      
            </div>
            <div class="item">
              <img class="banner-img" alt="" src="http://www.themomsembroidery.com/wp-content/uploads/2014/09/IMG_2324.jpg">      
            </div> 
          </div>

          <!-- Controls -->
         <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
     
        <?php } ?>

