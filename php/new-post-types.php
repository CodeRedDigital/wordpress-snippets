//======================================================================== 
// This is used for creating a new post type within Wordpress.
// Explanations of the functionality are inline comments
// https://developer.wordpress.org/reference/functions/register_post_type/
//========================================================================

<?php
function new_post_types() { // function that creates the new post types, which can contain multiple
    register_post_type('Post Type Name', array( // register new post type with a Name and an array with the post type settings
        'show_in_rest' => true, // show_in_rest is a boolean that declares whether the post type will use the Wordpress RESTFulAPI aka Gutenberg
        'supports' => array('title', 'editor', 'excerpt'), // supports is an array of fields that will be shown in this example I am showing Title (name of post) editor (use the modern wysiwyg) and include excerpt for editing
        'rewrite' => array('slug' => 'post-type-names'), // rewrite allows you to set the URL path for the posts i.e. the slug
        'has_archive' => true, // has_archive is a boolean that allows you to set if the 
        'public' => true, // can this post type be searchable
        'labels' => array( // labels an array of the text used for displaying the post types in the Wordpress interface
          'name' => 'Post Type Name', // name is what it says
          'add_new_item' => 'Add New Post Type Name', // what it says in WP interface to Add a new one
          'edit_item' => 'Edit Event', // what it says in WP interface to Edit one
          'all_items' => 'All Events', // what it says in WP interface All the post types
          'singular_name' => 'Event' // what it says in WP interface for a single one
        ),
        'menu_icon' => 'dashicons-calendar-alt' // what to display in WP interface as an icon
      ));
      // multiple post types can be registered in this block
}
add_action('init', 'new_post_types'); // initialise or run the new post types
?>