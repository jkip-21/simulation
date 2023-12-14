<?php
/*
Template Name: Register
*/
get_header()
?>

<head>
    <link rel="stylesheet" href="../wp-content/themes/simulation/assets/css/add_course.css">
</head>

<?php

$errors = array();

if (isset($_POST['register'])) {
    if (isset($_POST['password']) && $_POST['password'] != $_POST['cpassword']) {
        $errors[] = "Passwords do not match.";
    }

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
                        <h3 class="register-heading">Student Personal Data Form</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                            <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="course" placeholder="Course *" value="" required />
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="surname" placeholder="Surname/Family Name *" value="" required />
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="other_names" placeholder="Other Names *" value="" required />
                                </div>

                                <div class="form-group mb-3">
                                    <input type="date" class="form-control" name="date_of_birth" placeholder="Date of Birth *" value="" required />
                                </div>
                                <div class="form-group mb-3">
                                    <select name="nationality" class="form-select" required>
                                        <option value="">Nationality</option>
                                        <option value="afghan">Afghan</option>
                                        <option value="albanian">Albanian</option>
                                        <option value="algerian">Algerian</option>
                                        <option value="american">American</option>
                                        <option value="andorran">Andorran</option>
                                        <option value="angolan">Angolan</option>
                                        <option value="antiguans">Antiguans</option>
                                        <option value="argentinean">Argentinean</option>
                                        <option value="armenian">Armenian</option>
                                        <option value="australian">Australian</option>
                                        <option value="austrian">Austrian</option>
                                        <option value="azerbaijani">Azerbaijani</option>
                                        <option value="bahamian">Bahamian</option>
                                        <option value="bahraini">Bahraini</option>
                                        <option value="bangladeshi">Bangladeshi</option>
                                        <option value="barbadian">Barbadian</option>
                                        <option value="barbudans">Barbudans</option>
                                        <option value="batswana">Batswana</option>
                                        <option value="belarusian">Belarusian</option>
                                        <option value="belgian">Belgian</option>
                                        <option value="belizean">Belizean</option>
                                        <option value="beninese">Beninese</option>
                                        <option value="bhutanese">Bhutanese</option>
                                        <option value="bolivian">Bolivian</option>
                                        <option value="bosnian">Bosnian</option>
                                        <option value="brazilian">Brazilian</option>
                                        <option value="british">British</option>
                                        <option value="bruneian">Bruneian</option>
                                        <option value="bulgarian">Bulgarian</option>
                                        <option value="burkinabe">Burkinabe</option>
                                        <option value="burmese">Burmese</option>
                                        <option value="burundian">Burundian</option>
                                        <option value="cambodian">Cambodian</option>
                                        <option value="cameroonian">Cameroonian</option>
                                        <option value="canadian">Canadian</option>
                                        <option value="cape verdean">Cape Verdean</option>
                                        <option value="central african">Central African</option>
                                        <option value="chadian">Chadian</option>
                                        <option value="chilean">Chilean</option>
                                        <option value="chinese">Chinese</option>
                                        <option value="colombian">Colombian</option>
                                        <option value="comoran">Comoran</option>
                                        <option value="congolese">Congolese</option>
                                        <option value="costa rican">Costa Rican</option>
                                        <option value="croatian">Croatian</option>
                                        <option value="cuban">Cuban</option>
                                        <option value="cypriot">Cypriot</option>
                                        <option value="czech">Czech</option>
                                        <option value="danish">Danish</option>
                                        <option value="djibouti">Djibouti</option>
                                        <option value="dominican">Dominican</option>
                                        <option value="dutch">Dutch</option>
                                        <option value="east timorese">East Timorese</option>
                                        <option value="ecuadorean">Ecuadorean</option>
                                        <option value="egyptian">Egyptian</option>
                                        <option value="emirian">Emirian</option>
                                        <option value="equatorial guinean">Equatorial Guinean</option>
                                        <option value="eritrean">Eritrean</option>
                                        <option value="estonian">Estonian</option>
                                        <option value="ethiopian">Ethiopian</option>
                                        <option value="fijian">Fijian</option>
                                        <option value="filipino">Filipino</option>
                                        <option value="finnish">Finnish</option>
                                        <option value="french">French</option>
                                        <option value="gabonese">Gabonese</option>
                                        <option value="gambian">Gambian</option>
                                        <option value="georgian">Georgian</option>
                                        <option value="german">German</option>
                                        <option value="ghanaian">Ghanaian</option>
                                        <option value="greek">Greek</option>
                                        <option value="grenadian">Grenadian</option>
                                        <option value="guatemalan">Guatemalan</option>
                                        <option value="guinea-bissauan">Guinea-Bissauan</option>
                                        <option value="guinean">Guinean</option>
                                        <option value="guyanese">Guyanese</option>
                                        <option value="haitian">Haitian</option>
                                        <option value="herzegovinian">Herzegovinian</option>
                                        <option value="honduran">Honduran</option>
                                        <option value="hungarian">Hungarian</option>
                                        <option value="icelander">Icelander</option>
                                        <option value="indian">Indian</option>
                                        <option value="indonesian">Indonesian</option>
                                        <option value="iranian">Iranian</option>
                                        <option value="iraqi">Iraqi</option>
                                        <option value="irish">Irish</option>
                                        <option value="israeli">Israeli</option>
                                        <option value="italian">Italian</option>
                                        <option value="ivorian">Ivorian</option>
                                        <option value="jamaican">Jamaican</option>
                                        <option value="japanese">Japanese</option>
                                        <option value="jordanian">Jordanian</option>
                                        <option value="kazakhstani">Kazakhstani</option>
                                        <option value="kenyan">Kenyan</option>
                                        <option value="kittian and nevisian">Kittian and Nevisian</option>
                                        <option value="kuwaiti">Kuwaiti</option>
                                        <option value="kyrgyz">Kyrgyz</option>
                                        <option value="laotian">Laotian</option>
                                        <option value="latvian">Latvian</option>
                                        <option value="lebanese">Lebanese</option>
                                        <option value="liberian">Liberian</option>
                                        <option value="libyan">Libyan</option>
                                        <option value="liechtensteiner">Liechtensteiner</option>
                                        <option value="lithuanian">Lithuanian</option>
                                        <option value="luxembourger">Luxembourger</option>
                                        <option value="macedonian">Macedonian</option>
                                        <option value="malagasy">Malagasy</option>
                                        <option value="malawian">Malawian</option>
                                        <option value="malaysian">Malaysian</option>
                                        <option value="maldivan">Maldivan</option>
                                        <option value="malian">Malian</option>
                                        <option value="maltese">Maltese</option>
                                        <option value="marshallese">Marshallese</option>
                                        <option value="mauritanian">Mauritanian</option>
                                        <option value="mauritian">Mauritian</option>
                                        <option value="mexican">Mexican</option>
                                        <option value="micronesian">Micronesian</option>
                                        <option value="moldovan">Moldovan</option>
                                        <option value="monacan">Monacan</option>
                                        <option value="mongolian">Mongolian</option>
                                        <option value="moroccan">Moroccan</option>
                                        <option value="mosotho">Mosotho</option>
                                        <option value="motswana">Motswana</option>
                                        <option value="mozambican">Mozambican</option>
                                        <option value="namibian">Namibian</option>
                                        <option value="nauruan">Nauruan</option>
                                        <option value="nepalese">Nepalese</option>
                                        <option value="new zealander">New Zealander</option>
                                        <option value="ni-vanuatu">Ni-Vanuatu</option>
                                        <option value="nicaraguan">Nicaraguan</option>
                                        <option value="nigerien">Nigerien</option>
                                        <option value="north korean">North Korean</option>
                                        <option value="northern irish">Northern Irish</option>
                                        <option value="norwegian">Norwegian</option>
                                        <option value="omani">Omani</option>
                                        <option value="pakistani">Pakistani</option>
                                        <option value="palauan">Palauan</option>
                                        <option value="panamanian">Panamanian</option>
                                        <option value="papua new guinean">Papua New Guinean</option>
                                        <option value="paraguayan">Paraguayan</option>
                                        <option value="peruvian">Peruvian</option>
                                        <option value="polish">Polish</option>
                                        <option value="portuguese">Portuguese</option>
                                        <option value="qatari">Qatari</option>
                                        <option value="romanian">Romanian</option>
                                        <option value="russian">Russian</option>
                                        <option value="rwandan">Rwandan</option>
                                        <option value="saint lucian">Saint Lucian</option>
                                        <option value="salvadoran">Salvadoran</option>
                                        <option value="samoan">Samoan</option>
                                        <option value="san marinese">San Marinese</option>
                                        <option value="sao tomean">Sao Tomean</option>
                                        <option value="saudi">Saudi</option>
                                        <option value="scottish">Scottish</option>
                                        <option value="senegalese">Senegalese</option>
                                        <option value="serbian">Serbian</option>
                                        <option value="seychellois">Seychellois</option>
                                        <option value="sierra leonean">Sierra Leonean</option>
                                        <option value="singaporean">Singaporean</option>
                                        <option value="slovakian">Slovakian</option>
                                        <option value="slovenian">Slovenian</option>
                                        <option value="solomon islander">Solomon Islander</option>
                                        <option value="somali">Somali</option>
                                        <option value="south african">South African</option>
                                        <option value="south korean">South Korean</option>
                                        <option value="spanish">Spanish</option>
                                        <option value="sri lankan">Sri Lankan</option>
                                        <option value="sudanese">Sudanese</option>
                                        <option value="surinamer">Surinamer</option>
                                        <option value="swazi">Swazi</option>
                                        <option value="swedish">Swedish</option>
                                        <option value="swiss">Swiss</option>
                                        <option value="syrian">Syrian</option>
                                        <option value="taiwanese">Taiwanese</option>
                                        <option value="tajik">Tajik</option>
                                        <option value="tanzanian">Tanzanian</option>
                                        <option value="thai">Thai</option>
                                        <option value="togolese">Togolese</option>
                                        <option value="tongan">Tongan</option>
                                        <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                                        <option value="tunisian">Tunisian</option>
                                        <option value="turkish">Turkish</option>
                                        <option value="tuvaluan">Tuvaluan</option>
                                        <option value="ugandan">Ugandan</option>
                                        <option value="ukrainian">Ukrainian</option>
                                        <option value="uruguayan">Uruguayan</option>
                                        <option value="uzbekistani">Uzbekistani</option>
                                        <option value="venezuelan">Venezuelan</option>
                                        <option value="vietnamese">Vietnamese</option>
                                        <option value="welsh">Welsh</option>
                                        <option value="yemenite">Yemenite</option>
                                        <option value="zambian">Zambian</option>
                                        <option value="zimbabwean">Zimbabwean</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="maxl">
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="male" checked>
                                            <span> Male </span>
                                        </label>
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="female">
                                            <span>Female </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <select name="component" class="form-select" required>
                                        <option value="">Component</option>
                                        <option value="military">Military</option>
                                        <option value="police">Police</option>
                                        <option value="correctional">Correctional</option>
                                        <option value="civilian">Civilian</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="title_rank" placeholder="Title/Rank *" value="" required />
                                </div>
                                <div class="form-group mb-3">
                                    <input type="tel" class="form-control" name="telephone" placeholder="Telephone Number *" value="" required />
                                </div>
                                <div class="form-group mb-3">
                                    <input type="email" class="form-control" name="private_email" placeholder="Private Email *" value="" required />
                             
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                    </div>
                </div>
        </div>
    </div>
    <div class="container register">
    
        <div class="col-md-9 register-right">
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
                </div>
               
            </div>
        </div>
    </div>

</div>
<div class="container register">
    <div class="row">
        
        <div class="col-md-9 register-right">


            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Student IPSTC DATA</h3>
                    <div class="row register-form">
                        <div class="col-md-6">
                            <h4>Have you attended a course in IPSTC before</h4>
                            <div class="form-group mb-3">
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
                                <input type="submit" name="btnPersonalInfo" class="btnRegister" value="Next" />
                            </div>
  
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>

    </form>
</div>
</div>

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

