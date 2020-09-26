<?php
/**
 * Template Name: All Posts
 *
 * @package oko
 */

get_header();
?>

	<?php include 'page_banner.php' ?>

	<main id="primary" class="site-main">

		<div id='merlyn-content'>

			<?php

			$oko_all_query = new WP_Query( array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1) ); ?>

			<?php if ( $oko_all_query->have_posts() ) : ?>

			<ul>

				<?php while ( $oko_all_query->have_posts() ) : $oko_all_query->the_post(); ?>

					<!-- <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li> -->
					<?php
					// the_post();

					$link = get_permalink();

					echo '<div class="merlyn-post-wrap">';
						echo '<a href="' . $link . '">';
							the_title('<h2 class="entry-title">', '</h2>');
							echo '<div class="merlyn-thumb">';
								the_post_thumbnail('large');
							echo '</div>';
						echo '</a>';
						echo '<div class="merlyn-content">';
							the_content();
						echo '</div>';
						// the_excerpt('<div class="merlyn-excerpt">', '</div>');
					echo '</div>';

					?>

				<?php endwhile; ?>

			</ul>

				<?php wp_reset_postdata(); ?>

			<?php else : ?>

				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

			<?php endif; ?>

		</div>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();




