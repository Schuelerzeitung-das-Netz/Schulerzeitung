<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package Newsup
 */


?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<!--R-QUIZ -->
	<link href="https://www.felix-riesterer.de/main/js/rquiz/rquiz.css" rel="stylesheet">
	<script type="text/javascript" src="https://www.felix-riesterer.de/main/js/rquiz/rquiz.js"></script>
		
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
	<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
	
<script>
	
		function loadGA() {
		
		  window.dataLayer = window.dataLayer || [];
 		 function gtag(){dataLayer.push(arguments);}
 		 gtag('js', new Date());

  		gtag('config', 'G-KWT6TPMJ7H');
		
		var gascript = document.createElement("script");
 		 gascript.async = true;
  		gascript.src = "https://www.googletagmanager.com/gtag/js?id=G-KWT6TPMJ7H";
 		 document.getElementsByTagName("head")[0].appendChild(gascript, document.getElementsByTagName("head")[0]); 
		
	}
	
	
if (document.cookie.split(';').filter(function(item) {
    return item.indexOf('cookieconsent_status=allow') >= 0
}).length) {
    loadGA();
}
	
	
window.addEventListener("load", function(){
	window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#252e39"
    },
    "button": {
      "background": "#6FA845"
    }
  },
  "theme": "classic",
  "position": "bottom-right",
  "type": "opt-in",
  "content": {
    "message": "Wir nutzen Cookies und Google Analytics, um diese Website stetig zu verbessern. Sind Sie damit einverstanden? (Sie können diese Entscheidung jederzeit widerrufen)",
    "allow": "Akzeptieren",
	  "deny":"Ablehnen",
    "link": "Mehr erfahren",
	"href": "https://sz.hsg-space.de/datenschutzerklaerung/"
},
		onStatusChange: function(status, chosenBefore) {
			var type = this.options.type;
			var didConsent = this.hasConsented();
			if (type == 'opt-in' && didConsent) {
				// enable cookies
				loadGA();
			}
		}
	})
})
</script>


	
	
	

	<?php wp_head(); ?>
	


	

</head>
<body <?php body_class(); ?> >
	
	
	
	
	
<?php wp_body_open(); ?>
<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#content">
<?php _e( 'Skip to content', 'newsup' ); ?></a>
    <div class="wrapper">
        <header class="mg-headwidget">
            <!--==================== TOP BAR ====================-->

            <?php do_action('newsup_action_header_section');  ?>
			<a href="/">
            <div class="clearfix"></div>
            <?php $background_image = get_theme_support( 'custom-header', 'default-image' );
            if ( has_header_image() ) {
              $background_image = get_header_image();
            } ?>
            <div class="mg-nav-widget-area-back" style='background-image: url("<?php echo esc_url( $background_image ); ?>" );'>
            <?php $remove_header_image_overlay = get_theme_mod('remove_header_image_overlay',false); ?>
            <div class="overlay">
              <div class="inner" <?php if($remove_header_image_overlay == false) { 
            $newsup_header_overlay_color = get_theme_mod('newsup_header_overlay_color','rgba(32,47,91,0.4)');?> style="background-color:<?php echo esc_attr($newsup_header_overlay_color);?>;" <?php } ?>> 
                <div class="container-fluid">
           

                </div>
				  <div style="width: 100%;height: 150px;display:flex;align-items:center;">
					  
					  <img src="https://sz-hsg.de/wp-content/uploads/2022/03/dasnetz_website_banner.svg" style="height: 150%;object-fit: cover; object-position:0% 70%;"/>
					  
				  </div>

              </div>

              </div>
          </div>
				
			</a>
    <div class="mg-menu-full">
      <nav class="navbar navbar-expand-lg navbar-wp">
        <div class="container-fluid flex-row-reverse">
          <!-- Right nav -->
                    <div class="m-header d-flex pl-3 ml-auto my-2 my-lg-0 position-relative align-items-center">
                        <?php $home_url = home_url(); ?>
                        <a class="mobilehomebtn" href="<?php echo esc_url($home_url); ?>"><span class="fa fa-home"></span></a>
						

						
                        <!-- navbar-toggle -->
                        <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbar-wp" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <i class="fa fa-bars"></i>
                        </button>
                        <!-- /navbar-toggle -->
                        <div class="dropdown show mg-search-box pr-2">
							 <?php get_search_form(); ?>
                           

                            <div class="dropdown-menu searchinner" aria-labelledby="dropdownMenuLink">
                       
                      </div>
                        </div>
                        
                    </div>
                    <!-- /Right nav -->
         
          
                  <div class="collapse navbar-collapse" id="navbar-wp">
                  	<div class="d-md-block">
                  <?php wp_nav_menu( array(
        								'theme_location' => 'primary',
        								'container'  => 'nav-collapse collapse navbar-inverse-collapse',
        								'menu_class' => 'nav navbar-nav mr-auto',
        								'fallback_cb' => 'newsup_fallback_page_menu',
        								'walker' => new newsup_nav_walker()
        							) ); 
        						?>
        				</div>		
              		</div>
          </div>
      </nav> <!-- /Navigation -->
    </div>
			
			
			
</header>
<div class="clearfix"></div>
<?php 
		
							// get the post
$post = get_page_by_title('Announcement', OBJECT, 'page' );
// filter its content
$content = apply_filters('the_content', $post->post_content );
// display it
echo $content;
		
		if (is_front_page() || is_home()) { ?>
<section class="mg-tpt-tag-area">
  <div class="container-fluid">
 <?php $show_popular_tags_title = newsup_get_option('show_popular_tags_title');
 $select_popular_tags_mode = newsup_get_option('select_popular_tags_mode');
 $number_of_popular_tags = newsup_get_option('number_of_popular_tags');
 newsup_list_popular_taxonomies($select_popular_tags_mode, $show_popular_tags_title, $number_of_popular_tags); ?>
</div>
</section>
 <?php }?>
 <?php do_action('newsup_action_banner_exclusive_posts'); 
 do_action('newsup_action_front_page_main_section_1'); ?>
