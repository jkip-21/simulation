<?php
/*
Template Name: student-history
*/
get_header();
?>

<head>
    <link rel="stylesheet" href="../wp-content/themes/simulation/assets/css/add_course.css">
</head>

<?php

$errors = array();

if (isset($_POST['ipstcHistory'])) {
   

    if (empty($errors)) {
        $user_ipstc_data = $_POST['choice'];
        $user_ipstc_account = $_POST['accountName'];
       
        $data = array(
            
            'user_ipstc_data' => $user_ipstc_data,
            //enter email
            'user_ipstc_account' => $user_ipstc_account,
            // not necessary to hash password ( The plain-text user password ).
            
            'role' => 'member',
            //give role of member
            'show_admin_bar_front' => false,
            // display the Admin Bar for the user 'true' or 'false'
            'user_status' => 0,
            // set the user as inactive
            'meta_input' => array(
                'registration_status' => 'pending',
                // add custom field to mark the user as unverified
                'verified' => false,
                // add a custom field to mark the user as unverified
            )
        );

        $user_id = wp_insert_user(wp_slash($data));

        if (!is_wp_error($user_id)) {

            $success_message = '<div class="alert alert-success alert-dismissible fade show" role="alert">';
            $success_message .= 'User ' . $user_id . ' has been successfully registered.';
            $success_message .= '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            $success_message .= '</div>';

            // send email to administrator to approve or deny the registration
            $to = get_option('admin_email');
            $subject = 'New user registration waiting for approval';
            $message = 'A new user has registered with the following details:\n\n';
            $message .= 'Username: ' . $user_login . '\n';
            $message .= 'Email: ' . $user_email . '\n\n';
            $message .= 'Click the following link to approve or deny the registration:\n\n';
            $message .= site_url('/registration-approval/') . '?user_id=' . $user_id . '&action=approve\n\n';
            $message .= 'Thank you';

            update_user_meta($user_id, 'registration_status', 'pending');

            wp_mail($to, $subject, $message);
        } else {
            $error_code = array_key_first($user_id->errors);
            $error_message = $user_id->errors[$error_code][0];
            $errors[] = $error_message;
        }
    }
}
?>



<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Warning!</strong>
        <?php foreach ($errors as $error) : ?>
            &nbsp;
            <?php echo $error; ?>
        <?php endforeach; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php if (isset($success_message)) : ?>
    <?php echo $success_message; ?>
<?php endif; ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img src="../wp-content/themes/simulation/assets/img/brand.jpg" alt="" height="100px">

    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="http://127.0.0.1:8000/" style="text-decoration: none; color: #090D5A; margin-right: 40px;">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://127.0.0.1:8000/#content" style="text-decoration: none; color: #090D5A; margin-right: 40px;">ABOUT US</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="http://127.0.0.1:8000/contact-us/" style="text-decoration: none; color: #090D5A;margin-right: 40px;">CONTACT US</a>
            </li>
        </ul>
        <div class="justify-content-end">
            <a href="/wp/simulation/auth/"><button type="button" style="margin-right: 40px;" class="btn">LOGIN</button></a>
        </div>
    </div>
</nav>
<style>
    .box {
        height: 100px;
    }

    .register {
        background: -webkit-linear-gradient(left, #3931af, #00c6ff);
        margin-top: 3%;
        padding: 3%;
    }

    .register-left {
        text-align: center;
        color: #fff;
        margin-top: 4%;
    }

    .register-left input {
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        width: 60%;
        background: #f8f9fa;
        font-weight: bold;
        color: #383d41;
        margin-top: 30%;
        margin-bottom: 3%;
        cursor: pointer;
    }

    .register-right {
        background: #f8f9fa;
        border-top-left-radius: 10% 50%;
        border-bottom-left-radius: 10% 50%;
    }

    .register-left img {
        margin-top: 15%;
        margin-bottom: 5%;
        width: 25%;
        -webkit-animation: mover 2s infinite alternate;
        animation: mover 1s infinite alternate;
    }

    @-webkit-keyframes mover {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-20px);
        }
    }

    @keyframes mover {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-20px);
        }
    }

    .register-left p {
        font-weight: lighter;
        padding: 12%;
        margin-top: -9%;
    }

    .register .register-form {
        padding: 10%;
        margin-top: 10%;
    }

    .btnRegister {
        float: right;
        margin-top: 10%;
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        background: #0062cc;
        color: #fff;
        font-weight: 600;
        width: 50%;
        cursor: pointer;
    }

    .register .nav-tabs {
        margin-top: 3%;
        border: none;
        background: #0062cc;
        border-radius: 1.5rem;
        width: 28%;
        float: right;
    }

    .register .nav-tabs .nav-link {
        padding: 2%;
        height: 34px;
        font-weight: 600;
        color: #fff;
        border-top-right-radius: 1.5rem;
        border-bottom-right-radius: 1.5rem;
    }

    .register .nav-tabs .nav-link:hover {
        border: none;
    }

    .register .nav-tabs .nav-link.active {
        width: 100px;
        color: #0062cc;
        border: 2px solid #0062cc;
        border-top-left-radius: 1.5rem;
        border-bottom-left-radius: 1.5rem;
    }

    .register-heading {
        text-align: center;
        margin-top: 8%;
        margin-bottom: -15%;
        color: #495057;
    }

    .logo {
        display: flex;
        justify-content: center;

    }

    .btn {
        display: flex;
        justify-content: center;
    }

    .btns {
        background-color: #090D5A;
        color: #fff;
        border-radius: 5px
    }

    .new {
        display: block;
        justify-self: center;
        width: 40%;
        margin-left: 30%;
        margin-top: 20px;
        margin-bottom: 20px;
        border-radius: 20px
    }

    a .btn {
        background-color: #090D5A;
        border-radius: 5px;
        color: white;
    }
</style>
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
            <h3>What is IPSTC?</h3>
            <p>IPSTC-Kenya is a Government body that conducts training, education and research for military, police and civilians in all aspects of peace support.</p>
            <br />
        </div>
        <div class="col-md-9 register-right">


            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Student IPSTC DATA</h3>
                    <div class="row register-form">
                        <div class="col-md-6">
                            <h4>Have you attended a course in IPSTC before</h4>
                            <div class="form-group mb-3">
                                <form action="http://127.0.0.1:8000/" method="post">
                                <div class="form-group mb-3">
                                    <div class="maxl">
                                        <label class="radio inline">
                                            <input type="radio" name="choice" value="no" checked>
                                            <span> No </span>
                                        </label>
                                        <label class="radio inline">
                                            <input type="radio" name="choice" value="yes">
                                            <span>Yes </span>
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="form-group mb-3" id="accountNameInput" style="display: none;">
                                <h4>Provide your IPSTC online user Account</h4>
                                    <input type="text" class="form-control" id="accountName" name="accountName"  placeholder="User Account Name">
                                </div>
                                <input type="submit" name="ipstcHistory" class="btnRegister" value="Next" />
                                </form>
                            </div>
  
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>
<div class="box">

</div>
<?php
get_footer();
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Function to show/hide account name input based on radio button selection
        $('input[name="choice"]').change(function() {
            if ($(this).val() === 'no') {
                $('#accountNameInput').hide();
            } else if ($(this).val() === 'yes') {
                $('#accountNameInput').show();
            }
        });
    });
</script>