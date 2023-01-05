<div class="rightdash_img">
	<div class="rightsection_form">
        <h2 class="greenheading">Registration</h2>
        <div class="form_section">
            <span class="red" style="color:red; font-weight: bold;">Star (*) marks fields are mandatory</span>
            <form id="signUpForm" class="my-contactForm">
                <div class="form-group">
                    <label for="name">First Name <span class="red" style="color:red; font-weight: bold;">*</span></label>
                    <input type="text" class="form-control requiredCheckSignup" name="name" id="name" data-check="First Name" placeholder="Enter First Name" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="lname">Last Name <span class="red" style="color:red; font-weight: bold;">*</span></label>
                    <input type="text" class="form-control requiredCheckSignup" name="lname" id="lname" data-check="Last Name" placeholder="Enter Last Name" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="company_name">Company Name <span class="red" style="color:red; font-weight: bold;">*</span></label>
                    <input type="text" class="form-control requiredCheckSignup" name="company_name" id="company_name" data-check="Company Name" placeholder="Enter Company name" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="designation">Designation <span class="red" style="color:red; font-weight: bold;">*</span></label>
                    <input type="text" class="form-control requiredCheckSignup" name="designation" id="designation" data-check="Designation" placeholder="Enter Designation" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="emailAddress">Email Id <span class="red" style="color:red; font-weight: bold;">*</span></label>
                    <input type="email" class="form-control requiredCheckSignup" name="emailAddress" id="emailAddress" data-check="Email" placeholder="Enter email address" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile No. <span class="red" style="color:red; font-weight: bold;">*</span></label>
                    <input type="tel" class="form-control requiredCheckSignup" name="mobile" id="mobile" data-check="Mobile Number" placeholder="Enter Mobile no." maxlength="10" minlength="10" onkeypress="return isNumber(event)" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="">Office No. </label>
                    <input type="tel" class="form-control" name="office_no" data-check="Office Number" placeholder="Enter Office no." maxlength="10" minlength="10" onkeypress="return isNumber(event)" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="regPassword">Create Password <span class="red" style="color:red; font-weight: bold;">*</span></label>
                    <div class="input-group" id="show_hide_password">
                        <input type="password" class="form-control requiredCheckSignup" name="password" id="regPassword" data-check="Password" autocomplete="off">
                        <div class="input-group-addon">
                          <a href="javascript:void(0);"><i class="fa fa-eye toggle-password"></i></a>
                        </div>
                      </div>
                </div>
                <div class="form-group">
                    <label for="regCnfPassword">Confirm Password <span class="red" style="color:red; font-weight: bold;">*</span></label>
                    <div class="input-group" id="show_hide_password">
                        <input type="password" class="form-control requiredCheckSignup" name="confirm_password" id="regCnfPassword" data-check="Confirm Password" autocomplete="off">
                        <div class="input-group-addon">
                          <a href="javascript:void(0);"><i class="fa fa-eye toggle-password2"></i></a>
                        </div>
                      </div>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input greencheck requiredCheckSignup" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">By registration, you agree to Indiainfocom <a href="<?=base_url('page/disclaimer')?>" target="_blank">Terms &amp; Conditions</a></label>
                </div>
                <div class="form-group mb-0 cal-group">
                    <label>Captcha</label>
                </div>
                <button type="submit" class="btn btn-primary green" style="margin-top: 10px;">Register</button>
            </form>
        </div>
        <div class="alreadymember">
            <div class="alreadymemberlink">Already a member? <a href="<?=base_url('signin')?>">Login</a></div>
        </div>
    </div>
</div>