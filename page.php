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

	<div id='merlyn-primary'> <!-- allow both banner and non-banner pages to have margin top under header -->

		<?php include 'page_banner.php' ?>

		<main id="primary" class="site-main">

			<div id='merlyn-content'>
			
				<div class='oko-contain-wrapper'>

					<div class='oko-constrain'>

						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>

					</div>

				</div>

			</div>

		</main><!-- #main -->

	</div>

<?php
// get_sidebar();
get_footer();
