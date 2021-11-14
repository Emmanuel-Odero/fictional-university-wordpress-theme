<?php
add_action('after_setup_theme', 'university_features');
//The university post type begins here
function university_post_types(){
    register_post_type('event', array(
        'supports'=>array('title','editor', 'excerpt'),
        'show_in_rest'=>true,
        'rewrite'=>array('slug' => 'events'),
        'has_archive'=> true,
        'public'=> true,
        'labels'=> array(
            'name' => 'Events',
            'add_new_item'=> 'Add New Event',
            'edit_item'=> 'Edit Events',
            'all_items'=>'All Events',
            'Singular_name'=>'Event'
        ),
        'menu_icon'=> 'dashicons-calendar',
    ));
     //The Programs post typen begins here
     register_post_type('programs', array(
        'supports'=>array('title','editor'),
        'show_in_rest'=>true,
        'rewrite'=>array('slug' => 'programs'),
        'has_archive'=> true,
        'public'=> true,
        'labels'=> array(
            'name' => 'Programs',
            'add_new_item'=> 'Add New programs',
            'edit_item'=> 'Edit Programs',
            'all_items'=>'All programs',
            'Singular_name'=>'program'
        ),
        'menu_icon'=> 'dashicons-awards',
    ));
}
add_action('init','university_post_types');
?>
