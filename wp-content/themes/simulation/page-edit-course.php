<?php 
/**
 * Template Name: Edit-Course
 */

get_header();

if (isset($_GET['post_id'])) {
    $post_id = intval($_GET['post_id']);
    // The Query
    $query = new WP_Query(array('post_type' => 'course', 'p' => $post_id));
    // The Loop
    if ($query->have_posts()):
        while ($query->have_posts()) :
            $query->the_post();

            // handle form submission
            if (isset($_POST['update'])) {
                // sanitize input data
                $title = sanitize_text_field($_POST['title']);
                $content = sanitize_textarea_field($_POST['content']);
                $start_date = sanitize_text_field($_POST['start']);
                $due_date = sanitize_text_field($_POST['deadline']);
                $status = sanitize_text_field($_POST['status']);
                $user_id = intval($_POST['user']);

                // update post data
                $post_data = array(
                    'ID' => get_the_ID(),
                    'post_title' => $title,
                    'post_content' => $content,
                    'meta_input' => array(
                        'course_start' => $start_date,
                        'course_end' => $due_date,
                        'course_status_select' => $status,
                        'course_user' => $user_id
                    )
                );
                wp_update_post($post_data);

                // redirect to the updated post
                wp_redirect(get_permalink());
                exit;
            }

            // get post data
            $course_start = get_post_meta(get_the_ID(), 'course_start', true);
            $course_end = get_post_meta(get_the_ID(), 'course_end', true);
            $course_status = get_post_meta(get_the_ID(), 'course_status_select', true);
            $course_user_id = get_post_meta(get_the_ID(), 'course_user', true);
            $course_user = '';
            if ($course_user_id) {
                $user_info = get_userdata($course_user_id);
                if ($user_info) {
                    $course_user = $user_info->display_name;
                }
            }

            // display edit form
?>

            <div class="container mt-5">
                        <div class="row">
                            <div class="col">
                            <form class="form card shadow p-4 mb-5" action="<?php //echo esc_url( get_permalink() ); ?>" method="post">

            <h3 class="text-center text-primary">Edit Course</h3>
            <div class="form-group mt-2">
                <label for="title"><?php _e('Enter the Course Title:', 'mytextdomain'); ?></label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Course Title" value="<?php echo esc_attr( $post->post_title ); ?>">
            </div>
            <div class="form-group mt-2">
                <label for="content"><?php _e('Enter the Course Description:', 'mytextdomain'); ?></label>
                <textarea rows="3" class="form-control" id="content" name="content" placeholder="Enter Course Description here"><?php echo esc_attr( $post->post_content ); ?></textarea>
            </div>
            <div class="form-group mt-2">
                <label for="content">Start Date:</label>
                <input type="date" class="form-control" id="start_date" name="start" placeholder="Enter Course Start Date here" value="<?php echo $course_start; ?>">
            </div>
            <div class="form-group mt-2">
                <label for="content">Due Date:</label>
                <input type="date" class="form-control" id="due_date" name="deadline" placeholder="Enter Course Deadline here" value="<?php echo $course_end; ?>">
            </div>
            <div class="form-group mt-2">
                <select class="form-control" id="status" name="status">
                    <option value="Pending" <?php selected( $course_status, 'Pending' ); ?>>Pending</option>
                    <option value="In Progress" <?php selected( $course_status, 'In Progress' ); ?>>In Progress</option>
                    <option value="Completed" <?php selected( $course_status, 'Completed' ); ?>>Completed</option>
                </select>
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
                        <option value="<?php echo $user_id; ?>" <?php selected( $course_user_id, $user_id ); ?>><?php echo $user_name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group mt-2 text-center">
                <button class="btn btn-primary px-5" type="submit"><?php _e('Update', 'mytextdomain') ?></button>
                <input type='hidden' name='update' id='update' value='update' />
                <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
            </div>
            </form>

            <?php
            
                    endwhile;
                endif;
            }
            ?>
        </div>
    </div>
</div>

<?php get_footer();?>