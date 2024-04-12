<?php
/*
Template Name: Nags Quoting
*/
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title></title>
	<style>
img.time-img {
    width: auto;
    height: 250px;
}
*{
	margin: 0;
	padding: 0;
}
/*progress bar css*/
#progress-bar {
      width: 100%;
      background: linear-gradient(to right, #ce1d1e, ghostwhite);
      position: relative;
      height: 15px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 20px;
      box-sizing: border-box;
      color: #fff;
      border-radius: 8px;
      margin-bottom: 20px;
    }

    #progress-bar span {
      width: 40px;
      height: 40px;
      color: #fff;
      background-color: #ce1d1e;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-right: 10px;
      font-weight: bold;
      transition: background-color 0.3s;
    }
    .step{
        margin-top: 40px;
    }

    #progress-bar span.active {
      color: #1a99ce;
      background-color: #e7f5fa;
    }

    @media only screen and (max-width: 800px) {
  #progress-bar {
    display: none;
  }
}

    .form-step {
      display: none;
    }

    .form-step.active {
      display: block;
    }

    .ts-btn {
      background-color: #4caf50;
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 4px;
    }

/*@media only screen and (max-width: 900px) {
  #step-cont {
    display: none !important;
}
  .progress{
    display: none !important;
  }
}*/

/*page number one css    */
.page-one-btn{
    border: none;
    background: #ce1d1e;
    color: white;
    font-weight: 400;
    font-size: 20px;
    padding: 0.4em;
    border-radius: 0.5em;
}
.page-one-btn:hover{
    background-color: #e14d4c;
}
.time-img{
    position: absolute;
    right: 0;
    width: 50%;
}
.page-icon{
    width: 8.2em;
}
.text-margin{
    margin-top: -25px;
    margin-bottom: 0;
}

@media only screen and (min-width: 1200px) {
  .time-img {
    top: -6.4em;
  }
}
@media only screen and (min-width: 992px) and (max-width: 1199px) {
  .time-img {
    top: -5.7em;
  }
}
@media only screen and (max-width: 991px) and (min-width: 768px) {
  .time-img {
    top: -10.0em;
  }
}
@media only screen and (max-width: 767px) and (min-width: 500px) {
  .time-img {
    top: -7.0em;
  }
}
@media only screen and (max-width: 499px) and (min-width: 415px) {
  .time-img {
    top: -6.0em;
  }
}
@media only screen and (max-width: 414px) {
  .time-img {
    top: -2.7em;
  }
}
@media only screen and (max-width: 992px) {
  .ts-icon1 {
    border-right: 1px solid lightgray;
  }
}

/*page-two*/
.ts-page2{
    border-left: 1px solid lightgray;
}
.ts-windshield{
    border: 1px solid lightgray;
    border-radius: 7px;
    padding: 12px;
}
.page-two-btn{
    border: none;
    background: #ed5217;
    color: white;
    width: 100%;
    padding: 0.4em;
    border-radius: 0.4em;
    font-weight: 500;
    font-size: 1.2em;

}
.page-two-btn:hover{
    background-color: #337ab7;
}
.ts-text-clr{
    font-size: 1.4em;
    font-weight: 700;
    color: #283a5e;
    font-family: 'Josefin Sans', sans-serif;
}
.ts-text-clr2{
    font-size: 1em;
    font-weight: 700;
    color: #283a5e;
    font-family: 'Josefin Sans', sans-serif;
}
.ts-page2-camera{
    border: 1px solid lightgray;
    border-radius: 5px;
    width: 55px;
}
.page2-card{
    box-shadow: 1px 1px 8px 4px lightgray;
}
.page2-cost{
    background-color: #f7e8e4;
    padding: 1.0em;
    border-radius: 50%;
    width: 4.1em;
}
.page2-warranty{
    background: rgba(26, 153, 206, 0.1);
    padding: 1.0em;
    border-radius: 50%;
    width: 4.1em;
}
.page2-check{
    border: 1px solid lightgray;
    border-radius: 0.4em;
    padding: 0.6em;
}
.ts-glass-broken{
    border: 2px solid #ed5217;
    border-radius: 0.4em;
}

@media only screen and (max-width: 450px) {
  .ts-font-size {
    font-size: 13px;
  }
}

/*page number three css*/
.page3-radio{
    border: 1px solid lightgrey;
    border-radius: 0.3em;
    padding: 0.5em;
}

/*page number four css*/
.label-text{
    font-weight: 700;
    color: gray;
}
.page4-table{
    background: ghostwhite;
    padding: 2.2em;
}


