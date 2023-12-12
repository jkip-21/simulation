<?php 

/**
 * Template Name: user-Courses
 */
get_header();?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Dashboard</title>
    <script src="https://kit.fontawesome.com/42d5adcbca.js"></script>
    <link rel="stylesheet" href="../wp-content/themes/simulation/assets/css/advanced.css">    
    <link rel="stylesheet" href="../wp-content/themes/simulation/assets/css/add.css">
    <link rel="stylesheet" href="../wp-content/themes/simulation/assets/css/test.css">
</head>
<style>
    a .btn{
  background-color: #090D5A;
  border-radius: 5px;
  color: white;
}
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/wp/simulation/" style="text-decoration: none; color: #090D5A; margin-right: 40px;">HOME</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/wp/simulation/about-us" style="text-decoration: none; color: #090D5A; margin-right: 40px;">ABOUT US</a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link" href="/wp/simulation/contact" style="text-decoration: none; color: #090D5A;margin-right: 40px;">CONTACT US</a>
      </li>
    </ul>
    <div class="justify-content-end">
    <a href="<?php echo esc_url(wp_logout_url(get_permalink())); ?>"><button type="button" style= "margin-right: 40px;"class="btn">LOG OUT</button></a>
    </div>
  </div>
</nav>  
<body class="g-sidenav-show">
    <nav class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start position-absolute ms-3 bg-white" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="javascript:;">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
  <img src="../wp-content/themes/simulation/assets/img/brand.jpg" alt="" height="100px">
</div>
                
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link  active" href="#">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>shop </title>
                                <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Rounded-Icons" transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                            <g id="shop-" transform="translate(0.000000, 148.000000)">
                                                <path class="color-background" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z" id="Path" opacity="0.598981585"></path>
                                                <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z" id="Path"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <?php 
                            if ( is_user_logged_in() ) { 
                            echo 'Welcome ' . $current_user->user_login . "\n"; 
                            } else { 
                            wp_loginout(); 
                            } 
                        ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="/wp/simulation/user-history/">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>office</title>
                                <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Rounded-Icons" transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                            <g id="office" transform="translate(153.000000, 2.000000)">
                                                <path class="color-background" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z" id="Path" opacity="0.6"></path>
                                                <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z" id="Shape"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">History</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="/wp/simulation/user-course/">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>credit-card</title>
                                <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Rounded-Icons" transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                            <g id="credit-card" transform="translate(453.000000, 454.000000)">
                                                <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" id="Path" opacity="0.593633743"></path>
                                                <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z" id="Shape"></path>
                                            </g>
                                        </g>
                                    </g> 
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Courses</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="/wp/simulation/user/">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>credit-card</title>
                                <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Rounded-Icons" transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                            <g id="credit-card" transform="translate(453.000000, 454.000000)">
                                                <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" id="Path" opacity="0.593633743"></path>
                                                <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z" id="Shape"></path>
                                            </g>
                                        </g>
                                    </g> 
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">User List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="<?php echo esc_url(wp_logout_url(get_permalink())); ?>">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>settings</title>
                                <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Rounded-Icons" transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                            <g id="settings" transform="translate(304.000000, 151.000000)">
                                                <polygon class="color-background" id="Path" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667"></polygon>
                                                <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" id="Path" opacity="0.596981957"></path>
                                                <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z" id="Path"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Log Out</span>
                    </a>
                </li>
            
            </ul>
        </div>
     
    </nav>
    <div class="main-content" id="panel">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 mt-3 shadow-none border-radius-xl" id="navbarTop">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <h6 class="font-weight-bolder mb-0">Dashboard</h6>
                </nav>
               
            </div>
        </nav>
        
        <div class="container-fluid pt-3">
            <div class="row removable">
                <div class="col-xl-3 col-sm-6">
                    <div class="card mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">COMPLETE</p>

                                            <h5 class="text-success mb-0 font-weight-bolder">1</h5>
                                    
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">In Progress</p>
                                        <h5 class="text-success mb-0 font-weight-bolder">1</h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-sm-6">
                    <div class="card mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Pending</p>
                                        <h5 class="text-success mb-0 font-weight-bolder">1</h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
        </div>
        <?php
        if (isset($_POST['accepted'])) {
            $post_id = $_POST['post-id'];
            $new_value = $_POST['meta-field'];
            update_post_meta($post_id, 'course_status_select', $new_value);
        }
        
        if (isset($_POST['completed'])) {
            $post_id = $_POST['course-id'];
            $new_value = $_POST['meta-field2'];
            update_post_meta($post_id, 'course_status_select', $new_value);
        }
        
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
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Course Title</th>
      <th scope="col">Start Date</th>
      <th scope="col">Due date</th>
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
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
      <th scope="row">1</th>
      <td>
        <?php the_title()?>
        <?php the_content()?></td>
      <td><?php echo esc_attr( $course_start )?></td>
      <td><?php echo esc_attr( $course_end )?></td>
      <td> <p class="mt-2"><span class=''><?php echo esc_attr( $course_status ) ;?></span></p>    </td>
      <td>
                                            <div class="mt-2 d-flex gap-1" >
                                                <form action="" method="post">
                                                    <input type="hidden" name="meta-field" value="In Progress">
                                                    <input type="hidden" name="post-id" value="<?php echo get_the_ID(); ?>">                      
                                                    <button class="btn btn-primary"type="submit" name="accepted" <?php if ($course_status == 'In Progress' || $course_status == 'Completed') { echo'disabled'; } ?> >Accept</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mt-2 d-flex gap-1" >
                                                <form action="" method="post">
                                                    <input type="hidden" name="meta-field2" value="Completed">
                                                    <input type="hidden" name="course-id" value="<?php echo get_the_ID(); ?>">
                                                    <button class="btn btn-primary"type="submit" name="completed" <?php if ($course_status == 'Completed' || $course_status == 'Pending') { echo'disabled'; } ?>>Completed</button>
                                                </form>
                                            </div>                       
                                        </td>
    </tr>
  </tbody>
  </table>
        </form>
  <?php 
  endwhile;
endif;
  get_footer();?>