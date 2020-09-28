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
	
	<div id='merlyn-primary'></div> <!-- allow both banner and non-banner pages to have margin top under header -->

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
