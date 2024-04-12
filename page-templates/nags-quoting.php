<?php
/*
Template Name: Nags Quoting
*/
?>

<?php get_header(); ?>


<?php

    // function getUserIP(){
    //     // Get real visitor IP behind CloudFlare network
    //     if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
    //             $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    //             $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    //     }
    //     $client  = @$_SERVER['HTTP_CLIENT_IP'];
    //     $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    //     $remote  = $_SERVER['REMOTE_ADDR'];

    //     if(filter_var($client, FILTER_VALIDATE_IP))
    //     {
    //         $ip = $client;
    //     }
    //     elseif(filter_var($forward, FILTER_VALIDATE_IP))
    //     {
    //         $ip = $forward;
    //     }
    //     else
    //     {
    //         $ip = $remote;
    //     }

    //     return $ip;
    // }

    // if( function_exists("nags_quoting_update_customer_data") ){
    //     nags_quoting_update_customer_data();
    // }
    // function nags_quoting_update_customer_data(){
    //     global $wpdb;
    //     $table_name = $wpdb->prefix . 'nags_quoting_customer_data';
    //     $ip_address = getUserIP();
    //     $results = $wpdb->get_results( "SELECT * FROM $table_name" );
    //     if($results){
    //         foreach ( $results as $result ) {
    //             if( $result->ip_address == $ip_address ){
    //                 return;
    //             }
    //         }
    //     }
    //     $wpdb->insert(
    //         $table_name,
    //         array(
    //             'ip_address' => $ip_address,
    //             'zip' => '7000',
    //         )
    //     );
    // }

?>


