<?php
add_action('after_setup_theme', 'university_features');
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
}
add_action('init','university_post_types');
function university_adjust_queries($query){
        if(!is_admin() AND is_post_type_archive('event')AND $query->is_main_query()){
        $today=date('Ymd');
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order','ASC');
        $query->set('meta_query',array(
            array(
              'key'=>'event_date',
              'compare'=>'>=',
              'value'=> $today,
              'type'=> 'numeric',
                )
            ));
        }
    }
?>