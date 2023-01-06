var base_url = 'https://abp-podcast.keylines.in/';
$(function() {
    //$('#plan4').prop('checked', true);
    //$('#plan5').prop('disabled', true);    
});
$("#signUpForm").submit(function (e) {
	e.preventDefault();
    let flag = commonFormChecking(true, 'requiredCheckSignup');
    if (flag) {
		flag = checkPassword('regPassword', 'regCnfPassword');
		if (flag) {
        	var formData = new FormData(this);
			$.ajax({
				type: "POST",
				url: base_url + "signup",
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "JSON",
				beforeSend: function () {
					$("#signUpForm").loading();
				},
				success: function (res) {
					$("#signUpForm").loading("stop");					
					if(res.success){
						$('#signUpForm').trigger("reset");
						swalAlertThenRedirect(res.message, 'success', base_url + 'signin');
					}else{
						swalAlert(res.message, 'warning', 5000);						
					}
				},
			});
		}
    }
});
$("#signInForm").on('submit', function(e){
    e.preventDefault();
    let flag 		= commonFormChecking(true, 'requiredCheckSignIn');
    if (flag) {
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: base_url + "signin",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "JSON",
            beforeSend: function () {
                $("#signInForm").loading();
            },
            success: function (res) {
                $("#signInForm").loading("stop");
                if (res.success) {
					swalAlertThenRedirect(res.message, 'success', base_url + 'dashboard');
                } else {
					//$('#signInForm').trigger("reset");
					swalAlert(res.message, 'error', 5000);
                }
            },
        });
    }
});
$("#otp-form").on('submit', function(e){
    e.preventDefault();
    let flag 		= commonFormChecking(true, 'requiredCheckOTP');
    var base_url 	= 'https://assortedcuisines.keylines.in/';    
    if (flag) {
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: base_url + "validate-otp",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "JSON",
            beforeSend: function () {
                $("#otp-form").loading();
            },
            success: function (res) {
                $("#otp-form").loading("stop");
                if (res.success) {
					swalAlertThenRedirect(res.message, 'success', res.data.redirectUrl);
					//window.location = res.response.page_link;
                } else {
					swalAlert(res.message, 'error', 5000);
					$('#otp').val('');
                }
            },
        });
    }
});
$("#forgotPasswordForm").on('submit', function(e){
    e.preventDefault();
    let flag 		= commonFormChecking(true, 'requiredCheckfpPwd');
    if (flag) {
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: base_url + "forgot-password-post",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "JSON",
            beforeSend: function () {
                $("#forgotPasswordForm").loading();
            },
            success: function (res) {
                $("#forgotPasswordForm").loading("stop");
                if (res.success) {
                	$('#forgotPasswordForm').trigger("reset");
					swalAlertThenRedirect(res.message, 'success', base_url + 'signin');
                } else {
					//$('#forgotPasswordForm').trigger("reset");
					swalAlert(res.message, 'error', 5000);
                }
            },
        });
    }
});
$(document).on("click", ".userLogout", function (e) {
    Swal.fire({
        title: "Are you sure you want to logout?",
        type: "warning",
        showCancelButton: true, // true or false
        confirmButtonColor: "#dd6b55",
        cancelButtonColor: "#48cab2",
        confirmButtonText: "Yes !!!",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: base_url + "sign-out",
                success: function (res) {                	
                    //swalAlertThenRedirect(res.message, "success", base_url + 'signin');
                    //swalAlertThenRedirect(resultData, "success", base_url);
                    window.location = base_url + 'signin';
                },
            });
        }
    });
});
$("#updateProfileForm").submit(function (e) {
	e.preventDefault();
    let flag = commonFormChecking(true, 'requiredCheckProfile');
    if (flag) {
		//flag = checkPassword('regPassword', 'regCnfPassword');
		if (flag) {
        	var formData = new FormData(this);
			$.ajax({
				type: "POST",
				url: base_url + "profile",
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "JSON",
				beforeSend: function () {
					$("#updateProfileForm").loading();
				},
				success: function (res) {
					$("#updateProfileForm").loading("stop");
					if(res.success){						
						swalAlertThenRedirect(res.message, 'success', base_url + 'profile');
					}else{
						swalAlert(res.message, 'warning', 5000);						
					}
				},
			});
		}
    }
});
$("#changePasswordForm").submit(function (e) {
	e.preventDefault();
    let flag = commonFormChecking(true, 'requiredCheckPassword');
    if (flag) {
		flag = checkPassword('new_password', 'confirm_password');
		if (flag) {
        	var formData = new FormData(this);
			$.ajax({
				type: "POST",
				url: base_url + "change-password",
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "JSON",
				beforeSend: function () {
					$("#changePasswordForm").loading();
				},
				success: function (res) {
					$("#changePasswordForm").loading("stop");
					if(res.success){
						$('#changePasswordForm').trigger("reset");						
						swalAlertThenRedirect(res.message, 'success', base_url + 'change-password');
					}else{
						$('#changePasswordForm').trigger("reset");
						swalAlert(res.message, 'warning', 5000);						
					}
				},
			});
		}
    }
});


$(document).on("click", ".change-status", function (e) {
	let module		= this;
	dataJson.id 	= $(this).attr("id");
	dataJson.table 	= $(this).attr("data-table");
	dataJson.key 	= $(this).attr("data-key");
	$.ajax({
		type: "POST",
		url: base_url + 'api/change/status',
		data: JSON.stringify(dataJson),
		success: function (resultData) {
			$(module).html(resultData);
			swalAlert("Status Changed Successfully !!!", "success");
		},
	});
});
$("#subscribeForm").submit(function (e) {
    e.preventDefault();    
    var formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: base_url + "/submit-subscribe",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "JSON",
        beforeSend: function () {
            
        },
        success: function (res) {                    
            if(res.status){
                swalAlert(res.message, 'success', 5000);
                $('#subscribeForm').trigger("reset");
            } else {
                swalAlert(res.message, 'error', 5000);
                $('#subscribeForm').trigger("reset");
            }
        },
    });
});
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
function setPlan(param){	
	if(param == 4){
		$('#plan1').prop('checked', false);
		$('#plan2').prop('checked', false);
		$('#plan3').prop('checked', false);
		$('#plan4').prop('checked', true);
		if($("#plan4").prop('checked') == true){
		    $('#plan5').prop('disabled', true);
		} else {
			$('#plan5').prop('disabled', false);
		}
		
	} else {
		if(($("#plan1").prop('checked') == true) && ($("#plan2").prop('checked') == true) && ($("#plan3").prop('checked') == true)){
			
			$('#plan1').prop('checked', false);
			$('#plan2').prop('checked', false);
			$('#plan3').prop('checked', false);
			$('#plan4').prop('checked', true);
			$('#plan5').prop('checked', false);
			$('#plan5').prop('disabled', true);
		} else {
			$('#plan4').prop('checked', false);
		}
		if($("#plan3").prop('checked') == true){
		    $('#plan5').prop('disabled', true);
		} else {
			$('#plan5').prop('disabled', false);
		}		
	}	
}
function setCookie(){
	$.ajax({
        type: "POST",
        url: base_url + "/set-cookie",
        data: {},
        dataType: "JSON",
        beforeSend: function () {
            //$(".cookie-setting").loading();
        },
        success: function (res) {                    
            if(res.success){
                swalAlert(res.message, 'success', 5000);
                $('#cookie-container').hide();
            } else {
                swalAlert(res.message, 'error', 5000);
            }
        },
    });
}