<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package merlyn
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<!-- <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'merlyn' ); ?></a> -->

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
				the_custom_logo();
			?>
			<div class='header-words'>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php 
					$merlyn_description = get_bloginfo( 'description', 'display' );
					if ( $merlyn_description || is_customize_preview() ) :
				?>
					<p class="site-description">
						<?php echo $merlyn_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</p>
				<?php endif; ?>
			</div>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<svg class='menu-toggle' viewBox='0 0 100 100' >	
				<path id='menuL' d="M 16.015625,64.875000 L 84.585938,64.875000 L 84.585938,74.761719 L 16.015625,74.761719 L 16.015625,64.875000	z"	/>
				<path id='menuC' d="M 16.070312,42.359375 L 84.640625,42.359375 L 84.640625,52.246094 L 16.070312,52.246094 L 16.070312,42.359375	z"	/>
				<path id='menuR' d="M 15.679688,21.222656 L 84.250000,21.222656 L 84.250000,31.109375 L 15.679688,31.109375 L 15.679688,21.222656	z"	/>
			</svg>
			<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'merlyn' ); ?></button> -->
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
