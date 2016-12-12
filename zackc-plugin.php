<?php
/**
 * Plugin Name: Zack C's Plugin
 * Description: Creates a new Taxonomy and Category for Books, as well as a new Widget.
 */

add_action("init", "add_taxonomy");
function add_taxonomy() {
    register_post_type("book",
			array(
				"label" => "Book",
				"show_ui" => true,
				"menu_icon" => "dashicons-book",
			)
	);
    register_taxonomy("book_category", "book");
}

add_filter("title_edit_pre", "prepend_book");
function prepend_book($title, $id) {
    if(get_post_type($id) == "book") {
        $title = "Book: " . $title;
    }
    return $title;
}

class zackc_widget extends WP_Widget { 

    /**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'ZackC Widget',
			'description' => 'Lists all book posts',
		);
		parent::__construct( 'zackc_widget', 'ZackC Widget', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {

    }
}

function register_zackc_widget() {
    register_widget( 'zackc_widget' );
}
add_action( 'widgets_init', 'register_zackc_widget');

?>
