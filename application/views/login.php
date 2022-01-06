<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <title>Booking DashBoard</title>
  <link rel="icon" href="<?php echo base_url();?>assets/logo.png" type ="image/x-icon">
  <!-- Fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>links/FontAwesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Toastr -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
</head>

<body>
<?php if($this->session->flashdata('msg') == 1):?>
    <script>toastr.success('<?php echo $this->session->flashdata('alert_data')?>');</script>
    <?php elseif($this->session->flashdata('msg') == 2):?>
      <script>toastr.error('<?php echo $this->session->flashdata('alert_data')?>');</script>
  <?php endif;?>
  
<section class="login-page">
	<div class="row">
		<div class="col-lg-7 col-md-6 px-0 column-left">
			<span class="orange-shade"></span>
			<div class="login-left-inner-part">
			<div class="login-left">
					<div class="login-left-inner-text">
						<h3>Best Booking System</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
						<a href="<?php echo base_url();?>">
							<button>Get Started <i class="fas fa-long-arrow-alt-right ml-3"></i></button>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-5 col-md-6 px-0 my-auto column-right">
			<div class="row">
			<form method="post" action="<?php echo base_url()."index.php/login/verify_user";?>" >	
			<div class="centeringcontent-login">
					<div class="login-right">
						<h3>Welcome Back to <br> <span>Ticket Booking!</span> Login to Get Started</h3>
					</div>
					<div class="input-1">
							<label>Enter your Email</label><br>
							<input type="email" placeholder="youremail@gmail.com" name="email" autocomplete="off" required>
						</div>
						<div class="input-1">
							<label>Enter Your Password</label><br>
							<input type="password" placeholder="Password" name="password" required>
						</div>
    			<div class="btn-login">
    				<button class="btn-all"> Login </button>
    			</div>
				</div>
				</form>	
			</div>
		</div>
	</div>
</section>

<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>script/script.js"></script>
</body>

</html>