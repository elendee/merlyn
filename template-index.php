<?php
/**
 * Template Name: All Posts
 *
 * @package oko
 */

get_header();
?>

	<div id='merlyn-primary'> <!-- allow both banner and non-banner pages to have margin top under header -->

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

						$cats = get_the_category();

						$categories = '';

						foreach( $cats as $cat ){
							# code...
							// echo $key . '---' . $value;
							// foreach ($cat as $subcat) {
								// echo $cat . ': ' . $subcat . '<br>';
							// }
							$categories = $categories . ' ' . $cat->name;
							// echo $cat->slug;
							// echo $cat->name;
							// echo $cat->category;
							// // echo $cat->;
							// echo '<br>';
							// var_dump( $cat );
						}

						// echo '<h1>' . get_the_category() . '</h1>';

						echo '<div class="merlyn-post-wrap" data-categories="' . $categories . '">';
							echo '<a href="' . $link . '">';
								the_title('<h2 class="entry-title">', '</h2>');
								// echo '<div class="merlyn-thumb">';
								// 	the_post_thumbnail('large');
								// echo '</div>';
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

	</div>

<?php
get_sidebar();
get_footer();




