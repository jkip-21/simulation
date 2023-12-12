<?php

get_header();?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <img src="/wp-content/themes/simulation/assets/img/brand.jpg" alt="" height="100px">

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

<div class="title">
  <h1>SIMULATION COURSE MANAGER</h1>
</div>
<style>
  .title{
    text-align: center;
    color: #090D5A;
  }
  .section{
    display: flex
  }
  .section-one h1{
    font-size: 64px;
    color: orange;
    font-weight: bold;
    letter-spacing: 4px;
    line-height: 1.2em;
  }
  .section-one h3{
    font-size: 24px;
    color: #090D5A;
    font-weight: bold;
    letter-spacing: 2px;
  }
  .section-one p{
    font-size: 20px;
    color: #090D5A;
    letter-spacing: 1px;
  }
  .section-one{
    padding: 7%;
    width: 50%;
    justify-content: center;
    align-items: center;
  }
  .section-two{
    padding: 30px;
    float:right;
    width: 50%;
  }
  .section-two img{
    height: 100%;
    width: 100%;
  }
  .content{
    text-align: center;
    display: block;
    height: 300px;
    background-color: #E9ECEF;
    margin-bottom: 50px;
}
.shaft{
  display: flex;
  justify-Content: space-around
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
.module{
  height: 100px;
}
.content-header h1{
  margin-top:20px;
  color: #090D5A;
}
a .btn{
  background-color: #090D5A;
  border-radius: 5px;
  color: white;
}
.content p{
  color: #090D5A;
  font-size:24px;
  line-height:2.0em
}
</style>
<div class="section">
  <div class="section-one">
    <h1>COMMUNICATE:</h1>
    <h1>VISUALIZE:</h1>
    <h1>CREATE:</h1>
    <h1>COORDINATE:</h1>
    <h3>Your Digital Course Manager Footprint</h3>
    <p>Cover your milestone with us</p>
    <a href="http://127.0.0.1:8000/register/">
    <button type="button" class="btn">SIGN UP</button>
    </a>
  </div>
  <div class="section-two">
    <img src="/wp-content/themes/simulation/assets/img/home-page-banner.png" alt="">
  </div>
</div>
<div class="content" id="content">
  <div class="content-header"><h1>ABOUT US</h1></div>
  <div class="content-paragragh">
  <p>Simulation course manager is a COURSE management system<br> that helps you to manage your project within<br> a set period of time.</p>
  </div>
  
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
    <p>We are simulation course manager a course management company with the aim of helping small businesses to manage their projects.</p>
  </div>
</div>
<div class="module"></div>


<?php get_footer();?>
