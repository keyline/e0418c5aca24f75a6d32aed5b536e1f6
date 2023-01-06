<div class="login_page_ful">
<div class="container">
    <div class="row login_middle">
            <div class="col-md-6 col-xs-12">
                <div class="login_listdays">
                    <ul>
                        <?php if($plans){ foreach($plans as $plan){?>
                        <li><i class="fa fa-check" aria-hidden="true"></i> <?=$plan->package_name?> (INR <?=$plan->package_price?>)</li>
                        <?php } }?>
                        <!-- <li><i class="fa fa-check" aria-hidden="true"></i> DAY 1 (INR 8000.00)</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> DAY 2 (INR 8000.00)</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> DAY 3 (INR 8000.00)</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> ALL THREE DAYS (INR 18000.00)</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Hackstars (INR 2000.00)</li> -->
                    </ul>
                    <!-- <p style="color: red; font-size: 16px;">* Day 3 & All day delegate package includes INFOCOM Hackstars registration</p> -->
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="rightsection_form loginfrom_center">
                    <h2 class="greenheading"><?=$page_header?></h2>
                    <div class="form_section">
                        <form id="signInForm">
                            <div class="form-group">
                                <label for="emailAddress">Email Id <span class="red">*</span></label>
                                <input type="email" class="form-control requiredCheckSignIn" name="emailAddress" id="emailAddress" data-check="Email" placeholder="Enter email address" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="regPassword">Password<span class="red">*</span></label>
                                <div class="input-group" id="show_hide_password">
                                    <input type="password" class="form-control requiredCheckSignIn" placeholder="Enter Password" name="password" id="regPassword" data-check="Password" autocomplete="off">
                                    <div class="input-group-addon">
                                      <a href="javascript:void(0);"><i class="fa fa-eye toggle-password"></i></a>
                                    </div>
                                    <!-- <span class="eyeicon fa fa-eye-slash toggle-password">
                                    </span> -->
                                  </div>
                            </div>
                            <div class="checkbox_forgot">
                                <div class="form-group form-check">
                                    <!-- <input type="checkbox" class="form-check-input greencheck" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember me</label> -->
                                </div>
                                <div class="form-group">
                                    <a href="<?=base_url('forgot-password')?>" class="forgot_link">Forgot Password</a>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary green">Login</button>
                        </form>
                    </div>

                    <div class="alreadymember bottomshow">
                        <div class="alreadymemberlink">Not yet registered? <a href="<?=base_url('signup')?>">Create an account</a></div>
                    </div>
                </div>
            </div>
    </div>
</div>
</div>