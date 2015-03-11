<?php
/**
 * Plugin Name:     Admin Menu Pending Post
 * Plugin URI:      @todo
 * Description:     Adds a bubble in the admin menu with the number of pending posts.
 * Version:         1.0.0
 * Author:          Nikhil Vimal
 * Author URI:      http://nik.techvoltz.com
 *
 * @copyright       Copyright Nikhil Vimal (c) 2014
 */

/**
 * Main Function adding the bubble with the number to the admin menu
 */
function add_pending_admin_bubble() {

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
add_action( 'admin_menu', 'add_pending_admin_bubble' );
