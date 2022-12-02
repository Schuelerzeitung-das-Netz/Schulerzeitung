<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package Newsup
 */
get_header(); 
?>
<!--==================== Newsup breadcrumb section ====================-->
<?php get_template_part('index','banner'); ?>
<!--==================== main content section ====================-->
<main id="content">
    <div class="container-fluid">
      <div class="row">
		<!-- Blog Area -->
			<?php if( class_exists('woocommerce') && (is_account_page() || is_cart() || is_checkout())) { ?>
			<div class="col-md-12 mg-card-box padding-20">
			<?php if (have_posts()) {  while (have_posts()) : the_post(); ?>
			<?php the_content(); endwhile; } } else {?>
			<div class="col-md-8 mg-card-box padding-20">
			<?php if( have_posts()) :  the_post(); ?>		
			
				
				<?php
													 
				 if (strpos($_SERVER['REQUEST_URI'], "/autoren") === 0) {
					echo "<h1>Autoren</h1>";
					
					 //TODO hide autors without posts
					 
					$tags = get_tags(array(
  				'hide_empty' => true,
				'orderby' => 'count',
				'order' => 'DESC'
				));
				
					
			foreach ($tags as $tag) {
				
				$tag_link = get_tag_link( $tag->term_id );
				
			  echo nl2br("<article class=\"d-md-flex mg-posts-sec-post\">" .  "<span style=\"display:block;margin-left: 12px;\" class=\"autorenlist\"><a class=\"entry-title title\" href=\"" . $tag_link ."\">" . $tag->name . "</a>");
				?>
				
				
				
				<?php
			  echo ("<div style=\"position: absolute;right: 50px;display: inline-block;\">Beiträge: ".$tag->count."</div> " . tag_description($tag)  ." ". " ");
			  
			  
			  echo ("</span>"." </article>");
				
			}
			
					
					
  				
					
					
				}else{
					 the_content(); 
				}
					
					?>
				
				
			<?php endif; 
				while ( have_posts() ) : the_post();
				// Include the page
				the_content();
				comments_template( '', true ); // show comments
				wp_link_pages(array(
        'before' => '<div class="link btn-theme">' . esc_html__('Pages:', 'newsup'),
        'after' => '</div>',
    ));
				
				endwhile;
				newsup_page_edit_link();
			?>	
			</div>
			<!--Sidebar Area-->
			<aside class="col-md-4">
				<?php get_sidebar(); ?>
			</aside>
			<?php } ?>
			<!--Sidebar Area-->
			</div>
		</div>
	</div>
</main>
<?php
get_footer();
