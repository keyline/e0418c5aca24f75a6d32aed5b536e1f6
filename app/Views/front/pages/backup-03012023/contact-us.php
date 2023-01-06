<div class="rightdash_img">
    <div class="rightsection_form loginfrom_center">
        <h2 class="greenheading"><?=$page_header?></h2>        
    </div>
</div>
<div class="container py-4" style="margin-bottom: 15px;">    
    <div class="comn_text">
    	<div class="row">
    		<div class="col-md-6">
    			<h3>Contact Details</h3>
    			<h4><a href="tel:<?=$site_setting->site_phone?>"> <i class="fa fa-mobile" aria-hidden="true"></i> <?=$site_setting->site_phone?></a></h4>
    			<h4><a href="mailto:<?=$site_setting->admin_email?>"> <i class="fa fa-envelope" aria-hidden="true"></i> <?=$site_setting->admin_email?></a></h4>
    		</div>
    		<div class="col-md-6">
    			<div class="form_section">
    				<?php if($session->getFlashdata('success_message')) { ?>
	    				<h4 class="alert alert-success"><?=$session->getFlashdata('success_message')?></h4>
	    			<?php }?>
	    			<?php if($session->getFlashdata('error_message')) { ?>
	    				<h4 class="alert alert-danger"><?=$session->getFlashdata('error_message')?></h4>
	    			<?php }?>
		            <form id="contact-form" class="my-contactForm" method="post" action="">
		            	<div class="form-group">
		                    <label for="name">Name <span class="red" style="color:red; font-weight: bold;">*</span></label>
		                    <input type="text" class="form-control requiredCheckContact" name="name" id="name" data-check="Name" placeholder="Enter Name" autocomplete="off" required>
		                </div>
		                <div class="form-group">
		                    <label for="emailAddress">Email Id <span class="red" style="color:red; font-weight: bold;">*</span></label>
		                    <input type="email" class="form-control requiredCheckContact" name="email" id="emailAddress" data-check="Email" placeholder="Enter email address" autocomplete="off" required>
		                </div>
		                <div class="form-group">
		                    <label for="mobile">Mobile No. <span class="red" style="color:red; font-weight: bold;">*</span></label>
		                    <input type="tel" class="form-control requiredCheckContact" name="mobile" id="mobile" data-check="Mobile Number" placeholder="Enter Mobile no." maxlength="10" minlength="10" onkeypress="return isNumber(event)" autocomplete="off" required>
		                </div>
		                <div class="form-group">
		                    <label for="description">Description <span class="red" style="color:red; font-weight: bold;">*</span></label>
		                    <textarea class="form-control requiredCheckContact" name="description" id="description" data-check="Description" placeholder="Enter Description" autocomplete="off" required></textarea>
		                </div>
		                <div class="form-group mb-0 cal-group">
                            <label>Captcha</label>
                        </div>
		                <button type="submit" class="btn btn-primary green" style="margin-top:10px;">Submit</button>
		            </form>
		        </div>
    		</div>
    	</div>    	
    </div>  
    <div class="clear"></div>
</div>