/*header and footer css*/
.red-icon{
    color: rgb(206, 17, 17) !important;
    padding: 1rem .4rem;
}
.red-icon:hover{
    color: rgb(238, 59, 59) !important;
}
.cus-btn{
    background-color: rgb(206, 17, 17) !important;
    color: white !important;
}
.cus-btn:hover{
    background-color: rgb(238, 59, 59) !important;
    color: yellow !important;
}
.logo-img{
    width: 150px !important;
    height: 60px !important;
}
@media screen and (max-width: 480px) {
    .logo-img{
        width: 100px !important;
        height: 40px !important;
    }
    .mobile-logo{
        position: absolute !important;
        right: 1rem !important;
        top: 10px !important;
    }
  }

.nav-2 a{
 color: white !important;
}
.nav-2 a:hover{
 color: rgb(153, 3, 3) !important;
}
.ts-header{
    background-color: black;
}
.ts-footer{
    background-color: black;
    margin-top: 9.5em;
}

.ts-width-80{
	width:80px;
}

	</style>
</head>
<body>
<div class="container-fluied ts-header">
        <div class="row nav-2 position-sticky bg-opacity-10 g-0 p-2 navbar navbar-expand-lg bg-transparant">
            <div class="col-lg-2 col-md-3 col-6 d-flex justify-content-lg-center alighn-item-center ">
                <a href="#"><img src="https://saferideautoglass.com/wp-content/uploads/2024/01/SAFERIDE-LOGO-1024x1024.png" class="logo-img" alt=""></a>
            </div>
            <div class="col-lg-8 col-md-3 col-6">
                <button class="navbar-toggler text-sm-end ms-5 mobile-logo" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars text-light"></i>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Services
                        </a>
                        <ul class="dropdown-menu bg-dark">
                          <li><a class="dropdown-item" href="#">Windshield Replacement</a></li>
                          <li><a class="dropdown-item" href="#">Windshield chip Repair/Scratch Removal</a></li>
                          <li><a class="dropdown-item" href="#">Car glass Window Replacement</a></li>
                          <li><a class="dropdown-item" href="#">Back glass Replacement</a></li>
                          <li><a class="dropdown-item" href="#">Power Window Repair</a></li>
                          <li><a class="dropdown-item" href="#">Sunroof Replacement</a></li>
                          <li><a class="dropdown-item" href="#">Tru,Rv&Bus Glass</a></li>
                          <li><a class="dropdown-item" href="#">ADAS calibration</a></li>
                          <li><a class="dropdown-item" href="#">Service Area</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Why Us
                        </a>
                        <ul class="dropdown-menu bg-dark">
                          <li><a class="dropdown-item" href="#">About Saferide auto Glass</a></li>
                          <li><a class="dropdown-item" href="#">Why we are the perfect choice</a></li>
                          <li><a class="dropdown-item" href="#">Your Safty is Our Priority</a></li>
                          <li><a class="dropdown-item" href="#">Customer Service</a></li>
                          <li><a class="dropdown-item" href="#">Warranty</a></li>
                          <li><a class="dropdown-item" href="#">Reviews</a></li>
                        </ul>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Inshurance Claim</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">ADAS Calibration</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Contact
                        </a>
                        <ul class="dropdown-menu bg-dark">
                          <li><a class="dropdown-item" href="#">Contact Us</a></li>
                          <li><a class="dropdown-item" href="#">Become A Partner</a></li>                          
                        </ul>
                      </li>
                      
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Resources
                        </a>
                        <ul class="dropdown-menu bg-dark">
                          <li><a class="dropdown-item" href="#">Blogs</a></li>
                        </ul>
                      </li>
                    </ul>
            </div>
            </div>
            <div class="col-lg-2 col-md-6 text-md-end pt-2 pb-2 d-flex justify-content-center justify-content-md-end alighn-item-center">
                <button class="btn cus-btn p-lg-1">Get a <b>FREE</b> Price Quote</button>
            </div>
        </div>        
    </div>
    
    <!-- progress bar  -->
    <div class="container mt-5">
        <div id="progress-bar">
            <span class="active">1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>5</span>
        </div>
    </div>

    <div class="container mt-5">
        <!-- page number one -->
        <div class="container form-step active" id="step-1" style="margin-top: 60px;">
                <div class="row">
                    <!-- col no 1 -->
                    <div class="col-xl-6 col-lg-6 col-12 mt-4" style="position: relative;">
                        <div class="row">
                            <div class="col-12 text-danger">
                                <h4>Auto Glass Replacement</h4>
                            </div>
                            <div class="col text-end ">
                                <img src="https://saferideautoglass.com/wp-content/uploads/2024/01/24-Hours-Support-Logo.png" height="250px" width="auto" class="time-img">
                            </div>
                        </div>
                        <form id="SafeRide_SubmissionForm">
                            <div class="row mt-4">
                                <div class="col">
                                    <input type="number" name="" class="form-control w-100" placeholder="zip code *">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-6">
                                    <select class="form-select w-100" id="GetAllYear">
                                        <option>year</option>
                                        <option>2001</option>
                                    </select>                           
                                </div>
                                <div class="col-6">
                                    <select class="form-select w-100" id="GetAllMake" disabled>
                                        <option>Make</option>
                                    </select>                           
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-6">
                                    <select class="form-select w-100" id="GetAllModal"  disabled>
                                    </select>                           
                                </div>
                                <div class="col-6">
                                    <select class="form-select w-100" id="GetAllStyle" disabled>
                                    </select>                           
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col m-3" style="border: 1px solid lightgrey;">
                                    <div class="p-2">
                                        <label for="contact" class="fw-bold mb-2">Contact Phone/ Mobile number *</label><br>
                                        <input type="number" id="contact" name="" class="form-control w-100" placeholder="phone*">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col">
                                    <input type="email" name="" class="form-control w-100" placeholder="E-mail *">
                                </div>
                            </div>
                            <div class="row mt-4 ts-insurance-prize">
                                <div class="col">
                                    <input type="number" name="" class="form-control w-100" placeholder="$0">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6 mt-3">
                                    <input id="insurance" type="checkbox" class="form-check-input ts-insurance" name="">
                                    <label for="insurance" class="fw-bold">I want to use my insurance</label>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="page-one-btn w-100" onclick="nextStep()">NEXT</button>
                                </div>
                            </div>                          
                        </form>
                    </div>
                    <!-- col no 2 -->
                    <div class="col-xl-6 col-lg-6 col-12 mt-4">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-6 text-center ts-icon1">
                                <img src="https://saferideautoglass.com/wp-content/uploads/2024/01/istockphoto-1010565316-612x612-2.jpg" class="page-icon">
                                
                            </div>
                            <div class="col-xl-12 col-lg-12 col-6 text-center ts-icon1">
                                <img src="https://saferideautoglass.com/wp-content/uploads/2024/01/page1-icon1.png" class="page-icon">
                                <p class="text-margin">Describe Details <br> About Your Car</p>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-6 text-center">
                                <img src="https://saferideautoglass.com/wp-content/uploads/2024/01/page1-icon2.png" class="page-icon">
                                <p class="text-margin">Get A Quote From <br>Our Local Auto Glass Shop</p>
                            </div>
                            <div class="col-12 text-center">
                                <img src="https://saferideautoglass.com/wp-content/uploads/2024/01/page1-icon3.png" class="page-icon">
                                <p class="text-margin">Schedule Service Online <br>At Any Time of The Day</p>
                            </div>
                        </div>
                    </div>
                </div>
        </div> 

        <!-- page number 2 -->
        <div class="container form-step ts-page2" id="step-2">
                <!-- part no 1 -->
                <div class="row flex-row-reverse page2-part1">
                    <!-- col no one -->
                    <div class="col-xl-6 col-lg-6 col-12 mt-4">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-6 text-center ts-icon1">
                                <img src="https://saferideautoglass.com/wp-content/uploads/2024/01/page2-icon1.png" class="page-icon">
                                <p class="text-margin">We’re Affordable</p>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-6 text-center">
                                <img src="https://saferideautoglass.com/wp-content/uploads/2024/01/page2-icon2.png" class="page-icon">
                                <p class="text-margin">Certified Technicians</p>
                            </div>
                            <div class="col-12 text-center">
                                <img src="https://saferideautoglass.com/wp-content/uploads/2024/01/page2-icon3.png" class="page-icon">
                                <p class="text-margin">Schedule a Replacement 24/7</p>
                            </div>
                        </div>
                    </div>
                    <!-- col no 2 -->
                    <div class="col-xl-6 col-12 ps-5">
                        <div class="row">
                            <div class="col text-info">
                                <h5>What do you need fixed?</h5>
                            </div>
                        </div>
                        <div class="row mt-5 ts-windshield">
                            <div class="col-8">
                                <input type="checkbox" id="Wind" name="" class="form-check-input me-2">
                                <label for="Wind">Windshield</label>
                            </div>
                            <div class="col-4 text-end">
                                <img src="https://saferideautoglass.com/wp-content/uploads/2024/01/one.png" class="ts-width-80">
                            </div>
                        </div>
                        <div class="row mt-4 ts-windshield">
                            <div class="col-8">
                                <input type="checkbox" id="Passenger" name="" class="form-check-input me-2">
                                <label for="Passenger">Passenger Front - Door Glass</label>
                            </div>
                            <div class="col-4 text-end">
                                <img src="https://saferideautoglass.com/wp-content/uploads/2024/01/two.png" class="ts-width-80">
                            </div>
                        </div>
                        <div class="row mt-4 ts-windshield">
                            <div class="col-8">
                                <input type="checkbox" id="Driver" name="" class="form-check-input me-2">
                                <label for="Driver">Driver Front - Door Glass</label>
                            </div>
                            <div class="col-4 text-end">
                                <img src="https://saferideautoglass.com/wp-content/uploads/2024/01/three.png" class="ts-width-80">
                            </div>
                        </div>
                        <div class="row mt-4 ts-windshield">
                            <div class="col-8">
                                <input type="checkbox" id="Passenger Back" name="" class="form-check-input me-2">
                                <label for="Passenger Back">Passenger Back - Door Glass</label>
                            </div>
                            <div class="col-4 text-end">
                                <img src="https://saferideautoglass.com/wp-content/uploads/2024/01/four.png" class="ts-width-80">
                            </div>
                        </div>
                        <div class="row mt-4 ts-windshield">
                            <div class="col-8">
                                <input type="checkbox" id="Driver Back" name="" class="form-check-input me-2">
                                <label for="Driver Back">Driver Back - Door Glass</label>
                            </div>
                            <div class="col-4 text-end">
                                <img src="https://saferideautoglass.com/wp-content/uploads/2024/01/five.png" class="ts-width-80">
                            </div>
                        </div>
                        <div class="row mt-4 ts-windshield">
                            <div class="col-8">
                                <input type="checkbox" id="Back" name="" class="form-check-input me-2">
                                <label for="Back">Back Glass</label>
                            </div>
                            <div class="col-4 text-end">
                                <img src="https://saferideautoglass.com/wp-content/uploads/2024/01/seven.png" class="ts-width-80">
                            </div>
                        </div>
                        <div class="row mt-4 ts-windshield">
                            <div class="col-8">
                                <input type="checkbox" id="Driver1" name="" class="form-check-input me-2">
                                <label for="Driver1">Driver Quarter</label>
                            </div>
                            <div class="col-4 text-end">
                                <img src="https://saferideautoglass.com/wp-content/uploads/2024/01/seven.png" class="ts-width-80">
                            </div>
                        </div>
                        <div class="row mt-4 ts-windshield">
                            <div class="col-8">
                                <input type="checkbox" id="Passenger1" name="" class="form-check-input me-2">
                                <label for="Passenger1">Passenger Quarter</label>
                            </div>
                            <div class="col-4 text-end">
                                <img src="https://saferideautoglass.com/wp-content/uploads/2024/01/six.png" class="ts-width-80">
                            </div>
                        </div>
                        <div class="row mt-5 justify-content-center">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-6">
                                <button type="button" class="page-two-btn" onclick="prevStep()">BACK</button>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-6">
                                <button type="button" class="page-two-btn part1-btn-next">NEXT</button>
                            </div>
                        </div>                      
                    </div>                  
                </div>

                <!-- part no 2 -->
                <div class="row flex-row-reverse page2-part2">
                    <!-- col no 1 -->
                    <div class="col-xl-6 col-lg-6 col-12 mt-4">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-6 text-center ts-icon1">
                                <img src="https://saferideautoglass.com/wp-content/uploads/2024/01/page2-icon1.png" class="page-icon">
                                <p class="text-margin">We’re Affordable</p>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-6 text-center">
                                <img src="https://saferideautoglass.com/wp-content/uploads/2024/01/page2-icon2.png" class="page-icon">
                                <p class="text-margin">Certified Technicians</p>
                            </div>
                            <div class="col-12 text-center">
                                <img src="https://saferideautoglass.com/wp-content/uploads/2024/01/page2-icon3.png" class="page-icon">
                                <p class="text-margin">Schedule a Replacement 24/7</p>
                            </div>
                        </div>
                    </div>
                    <!-- col no 2  -->
                    <div class="col-xl-6 col-12 mt-4 p-4">
                        <div class="row">
                            <div class="col ts-text-clr">
                                <p>What's wrong with your side window?</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12  mt-3 text-center">
                                <div class="card">
                                    <div class="card-body page2-card ts-glass-broken">
                                        <div class="row">
                                            <div class="col-12">
                                                <img src="https://saferideautoglass.com/wp-content/uploads/2024/01/page2-glass1.png">
                                            </div>
                                            <div class="col-12 ts-text-clr2">
                                                <p>The Glass is Broken</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12  mt-3 text-center">
                                <div class="card">
                                    <div class="card-body page2-card ts-stuck">
                                        <div class="row">
                                            <div class="col-12">
                                                <img src="https://saferideautoglass.com/wp-content/uploads/2024/01/page2-glass1.png">
                                            </div>
                                            <div class="col-12 ts-text-clr2">
                                                <p>It's Stuck or Move Slowly</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        glass broken
                        <div class="row mt-5  ts-camera">
                            <div class="col-12 ts-text-clr">
                                What cause the glass to break?
                            </div>
                            <div class="col-12 mt-3 page2-check">
                                <input type="checkbox" id="Break" name="" class="form-check-input">
                                <label for="Break" class="ms-2">Break-Ins</label>
                            </div>
                            <div class="col-12 mt-2 page2-check">
                                <input type="checkbox" id="Accidents" name="" class="form-check-input">
                                <label for="Accidents" class="ms-2">Accidents</label>
                            </div>
                            <div class="col-12 mt-2 page2-check">
                                <input type="checkbox" id="Impact" name="" class="form-check-input">
                                <label for="Impact" class="ms-2">Debris Impact</label>
                            </div>
                            <div class="col-12 mt-2 page2-check d-flex">
                                <input type="checkbox" id="Other" name="" class="form-check-input ts-other">
                                <label for="Other" class="ms-2">Other</label>
                                <input type="text" class="form-control w-25 ms-3 ts-other-hide" name="">
                            </div>
                        </div>
                        Stuck or Move Slowly
                        <div class="row mt-5">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                                <img src="https://saferideautoglass.com/wp-content/uploads/2024/01/page2-camera.png" class="ts-page2-camera">
                                            </div>
                                            <div class="col-9 ts-font-size">
                                                <p class="ts-text-clr2 m-0">Not sure of your damage?</p>
                                                <p class="ts-text-clr2 text-danger m-0">Send us a photo to review</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                          
                    </div>                  
                </div>
                <div class="row page2-part2">
                    <div class="col-xl-6 col-12">
                        <div class="row mt-5 justify-content-center">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-6">
                                <button type="button" class="page-two-btn w-100 part2-btn-back">BACK</button>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-6">
                                <button type="button" class="page-two-btn w-100" onclick="nextStep()">NEXT</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <!-- page number 3 -->
        <div class="container form-step" id="step-3">
                <div class="row flex-row-reverse">
                    <!-- col no 1 -->
                    <div class="col-xl-6 col-lg-6 col-12 mt-4">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-6 text-center ts-icon1">
                                <img src="https://saferideautoglass.com/wp-content/uploads/2024/01/page3-icon1.png" class="page-icon">
                                <p class="text-margin">Pay for service once completed</p>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-6 text-center">
                                <img src="https://saferideautoglass.com/wp-content/uploads/2024/01/page3-icon2.png" class="page-icon">
                                <p class="text-margin">We come to you at no extra cost</p>
                            </div>
                            <div class="col-12 text-center">
                                <img src="https://saferideautoglass.com/wp-content/uploads/2024/01/page3-icon3.png" class="page-icon">
                                <p class="text-margin">National lifetime warranty</p>
                            </div>
                        </div>
                    </div>
                    <!-- col no 2 -->
                    <div class="col-xl-6 col-lg-6 col-12 mt-4">
                        <div class="row">
                            <div class="col-12 ts-text-clr">
                                <p>Which one of options best describes the Front Windshield feature of your car?</p>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 page3-radio">
                                <input type="radio" id="Basic" class="form-check-input" name="page3">
                                <label for="Basic" class="fw-bold ms-2 ">Basic Windshield</label>
                            </div>
                            <div class="col-12 page3-radio d-flex mt-3">
                                <input type="radio" id="Alert" class="form-check-input" name="page3">
                                <label for="Alert" class="fw-bold ms-2 ">Windshield with Forward Collision Alert, Heated Wiper Park Area, High Beam Assist, Lane Departure Warning System and Third Visor Frit</label>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 ts-text-clr">
                                <p>Which one of options best describes the Front Windshield feature of your car?</p>
                            </div>
                            <div class="col-12 mt-4 page3-radio">
                                <input type="radio" id="Back" class="form-check-input" name="Vent Glass">
                                <label for="Back" class="fw-bold ms-2 ">Vent Glass - Passenger Side - Back</label>
                            </div>
                            <div class="col-12 mt-3 page3-radio">
                                <input type="radio" id="Front" class="form-check-input" name="Vent Glass">
                                <label for="Front" class="fw-bold ms-2 ">Vent Glass - Passenger Side - Front</label>
                            </div>
                        </div>
                        <div class="row mt-5 justify-content-center">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-6">
                                <button type="button" class="page-two-btn w-100" onclick="prevStep()">BACK</button>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-6">
                                <button type="button" class="page-two-btn w-100" onclick="nextStep()">NEXT</button>
                            </div>
                        </div>                      
                    </div>                  
                </div>
        </div>

        <!-- page number four -->
        <div class="container form-step" id="step-4">
                <div class="row">
                    <!-- col no 1 -->
                    <div class="col-xl-6 col-lg-6 col-12 mt-4">
                        <div class="row">
                            <div class="col ts-text-clr">
                                <p>Choose Date and Time</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label class="label-text">Service Type *</label>
                                <select class="form-select w-100 mt-1">
                                <option selected>Mobile</option>
                                <option>In Shop</option>
                            </select>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label class="label-text">Select Time For Service *</label>
                                <select class="form-select w-100 mt-1">
                                    <option selected>8AM - 12AM</option>
                                    <option>1PM - 5PM</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <label class="label-text" for="datepicker">Select Date For Service *</label><br>
                                <input type="text" id="datepicker" class="form-control w-100" placeholder="05/01/2024">
                            </div>
                        </div>
                        <div class="row mt-5 justify-content-center">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-6">
                                <button type="button" class="page-two-btn w-100" onclick="prevStep()">BACK</button>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-6">
                                <button type="button" class="page-two-btn w-100" onclick="nextStep()">NEXT</button>
                            </div>
                        </div>
                    </div>
                    <!-- col no 2 -->
                    <div class="col-xl-6 col-lg-6 col-12 mt-4 page4-table">
                        <div class="row">
                            <div class="col ts-text-clr">
                                <p>YOUR ORDER</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table class="table table-striped text-center table-hover" style="font-size: 0.8em;">
                                    <thead class="table-secondary">
                                      <tr style="font-size: 1.2em;">
                                        <th scope="col">PRODUCT</th>
                                        <th scope="col">TOTAL</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>Passenger Front - Door Glass× 2</td>
                                        <td>$ 72.62</td>
                                      </tr>
                                      <tr>
                                        <td>Passenger Vent× 2</td>
                                        <td>$ 72.62</td>
                                      </tr>
                                      <tr>
                                        <td>Front Windshield× 2</td>
                                        <td>$ 72.62</td>
                                      </tr>
                                      <tr>
                                        <td>Passenger Vent× 2</td>
                                        <td>$ 72.62</td>
                                      </tr>
                                      <tr>
                                        <td>Front Windshield× 2</td>
                                        <td>$ 72.62</td>
                                      </tr>
                                      <tr>
                                        <td>Front Windshield× 2</td>
                                        <td>$ 72.62</td>
                                      </tr>
                                      <tr>
                                        <td>Front Windshield× 2</td>
                                        <td>$ 72.62</td>
                                      </tr>
                                    </tbody>
                                    <tfoot >
                                      <tr>
                                        <td class="text-start fw-bold">Cart Subtotal</td>
                                        <td>$ 72.62</td>
                                      </tr>
                                      <tr>
                                        <td class="text-start fw-bold">Sale Tax(6%)</td>
                                        <td>$ 72.62</td>
                                      </tr>
                                      <tr style="font-size: 1.2em;">
                                          <th>Order Total</th>
                                          <td class="fw-bold">$643.37</td>
                                      </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>  



