<?php
/*
Template Name: contact
*/
get_header();
?>

<head>
  <link rel="stylesheet" href="../wp-content/themes/simulation/assets/css/add_course.css">
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <img src="../wp-content/themes/simulation/assets/img/brand.jpg" alt="" height="100px">

  <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="http://127.0.0.1:8000/"
          style="text-decoration: none; color: #090D5A; margin-right: 40px;">HOME</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1:8000/#content"
          style="text-decoration: none; color: #090D5A; margin-right: 40px;">ABOUT US</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="http://127.0.0.1:8000/contact-us/"
          style="text-decoration: none; color: #090D5A;margin-right: 40px;">CONTACT US</a>
      </li>
    </ul>
    <div class="justify-content-end">
      <a href="/wp/simulation/auth/"><button type="button" style="margin-right: 40px;" class="btn">LOGIN</button></a>
    </div>
  </div>
</nav>
<style>
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

  a .btn {
    background-color: #090D5A;
    border-radius: 5px;
    color: white;
  }

  .new {
    border: 2px solid #090D5A;
    display: block;
    justify-self: center;
    width: 40%;
    margin-left: 30%;
    margin-top: 20px;
    margin-bottom: 20px;
    border-radius: 20px
  }
</style>
<div class="new">
  <div class="row justify-content-center">

    <div class="logo justify-content-center">
      <img style="text-align: center;" src="../wp-content/themes/simulation/assets/img/brand.jpg" alt="LOGO" height="150px"
        width="120px">

    </div>
    <h1 style="text-align: center;">CONTACT US</h1>
    <?php


    ?>
    <form action="" method="post" style="width:40vw; box-shadow:3px 3px 3px 3px 3px grey; padding:30px;">
      <div class="form-group">
        <label for="email" style="color: #090D5A; font-weight: w800; font-size: 20px"><?php _e('Email:', 'mytextdomain');?></label>
        <input type="email" class="form-control input-sm mb-4" name="useremail" id="email" ,
          placeholder="Enter your email..." required style="border: 1px solid #090D5A">
      </div>
      <div class="form-group">
        <label for="message" style="color: #090D5A; font-weight: w800; font-size: 20px"><?php _e('Message:', 'mytextdomain'); ?></label><br>
        <textarea name="message" id="" rows="5" class="form-control input-sm mb-4" placeholder="Enter your message..."
          required style="border: 1px solid #090D5A;"></textarea>
      </div>
      <div class="btn">
        <input class="btn btn-primary px-5" type="submit" name="submitcontact">
      </div>
  </div>
  <?php wp_nonce_field( 'cpt_nonce_action', 'cpt_nonce_field' ); ?>
  </form>
</div>
</div>
<?php
get_footer();
?>