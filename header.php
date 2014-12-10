<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 * @package WordPress
 * @subpackage CALSv2
 * @since CALS 2.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>

<meta name="viewport" content="width=320.1, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="apple-mobile-web-app-capable" content="no">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
 <!-- iOS Device Startup Images -->

<!-- iPhone -->
<!--<link rel="apple-touch-startup-image"
      media="(device-width: 320px)"
      href="<?php echo get_template_directory_uri(); ?>/images/startup-iphone.png">-->
<!-- iPhone (Retina) -->
<!--<link rel="apple-touch-startup-image"
      media="(device-width: 320px)
         and (-webkit-device-pixel-ratio: 2)"
      href="<?php echo get_template_directory_uri(); ?>/images/startup-iphone4.png">-->

<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/images/default_app_logo.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/default_app_logo@2x.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/default_app_logo@2x.png" />




<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/master.css" />

<!--[if IE]>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/ie.css" />
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/ie7.css" />
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/ie8.css" />
<![endif]-->

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href='http://fonts.googleapis.com/css?family=Merriweather:400,700|Open+Sans:400,300,700' rel='stylesheet' type='text/css'>






<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/styles/vallenato.css" type="text/css" media="screen">

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<?php $options = twentyeleven_get_theme_options();
$current_colorscheme = $options['link_color'];


?>

<body <?php body_class(); ?> id="<?php echo $current_colorscheme; ?>">

<div id="mobile-menu">
	<div id="mobile-menu-inner">
	<!--<div class="mobile-search"><input type="search" placeholder="Search" /></div>-->
	<!--<a href="/" class="mobileHome">Home</a>-->
	<div id="mobile-menu-container" aria-hidden="true">
		<?php if( !is_home() ) {
			 get_template_part('nav_menu-mobile', 'explore');
		 } ?>
		<ul>


			<li><a href="<?php echo home_url(); ?>">Home</a></li>

		</ul>
		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	</div>


	</div>
	<div class="sheet"></div>
	<div class="sheetbg"></div>
	<div class="blurredBodyCopy" aria-hidden="true">
		<div class="top">

			<?php $args = array( 'post_type' => 'headerslides', 'posts_per_page' => 1 );
					$loop = new WP_Query( $args );
					$loopcount = 0;
					while ( $loop->have_posts() ) : $loop->the_post(); ?>





					    				<?php if ( has_post_thumbnail() ) {


						    				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'large' );
$url = $thumb['0']; ?>

<img src="<?php echo $url; ?>">

						    				<?php } ?>


					<?php endwhile; ?>

		</div>
		<div class="middle"></div>
		<div class="bottom"></div>
	</div>
</div>
<div id="mobile-filter">
	<div id="mobile-filter-inner">
	</div>
</div>

<div class="mobileScroll">

<a href="#" class="mobileNavTriggerLarge" style="display: none;"></a>
<a href="#" class="mobileNavTrigger" aria-hidden="true">Navigation</a>
<div class="ieWarning" style="display: none;">
	<h1>It appears you have adjusted your browser to force compatibility mode.  You will have a less than optimal experience when viewing this site as it was designed with modern web standards in mind.</h1>
	<p>To allow this site to behave normally, turn this off by pressing <strong>alt</strong> then click <strong>Tools</strong> and then <strong>Compatibility View Settings</strong>.  If you uncheck <strong>Display all websites in compatibility view</strong> your browser will be restored to its default behavior for compatibility mode.</p>
	<a href="#" class="button ieWarningDismissOnce">Dismiss</a> or <a href="#" class="button ieWarningDismiss">Dismiss and don't bother me again</a>
