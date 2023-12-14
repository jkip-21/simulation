<?php
/*
Template Name: org-data
*/
get_header();
?>

<head>
    <link rel="stylesheet" href="../wp-content/themes/simulation/assets/css/add_course.css">
</head>

<?php

$errors = array();

if (isset($_POST['register'])) {
    

    if (empty($errors)) {
        $user_login = $_POST['username'];
        $user_email = $_POST['useremail'];
        $user_pass = $_POST['password'];
        $user_cpass = $_POST['cpassword'];

        $data = array(
            'user_login' => $user_login,
            // the user's login username.
            'user_email' => $user_email,
            //enter email
            'user_pass' => $user_pass,
            // not necessary to hash password ( The plain-text user password ).
            'user_cpass' => $user_cpass,
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

<style>
    .box{
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
    
        <div class="col-md-9 register-right">
            <form action="http://127.0.0.1:8000/student-history/" method="post">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Student Organizational Form</h3>
                    <div class="row register-form">
                        <div class="col-md-6">
                        <div class="form-group mb-3">
                                <input type="text" name="orgName" class="form-control" placeholder="Org Name *" value="" required/>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" name="posnOrg" class="form-control" placeholder="Posn in Org *" value="" required/>
                            </div>
                            <div class='form-outline mb-4 '>
                                <textarea class='form-control' id='textAreaExample6' name="roleDescription" rows='3' placeholder="Enter role description..." required></textarea>
                            </div>
                            <div class='form-outline mb-4 '>
                                <textarea class='form-control' id='textAreaExample6' name="lastAppointments" rows='3' placeholder="Last three Appointments..." required></textarea>
                            </div>
                                                      
                          
                        </div>
                        <div class="col-md-6">
                        <div class='form-outline mb-4 '>
                                <textarea class='form-control' id='textAreaExample6' name="keyCompetences" rows='3' placeholder="Summary of key competences..." required></textarea>
                            </div>
                            <div class='form-outline mb-4 '>
                                <textarea class='form-control' id='textAreaExample6' name="futurePosn" rows='3' placeholder="Likely Future Position/Appointment.." required></textarea>
                            </div>
                            <div class='form-outline mb-4 '>
                                <textarea class='form-control' id='textAreaExample6' name="courseExpectation" rows='3' placeholder="Your Expectations from this course..." required></textarea>
                            </div>
                            <input type="submit" class="btnRegister" value="Next" name="btnOrgInfo" />
                        </div>
                    </div>
                </div>
               
            </div>
            </form>
        </div>
    </div>

</div>

</div>