<!-- jquery code -->
<!-- <script src="js/jquery.js"></script> -->
<script>
	document.addEventListener("DOMContentLoaded", function() {
    var imageContainers = ['ts-icon1', 'ts-icon2', 'ts-icon3']; // Add more class names as needed

    imageContainers.forEach(function(containerClass) {
        var container = document.querySelector('.' + containerClass);
        if (container) {
            var images = container.querySelectorAll('img');
            images.forEach(function(img) {
                var src = img.getAttribute('src');
                if (src) {
                    img.src = src; // Reset the src attribute to its original value
                }
            });
        }
    });
});

document.addEventListener("DOMContentLoaded", function() {
    // Selecting images within your specific template
    // Adjust the selector if needed to target only the images in your plugin's template
    document.querySelectorAll('.ts-icon1 img, .page-icon img, img[data-tgpli-src]').forEach(function(img) {
        var src = img.getAttribute('data-tgpli-src');

        // Create a new image element
        var newImg = document.createElement('img');
        newImg.src = src;
        newImg.className = img.className; // copy class from the original image

        // Replace the old image with the new one
        img.parentNode.replaceChild(newImg, img);

        // Remove the script tag if needed
        var nextElement = newImg.nextSibling;
        if (nextElement && nextElement.tagName === 'SCRIPT') {
            nextElement.parentNode.removeChild(nextElement);
        }
    });
});

    $(document).ready(function(){
        // page number one
        $('.ts-insurance-prize').hide();
        $('.ts-insurance').click(function(){
            $('.ts-insurance-prize').toggle();
        });

        // page number two
        $('.ts-stuck').click(function(){
            $('.ts-camera').hide();
            $(this).css({
                'border':'2px solid #ed5217',
                'border-radius': '0.4em',
            });
            $('.ts-glass-broken').css({
                'border':'none',
            });
        });
        $('.ts-glass-broken').click(function(){
            $('.ts-camera').show();
            $(this).css({
                'border':'2px solid #ed5217',
                'border-radius': '0.4em',
            });
            $('.ts-stuck').css({
                'border':'none',
            });
        });

        $('.ts-other-hide').hide();
        $('.ts-other').click(function(){
            $('.ts-other-hide').toggle();
        })

        $('.page2-part2').hide();
        $('.part1-btn-next').click(function(){
            $('.page2-part1').hide();
            $('.page2-part2').show();
        });
        $('.part2-btn-back').click(function(){
            $('.page2-part1').show();
            $('.page2-part2').hide();
        });

        // date picker code
        $(function() {
          $("#datepicker").datepicker();
        });
    });
    
