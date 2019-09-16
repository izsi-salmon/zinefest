<?php $metaboxes = array(
    'event_summary' => array(
      'title' => __('Event Summary', 'zinefestTheme'),
      'applicableto' => 'events',
      'location' => 'normal',
      'priority' => 'high',
      'fields' => array(
          'event_summary' => array(
              'title' => __('Add a quick summary of the event to be displayed on the events list page', 'zinefestTheme'),
              'type' => 'summary_text'
          )
      )
    ),
    'featured' => array(
      'title' => __('Featured', 'zinefestTheme'),
      'applicableto' => 'events',
      'location' => 'normal',
      'priority' => 'high',
      'fields' => array(
          'featured' => array(
              'title' => __('Display this event on the homepage', 'zinefestTheme'),
              'type' => 'checkbox'
          )
      )
    ),
    'event_location' => array(
      'title' => __('Event Location', 'zinefestTheme'),
      'applicableto' => 'events',
      'location' => 'normal',
      'priority' => 'high',
      'fields' => array(
          'event_location' => array(
              'title' => __('Add the address or lcoation for the event', 'zinefestTheme'),
              'type' => 'default'
          )
      )
    ),
    'event_date' => array(
      'title' => __('Event Date', 'zinefestTheme'),
      'applicableto' => 'events',
      'location' => 'normal',
      'priority' => 'high',
      'fields' => array(
          'event_date' => array(
              'title' => __('Add the event date (use your preferred date format, this is how it will appear on the site)', 'zinefestTheme'),
              'type' => 'default'
          )
      )
    ),
    'event_start' => array(
      'title' => __('Event Start Time', 'zinefestTheme'),
      'applicableto' => 'events',
      'location' => 'normal',
      'priority' => 'high',
      'fields' => array(
          'event_start' => array(
              'title' => __('Add a start time (use your preferred time format, this is how it will appear on the site)', 'zinefestTheme'),
              'type' => 'default'
          )
      )
    ),
    'event_end' => array(
      'title' => __('Event End Time', 'zinefestTheme'),
      'applicableto' => 'events',
      'location' => 'normal',
      'priority' => 'high',
      'fields' => array(
          'event_end' => array(
              'title' => __('Add an end time', 'zinefestTheme'),
              'type' => 'default'
          )
      )
    ),
    'event_registration_1' => array(
      'title' => __('Registration link 1', 'zinefestTheme'),
      'applicableto' => 'events',
      'location' => 'normal',
      'priority' => 'high',
      'fields' => array(
          'type_1' => array(
              'title' => __('Type of registration (eg. adult, child, stall)', 'zinefestTheme'),
              'type' => 'default'
          ),
          'link_1' => array(
              'title' => __('Registration link', 'zinefestTheme'),
              'type' => 'default'
          )
        )
      ),
    'event_registration_2' => array(
      'title' => __('Registration link 2', 'zinefestTheme'),
      'applicableto' => 'events',
      'location' => 'normal',
      'priority' => 'high',
      'fields' => array(
          'type_2' => array(
              'title' => __('Type of registration (eg. adult, child, stall)', 'zinefestTheme'),
              'type' => 'default'
          ),
          'link_2' => array(
              'title' => __('Registration link', 'zinefestTheme'),
              'type' => 'default'
          )
        )
      ),
    'event_registration_3' => array(
      'title' => __('Registration link 3', 'zinefestTheme'),
      'applicableto' => 'events',
      'location' => 'normal',
      'priority' => 'high',
      'fields' => array(
          'type_3' => array(
              'title' => __('Type of registration (eg. adult, child, stall)', 'zinefestTheme'),
              'type' => 'default'
          ),
          'link_3' => array(
              'title' => __('Registration link', 'zinefestTheme'),
              'type' => 'default'
          )
        )
      ),
      'additional_paragraph' => array(
          'title' => __('Add an additional paragraph', 'zinefestTheme'),
      'applicableto' => 'page',
      'location' => 'normal',
      'priority' => 'high',
      'fields' => array(
          'add_parag_title' => array(
              'title' => __('Additional Paragraph title', 'zinefestTheme'),
              'type' => 'add_text'
          ),
          'add_parag' => array(
              'title' => __('Additional paragraph content', 'zinefestTheme'),
              'type' => 'add_textarea'
          )
        )
      )
    
);


