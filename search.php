<?php
/**
 * The template for displaying search results pages.
 *
 * @package Newsup
 */

get_header(); ?>
<!--==================== Newsup breadcrumb section ====================-->
<div class="mg-breadcrumb-section" style="background: url(&quot;https://sz.hsg-space.de/wp-content/uploads/2020/06/cropped-the-caucasus-5299607_1920-3.jpg&quot; ) repeat scroll center 0 #143745;">
  <div class="overlay">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-sm-12">
			    <div class="mg-breadcrumb-title">
                      <h2><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','newsup'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>
                   </div>
        </div>
      </div>
    </div>
    </div>
</div>
<!--==================== main content section ====================-->
<div id="content">
    <!--container-->
    <div class="container-fluid">
    <!--row-->
        <div class="row">
            <div class="col-md-<?php echo ( !is_active_sidebar( 'sidebar-1' ) ? '12' :'8' ); ?>">
               
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <!-- mg-posts-sec mg-posts-modul-6 -->
                            <div class="mg-posts-sec mg-posts-modul-6">
                                <!-- mg-posts-sec-inner -->
                                <div class="mg-posts-sec-inner">
                                    <?php 
									$counter =0;
									$postsavailable = FALSE;
									if ( have_posts() ) : /* Start the Loop */
									$postsavailable = TRUE;
                                    while ( have_posts() ) : the_post(); ?>
									
								
									<?php if (is_search() && (get_post_type()=="page")) continue;
									$counter=$counter+1;
									?>
                                    <article class="d-md-flex mg-posts-sec-post">
                                    <?php newsup_post_image_display_type($post); ?>
                                            <div class="mg-sec-top-post py-3 col">
                                                    <div class="mg-blog-category"> 
                                                        <?php newsup_post_categories(); ?>
                                                    </div>

                                                    <h4 class="entry-title title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                                                    <?php newsup_post_meta(); ?>

                                                
                                                    <div class="mg-content">
                                                        <p><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
                                                </div>
                                            </div>
                                    </article>
                                    <?php endwhile; else :?>
                                    
        <h2><?php esc_html_e( "Nothing Found", 'newsup' ); ?></h2>
        <div class="">
        <p><?php esc_html_e( "Sorry, but nothing matched your search criteria. Please try again with some different keywords.", 'newsup' ); ?>
        </p>
        <?php get_search_form(); ?>
        </div><!-- .blog_con_mn -->
        <?php endif; if($counter==0&&$postsavailable == TRUE) { ?>
									
									
									 <h2><?php esc_html_e( "Nothing Found", 'newsup' ); ?></h2>
        <div class="">
        <p><?php esc_html_e( "Sorry, but nothing matched your search criteria. Please try again with some different keywords.", 'newsup' ); ?>
        </p>
        <?php get_search_form(); ?>
        </div><!-- .blog_con_mn -->
									
									<?php } ?>
									
                                </div>
                                <!-- // mg-posts-sec-inner -->
                            </div>
                            <!-- // mg-posts-sec block_6 -->

                            <!--col-md-12-->
</div>
            </div>
            <aside class="col-md-4">
                    <?php get_sidebar();?>
            </aside>
        </div><!--/row-->
    </div><!--/container-->
</div>
<?php
get_footer();
?>