<?php
/*-------------------------------------------------------------------------*/
/*                        REGISTER CUSTOM NAVIGATION WALKER                */
/*-------------------------------------------------------------------------*/

if ( ! file_exists( get_template_directory() . '/class-bootstrap-5-navwalker.php' ) ) {
    // File does not exist... return an error.
    return new WP_Error( 'class-bootstrap-5-navwalker-missing', __( 'It appears the class-bootstrap-5-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    // File exists... require it.
    require_once get_template_directory() . '/class-bootstrap-5-navwalker.php';
}

/*-------------------------------------------------------------------------*/
/*                        ENQUEUE ALL THE THINGS                           */
/*-------------------------------------------------------------------------*/

function wp_custom_styles(){
    wp_register_style('bootstrap5', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '5.3.0', 'all');
    wp_enqueue_style('bootstrap5');
    wp_register_style('custom', get_template_directory_uri().'/assets/css/custom.css', array(), '1.0.0', 'all');
    wp_enqueue_style('custom');
    wp_register_style('addcourse', get_template_directory_uri().'/assets/css/add_course.css', array(), '1.0.0', 'all');
    wp_enqueue_style('addcourse');
    wp_register_style('dashcss', get_template_directory_uri().'assets/css/add_course.css', array(), '1.0.0', 'all');
    wp_enqueue_style('dashcss');
}
add_action('wp_enqueue_scripts', 'wp_custom_styles');

function wp_custom_scripts(){
    wp_register_script('bootstrap-js', get_template_directory_uri(). 'assets/js/bootstrap.min.js', array(), '5.3.0', true);
    wp_enqueue_script('bootstrap-js');
    wp_register_script('custom-js', get_template_directory_uri(). 'assets/js/custom.js', array(), '1.0.0', true);
    wp_enqueue_script('custom-js');
}
add_action('wp_enqueue_scripts', 'wp_custom_scripts');
/*-------------------------------------------------------------------------*/
/*                        REGISTER WIDGETS AND MENUS                       */
/*-------------------------------------------------------------------------*/

function wp_custom_menus(){
    add_theme_support('menus');

    register_nav_menus(array(
        'primary' => 'Main Menu',
        'secondary' => 'Footer Menu'
    ));
}
add_action('init', 'wp_custom_menus');

function wp_register_sidebar(){
    add_theme_support('widgets');

    register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'theme_name' ),
		'id'            => 'sidebar-1',
        'description'   => __( 'A short description of the sidebar.' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Secondary Sidebar', 'theme_name' ),
		'id'            => 'sidebar-2',
        'description'   => __( 'A short description of the sidebar.' ),
		'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li></ul>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action('widgets_init', 'wp_register_sidebar');


/*-------------------------------------------------------------------------*/
/*                        ADD THEME SUPPORT                                */
/*-------------------------------------------------------------------------*/
function custom_theme_setup() {
    add_theme_support( 'html5', array( 'comment-list' ) );
	
	add_theme_support('post-thumbnails');

	add_theme_support( 'title-tag' );

	add_theme_support('custom-header');

	add_theme_support('custom-background');

	add_theme_support('post-formats', array('aside', 'image', 'video'));
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

/*-------------------------------------------------------------------------*/
/*                        ADD THEME SUPPORT                                */
/*-------------------------------------------------------------------------*/
function recent_posts_transient(){
	if(false!==get_transient('recent_posts')){
		delete_transient('recent_posts');
	}
}
add_action('save_post', 'recent_posts_transient');

/*-------------------------------------------------------------------------*/
/*                        LIMIT LOGIN ATTEMPTS                             */
/*-------------------------------------------------------------------------*/
function check_attempted_login( $user, $username, $password ) {
    if ( get_transient( 'attempted_login' ) ) {
        $datas = get_transient( 'attempted_login' );

        if ( $datas['tried'] >= 3 ) {
            $until = get_option( '_transient_timeout_' . 'attempted_login' );
            $time = time_to_go( $until );

            $error_message = '<p style="color: black"><strong>ERROR</strong>: You have reached authentication limit, you will be able to try again in %1$s.</p>' . $time . '.';
            $error = new WP_Error('too_many_tried', $error_message);
            
            // Get the error message as a string
            
            $error_string = $error->get_error_message('<p style="color: black">too_many_tried</p>');
        
        }
    }

    return $user;
}

add_filter( 'authenticate', 'check_attempted_login', 30, 3 ); 

function login_failed( $username ) {
    if ( get_transient( 'attempted_login' ) ) {
        $datas = get_transient( 'attempted_login' );
        $datas['tried']++;

        if ( $datas['tried'] <= 3 )
            set_transient( 'attempted_login', $datas , 300 );
    } else {
        $datas = array(
            'tried'     => 1
        );
        set_transient( 'attempted_login', $datas , 300 );
    }
}

add_action( 'wp_login_failed', 'login_failed', 10, 1 ); 

function time_to_go($timestamp){

    // converting the mysql timestamp to php time
    $periods = array(
        "second",
        "minute",
        "hour",
        "day",
        "week",
        "month",
        "year"
    );
    $lengths = array(
        "60",
        "60",
        "24",
        "7",
        "4.35",
        "12"
    );
    $current_timestamp = time();
    $difference = abs($current_timestamp - $timestamp);
    for ($i = 0; $difference >= $lengths[$i] && $i < count($lengths) - 1; $i ++) {
        $difference /= $lengths[$i];
    }
    $difference = round($difference);
    if (isset($difference)) {
        if ($difference != 1)
            $periods[$i] .= "s";
            $output = "$difference $periods[$i]";
            return $output;
    }
}
/*-------------------------------------------------------------------------*/
/*             SHOW DIFFERENT DASHBOARD DEPENDING ON USER                  */
/*-------------------------------------------------------------------------*/
function dashboard_page_template($template) {
    if(!is_user_logged_in()) return $template;
  
    $current_page = get_queried_object();
    if($current_page->post_name === 'dashboard') { // modify only if the current page is 'dashboard'
        $new_template = '';
        $current_user = wp_get_current_user();
        $user = new WP_User( $current_user->ID);

        if(in_array('course_manager', $user->roles) || in_array('administrator', $user->roles)){
            $new_template = locate_template( array( 'admin-dash.php' ) );
        }
        elseif(in_array('student', $user->roles)){
            $new_template = locate_template( array( 'user-dashboard.php' ) );
        }else{
            $new_template = locate_template( array( 'front-page.php' ) );
        }
        if ( '' != $new_template ) {
            $template = $new_template;
        }
    }
    return $template;
}
add_filter( 'template_include', 'dashboard_page_template' );

function courses_page_template($template) {
    if(!is_user_logged_in()) return $template;
  
    $current_page = get_queried_object();
    if($current_page->post_name === 'courses') { 
        $new_template = '';
        $current_user = wp_get_current_user();
        $user = new WP_User( $current_user->ID);

        if(in_array('course_manager', $user->roles) || in_array('administrator', $user->roles)){
            $new_template = locate_template( array( 'courses.php' ) );
        }
        elseif(in_array('student', $user->roles)){
            $new_template = locate_template( array( 'user-dashboard.php' ) );
        }else{
            $new_template = locate_template( array( 'front-page.php' ) );
        }
        if ( '' != $new_template ) {
            $template = $new_template;
        }
    }
    return $template;
}
add_filter( 'template_include', 'courses_page_template' );

function profile_page_template($template) {
    if(!is_user_logged_in()) return $template;
  
    $current_page = get_queried_object();
    if($current_page->post_name === 'user-profile') { 
        $new_template = '';
        $current_user = wp_get_current_user();
        $user = new WP_User( $current_user->ID);

        if(in_array('course_manager', $user->roles) || in_array('administrator', $user->roles)){
            $new_template = locate_template( array( 'admin-dash.php' ) );
        }
        elseif(in_array('student', $user->roles)){
            $new_template = locate_template( array( 'user-dashboard.php' ) );
        }else{
            $new_template = locate_template( array( 'front-page.php' ) );
        }
        if ( '' != $new_template ) {
            $template = $new_template;
        }
    }
    return $template;
}
add_filter( 'template_include', 'profile_page_template' );

function wpb_recently_registered_users() { 
 
    global $wpdb;
     
    $wp_users = '<ul class="recently-user">';
     
    $usernames = $wpdb->get_results("SELECT user_nicename, user_url, user_email FROM $wpdb->users WHERE user_login != 'admin' ORDER BY ID DESC LIMIT 5");
     
    foreach ($usernames as $username) {
     
    if (!$username->user_url) :
     
    $wp_users .= '<li>' .get_avatar($username->user_email, 45) .$username->user_nicename."</a></li>";
     
    else :
     
    $wp_users .= '<li>' .get_avatar($username->user_email, 45).'<a href="'.$username->user_url.'">'.$username->user_nicename."</a></li>";
     
    endif;
    }
    $wp_users .= '</ul>';
     
    return $wp_users;
}

add_filter( 'deprecated_constructor_trigger_error', '__return_false' );
add_filter( 'deprecated_function_trigger_error', '__return_false' );
add_filter( 'deprecated_file_trigger_error', '__return_false' );
add_filter( 'deprecated_argument_trigger_error', '__return_false' );
add_filter( 'deprecated_hook_trigger_error', '__return_false' );

function my_custom_authenticate_user( WP_User $user  ) {
    if ( get_user_meta( $user->ID, 'registration_status', true ) === 'pending' ) {
        remove_action( 'wp_authenticate_user', 'wp_authenticate_username_password', 20 );
        add_filter( 'wp_authenticate_user', 'my_custom_login_error_message', 20, 3 );
    }

    return $user;
}
add_filter( 'wp_authenticate_user', 'my_custom_authenticate_user', 10, 1 );

function my_custom_login_error_message( $username, $password ) {
    $error = new WP_Error();
    $error->add( 'pending', __( '<p style="color:black">Your account is pending approval. Please try again later.</p>' ) );
    return $error;
}
// ===================================
// Removing roles from admin dashboard
// ===================================
remove_role( 'subscriber' );
remove_role( 'editor' );
remove_role( 'contributor' );
remove_role( 'author' );
remove_role( 'dev' );
remove_role( 'custom_role' );
// Add a custom user role
add_role( 'member', 'Member', array(
    'read' => true,
    'edit_posts' => false,
    'delete_posts' => false,
));

// =====================================
//Adding new roles to admin dashboard
// =====================================
// function add_student_role() {
//     add_role(
//         'dev',
//         'Dev',
//         array(
//             'edit_posts' => true,
//             'manage_options' => true
//         )
//     );
// }
// add_action( 'init', 'add_student_role' );

// =====================================
//Function to count the number of users
// =====================================
// Function to return user count
function wpb_user_count() { 
    $usercount = count_users();
    $result = $usercount['total_users']; 
    return $result; 
    } 
    // Creating a shortcode to display user count
    add_shortcode('user_count', 'wpb_user_count');
    
    // Creating custom namespaces
    function register_rest_api_routes(){
        register_rest_route('courses/v1', 'api(/(?P<id>\d+))?',array('callback' => 'get_tasks'));
    }
    
    
    function get_tasks($data){
        $id = $data['id'];
        
        $args = array(
            'post_type' => 'course',
            'post_per_page' => 5,
            'status' => 'publish',
        );
    
        if (isset($id)) {
            $args['p'] = $id; // Set the post ID to search for
        }
    
        $new_query = new WP_Query($args);
        $courses = $new_query->posts;
    
        $courses_with_meta = array();
        foreach ($courses as $course) {
            $course_id = $course->ID;
            $course_start = get_post_meta($course_id, 'course_start', true);
            $course_end = get_post_meta($course_id, 'course_end', true);
            $course_status = get_post_meta($course_id, 'course_status_select', true);
            $course_user_id = get_post_meta($course_id, 'course_user', true);
    
            // Create an array with the course data and meta
            $course_with_meta = array(
                'ID' => $course_id,
                'post_title' => $course->post_title,
                'post_content' => $course->post_content,
                'post_date' => $course->post_date,
                'course_start' => $course_start,
                'course_end' => $course_end,
                'course_status' => $course_status,
                'course_user_id' => $course_user_id,
            );
   // Add the course to the array
   $courses_with_meta[] = $course_with_meta;
}

return $courses_with_meta;
}
    add_action('rest_api_init', 'register_rest_api_routes');
    /**
 * This is our callback function that embeds our resource in a WP_REST_Response
 */
function prefix_get_private_data() {
    // rest_ensure_response() wraps the data we want to return into a WP_REST_Response, and ensures it will be properly returned.
    return rest_ensure_response( 'This is private data.' );
}

/**
 * This is our callback function that embeds our resource in a WP_REST_Response
 */
function prefix_get_private_data_permissions_check() {
    // Restrict endpoint to only users who have the edit_posts capability.
    if ( ! current_user_can( 'edit_posts' ) ) {
        return new WP_Error( 'rest_forbidden', esc_html__( 'OMG you can not view private data.', 'my-text-domain' ), array( 'status' => 401 ) );
    }

    // This is a black-listing approach. You could alternatively do this via white-listing, by returning false here and changing the permissions check.
    return true;
}

/**
 * This function is where we register our routes for our example endpoint.
 */
function prefix_register_example_routes() {
    // register_rest_route() handles more arguments but we are going to stick to the basics for now.
    register_rest_route( 'courses/v1', '/private-data', array(
        // By using this constant we ensure that when the WP_REST_Server changes our readable endpoints will work as intended.
        'methods'  => WP_REST_Server::READABLE,
        // Here we register our callback. The callback is fired when this endpoint is matched by the WP_REST_Server class.
        'callback' => 'prefix_get_private_data',
        // Here we register our permissions callback. The callback is fired before the main callback to check if the current user can access the endpoint.
        'permission_callback' => 'prefix_get_private_data_permissions_check',
    ) );
}

add_action( 'rest_api_init', 'prefix_register_example_routes' );

    // Creating custom namespaces
    function register_rest_api_contact(){
        register_rest_route('contact/v1', 'api', array('callback'=>'get_message'));
    }
    function get_message(){
        //retrieve all the posts
        $args = array(
            'post_type'=>'contact',
            'posts_per_page'=> 5,
            'status'=> 'publish',
        );       
        $new_query =new WP_Query($args);
        $contact= $new_query->posts;

        return $contact;
    }
    add_action('rest_api_init', 'register_rest_api_contact');

    
    function custom_post_type(){
        $labels = array(
            'name'=>'Portfolio',
            'singular_name'=>'Portfolio',
            'add_new'=>'Add Item',
            'all_item'=>'All Items',
            'edit_item'=>'Edit Item',
            'view_item'=>'View Item',
            'search_item'=>'Search Portfolio',
            'not_found'=>'No Portfolio found', 
            'not_found_in_trash'=>'No items found in trash',
            'parent_item_colon'=>'Parent Item'
        );
    
        $args = array(
            'labels'=>$labels,
            'public'=>true,
            'has_archive'=>true,
            'public_queryable'=>true,
            'query_var'=>true,
            'rewrite'=>true,
            'capability_type'=>'post',
            'hierarchical'=>false,
            'supports'=>array(
                'title',
                'editor',
                'excerpt',
                'thumbnail',
                'revisions'
            ),
            // 'taxonomies'=>array('category', 'post_tag'),
            'menu_position'=>5,
            'exclude_from_search'=>false
        );
    
        register_post_type('portfolio', $args);
    }
    
    add_action('init','custom_post_type');
    

//CREATE CUSTOM FIELD REST API
function custom_rest_api(){
    register_rest_field('post', 'CustomFieldNew', ['get_callback'=> 'get_custom_field']);

    register_rest_route(
        'portfolioplugin/v1', 
        'c8-portfolios', 
        [
            'callback'=>'get_c8_portfolios',
            'method'=>'GET', 
            'permission_callback'=>'custom_endpoint_permission',
            'args'=>[
                'meta_key'=>[
                    'required'=>true,
                    'default'=>'_edit_last',
                    'validate_callback'=>function($param, $request, $key){
                        return !is_numeric($param);
                    }
                ],
                'meta_value'=>[
                    'required'=>true,
                    'default'=>1,
                    'validate_callback'=>function($param, $request, $key){
                        return is_numeric($param);
                    }
                ]
                ],
                'schema'=>'custom_get_post_schema'
        ]);
}


function custom_get_post_schema(){
    $schema = [
        'schema'=>'',
        'title'=>'all-portfolios',
        'type'=> 'object',

        'properties'=>[
            'id'=>[
                'description'=> esc_html__('Unique identifier for the object', 'my-textdomain'),
                'type'=>'integer'
            ],
            'author'=>[
                'description'=> esc_html__('The ID of the user object', 'my-textdomain'),
                'type'=>'integer'
            ],
            'title'=>[
                'description'=>esc_html__('The title of the object', 'my-textdomain'),
                'type'=>'string'
            ],
            'content'=>[
                'description'=>esc_html__('The content of the object', 'my-textdomain'),
                'type'=>'string'
            ],
            'creation_date'=>[
                'description'=>esc_html__('The date of creation of the object', 'my-textdomain'),
                'type'=>'string'
            ]
        ]

    ];

    return $schema;
}





function custom_endpoint_permission(){
    if(is_user_logged_in()){
        return true;
    }else{
        return false;
    }
}

function get_c8_portfolios(WP_REST_Request $request){

    // echo '<pre>'; print_r($request); '</pre>';

    $meta_key = $request->get_param('meta_key');
    $meta_value = $request->get_param('meta_value');

    $args=[
        'post_type'=>'portfolio',
        'status'=>'publish',
        'posts_per_page'=>10,
        'meta_query'=>[[
            'key'=>$meta_key,
            'value'=>$meta_value
        ]]
    ];

    $the_query = new WP_Query($args);

    $portfolios = $the_query->posts;

    if (empty($portfolios)){
        return new WP_Error(
            'no_data_found',
            'No data found',
            [
                'status'=> 404
            ]
        );
    }

    foreach($portfolios as $portfolio){
        $response = custom_rest_prepare_post($portfolio, $request);
        $data[] = custom_prepare_for_collection($response);
    }

    return rest_ensure_response($data);

}

function custom_rest_prepare_post($post, $request){
    $post_data = [];
    $schema = custom_get_post_schema();

    if(isset($schema['properties']['id'])){
        $post_data['id'] = (int) $post->ID;
    }

    if(isset($schema['properties']['author'])){
        $post_data['author'] = (int) $post->post_author;
    }

    if(isset($schema['properties']['title'])){
        $post_data['title'] = apply_filters('post_heading', $post->post_title, $post);
    }

    if(isset($schema['properties']['content'])){
        $post_data['content'] = apply_filters('post_text', $post->post_content, $post);
    }

    if(isset($schema['properties']['creation_date'])){
        $post_data['creation_date']= apply_filters('post_date', $post->post_date, $post);
    }

    return rest_ensure_response($post_data);
}

function custom_prepare_for_collection($response){
    if (!($response instanceof WP_REST_Response)){
        return $response;
    }

    $data = (array) $response->get_data();
    $links = rest_get_server()::get_compact_response_links($response);

    if(!empty($links)){
        $data['_links']= $links;
    }

    return $data;
}

function get_custom_field($obj){

    $post_id = $obj['id'];

    // echo 'pre';print_r($post_id); '</pre>';

    return get_post_meta($post_id, 'CustomFieldNew', true);

}

add_action('rest_api_init', 'custom_rest_api');