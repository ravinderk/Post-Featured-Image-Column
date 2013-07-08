<?php
/**
 * Plugin name: Post Featured Image Column
 * Author: Mayank Gupat/Ravinder Kumar
 * Author Uri: http://blogdesignstudio.com
 */
?>
<?php
// add a column to post list in admin
add_filter('manage_post_posts_columns','ravs_featured_image_col');

/**
 * ravs_featured_image_col fx used to add a column 'Featured Image' to post list in admin
 * @param Array $columns all column of post list stored in this array
 * @return Array         add 'Faetured Image' column to post list array 
 */
function ravs_featured_image_col( $columns ){
  $args = array(
		'featured_image_col' => 'Featured Image'
		);
	return array_merge( $columns, $args);
}

// define what we want in post 'Featured Image' column
add_action('manage_post_posts_custom_column','ravs_featured_image_col_callback',10,2);

/**
 * ravs_featured_image_col_callback fx used to show featured image of post if assign ,otherwisw alternative message
 * @param  string $column column name
 * @param  int $pid    Single post ID
 */
function ravs_featured_image_col_callback( $column, $pid ){
	Switch( $column ){
		case 'featured_image_col':
			if( get_post_thumbnail_id($pid) )
				echo get_the_post_thumbnail($pid, array(80,80));
			else
				echo'<p style="background-color:red;color:white;text-align:center">No Featured Image</p>';
			break;
		}

}
?>