function add_post_format_metabox() {
    global $metaboxes;
    if ( ! empty( $metaboxes ) ) {
        foreach ( $metaboxes as $id => $metabox ) {
            add_meta_box( $id, $metabox['title'], 'show_metaboxes', $metabox['applicableto'], $metabox['location'], $metabox['priority'], $id );
        }
    }
}
add_action( 'admin_init', 'add_post_format_metabox' );

function show_metaboxes( $post, $args ) {
    global $metaboxes;
    $custom = get_post_custom( $post->ID );
    $fields = $tabs = $metaboxes[$args['id']]['fields'];
    
    $output = '<input type="hidden" name="post_format_meta_box_nonce" value="' . wp_create_nonce( basename( __FILE__ ) ) . '" />';
    
    if ( sizeof( $fields ) ) {
        foreach ( $fields as $id => $field ) {
            switch ( $field['type'] ) {
                case 'summary_text':
                    $output .= '<div class="form-group"><label for="' . $id . '">' . $field['title'] . '</label><textarea class="customInput" id="' . $id . '" name="' . $id . '" style="width: 100%;" />' . $custom[$id][0] . '</textarea></div>';
                break;
                case 'checkbox':
                    if($custom['featured'][0] === 'featured'){
                        $output .= '<div class="form-group"><label for="' . $id . '">' . $field['title'] . '</label></br><input type="checkbox" name="' . $id . '" value="featured" checked=checked> </div>'. $postTitle .'<br>';
                      } else{
                        $output .= '<div class="form-group"><label for="' . $id . '">' . $field['title'] . '</label></br><input type="checkbox" name="' . $id . '" value="featured"> </div>'. $postTitle .'<br>';
                      }
                break;
                case 'add_text':
                    if('about-template.php' == get_post_meta( $post->ID, '_wp_page_template', true )){
                        $output .= '<div class="form-group"><label for="' . $id . '">' . $field['title'] . '</label><input class="customInput" id="' . $id . '" type="text" name="' . $id . '" value="' . $custom[$id][0] . '" style="width: 100%;margin-top:10px;margin-bottom:10px;" /></div>';
                    }
                break;
                case 'add_textarea':
                    if('about-template.php' == get_post_meta( $post->ID, '_wp_page_template', true )){
                        $output .= '<div class="form-group"><label for="' . $id . '">' . $field['title'] . '</label><textarea class="customInput" id="' . $id . '" name="' . $id . '" style="width: 100%;margin-top:10px;margin-bottom:20px;height:150px;" />' . $custom[$id][0] . '</textarea></div>';
                    } else{
                        $output .= '<p>No additional paragraph can be added on this page template.</p>';
                    }
                break;
                case 'gallery':
                    $output .= '<div class="form-group"><label for="' . $id . '">' . $field['title'] . '</label><input class="customInput" id="' . $id . '" type="text" name="' . $id . '" value="' . $custom[$id][0] . '" style="width: 100%;" /></div>';
                default:
                    $output .= '<div class="form-group"><label for="' . $id . '">' . $field['title'] . '</label><input class="customInput" id="' . $id . '" type="text" name="' . $id . '" value="' . $custom[$id][0] . '" style="width: 100%;" /></div>';
                break;
            }
        }
    }
    echo $output;
}
function save_metaboxes( $post_id ) {
    global $metaboxes;
    if ( ! wp_verify_nonce( $_POST['post_format_meta_box_nonce'], basename( __FILE__ ) ) )
        return $post_id;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return $post_id;
    if ( 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) )
            return $post_id;
    } elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }
    $post_type = get_post_type();
    foreach ( $metaboxes as $id => $metabox ) {
        if ( $metabox['applicableto'] == $post_type ) {
            $fields = $metaboxes[$id]['fields'];
            foreach ( $fields as $id => $field ) {
                $old = get_post_meta( $post_id, $id, true );
                $new = $_POST[$id];
                if ( $new && $new != $old ) {
                    update_post_meta( $post_id, $id, $new );
                }
                elseif ( '' == $new && $old || ! isset( $_POST[$id] ) ) {
                    delete_post_meta( $post_id, $id, $old );
                }
            }
        }
    }
}
add_action( 'save_post', 'save_metaboxes' );