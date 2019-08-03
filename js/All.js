//Global variables
var outer_height;
var diagnosis_percent;
var diagnosis;
var path;
var formData;
var predictionDetails;


$(document).ready(function(){

	$("#close").on('click', function(){
		$(this).parent().addClass("d-none");
	})

			// Sidebar interactivity
			 $('#sidebarCollapse').click(function (e) {
			 	e.preventDefault();
			 	if($('#sidebar').hasClass('active')){
			 		$('#sidebar').removeClass('active');
			 		$('#content').css('margin-left','230px');
			 		$('#content').css('width','calc(100% - 230px)');
			 	}else{
			 		$('#sidebar').addClass('active');
        			$('#content').css('margin-left','0px');
        			$('#content').css('width','100%');
			 	}
			});

			 $("#usermenu-1").click(function(){
			 	$("#usersubmenu-1").slideToggle('fast');
			 	// $("#angle").css("transform","rotate(180deg)")
			 });

			 $("#usermenu-2").click(function(){
			 	$("#usersubmenu-2").slideToggle('fast');
			 }); 

			 $(".hover-shadow").hover(function() {
				$(this).addClass("shadow");
				}, function() {
				$(this).removeClass("shadow");
	});

	//  Highlight sidebar link when active
	path = window.location.href.toLowerCase();

	if(path == "http://localhost/myheart/homepage.php".toLowerCase()){
		$("#home").addClass('current');
	}
	else if(path == "http://localhost/myheart/patients.php".toLowerCase()){
		// $("#usersubmenu-1").slideToggle('fast');
		$("#patients").addClass('current');
	}
	else if(path == "http://localhost/myheart/users.php".toLowerCase()){
		$("#usersubmenu-1").slideToggle('fast');
		$("#usermgmt-2").addClass('current');
	}
	else if(path == "http://localhost/myheart/userhealth.php".toLowerCase()){
		$("#usersubmenu-2").slideToggle('fast');
		$("#userhealth-1").addClass('current');
	}
	else if(path == "http://localhost/myheart/prediction.php".toLowerCase() || path.substring(0, path.length - 10) == "http://localhost/myheart/prediction.php".toLowerCase()){
		$("#predict").addClass('current');
	}

	if(path.length > 39){
		$('#patient-indicator').removeClass('d-none');
	}else{
		$('#patient-indicator').addClass('d-none');
	}


	// Submit prediction attributes and get prediction results
	$('#prediction_form').on('submit', function(e){
			e.preventDefault();
			var date = new Date();
			var dob = new Date($('#dob').val());
			var age = date.getFullYear() - dob.getFullYear();
			var sex = $('#sex').val();
			var chest_pain = $('#chest_pain').val();
			var blood_pressure = $('#blood_pressure').val();
			var cholesterol = $('#cholesterol').val();
			var fbs = $('#fbs').val();
			var resting_ECG = $('#resting_ECG').val();
			var heart_rate = $('#heart_rate').val();
			var induced_angina = $('#induced_angina').val();
			var st_depression = $('#st_depression').val();
			var slope = $('#slope').val();
			var no_of_vessels = $('#no_of_vessels').val();
			var thal = $('#thal').val();

			var form_attributes ={
				"age":age.toString(),
				"sex":sex,
				"chest_pain":chest_pain,
				"blood_pressure":blood_pressure,
				"serum_cholestoral":cholesterol,
				"fasting_blood_sugar":fbs,
				"resting_ECG":resting_ECG,
				"max_heart_rate":heart_rate,
				"induced_angina":induced_angina,
				"ST_depression":st_depression,
				"slope":slope,
				"no_of_vessels":no_of_vessels,
				"thal":thal
			}

			$('html,body').animate({ scrollTop: 120 }, 'fast');
			$('#spin').addClass('spinner-border');
			$('#result').html('Calculating...');
			//outer_height = $("#progressbar-outer").height();
			
			formData = JSON.stringify(form_attributes);
			console.log(formData);
			
			// Make a request to api to make prediction using values provided
			$.ajax({
				url: 'http://localhost/myHeart/api/public/predict',
				type: 'post',
				data: formData,
				headers: {
					"Content-Type": 'application/json'
				},
				dataType: 'json',
				success: function(data){
					console.log(data);
					outer_height = $("#progressbar-outer").height();
					diagnosis_percent = Math.round(data['data']['Probability'] * 100);
					diagnosis = data['data']['Diagnosis'];
					bgcolor = percentToRGB(diagnosis_percent);

					animateProgressBar(outer_height,diagnosis_percent);
					$('#response-details').removeClass('d-none');
					$('#spin').removeClass('spinner-border');
					$('#result').html("Heart disease risk level is " + diagnosis_percent + "%");
					// $('#response-font').html("A heart disease risk level of " + diagnosis_percent + "% means that the patient has a " + diagnosis_percent + "% likelihood of getting a heart disease. Risk levels lower than 50% mean low likelihood. Risk levels greater than 50% mean high likelihood.");
					// $('#response-details').css("background-color", bgcolor +" !important");
					// $('#response-details').removeClass('d-none');

				}
			});
		});


		// Animate progress bar for prediction
		function animateProgressBar(height,percent){
			$("#progressbar-inner").animate({
				marginTop : (height - (height * percent) / 100),
				height : (height * percent) / 100
				}, 1000);

			$({counter : 0}).animate({counter : percent},{
				duration : 1000,
				step : function(){
					color = percentToRGB(Math.round(percent));
					$("#progressbar-inner").text(Math.round(this.counter) + '%');
					$("#progressbar-inner").css("background-color", color);
				}
			});
		}

		// Convert percentage value to RGB color
		function percentToRGB(percent) {
            var r, g, b;

            if (percent < 50) {
                // green to yellow
                r = Math.floor(255 * (percent / 50));
                g = 255;

            } else {
                // yellow to red
                r = 255;
                g = Math.floor(255 * ((50 - percent % 50) / 50));
            }
            b = 0;

            return "rgb(" + r + "," + g + "," + b + ")";
        }

});


