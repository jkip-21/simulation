<?php
/**
 * Template Name: About-us
 */
get_header();
?>
<style>

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #E9ECEF;
  color: #090D5A;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}
a .btn{
  background-color: #090D5A;
  border-radius: 5px;
  color: white;
}
.button {
  border: none;
  outline: 0;
  display: flex;
  padding: 8px;
  color: white;
  background-color: #090D5A;
  border-radius: 5px;
  cursor: pointer;
  justify-content: center;
}

.button:hover {
  background-color: #555;
}
.shaft{
  display: flex;
  justify-Content: space-around;
  margin-top: 50px;
  margin-bottom: 50px;
}
.shaft-one h3{
  text-align: center;
  color: #090D5A;
}
.shaft-one p{
  color: #090D5A;
}
.shaft-one{
  justify-content: center;
  align-items: center;
  border-radius: 10px;
  border: 2px solid #1703FF;
  width: 20%;
  padding: 20px;
  background-color: #F8EDEB;
}
.shaft-two h3{
  text-align: center;
  color: #090D5A;
}
.shaft-two p{
  color: #090D5A;
}
.shaft-two{
  justify-content: center;
  align-items: center;
  border-radius: 10px;
  border: 2px solid #1703FF;
  width: 20%;
  padding: 20px;
  background-color: #D8F3DC;
}
.shaft-three h3{
  text-align: center;
  color: #090D5A;
}
.shaft-three p{
  color: #090D5A;
}
.shaft-three{
  justify-content: center;
  align-items: center;
  border-radius: 10px;
  border: 2px solid #1703FF;
  width: 20%;
  padding:20px;
  background-color: #E9ECEF;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>

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
    <a href="/wp/simulation/auth/"><button type="button" style= "margin-right: 40px;"class="btn">LOGIN</button></a>
    </div>
  </div>
</nav>


<div class="about-section">
  <h1>About Us Page</h1>
  <p>Simulation course manager is a course management system</p>
  <p>that helps you to manage your courses within</p>
  <p>a set period of time.</p>
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="../wp-content/themes/simulation/assets/img/profile.png" alt="">
      <div class="container">
        <h2>Jonah Kiptoo</h2>
        <p class="title">CEO & Founder</p>
        <p>Lead engineer with a couple of developers who are ready to serve you.</p>
        <p>jonah@yopmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="../wp-content/themes/simulation/assets/img/profile.png" alt="">
      <div class="container">
        <h2>Trevor Doe</h2>
        <p class="title">Art Director</p>
        <p>Turning your imaginations into reality. Visualize your imagination through art.</p>
        <p>trevor@yopmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="../wp-content/themes/simulation/assets/img/profile.png" alt="">
      <div class="container">
        <h2>John Doe</h2>
        <p class="title">Designer</p>
        <p>Proffesional Desigmer with well established experience working on multiple courses.</p>
        <p>john@yopmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
</div>

<div class="about-section">
  <h1>Accelerate your growth with simulation</h1>
  <p>We help our clients" to position their courses in the modern web.</p>
</div>
<div class="shaft">
  <div class="shaft-one">
    <h3>Mission</h3>
    <p>Our mission is to provide innovative and effective course management solutions for startups and small businesses</p>
  </div>
  <div class="shaft-two">
    <h3>Vision</h3>
    <p>
      Our vision is to be the leading course management company for small and startup businesses.
    </p>
  </div>
  <div class="shaft-three">
    <h3>Who are we?</h3>
    <p>We are simulation course manager a course management company with the aim of helping small businesses to manage their courses.</p>
  </div>
</div>
<?php get_footer(); ?>