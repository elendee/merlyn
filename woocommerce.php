<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package merlyn
 */

get_header();
?>

	<!-- doesnt work ...  -->
	<?php 
		if( get_field('page_banner')){
			echo '<br><br><br><br><br><h1>got em</h1>';
		}
	?>

	<?php include 'page_banner.php' ?>

	<main id="primary" class="site-main">

		<div id='merlyn-content'>
		
			<div class='oko-contain-wrapper'>

				<div class='oko-constrain'>

					<?php
						woocommerce_content();
					?>

				</div>

			</div>

		</div>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
