<?php
/**
 * Plugin Name: Multilingual Comments (WPML)
 * Plugin URI: https://wordpress.org/plugins/multilingual-comments
 * Description: This plugin combines comments from all translations of the posts and pages using WPML. Comments are internally still attached to the post or page in the language they were made on.
 * Version: 1.0.0
 * Author: Pieter Bos
 * Author URI: https://so-wp.com
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: multilingual-comments
 * Domain Path: /languages
 */

/**
 * This is a fixed version of the no longer maintained WPML Comment Merging plugin:
 * http://wordpress.org/extend/plugins/wpml-comment-merging/ and https://github.com/JulioPotier/wpml-comments-merging
 */

// don't load the plugin file directly
if ( ! defined( 'ABSPATH' ) ) exit;

function is_wpml_active() {
	if (!function_exists('is_plugin_active')) {
		include_once(ABSPATH . 'wp-admin/includes/plugin.php');
	}

	return is_plugin_active('sitepress-multilingual-cms/sitepress.php');
}

function mlc_merge_comments_activation() {
	if (!is_wpml_active()) {
		deactivate_plugins(plugin_basename(__FILE__));
		wp_die(
			__(
				'The "Multilingual Comments (WPML)" plugin requires the WPML plugin to be installed and activated.',
				'multilingual-comments'
			),
			__('Plugin Activation Error', 'multilingual-comments'),
			array('response' => 200, 'back_link' => true)
		);
	}
}

register_activation_hook(__FILE__, 'mlc_merge_comments_activation');

function mlc_sort_merged_comments($a, $b) {
	return $a->comment_ID - $b->comment_ID;
}

function mlc_merge_comments($comments, $post_ID) {
	global $sitepress;
	global $wpdb;

	remove_filter('comments_clauses', array($sitepress, 'comments_clauses'));

	$languages = apply_filters('wpml_active_languages', null, 'skip_missing=1');

	$post = get_post($post_ID);
	$type = $post->post_type;

	foreach ($languages as $code => $l) {
		if (!$l['active']) {
			$otherID = apply_filters('wpml_object_id', $post_ID, $type, false, $l['language_code']);
			$othercomments = get_comments(array('post_id' => $otherID, 'status' => 'approve', 'order' => 'ASC'));
			$comments = array_merge($comments, $othercomments);
		}
	}

	if ($languages) {
		usort($comments, 'mlc_sort_merged_comments');
	}

	add_filter('comments_clauses', array($sitepress, 'comments_clauses'), 10, 2);

	return $comments;
}


function mlc_merge_comment_count($count, $post_ID) {
	$languages = apply_filters('wpml_active_languages', null, 'skip_missing=1');

	$post = get_post($post_ID);
	$type = $post->post_type;

	foreach ($languages as $l) {
		if (!$l['active']) {
			$otherID = apply_filters('wpml_object_id', $post_ID, $type, false, $l['language_code']);
			if ($otherID) {
				$otherpost = get_post($otherID);
				if ($otherpost) {
					$count = $count + $otherpost->comment_count;
				}
			}
		}
	}

	return $count;
}

add_filter('comments_array', 'mlc_merge_comments', 100, 2);
add_filter('get_comments_number', 'mlc_merge_comment_count', 100, 2);

