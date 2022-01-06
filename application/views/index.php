
<?php $this->load->view('inc/header'); ?>
			<section class="sec1">
				<div class="row">
					<div class="col-lg-8 col-md-7">
						<div class="welcome-back">
							<h3>
								<span>Welcome Back !</span><br> Ahmed Allouch
							</h3>
						</div>
					</div>
					<div class="col-lg-4 col-md-5 mt-auto">
						<div class="date">
						</div>
					</div>
				</div>
			</section>
			<section class="sec2">
				<div class="row">
				    <?Php $notify = $this->db->query('SELECT * FROM notifications'); ?>
					<div class="col-lg-4 col-md-5 mx-auto my-3">
						<div class="cards card1">
							<div class="card-text-area">
								<h1><?php echo $notify->num_rows() ?></h1>
								<p>Total Notification</p>
							</div>
						</div>
					</div>
					<?Php $bookings = $this->db->query('SELECT * FROM bookings'); ?>
					<div class="col-lg-4 col-md-5 mx-auto my-3">
						<div class="cards card2">
							<div class="card-text-area">
								<h1><?php echo $bookings->num_rows() ?></h1>
								<p>Total Bookings</p>
							</div>
						</div>
					</div>
				    <?Php $query = $this->db->query('SELECT * FROM vehicles'); ?>
					<div class="col-lg-4 col-md-5 mx-auto my-3">
						<div class="cards card3">
							<div class="card-text-area">
								<h1><?php echo $query->num_rows() ?></h1>
								<p>Total Vehicles</p>
							</div>
						</div>
					</div>
				</div>
			</section>
<?php $this->load->view('inc/footer'); ?>