<div class="container-fluid ts-header mt-5 mb-5 pt-5 pb-5 nags_main_content">

    <!-- progress bar  -->
    <div class="container mt-5">
        <div id="progress-bar">
            <span class="active" onclick="goToStep(1)" style="cursor:pointer;">1</span>
            <span onclick="goToStep(2)" style="cursor:pointer;">2</span>
            <span onclick="goToStep(3)" style="cursor:pointer;">3</span>
            <span onclick="goToStep(4)" style="cursor:pointer;">4</span>
            <span onclick="goToStep(5)" style="cursor:pointer;">5</span>
        </div>
    </div>

    <div class="container mt-5">
        <!-- page number one -->
        <div class="container form-step active" id="step-1">
                <div class="row">
                    <!-- col no 1 -->
                    <div class="col-xl-6 col-lg-6 col-12 mt-4" style="position: relative;">
                        <div class="row">
                            <div class="col-12 text-danger">
                                <h4>Auto Glass Replacement</h4>
                            </div>
                            <div class="col text-end ">
                                <img src="<?php echo NAGS_QUOTING_PLUGIN_URL . 'assets/images/24-Hours-Support-Logo.png'; ?>" height="250px" width="auto" class="time-img">
                            </div>
                        </div>

                        <!-- loader spinner div  -->
                        <div id="loaderSpinner" class="loaderSpinner nagsDisplayNone"></div>
                        <!-- loader spinner div ends  -->

                        <!-- quoting form starts here  -->
                        <form id="SafeRide_SubmissionForm">
                            <div class="row mt-4">
                                <div class="col">
                                    <input type="text" id="zip" name="zip" class="form-control w-100" placeholder="zip code *" required>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-6">
                                    <select class="form-select w-100" id="GetAllYear">
                                        <option>Year</option>
                                        <?php  
                                            // including nags API 
                                            require_once NAGS_QUOTING_PLUGIN_PATH . 'helpers/NagsApi/NagsApi.php';
                                            $NagsApi = new NagsApi; 
                                            $all_years_array = $NagsApi->GetYears();
                                            foreach($all_years_array as $single_year_key => $single_year_value){
                                                echo '<option value="'.$single_year_value.'">'.$single_year_value.'</option>';
                                            }
                                        ?>
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
                                    <select class="form-select w-100" id="GetAllModel"  disabled>
                                        <option>Model</option>
                                    </select>                           
                                </div>
                                <div class="col-6">
                                    <select class="form-select w-100" id="GetAllStyle" disabled>
                                        <option>Style</option>
                                    </select>                           
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col m-3" style="border: 1px solid lightgrey;">
                                    <div class="p-2">
                                        <label for="contact" class="fw-bold mb-2">Contact Phone/ Mobile number *</label><br>
                                        <input type="text" id="contact" name="contact" class="form-control w-100" placeholder="phone*">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col">
                                    <input type="email" id="email" name="email" class="form-control w-100" placeholder="E-mail *">
                                </div>
                            </div>
                            <div class="row mt-4 ts-insurance-prize">
                                <div class="col" style="height: 44px;width: 100%;border: 1px solid #ddd !important;display: flex;align-items: center;">
                                    <span>$</span>
                                    <input type="number" id="deductible" name="deductible" class="form-control w-100" placeholder="0">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6 mt-3">
                                    <input id="insurance" type="checkbox" class="form-check-input ts-insurance" name="">
                                    <label for="insurance" class="fw-bold">I want to use my insurance</label>
                                </div>
                                <div class="col-6">
                                    <button id="screen_1_submit_button" type="button" class="page-one-btn w-100">NEXT</button>
                                </div>
                            </div>                          
                        </form>
                        <!-- quoting form ends here  -->
                    </div>


                    <!-- col no 2 -->
                    <div class="col-xl-6 col-lg-6 col-12 mt-4">
                        <!-- <div class="row">
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
                        </div> -->
                    </div>
                </div>
        </div> 

        <!-- page number 2 -->
        <div class="container form-step ts-page2" id="step-2">
                <!-- part no 1 -->
                <div class="row flex-row-reverse page2-part1">
                    <!-- col no one -->
                    <div class="col-xl-6 col-lg-6 col-12 mt-4">
                        <!-- <div class="row">
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
                        </div> -->
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
                                <input type="checkbox" id="Wind" name="glasses[]" class="nags_glasses form-check-input me-2">
                                <label for="Wind">Windshield</label>
                            </div>
                            <div class="col-4 text-end">
                                <img src="<?php echo NAGS_QUOTING_PLUGIN_URL . 'assets/images/glasses/one.png'; ?>" class="ts-width-80">
                            </div>
                        </div>
                        <div class="row mt-4 ts-windshield">
                            <div class="col-8">
                                <input type="checkbox" id="Passenger" name="glasses[]" class="nags_glasses form-check-input me-2">
                                <label for="Passenger">Passenger Front - Door Glass</label>
                            </div>
                            <div class="col-4 text-end">
                                <img src="<?php echo NAGS_QUOTING_PLUGIN_URL . 'assets/images/glasses/two.png'; ?>" class="ts-width-80">
                            </div>
                        </div>
                        <div class="row mt-4 ts-windshield">
                            <div class="col-8">
                                <input type="checkbox" id="Driver" name="glasses[]" class="nags_glasses form-check-input me-2">
                                <label for="Driver">Driver Front - Door Glass</label>
                            </div>
                            <div class="col-4 text-end">
                                <img src="<?php echo NAGS_QUOTING_PLUGIN_URL . 'assets/images/glasses/three.png'; ?>" class="ts-width-80">
                            </div>
                        </div>
                        <div class="row mt-4 ts-windshield">
                            <div class="col-8">
                                <input type="checkbox" id="Passenger Back" name="glasses[]" class="nags_glasses form-check-input me-2">
                                <label for="Passenger Back">Passenger Back - Door Glass</label>
                            </div>
                            <div class="col-4 text-end">
                                <img src="<?php echo NAGS_QUOTING_PLUGIN_URL . 'assets/images/glasses/four.png'; ?>" class="ts-width-80">
                            </div>
                        </div>
                        <div class="row mt-4 ts-windshield">
                            <div class="col-8">
                                <input type="checkbox" id="Driver Back" name="glasses[]" class="nags_glasses form-check-input me-2">
                                <label for="Driver Back">Driver Back - Door Glass</label>
                            </div>
                            <div class="col-4 text-end">
                                <img src="<?php echo NAGS_QUOTING_PLUGIN_URL . 'assets/images/glasses/five.png'; ?>" class="ts-width-80">
                            </div>
                        </div>
                        <div class="row mt-4 ts-windshield">
                            <div class="col-8">
                                <input type="checkbox" id="Back" name="glasses[]" class="nags_glasses form-check-input me-2">
                                <label for="Back">Back Glass</label>
                            </div>
                            <div class="col-4 text-end">
                                <img src="<?php echo NAGS_QUOTING_PLUGIN_URL . 'assets/images/glasses/seven.png'; ?>" class="ts-width-80">
                            </div>
                        </div>
                        <div class="row mt-4 ts-windshield">
                            <div class="col-8">
                                <input type="checkbox" id="Driver1" name="glasses[]" class="nags_glasses form-check-input me-2">
                                <label for="Driver1">Driver Quarter</label>
                            </div>
                            <div class="col-4 text-end">
                                <img src="<?php echo NAGS_QUOTING_PLUGIN_URL . 'assets/images/glasses/seven.png'; ?>" class="ts-width-80">
                            </div>
                        </div>
                        <div class="row mt-4 ts-windshield">
                            <div class="col-8">
                                <input type="checkbox" id="Passenger1" name="glasses[]" class="nags_glasses form-check-input me-2">
                                <label for="Passenger1">Passenger Quarter</label>
                            </div>
                            <div class="col-4 text-end">
                                <img src="<?php echo NAGS_QUOTING_PLUGIN_URL . 'assets/images/glasses/six.png'; ?>" class="ts-width-80">
                            </div>
                        </div>
                        <div class="row mt-5 justify-content-center">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-6">
                                <button type="button" class="page-two-btn" onclick="prevStep()">BACK</button>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-6">
                                <button id="screen_2_a_submit_button" type="button" class="page-two-btn part1-btn-next">NEXT</button>
                            </div>
                        </div>                      
                    </div>                  
                </div>

                <!-- part no 2 -->
                <div class="row flex-row-reverse page2-part2">
                    <!-- col no 1 -->
                    <div class="col-xl-6 col-lg-6 col-12 mt-4">
                        <!-- <div class="row">
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
                        </div> -->
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
                                                <img src="<?php echo NAGS_QUOTING_PLUGIN_URL . 'assets/images/glasses/page2-glass1.png'; ?>">
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
                                                <img src="<?php echo NAGS_QUOTING_PLUGIN_URL . 'assets/images/glasses/page2-glass1.png'; ?>">
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
                                            <form id="form-example-1" method="POST" name="form-example-1" enctype="multipart/form-data">
                                                <div class="input-field">
                                                    <div id="input-images-1" class="input-images-1"></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>                  
                </div>
                <div class="row page2-part2">
                    <div class="col-xl-6 col-12" style="position:relative;">

                        <!-- loader spinner div  -->
                        <div id="loaderSpinner2" class="loaderSpinner nagsDisplayNone"></div>
                        <!-- loader spinner div ends  -->

                        <div class="row mt-5 justify-content-center">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-6">
                                <button id="screen_2_back_button" type="button" class="page-two-btn w-100 part2-btn-back">BACK</button>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-6">
                                <button id="screen_2_submit_button" type="button" class="page-two-btn w-100">NEXT</button>
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
                        <!-- <div class="row">
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
                        </div> -->
                    </div>
                    <!-- col no 2 -->
                    <div class="col-xl-6 col-lg-6 col-12 mt-4">
                        <div class="row">
                            <div class="col-12 ts-text-clr">
                                <p>Which one of options best describes the Front Windshield feature of your car?</p>
                            </div>
                        </div>
                        <div id="nags_quoting_div" class="row mt-4">

                        </div>
                        <div class="row mt-5 justify-content-center">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-6">
                                <button type="button" class="page-two-btn w-100" onclick="prevStep()">BACK</button>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-6">
                                <button id="screen_3_submit_button" type="button" class="page-two-btn w-100">NEXT</button>
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
                                        <td id="nags_product_name"></td>
                                        <td id="nags_product_price"></td>
                                      </tr>
                                    </tbody>
                                    <tfoot >
                                      <tr style="font-size: 1.2em;">
                                          <th>Order Total</th>
                                          <td id="nags_subtotal" class="fw-bold"></td>
                                      </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>  

</div> 
<!-- end of container fluid  -->



<?php get_footer(); ?>