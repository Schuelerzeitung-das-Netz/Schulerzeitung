<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Newsup
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<div id="sidebar-right" class="mg-sidebar">
		
		
		<style>
			
			#polls-widget-3 .wp-polls-ans2 > ul {
				display: none;
			}
			</style>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
		
		
		<style>
			
			</style>
		
	</div>
</aside><!-- #secondary -->
