<?php
/**
 * Plugin Name: Admin Menu Pending Posts
 */

add_action( 'admin_menu', 'add_pending_bubble' );

function add_pending_bubble() {
	global $menu;

	$custom_post_count = wp_count_posts('post');
	$user_count = $custom_post_count->pending;



	if ( $user_count ) {

		foreach ( $menu as $key => $value ) {

			if ( $menu[$key][2] == 'edit.php' ) {

				$menu[$key][0] .= sprintf(
					'<span class="update-plugins count-%1$s" style="margin-left:10px"><span class="plugin-count">%1$s</span></span>',
					$user_count				);

				return;

			}

		}

	}

}