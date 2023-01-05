<?php
$site_setting = $common_model->find_data('sms_site_settings','row');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $site_setting->site_name; ?></title>	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<!-- <meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Codedthemes" /> -->
	<!-- Favicon icon -->
	<link rel="icon" href="<?php echo base_url(); ?>/uploads/<?php echo $site_setting->site_favicon; ?>" type="image/x-icon">
	<!-- vendor css -->
	<link rel="stylesheet" href="<?php echo base_url('material/'); ?>/assets/css/style.css">
</head>
<div class="auth-wrapper" style="background:#FFF">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
						<?php if($session->getFlashdata('error_message')) { ?>
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
				            	<strong>Error!</strong> <?php echo $session->getFlashdata('error_message');?>
				            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				          	</div>
						<?php } ?>
						<?php if($session->getFlashdata('success_message')) { ?>
							<div class="alert alert-success alert-dismissible fade show" role="alert">
				            	<strong>Success!</strong> <?php echo $session->getFlashdata('success_message');?>
				            	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				          	</div>
						<?php } ?>
						<form method="post" action="<?php echo base_url('admin/user/login'); ?>">
							<img src="<?php echo base_url(); ?>/uploads/<?php echo $site_setting->site_logo; ?>" alt="" class="img-fluid mb-4">
							<h4 class="mb-3 f-w-400">Signin</h4>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="feather icon-mail"></i></span>
								</div>
								<input type="text" class="form-control" name="username" placeholder="Username">
							</div>
							<div class="input-group mb-4">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="feather icon-lock"></i></span>
								</div>
								<input type="password" class="form-control" name="password" placeholder="Password">
							</div>
							<!-- <div class="form-group text-left mt-2">
								<div class="checkbox checkbox-primary d-inline">
									<input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
									<label for="checkbox-fill-a1" class="cr"> Save credentials</label>
								</div>
							</div> -->
							<button type="submit" class="btn btn-block btn-primary mb-4">Signin</button>
							<p class="mb-2 text-muted">Forgot password? <a href="<?=base_url('reset-password')?>" class="f-w-400">Reset</a></p>
							<!-- <p class="mb-0 text-muted">Don’t have an account? <a href="auth-signup.html" class="f-w-400">Signup</a></p> -->
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Required Js -->
<?php
$this->session = \Config\Services::session();
$this->session->setFlashdata('success_message', '');
$this->session->setFlashdata('error_message', '');
?>
<script src="<?php echo base_url('material/'); ?>/assets/js/vendor-all.min.js"></script>
<script src="<?php echo base_url('material/'); ?>/assets/js/plugins/bootstrap.min.js"></script>
<script src="<?php echo base_url('material/'); ?>/assets/js/waves.min.js"></script>
</body>
</html>