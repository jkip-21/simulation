<?php 
/**
 * Template Name: Create Course
*/
get_header();?>
<?php

if (isset( $_POST['cpt_nonce_field'] ) && wp_verify_nonce( $_POST['cpt_nonce_field'], 'cpt_nonce_action' ) ) {

    // Check if the user already has an assigned course
    $developer_id = $_POST['user'];
    $assigned_courses = get_posts( array(
        'post_type' => 'course',
        'meta_query'    => array(
            [
                'key'   => 'course_user',
                'value' => $developer_id,
            ],
            [
                'key'   => 'course_status_select',
                'value' => array( 'Pending', 'In Progress' ),
                'compare' => 'IN',
            ],
        ),
    ) );

    if ( ! empty( $assigned_courses ) ) {
        // Developer already has an assigned course, don't assign another
        $alert_type = 'danger';
        $alert_message = 'Developer already has an assigned course.';
    } else {
        // create post object with the form values
                // Create a new course post
        $course_title = sanitize_text_field($_POST['title']);
        $course_content = sanitize_text_field($_POST['content']);
        $course_start_date = sanitize_text_field($_POST['start']);
        $course_due_date = sanitize_text_field($_POST['deadline']);
        $course_status = 'Pending';
        $course_user = intval($_POST['user']);

        $new_course = array(
            'post_title'    => $course_title,
            'post_content'  => $course_content,
            'post_status'   => 'publish',
            'post_type'     => $_POST['course'],
            'meta_input'    => array(
                'course_start' => $course_start_date,
                'course_end' => $course_due_date,
                'course_status_select' => $course_status,
                'course_user' => $course_user,
            ),
        );
        // insert the post into the database
        $course_start = $_POST['start'];

        global $post;
        $post_id = $post->ID;
        $course_id = wp_insert_post( $new_course);
        //add_post_meta($cpt_id,'course_start',$course_start);
        if ($course_id) {
            $alert_type = 'success';
            $alert_message = 'Course assigned successfully.';
        } else {
            $alert_type = 'danger';
            $alert_message = 'Error assigning course. Please try again.';
        }
    }

}

?>

<div class="container my-5">
    <div class="row">
        <div class="col">
            
            <form class="form card shadow p-4"action="" method="post">
                <?php if (isset($alert_message)) : ?>
                    <div class="alert alert-<?php echo $alert_type; ?> mb-3" role="alert">
                        <?php echo $alert_message; ?>
                    </div>
                <?php endif; ?>
                <h3 class="text-center text-primary">Add Course</h3>
                <div class="form-group mt-2">
                    <label for="title"><?php _e('Enter the Course Title:', 'mytextdomain'); ?></label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Course Title" required>
                </div>
                <div class="form-group mt-2">
                    <label for="content"><?php _e('Enter the Course Description:', 'mytextdomain'); ?></label>
                    <textarea rows="3" class="form-control" id="content" name="content" placeholder="Enter course Description here" required></textarea>
                </div>
                <div class="form-group mt-2">
                    <label for="content">Start Date:</label>
                    <input type="date" class="form-control" id="start_date" name="start" placeholder="Enter Course Start Date here" required>
                </div>
                <div class="form-group mt-2">
                    <label for="content">Due Date:</label>
                    <input type="date" class="form-control" id="due_date" name="deadline" placeholder="Enter Course Deadline here" required>
                </div>
                <div class="form-group mt-2">
                    <input type="hidden" class="form-control" id="status" name="status" value="Pending" placeholder="Course Status">
                </div>
                <?php
                // Get all users with the "User" role
                $users = get_users( array(
                    'role'    => 'developer',
                    'orderby' => 'user_nicename',
                ) );
                $user_options = array();
                foreach ( $users as $user ) {
                    $user_options[ $user->ID ] = $user->display_name;
                }
                ?>
                <div class="form-group mt-2">
                    <select class="form-control" id="user" name="user">
                        <option value="">Select Developer</option>
                        <?php foreach ( $user_options as $user_id => $user_name ) : ?>
                            <option value="<?php echo $user_id; ?>"><?php echo $user_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mt-2 text-center">
                    <button class="btn btn-primary px-5" type="submit"><?php _e('Submit', 'mytextdomain') ?></button>
                    <input type='hidden' name='course' id='course' value='course' />
                    <!-- <input class="btn btn-primary px-5" type="button" value="Submit" name="coursesubmit"> -->
                </div>
                <?php wp_nonce_field( 'cpt_nonce_action', 'cpt_nonce_field' ); ?>
            </form>
        </div>
    </div>
</div>

<?php get_footer();?>