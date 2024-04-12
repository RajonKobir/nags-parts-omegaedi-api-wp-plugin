// (function($){

        // // localize data 
        // const nags_post_url =  "<?php echo NAGS_QUOTING_PLUGIN_URL . 'post.php'; ?>";
        // const use_google_api_key = "<?php echo get_option(NAGS_QUOTING_PLUGIN_NAME . '_use_google_api_key'); ?>";

        // localize data 
        const nags_post_url =  nags_quoting_plugin_data.nags_post_url;
        const use_google_api_key = nags_quoting_plugin_data.use_google_api_key;

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


        // multi step form 
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

        function goToStep(stepNumber) {
            $(`#step-${currentStep}`).removeClass('active');
            $(`#progress-bar span:nth-child(${currentStep})`).removeClass('active');
            currentStep = stepNumber;
            $(`#step-${currentStep}`).addClass('active');
            $(`#progress-bar span:nth-child(${currentStep})`).addClass('active');
            updateProgressBarColor();
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




        // first screen Nags API starts here 

            $("#screen_1_submit_button").click(function(){
                getGlasses();
            });

            $("#screen_2_a_submit_button").click(function(){
                getBrokenDescription();
            });

            $("#screen_2_submit_button").click(function(){
                getQuotes();
            });

            $("#screen_3_submit_button").click(function(){
                getCheckout();
            });

            var initial_year = $('#GetAllYear').val();

            if( initial_year != ''){
                grabTheMakes();
            }
            
            $("#GetAllYear").change(function() {
                grabTheMakes();
            });


            $("#GetAllMake").change(function() {
                grabTheModels();
            });


            $("#GetAllModel").change(function() {
                grabTheStyles();
            });


            function grabTheMakes(){
                var MakeRequestData = $('#GetAllYear').val();
                if(MakeRequestData == 'Year'){
                    return;
                }
                $('#screen_1_submit_button').prop('disabled', true);
                $('#GetAllYear').prop('disabled', true);
                $('#GetAllMake').prop('disabled', true);
                $('#GetAllModel').prop('disabled', true);
                $('#GetAllStyle').prop('disabled', true);
                $(".loaderSpinner").removeClass("nagsDisplayNone");
                $.ajax({
                    url: nags_post_url,
                    method: 'POST',
                    data: {MakeRequestData},
                    success: function(result) {
                        var makeSelect = $("#GetAllMake");
                        makeSelect.empty();
                        var responseData = JSON.parse(result);
                        $.each(responseData, function(index, make) {
                                makeSelect.append('<option value="' + make.make_id + '">' + make.make_name + '</option>');
                        });
                        grabTheModels();
                    }
                });
            }

            function grabTheModels(){
                var GetAllMakeVal = $('#GetAllMake').val();
                var GetAllYearVal = $('#GetAllYear').val();
                if(GetAllMakeVal == 'Make' || GetAllYearVal == 'Year'){
                    return;
                }
                $('#screen_1_submit_button').prop('disabled', true);
                $('#GetAllYear').prop('disabled', true);
                $('#GetAllMake').prop('disabled', true);
                $('#GetAllModel').prop('disabled', true);
                $('#GetAllStyle').prop('disabled', true);
                $(".loaderSpinner").removeClass("nagsDisplayNone");
                $.ajax({
                    url: nags_post_url,
                    method: 'POST',
                    data: {GetAllMakeVal, GetAllYearVal},
                    success: function(result) {
                        var makeSelect = $("#GetAllModel");
                        makeSelect.empty();
                        var responseData = JSON.parse(result);
                        $.each(responseData, function(index, make) {
                                makeSelect.append('<option value="' + make.model_id + '" data-modified-id="'+make.modifier_id+'" data-modifier-dsc="'+make.modifier_dsc+'">' + make.model_name + '</option>');
                        });
                        grabTheStyles();

                    }
                });
            }

            function grabTheStyles(){
                var GetAllModelVal = $('#GetAllModel').val();
                // var GetModifiedID = $('#GetAllModel').attr('data-modified-id');
                var GetAllMakeVal = $('#GetAllMake').val();
                var GetAllYearVal = $('#GetAllYear').val();
                if(GetAllModelVal == 'Model' || GetAllMakeVal == 'Make' || GetAllYearVal == 'Year'){
                    return;
                }
                $('#screen_1_submit_button').prop('disabled', true);
                $('#GetAllYear').prop('disabled', true);
                $('#GetAllMake').prop('disabled', true);
                $('#GetAllModel').prop('disabled', true);
                $('#GetAllStyle').prop('disabled', true);
                $(".loaderSpinner").removeClass("nagsDisplayNone");
                $.ajax({
                    url: nags_post_url,
                    method: 'POST',
                    data: {GetAllModelVal, GetAllMakeVal, GetAllYearVal},
                    success: function(result) {
                        var makeSelect = $("#GetAllStyle");
                        makeSelect.empty();
                        var responseData = JSON.parse(result);
                        if( responseData.length == 0){
                            $(".loaderSpinner").addClass("nagsDisplayNone");
                            $('#GetAllYear').prop('disabled', false);
                            $('#GetAllMake').prop('disabled', false);
                            $('#GetAllModel').prop('disabled', false);
                            $('#GetAllStyle').prop('disabled', false);
                            $('#screen_1_submit_button').prop('disabled', false);
                            return Swal.fire({
                                title: 'Error!',
                                text: 'No Style Found For This Query',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            });
                        }
                        $.each(responseData, function(index, body_style) {
                            makeSelect.append('<option value="' + body_style.body_style_id + '" data-vehicle_id="'+body_style.vehicle_id+'">' + body_style.body_style_dsc + '</option>');
                        });
                        $(".loaderSpinner").addClass("nagsDisplayNone");
                        $('#GetAllYear').prop('disabled', false);
                        $('#GetAllMake').prop('disabled', false);
                        $('#GetAllModel').prop('disabled', false);
                        $('#GetAllStyle').prop('disabled', false);
                        $('#screen_1_submit_button').prop('disabled', false);
                    }
                });
            }

        // first screen Nags API ends here 





        $('#contact').on('keydown', function(e) {
            var key = e.keyCode || e.which;
            if (key === 8) { // Backspace key
                var inputValue = $(this).val();
                var formattedValue = formatMobileNumber(inputValue, true);
                $(this).val(formattedValue);
            }
        });

        $('#contact').on('input', function() {
            var inputValue = $(this).val();
            var formattedValue = formatMobileNumber(inputValue, false);
            $(this).val(formattedValue);
        });


        function formatMobileNumber(inputValue, isBackspace) {
            var formattedValue = inputValue.replace(/\D/g, '');
            formattedValue = formattedValue.slice(0, 10);

            if (formattedValue.length > 3) {
                formattedValue = '(' + formattedValue.slice(0, 3) + ')' + formattedValue.slice(3);
            }
            if (formattedValue.length > 8) {
                formattedValue = formattedValue.slice(0, 8) + '-' + formattedValue.slice(8);
            }

            if (isBackspace && inputValue.length > formattedValue.length) {
                formattedValue = formattedValue.slice(0, -1);
            }

            return formattedValue;
        }



        async function getCityState(zipcode = null) {

            var returnResult = '';
            try { 
                await $.ajax({
                    url: nags_post_url,
                    method: "POST",
                    data: {zipcode},
                    success: function(data) {
                        data = JSON.parse(data);
                        if (typeof data.results[0] !== 'undefined') {
                            var city = '';
                            var state = '';
                            for (var i = 0; i < data.results[0].address_components.length; i++) {
                                var addressType = data.results[0].address_components[i].types[0];
                                if (addressType == 'locality' || addressType == 'neighborhood') {
                                    city = data.results[0].address_components[i].long_name;
                                }
                                if (addressType == 'administrative_area_level_1') {
                                    state = data.results[0].address_components[i].short_name;
                                }
                            }
                            // console.log(city);
                            // console.log(state);
                            returnResult = {city, state};
                        } else {
                            returnResult = 'City not found for this zipcode.';
                        }
                    },
                    error: function() {
                        returnResult = 'Error fetching zipcode data.';
                    }
                }); 
            }catch(err) {
                returnResult = err.message;
            }finally{
                return returnResult;
            }

        }
        // function getCityState ends here 



        async function getGlasses() {

            // show loader
            $(".loaderSpinner").removeClass("nagsDisplayNone");

            var insurance = $("#insurance").val();
            var deductible = $("#deductible").val();
            var email = $("#email").val();
            var phone = $("#contact").val();
            var zip_code = $("#zip").val();
            var year = $("#GetAllYear").val();
            var make = $("#GetAllMake").val();
            var model = $("#GetAllModel").val();
            var style = $("#GetAllStyle").val();
            var vehicle_id = $("#GetAllStyle :selected").data('vehicle_id');

            if( use_google_api_key == 'yes' && zip_code != '' ){
                var City_And_State = await getCityState(zip_code);
                if ( typeof City_And_State.city === 'undefined' || typeof City_And_State.state === 'undefined' ){
                    return Swal.fire({
                    title: "Error!",
                    text: City_And_State,
                    icon: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                });
                }
            }


            if( email == '' || phone == '' || zip_code == '' || year == '' || make == '' || model == '' || style == '' || vehicle_id == '' ){
                return Swal.fire({
                    title: "Error!",
                    text: "Please Fill Out All The Fields Carefully!",
                    icon: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                });
            }

            $.ajax({
                url: nags_post_url,
                type: "POST",
                data: {vehicle_id },
                success: function(response) {
                    // if response is not empty
                    response = JSON.parse(response);
                    if (response.glass.length > 0) {
                        $('.nags_glasses').attr('data-vehicle_id', vehicle_id);
                        $('.nags_glasses').attr('data-has_calibration', 1);
                        $('.nags_glasses').attr('data-has_feature', 1);
                        nextStep();

                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: "No data found against the selected model, body style and year",
                            icon: "error",
                            showCancelButton: false,
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK",
                        });
                    }

                },
                error: function(response) {
                    Swal.fire({
                        title: "Error!",
                        text: JSON.parse(response.responseText).message,
                        icon: "error",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK",
                    });
                },
            });

            // hide loader
            $(".loaderSpinner").addClass("nagsDisplayNone");

        }


        async function getBrokenDescription() {
            let selected_glass = $('input[name="glasses[]"]:checked');
            if(!selected_glass){
                return Swal.fire({
                    title: "Error!",
                    text: "Select at least one item!",
                    icon: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                });
            }
            nextStep();
        }


        async function getQuotes() {
            let returnResult = '';
            let get_quotes_vehicle_id = $(".nags_glasses").eq(0).data('vehicle_id');
            $('#screen_2_submit_button').prop('disabled', true);
            $('#screen_2_back_button').prop('disabled', true);
            $(".loaderSpinner").removeClass("nagsDisplayNone");
            try { 
                await $.ajax({
                    url: nags_post_url,
                    method: "POST",
                    data: {get_quotes_vehicle_id},
                    success: function(data) {
                        data = JSON.parse(data);
                        // console.log(data);
                        let divList = '';
                        let feature_name = '';
                        let Configurations = '';
                        let iteration = 1;
                        $.each(data, function(data_key, data_value) {
                            $.each(data_value, function(data_value_key, data_value_value) {
                                Configurations = data_value_value.Configurations;
                                $.each(Configurations, function(Configuration_key, Configuration_value) {
                                    feature_name = data_value_value.description + Configuration_value.glass_color_dsc;
                                    divList += '<div class="col-12 mt-4 page3-radio"><input type="radio" id="nags_quote_'+iteration+'" class="form-check-input" name="nags_quotes" data-price="'+Configuration_value.prc+'" data-feature_name="'+feature_name+'"><label for="nags_quote_'+iteration+'" class="fw-bold ms-2">'+feature_name+'</label></div>';
                                    iteration++;
                                });
                            });
                        });
                        // console.log(divList);
                        $("#nags_quoting_div").empty();
                        $("#nags_quoting_div").append(divList);
                    },
                    error: function() {
                        returnResult = 'Error fetching zipcode data.';
                    }
                }); 
            }catch(err) {
                returnResult = err.message;
            }finally{
                $(".loaderSpinner").addClass("nagsDisplayNone");
                $('#screen_2_back_button').prop('disabled', false);
                $('#screen_2_submit_button').prop('disabled', false);
                nextStep();
            }
        }


        async function getCheckout() {
            var nags_product_name = $('input[name=nags_quotes]:checked').data('feature_name');
            var nags_price = $('input[name=nags_quotes]:checked').data('price');
            if(!nags_price ){
                return Swal.fire({
                    title: "Error!",
                    text: "Please select an item!",
                    icon: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                });
            }
            $('#nags_product_name').html(nags_product_name);
            $('#nags_product_price').html(nags_price);
            $('#nags_subtotal').html(nags_price);
            nextStep();
        }


        $('#input-images-1').imageUploader({
            label: "Not sure of your damage? Send us photos to review.",
            maxSize: 10 * 1024 * 1024,
            maxFiles: 10,
        });


    });
// })(jQuery);