</div>
<div id="page" class="hfeed">

	<header id="branding" role="banner">
		<div class="headerCentered">
			<hgroup class="heading">
				<h1 id="site-title" class="accessibleHide"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
				<h2 id="site-description" class="accessibleHide"><?php bloginfo( 'description' ); ?></h2>

			<?php
				// Check to see if the header image has been removed
				$header_image = get_header_image();
				if ( $header_image ) :
					// Compatibility with versions of WordPress prior to 3.4.
					if ( function_exists( 'get_custom_header' ) ) {
						// We need to figure out what the minimum width should be for our featured image.
						// This result would be the suggested width if the theme were to implement flexible widths.
						$header_image_width = get_theme_support( 'custom-header', 'width' );
					} else {
						$header_image_width = HEADER_IMAGE_WIDTH;
					}
					?>

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logoImage">
				<?php
					// The header image
					// Check if this is a post or page, if it has a thumbnail, and if it's a big one
					/*if ( is_singular() && has_post_thumbnail( $post->ID ) &&
							( /* $src, $width, $height */ /*$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( $header_image_width, $header_image_width ) ) ) &&
							$image[1] >= $header_image_width ) :
						// Houston, we have a new header image!
						echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
					else :*/
						// Compatibility with versions of WordPress prior to 3.4.
						if ( function_exists( 'get_custom_header' ) ) {
							$header_image_width  = get_custom_header()->width;
							$header_image_height = get_custom_header()->height;
						} else {
							$header_image_width  = HEADER_IMAGE_WIDTH;
							$header_image_height = HEADER_IMAGE_HEIGHT;
						}
						?>
					<img src="<?php header_image(); ?>" width="<?php echo $header_image_width; ?>" height="<?php echo $header_image_height; ?>" alt="" />
				<?php /*endif;*/ // end check for featured image or standard header ?>
			</a>
			<?php endif; // end check for removed header image ?>

			<div class="utilityMenu">
				<?php wp_nav_menu( array( 'theme_location' => 'utility' ) ); ?>
			</div>


			</hgroup>



			<nav id="access" role="navigation">
				<div class="headeroverlay">


				<div class="mobileScrollTop"></div>
				<div class="centerfix relative">
				<a href="#" class="totop" title="Go to the top of the page">Go to the top of the page</a>
				<h3 class="assistive-text"><?php _e( 'Main menu', 'twentyeleven' ); ?></h3>
				<?php /* Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
				<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to primary content', 'twentyeleven' ); ?></a></div>
				<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to secondary content', 'twentyeleven' ); ?></a></div>
				<?php /* Our navigation menu. If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assigned to the primary location is the one used. If one isn't assigned, the menu with the lowest ID is used. */ ?>
				<div class="navWrapper clearfix">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

				</div>
				<!-- The markup of the navigation if it is hard coded -->
				<!--<ul class="clearfix">
			  		<li><a href="#">Students</a></li>
			  		<li><a href="#">Alumni</a></li>
			  		<li><a href="#">Faculty &amp; Staff</a></li>
			  		<li><a href="#">Industry &amp; Community</a></li>
			  		<li><a href="#">Research</a></li>
			  		<li><a href="#">Outreach</a></li>
  				</ul>-->


  						<?php
				// Has the text been hidden?
				if ( 'blank' == get_header_textcolor() ) :
			?>
				<div class="globalSearch">
				<?php get_search_form(); ?>
				<?php //cals_uw_directory_search($small=true, $add_class = 'search_results'); ?>
				<div class="filtered" style="display: none;">
					<ul>
					<li class="subheading" style="display: block;">Results <span id="filter-count"></span></li>
					<?php


$args = array( 'posts_per_page' => 100 );

$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
	<li>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</li>
<?php endforeach;
wp_reset_postdata();

$pages = get_pages();
  foreach ( $pages as $page ) {
  	echo '<li>';
  	echo '<a href="' . get_page_link( $page->ID ) . '">';
	echo $page->post_title;
	echo '</a>';
	echo '</li>';

  }


  //cals_uw_directory_search($small=true, $add_class = 'search_results');

  ?>
<li><a href="http://www.cals.wisc.edu/agoutlook/">Wisconsin Agricultural Economic Outlook Forum</a><span style="display:none;">Ag outlook</span></li>
<li><a href="http://grow.cals.wisc.edu"><img src="http://grow.cals.wisc.edu/wp-content/themes/grow/thumb.php?src=/wp-content/blogs.dir/9/files/2014/03/spring-2014-cover.jpg&h=100&w=76&zc=1&q=90" style="float: left; margin-right: 8px;"> <strong>Grow Magazine</strong><div>Celebrating 125 years of CALS</div></a></li>

						<!-- Hard code any additional search terms here -->
						<!--<li><a href="#">Search Item 1</a></li>-->

					</ul>

					<div class="directory"></div>
				</div>
				</div>
			<?php
				else :
			?>
				<?php get_search_form(); ?>
			<?php endif; ?>
				</div>


				</div>
			</nav><!-- #access -->


