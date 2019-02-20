$(document).ready(function(){
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
			 });

			 $("#usermenu-2").click(function(){
			 	$("#usersubmenu-2").slideToggle('fast');
			 }); 

			 $(".hover-shadow").hover(function() {
				$(this).addClass("shadow");
				}, function() {
					$(this).removeClass("shadow");
	});

	var path = window.location.pathname;

	if(path == "/myheart/homepage.php"){
		$("#dashboard").addClass('current');
	}else if(path == "/myheart/users.php"){
		$("#usermgmt-1").addClass('current');
		$("#usersubmenu-1").slideToggle('fast');
	}else if(path == "/myheart/userhealth.php"){
		$("#health").addClass('current');
		$("#usersubmenu-2").slideToggle('fast');
	}
});

