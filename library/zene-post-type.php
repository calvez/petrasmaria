<?php
class pm_project {

	function pm_project() {
		add_action('init',array($this,'create_post_type'));
		add_action('init',array($this,'create_taxonomies'));
		add_action('manage_pm_project_posts_columns',array($this,'columns'),10,2);
		add_action('manage_pm_project_posts_custom_column',array($this,'column_data'),11,2);
		add_filter('posts_join',array($this,'join'),10,1);
		add_filter('posts_orderby',array($this,'set_default_sort'),20,2);
	}

	function create_post_type() {
		$labels = array(
			'name'               => 'Albumok',
			'singular_name'      => 'Album',
			'menu_name'          => 'Albumok',
			'name_admin_bar'     => 'Album',
			'add_new'            => 'Új hozzáadása',
			'add_new_item'       => 'Új album',
			'new_item'           => 'Új album',
			'edit_item'          => 'Album szerkesztése',
			'view_item'          => 'Megtekintés',
			'all_items'          => 'Összes',
			'search_items'       => 'Keresés',
			'parent_item_colon'  => 'Szülő album',
			'not_found'          => 'Nincs találat',
			'not_found_in_trash' => 'A lomtár üres'
		);

		$args = array(
			'labels'              => $labels,
			'public'              => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_nav_menus'   => true,
			'show_in_menu'        => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-format-audio',
			'capability_type'     => 'post',
			'hierarchical'        => false,
			'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
			'has_archive'         => true,
			'rewrite'             => array( 'slug' => 'zene' ),
			'query_var'           => true
		);

		register_post_type( 'pm_project', $args );
	}

	function create_taxonomies() {

		// Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
			'name'              => 'Album kategória',
			'singular_name'     => 'Album kategória',
			'search_items'      => 'Keresés',
			'all_items'         => 'Összes típus',
			'parent_item'       => 'Parent Type',
			'parent_item_colon' => 'Parent Type:',
			'edit_item'         => 'Szerkesztés',
			'update_item'       => 'Frissítés',
			'add_new_item'      => 'Új hozzáadása',
			'new_item_name'     => 'Új megnevezése',
			'menu_name'         => 'Kategóriák',
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'type' ),
		);

		register_taxonomy('pm_project_type',array('pm_project'),$args);

		// Add new taxonomy, NOT hierarchical (like tags)
		$labels = array(
			'name'                       => 'Attributes',
			'singular_name'              => 'Attribute',
			'search_items'               => 'Attributes',
			'popular_items'              => 'Popular Attributes',
			'all_items'                  => 'All Attributes',
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => 'Edit Attribute',
			'update_item'                => 'Update Attribute',
			'add_new_item'               => 'Add New Attribute',
			'new_item_name'              => 'New Attribute Name',
			'separate_items_with_commas' => 'Separate Attributes with commas',
			'add_or_remove_items'        => 'Add or remove Attributes',
			'choose_from_most_used'      => 'Choose from most used Attributes',
			'not_found'                  => 'No Attributes found',
			'menu_name'                  => 'Attributes',
		);

		$args = array(
			'hierarchical'          => false,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'attribute' ),
		);

		register_taxonomy('pm_project_attribute','pm_project',$args);
	}

	function columns($columns) {
		unset($columns['date']);
		unset($columns['taxonomy-pm_project_attribute']);
		unset($columns['comments']);
		unset($columns['author']);
		return array_merge(
			$columns,
			array(
				'sm_awards' => 'Awards',
				'sm_timeframe' => 'Timeframe'
			));
	}

	function column_data($column,$post_id) {
		switch($column) {
			case 'sm_awards' :
				echo get_post_meta($post_id,'awards',1);
				break;
			case 'sm_timeframe' :
				echo get_post_meta($post_id,'timeframe',1);
				break;
		}
	}

	function join($wp_join) {
		global $wpdb;
		if(get_query_var('post_type') == 'pm_project') {
			$wp_join .= " LEFT JOIN (
					SELECT post_id, meta_value AS awards
					FROM $wpdb->postmeta
					WHERE meta_key = 'awards' ) AS meta
					ON $wpdb->posts.ID = meta.post_id ";
		}
		return ($wp_join);
	}

	function set_default_sort($orderby,&$query) {
		global $wpdb;
		if(get_query_var('post_type') == 'pm_project') {
			return "meta.awards DESC";
		}
	 	return $orderby;
	}
}

new pm_project();
?>
