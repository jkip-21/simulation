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
a .btn{
  background-color: #090D5A;
  border-radius: 5px;
  color: white;
}
</style>
<div class="section">
  <div class="section-one">
    <h1>AWWW..DON'T CRY:</h1>
    <h1>ITS JUST A 404 Error:</h1>
    <h3>Looks like we lost this page</h3>
    <h3>but not your luggage!</h3>
    <p>What you are looking for might have been misplaced in long term memory.</p>
    <a href="http://127.0.0.1:8000/register/">
    <button type="button" class="btn">SIGN UP</button>
    </a>
  </div>
  <div class="section-two">
    <img src="/wp-content/themes/simulation/assets/img/hero-1.png" alt="">
  </div>
</div>
<?php get_footer();?>
