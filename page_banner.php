<?php 
if( get_field('page_banner') ){

	$banner = get_field('page_banner');
	$desktop_height = get_field('page_banner_height_desktop');
	$mobile_height = get_field('page_banner_height_mobile');

	if( $desktop_height ){
		echo '<div class="page-banner desktop-only" style="background-image: url(' . $banner . '); height:' . $desktop_height . 'px"></div>';
	}
	if( $mobile_height ){
		echo '<div class="page-banner mobile-only" style="background-image: url(' . $banner . '); height:' . $mobile_height . 'px"></div>';
	}
	if( !$mobile_height && !$desktop_height ){
		echo '<div class="page-banner" style="background-image: url(' . $banner . ');"></div>';
	}
	
}