</script>
<!-- multi step form     -->
<script>
  let currentStep = 1;

  function nextStep() {
    if (currentStep < 5) {
      $(`#step-${currentStep}`).removeClass('active');
      $(`#progress-bar span:nth-child(${currentStep})`).removeClass('active');
      currentStep++;
      $(`#step-${currentStep}`).addClass('active');
      $(`#progress-bar span:nth-child(${currentStep})`).addClass('active');
      updateProgressBarColor();
    }
  }

  function prevStep() {
    if (currentStep > 1) {
      $(`#step-${currentStep}`).removeClass('active');
      $(`#progress-bar span:nth-child(${currentStep})`).removeClass('active');
      currentStep--;
      $(`#step-${currentStep}`).addClass('active');
      $(`#progress-bar span:nth-child(${currentStep})`).addClass('active');
      updateProgressBarColor();
    }
  }

  function updateProgressBarColor() {
    const percentage = (currentStep - 1) * (100 / 4);
    const newColor = `linear-gradient(to right, lightblue ${percentage}%, ghostwhite ${percentage}%)`;
    $('#progress-bar').css('background', newColor);
  }

  function submitForm() {
    // Add your form submission logic here
    alert('Form submitted successfully!');
  }
$(document).ready(function($) {
    function getAllYears() {
        var requestData = {
            action: 'year'
        };
        $.ajax({
            url: 'https://saferideautoglass.com/wp-content/plugins/ts-safe-ride-api/public/saferidefunction.php',
            method: 'GET',
            data: requestData,
            dataType: 'json',
            success: function(result) {
                console.log(result);
                if (result.error) {
                    console.error('Error:', result.error);
                } else {
                    var select = $("#GetAllYear");
                    select.empty();
                    var yearArray = JSON.parse(result.response);
                    select.append('<option value="">Select Year</option>');
                    $.each(yearArray, function(index, value) {
                        select.append('<option value="' + value + '">' + value + '</option>');
                    });
                }
            }
        });
    }
    getAllYears();
    
    $("#GetAllYear").change(function() {
        var selectedValue = $(this).val();
        var MakeRequestData = {
            action: 'make',
            GetMake: selectedValue,
        };
      $.ajax({
		    url: 'https://saferideautoglass.com/wp-content/plugins/ts-safe-ride-api/public/saferidefunction.php',
		    method: 'GET',
		    data: MakeRequestData,
		     dataType: "json",
		    success: function(result) {
		        console.log(result);
		        var makeSelect = $("#GetAllMake");
		        makeSelect.empty();
		        
		        $('#GetAllMake').prop('disabled', false);
		        var responseData = JSON.parse(result.response);
		        $.each(responseData, function(index, make) {
		                console.log(make);
		                makeSelect.append('<option value="' + make.make_id + '">' + make.make_name + '</option>');
		        });
		    }
		});
    });
    $("#GetAllMake").change(function() {
        var GetAllMakeVal = $(this).val();
       var GetAllYearVal = jQuery('#GetAllYear').val();
        var MaodalRequestData = {
            action: 'Modal',
            GetYear: GetAllYearVal,
            GetMake: GetAllMakeVal
        };
      $.ajax({
		    url: 'https://saferideautoglass.com/wp-content/plugins/ts-safe-ride-api/public/saferidefunction.php',
		    method: 'GET',
		    data: MaodalRequestData,
		     dataType: "json",
		    success: function(result) {
		        console.log(result);
		        var makeSelect = $("#GetAllModal");
		        makeSelect.empty();
		        
		        $('#GetAllModal').prop('disabled', false);
		        var responseData = JSON.parse(result.response);
		        $.each(responseData, function(index, make) {
		                console.log(make);
		                makeSelect.append('<option value="' + make.model_id + '" data-modified-id="'+make.modifier_id+'" data-modifier-dsc="'+make.modifier_dsc+'">' + make.model_name + '</option>');
		        });
		    }
		});
    });
        $("#GetAllModal").change(function() {
    var GetAllModalVal = $(this).val();
    var GetModifiedID = $(this).attr('data-modified-id');
   var GetAllMakeVal = jQuery('#GetAllMake').val();
   var GetAllYearVal = jQuery('#GetAllYear').val();
    var MaodalRequestData = {
        action: 'Style',
        GetYear: GetAllYearVal,
        GetMake: GetAllMakeVal,
        GetModal: GetAllModalVal
    };
  $.ajax({
	    url: 'https://saferideautoglass.com/wp-content/plugins/ts-safe-ride-api/public/saferidefunction.php',
	    method: 'GET',
	    data: MaodalRequestData,
	     dataType: "json",
	    success: function(result) {
	        console.log(result);
	        var makeSelect = $("#GetAllStyle");
	        makeSelect.empty();
	        
	        $('#GetAllStyle').prop('disabled', false);
	        var responseData = JSON.parse(result.response);
	        $.each(responseData, function(index, make) {
	                console.log(make);
	                makeSelect.append('<option value="' + make.model_id + '" data-modified-id="'+make.modifier_id+'" data-modifier-dsc="'+make.modifier_dsc+'">' + make.model_name + '</option>');
	        });
	    }
	});
});
    
});



