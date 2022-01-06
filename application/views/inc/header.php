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
  <link rel="stylesheet" href="<?php echo base_url();?>links/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Toastr -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
  
  <!--Data Table-->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

</head>

<body>
<?php if($this->session->flashdata('msg') == 1):?>
    <script>toastr.success('<?php echo $this->session->flashdata('alert_data')?>');</script>
    <?php elseif($this->session->flashdata('msg') == 2):?>
      <script>toastr.error('<?php echo $this->session->flashdata('alert_data')?>');</script>
  <?php endif;?>
	<input type="checkbox" id="sidebar-toggle">
	<div class="sidebar">
		<div class="sidebar-header">
			<h1>Booking</h1>
		</div>
		
		<div class="sidebar-menu">
		   <ul>
		      <a href="<?php echo base_url();?>">
		         <li class="<?php echo $this->uri->segment(1) == '' ? 'active' : ''; ?>">
		            <span><img src="<?php echo base_url();?>assets/icon/dashboard.png"></span>
		            <span>Dashboard</span>
		         </li>
		      </a>
			  <a href="<?php echo base_url().'vehicle'; ?>">
		         <li class="<?php echo $this->uri->segment(1) == 'vehicle' ? 'active' : ''; ?>">
		            <span><img src="<?php echo base_url();?>assets/icon/airplane.png"></span>
		            <span>Vehicles</span>
		         </li>
		      </a>
		      <a href="<?php echo base_url().'location'; ?>">
		         <li class="<?php echo $this->uri->segment(1) == 'location' ? 'active' : ''; ?>">
		            <span><img src="<?php echo base_url();?>assets/icon/location.png"></span>
		            <span>Vehicles Location</span>
		         </li>
		      </a>
			  <a href="<?php echo base_url().'seat'; ?>">
		         <li class="<?php echo $this->uri->segment(1) == 'seat' ? 'active' : ''; ?>">
		            <span><img src="<?php echo base_url();?>assets/icon/seat.png"></span>
		            <span>Seats</span>
		         </li>
		      </a>
		      <a href="<?php echo base_url().'complain'; ?>">
		         <li class="<?php echo $this->uri->segment(1) == 'complain' ? 'active' : ''; ?>" >
		            <span><img src="<?php echo base_url();?>assets/icon/complaint.png"></span>
		            <span>Complain</span>
		         </li>
		      </a>
		      <a href="<?php echo base_url().'notification'; ?>">
		         <li class="<?php echo $this->uri->segment(1) == 'notification' ? 'active' : ''; ?>">
		            <span><img src="<?php echo base_url();?>assets/icon/bell.png"></span>
		            <span>Notification</span>
		         </li>
		      </a>
		      <a href="<?php echo base_url().'booking'; ?>">
		         <li class="<?php echo $this->uri->segment(1) == 'booking' ? 'active' : ''; ?>">
		            <span><img src="<?php echo base_url();?>assets/icon/booking.png"></span>
		            <span>Booking History</span>
		         </li>
		      </a>
		       <a href="<?php echo base_url().'history'; ?>">
		         <li class="<?php echo $this->uri->segment(1) == 'history' ? 'active' : ''; ?>">
		            <span><img src="<?php echo base_url();?>assets/icon/history.png"></span>
		            <span>Payment History</span>
		         </li>
		      </a>
		      <a href="<?php echo base_url().'user'; ?>">
		         <li class="<?php echo $this->uri->segment(1) == 'user' ? 'active' : ''; ?>" > 
		            <span><img src="<?php echo base_url();?>assets/icon/user.png"></span>
		            <span>Manage Users</span>
		         </li>
		      </a>
		      <div class="close-sidebar">
		      	<label for="sidebar-toggle" class="fas fa-chevron-left icon-close"></label>
		      </div>
		   </ul>
		</div>
	</div>

	<div class="main-content">

		<header class="centering">
			<div class="searchwrapper">
				<span class="search-icon">
				</span>
			</div>
			<div class="social-icons">

				<div class="dropdown notification">
					<a class="dropdown" class="btn-drop dropdown-toggle" type="button" id="notify" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<p>
						</p>
					</a>
				</div>

				<span class="pic"></span>
				<div class="dropdown">
				  <button class="btn-drop dropdown-toggle" type="button" id="settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <p>Ahmed Admin<i class="fa fa-chevron-down fa-fw"></i><br><span class="member"> Admin </span></p>
				  </button>
				  <div class="dropdown-menu text-center" aria-labelledby="settings">
				  	<a class="dropdown-item" href="<?php echo base_url().'profile'; ?>">Profile</a>
				    <a class="dropdown-item" href="<?php echo base_url()."logout";?>">Logout</a>
				  </div>
				</div>
			</div>
		</header>
		<main>
		