<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.0.0
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<style>
		 .jumbotron{
      text-align: left;
      margin-bottom: 0px;
      width:100%;
      height: 100vh;
      background-color: white;
  }
  .jumbotron .display-4{
  margin-bottom: 50px;
  margin-top: 20px;
}
.btn{
	padding: 5px 10px;
    font-size: 20px;
}
.btn {
  margin-top: 20px;
}
.h3custom{
font-family: sans-serif;
font-style: normal;
font-weight: normal;
color: #000000;
}
.h3-custom{
font-family: sans-serif;
font-style: normal;
font-weight: normal;
font-size: 30px;
line-height: 37px;

color: rgba(0, 0, 0, 0.71);

}
@media (min-width: 1200px) {
.jumbotron {
  background-image: url("<?php echo base_url();?>assets/images.png");
      background-size: 100% 100%;
    }

}
	</style>
  <div class="contianer jumbotron jumbotron-fluid">
    <div class="container container-top">
      <h1 class="display-4 h3custom" >Selamat Datang Di Agen Tiket Bus Tegalyoso</h1>
	  
	  <h3 class="h3-custom" >Tempat dimana Anda dapat memesan <br> Tiket Bus online dengan mudah</h3>
    <a class="btn btn-dark btn-xl" href="<?= site_url('login')?>">Masuk</a>
    </div>
  </div>