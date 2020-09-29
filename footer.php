<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package merlyn
 */

?>

	<footer id="colophon" class="site-footer">

		<?php

			if( is_active_sidebar('footer-sidebar-1') || is_active_sidebar('footer-sidebar-1') || is_active_sidebar('footer-sidebar-1') ){

				$column_width = 0;
				if( is_active_sidebar('footer-sidebar-1') ){
					$column_width++; // $column_width + 1;
				}
				if( is_active_sidebar('footer-sidebar-2') ){
					$column_width++; // $column_width + 1;
				}
				if( is_active_sidebar('footer-sidebar-3') ){
					$column_width++; // $column_width + 1;
				}

				echo '<div id="merl-footer-widgets" class="oko-row">';

				if(is_active_sidebar('footer-sidebar-1')){
					echo '<div id="footer-sidebar1" class="oko-column oko-column' . $column_width . '">';
						dynamic_sidebar('footer-sidebar-1');
					echo '</div>';
				}
				if(is_active_sidebar('footer-sidebar-2')){
					echo '<div id="footer-sidebar2" class="oko-column oko-column' . $column_width . '">';
						dynamic_sidebar('footer-sidebar-2');
					echo '</div>';
				}
				if(is_active_sidebar('footer-sidebar-3')){
					echo '<div id="footer-sidebar3" class="oko-column oko-column' . $column_width . '">';
						dynamic_sidebar('footer-sidebar-3');
					echo '</div>';
				}

				echo '</div>';

			}

		?>

		<div class="site-info flex-wrapper">
			<?php 
			if( get_theme_mod('footer_copy_settings') ){
				echo get_theme_mod('footer_copy_settings');
			}else{
				echo '&copy;' . date('Y');
			}
			?>
		</div><!-- .site-info -->

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