<div class="headingbg clearfix"></div>
		</div>
	</header><!-- #branding -->



<div class="headerPhotoBg">
<div class="headertransition"></div>
<div class="contrastmask1"></div>

<div class="collegeFeature">
<ul class="slides">


					<?php //get_template_part( 'content', 'page' ); ?>

					<?php //comments_template( '', true ); ?>

					<?php $args = array( 'post_type' => 'headerslides', 'posts_per_page' => 1 );
					$loop = new WP_Query( $args );
					$loopcount = 0;
					while ( $loop->have_posts() ) : $loop->the_post();
					$loopcount = $loopcount + 1;
					$slideclass = "slideImage".$loopcount;
					$slideblurclass = "slideBlur".$loopcount;
					?>



    				<li class="flipin">

    					<?php

			$effectfield = get_field_object('banner_effect');
			$effectvalue = get_field('banner_effect');?>

			<?php if($effectvalue == "rainy") { ?>
				<img id="background" alt="background" src="" />
				<div id="cholder">
								    </div>
				<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/rainyday.min.js"></script>
				<script>

				var isMobile = {
				    Android: function() {
				        return navigator.userAgent.match(/Android/i);
				    },
				    BlackBerry: function() {
				        return navigator.userAgent.match(/BlackBerry/i);
				    },
				    iOS: function() {
				        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
				    },
				    Opera: function() {
				        return navigator.userAgent.match(/Opera Mini/i);
				    },
				    Windows: function() {
				        return navigator.userAgent.match(/IEMobile/i);
				    },
				    any: function() {
				        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
			    }
			};
			console.log(isMobile.any());
			if( isMobile.any() ) {
				var isDevice = true;
			}




            function run() {
            	var container = document.getElementById('cholder');
                var image = document.getElementById('background');
                image.onload = function() {
                    var engine = new RainyDay({
                        image: this,
                        parentElement: container,

                    });
                    engine.trail = engine.TRAIL_SMUDGE;

                    if(isDevice) {
					   engine.rain([ [1, 2, 300] ]);
					   engine.rain([ [1, 3, 0.18] ], 50);
					 } else {
						engine.rain([ [1, 2, 1500] ]);
						engine.rain([ [1, 3, 0.18], [3, 5, 0.09] ], 50);
				   }
                };
                image.crossOrigin = 'anonymous';
                image.src = '<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
echo $src[0]; ?>';
            }



	             run();


        </script>
			<?php } else { ?>

			<?php } ?>

    					<div class="slideImage <?php echo $slideclass ?>" style="background: url('<?php

					    				if ( has_post_thumbnail() ) {

						    				//the_post_thumbnail();
						    				//echo get_the_post_thumbnail($page->ID, 'large');
						    				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'large' );
$url = $thumb['0']; echo $url;

						    				} else {

											 //echo '<img src="';
											 //echo catch_that_image();
											// echo '" alt="" />';

										}

				    				?>') no-repeat; background-size: 100% auto;">



				    				<div class="headerBgContainer"><div class="headerbgBlur"><div class="headerbgBlurImage"></div></div></div>
				    				<div class="slideBlurImage"></div>


				    				<div class="slideBlur <?php echo $slideblurclass ?>"></div>
				    				<div class="contrastmask2"></div>
    					</div>








  			<div class="featureCaption">
  				<div class="centered">
  				<h2><?php the_title(); ?></h2>

	  				<div class="featuresubtitle">
	  				<?php the_content(); ?>
	  				</div>
  				</div>
  			</div>

  		</li>


					<?php endwhile; ?>





				</ul>

  	<a href="#" class="next">Next</a>
  	<a href="#" class="previous">Previous</a>

  	<div class="timer">
  		<a href="#">Pause Slide Rotation</a>
	  	<div class="timerLeft">
	  	<div class="timer1"></div>
	  	</div>
	  	<div class="timerRight">
	  	<div class="timer2"></div>
	  	</div>

  	</div>
  </div>
  <div class='fluidHeight' style="display: none;">

			<div class = 'sliderContainer'>

				<div class = 'iosSlider'>

					<div class = 'slider'>





					</div>

				</div>



				<div class = 'scrollbarContainer'></div>

			</div>


		</div>
		<div class="headershade"></div>
		<!-- end of feature slider -->

</div>
