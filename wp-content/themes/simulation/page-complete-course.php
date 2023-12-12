<?php 
/**
 * Template Name: Completed Courses
*/
get_header();?>
<?php

$current_user = wp_get_current_user();
$user = new WP_User( $current_user ->ID);
$course_status = get_post_meta(get_the_ID(), 'course_status_select', true);

// The Query
$query = new WP_Query(array(
    'post_type' => 'course',
    'meta_query' => array(
        array(
            'key' => 'course_user',
            'value' => $current_user->ID,
        ),
        array(
            'key' => 'course_status_select',
            'value' => 'Completed',
        )
        
    )
));
query_posts( $query );

// The Loop
if($query->have_posts()):
while ( $query->have_posts() ) : 
    $query->the_post();  
// your post content ( title, excerpt, thumb....)

$course_start = get_post_meta(get_the_ID(), 'course_start', true);
$course_end = get_post_meta(get_the_ID(), 'course_end', true);
$course_status = get_post_meta(get_the_ID(), 'course_status_select', true);

$course_user_id = get_post_meta(get_the_ID(), 'course_user', true);

endwhile;
//Reset Query
wp_reset_query();
endif;
?>
<section class="content">
            <div class="container-fluid">
                <div class="col-lg-12">
                <h2 class="my-5 text-center text-light">
                        <?php global $current_user; wp_get_current_user(); ?>
                        <?php 
                            if ( is_user_logged_in() ) { 
                            echo 'Welcome ' . $current_user->user_login . "\n"; 
                            } else { 
                            wp_loginout(); 
                            } 
                        ?>
                    </h2>
                    <div class="m-5 card card-outline card-success">
                        <div class="card-header">
                            <div class="card-tools d-flex mb-2">
                                <h5 class="text-center text-primary mt-2 flex-grow-1">Completed Courses</h5>
                                <a class=" ms-auto btn btn-primary" href="../dashboard"> Ongoing Courses</a>
                            </div>
                            <div class="alert alert-success alert-dismissible text-center" role="alert">
                                <strong>Congratulations!</strong> You have completed these Courses.
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-condensed" id="list">
                                <colgroup>
                                    <col width="5%">
                                    <col width="10%">
                                    <col width="25%">
                                    <col width="15%">
                                    <col width="15%">
                                    <col width="10%">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Course</th>
                                        <th>Description</th>
                                        <th>Course Started</th>
                                        <th>Course Due Date</th>
                                        <th>Course Status</th>
                                    </tr>
                                </thead>
                                <?php
                                // The Query
                                $query = new WP_Query(array(
                                    'post_type' => 'course',
                                    'meta_query' => array(
                                        array(
                                            'key' => 'course_user',
                                            'value' => $current_user->ID,
                                        )
                                    )
                                ));
                                query_posts( $query );

                                // The Loop
                                if($query->have_posts()):
                                while ( $query->have_posts() ) : 
                                    $query->the_post();  
                                // your post content ( title, excerpt, thumb....)

                                $course_start = get_post_meta(get_the_ID(), 'course_start', true);
                                $course_end = get_post_meta(get_the_ID(), 'course_end', true);
                                $course_status = get_post_meta(get_the_ID(), 'course_status_select', true);

                                $course_user_id = get_post_meta(get_the_ID(), 'course_user', true);

                                $course_user = '';
                                if ( $course_user_id ) {
                                    $user_info = get_userdata( $course_user_id );
                                    if ( $user_info ) {
                                        $course_user = $user_info->display_name;
                                    }
                                }

                                ?>
                                <tbody>
                                    <tr>
                                        <td class="text-center"><p class="mt-2">1</p></td>
                                        <td >
                                            <p class="mt-2"><b><?php the_title();?></b></p>
                                        </td>
                                        <td>
                                            <p class="mt-0 text-truncate"><?php the_content();?></b></p>
                                        </td>

                                        <td><p class="mt-2"><b><?php echo esc_attr( $course_start ) ;?></b></p></td>
                                        <td><p class="mt-2"><b><?php echo esc_attr( $course_end ) ;?></b></p></td>
                                        <td>
                                            <p class="mt-2"><span class=''><?php echo esc_attr( $course_status ) ;?></span></p>                      
                                        </td>

                                       
                                    </tr>	
                                    
                                </tbody>
                                <?php
                                    endwhile;
                                    //Reset Query
                                    wp_reset_query();
                                endif;
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!--/. container-fluid -->
        </section>
<?php
?>
        


<?php get_footer();?>