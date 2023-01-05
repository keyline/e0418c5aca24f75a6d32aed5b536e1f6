<div class="rightdash_img">
    <div class="rightsection_form loginfrom_center">
        <h2 class="greenheading"><?=$page_header?></h2>
        <div class="form_section">
            <form id="forgotPasswordForm">
                <div class="form-group">
                    <label for="emailAddress">Email Id <span class="red">*</span></label>
                    <input type="email" class="form-control requiredCheckfpPwd" name="emailAddress" id="emailAddress" data-check="Email" placeholder="Enter email address" autocomplete="off">
                </div>                
                <button type="submit" class="btn btn-primary green">Retrieve Password</button>
            </form>
        </div>
        <div class="alreadymember bottomshow">
            <div class="alreadymemberlink">Already registered? <a href="<?=base_url('signin')?>">Log In</a></div>
        </div>
    </div>
</div>