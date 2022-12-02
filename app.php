<?php require_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php'); ?>

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

<?php
 
	

if(!isset($_GET['post_id'])) {
	echo "Missing Parameters";
}else{
	
	global $post; 
	$post = get_post($_GET['post_id']);
	setup_postdata( $post );
	
	?>
	
	<body <?php body_class(); ?>>
		
			
			<div class="mg-blog-post-box"> 
              <div class="mg-header">
                <?php $newsup_single_post_category = esc_attr(get_theme_mod('newsup_single_post_category','true'));
                  if($newsup_single_post_category == true){ ?>
                <div class="mg-blog-category"> 
                      <?php newsup_post_categories(); ?>
                </div>
                <?php } ?>
                <h1 class="title single"> <a title="<?php the_title_attribute( array('before' => esc_html_e('Permalink to: ','newsup'),'after'  => '') ); ?>">
                  <?php the_title(); ?></a>
                </h1>

                <div class="media mg-info-author-block"> 
                  <?php $newsup_single_post_admin_details = esc_attr(get_theme_mod('newsup_single_post_admin_details','true'));
                  if($newsup_single_post_admin_details == true){ ?>
                  <a class="mg-author-pic" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"> <?php echo get_avatar( get_the_author_meta( 'ID') , 150); ?> </a>
                <?php } ?>
                  <div class="media-body">
                    <?php $newsup_single_post_admin_details = esc_attr(get_theme_mod('newsup_single_post_admin_details','true'));
                  if($newsup_single_post_admin_details == true){ ?>
                    <h4 class="media-heading"><span><?php esc_html_e('By','newsup'); ?></span><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php the_author(); ?></a></h4>
                    <?php } ?>
                    <?php $newsup_single_post_date = esc_attr(get_theme_mod('newsup_single_post_date','true'));
                    if($newsup_single_post_date == true){ ?>
                    <span class="mg-blog-date"><i class="fa fa-clock-o"></i> 
						
                       <?php echo mysql2date( get_option( 'date_format' ), $post->post_date); ?></span>
                    <?php }
                    $newsup_single_post_tag = esc_attr(get_theme_mod('newsup_single_post_tag','true'));
                    if($newsup_single_post_tag == true){
                    $tag_list = get_the_tag_list();
                    if($tag_list){ ?>
                    <span class="newsup-tags"><i class="fa fa-user-circle-o"></i>
                      <a href="<?php the_permalink(); ?>"><?php the_tags('', ', ', ''); ?></a>
                    </span>
                  <?php } } ?>
                  </div>
                </div>
              </div>
              <?php
              $single_show_featured_image = esc_attr(get_theme_mod('single_show_featured_image','true'));
              if($single_show_featured_image == true) {
              if(has_post_thumbnail()){
              the_post_thumbnail( '', array( 'class'=>'img-responsive' ) );
               } }?>
              <article class="small single" style="padding-right: 20px; padding-left: 20px;">
                <?php the_content(); ?>
                <?php newsup_edit_link(); ?>
                <?php  newsup_social_share_post($post); ?>
              </article>
              

            </div>
			
		
		<?php
		//Comments Section
		
	global $withcomments;
$withcomments = 1;
		$newsup_enable_single_post_comments = esc_attr(get_theme_mod('newsup_enable_single_post_comments',true));
                  if($newsup_enable_single_post_comments == true) {
                  if (comments_open() || get_comments_number()) :
                  comments_template();
                  endif; }
	
	?>
		
	</body>
	
	<?php
	wp_reset_postdata();
	wp_footer();

	//echo get_the_content("",false,get_post($_GET['post_id']));
	
}

?>