</script>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>

<div class="container-fluied ts-footer">
        <h1 class="text-light text-center">Contact Us</h1>
        <div class="row mt-lg-5 mt-md-3 g-0">
            <div class="col-lg-3 col-md-6 p-2 p-sm-5">
                <div class="text-center">
                    <i class="fa-solid fa-location-dot red-icon "></i>
                    <h2 class="text-light mt-4 mb-3">Adress</h2>
                    <span class="text-secondary">123 Main Street, Anytown, USA 12345</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 p-2 p-sm-5">
                <div class="text-center">
                    <i class="fa-solid fa-phone red-icon "></i>
                    <h2 class="text-light mt-4 mb-3">Phone</h2>
                    <span class="text-secondary">703-239-3696</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 p-2 p-sm-5">
                <div class="text-center">
                    <i class="fa-solid fa-envelope red-icon "></i>
                    <h2 class="text-light mt-4 mb-3">Content</h2>
                    <span class="text-secondary">admin@saferideautoglass.com</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 p-2 p-sm-5">
                <div class="text-center">
                    <i class="fa-regular fa-clock red-icon "></i>
                    <h2 class="text-light mt-4 mb-3">Working Hours</h2>
                    <ul class="list-unstyled">
                        <li class="text-secondary text-small">MON09:00 AM - 05:00 PM</li>
                        <li class="text-secondary text-small">TUE09:00 AM - 05:00 PM</li>
                        <li class="text-secondary text-small">WED09:00 AM - 05:00 PM</li>
                        <li class="text-secondary text-small">THU09:00 AM - 05:00 PM</li>
                        <li class="text-secondary text-small">FRI09:00 AM - 05:00 PM</li>
                        <li class="text-secondary text-small">SAT09:00 AM - 12:00 PM</li>
                    </ul>    
                </div>
            </div>
        </div>
    </div>