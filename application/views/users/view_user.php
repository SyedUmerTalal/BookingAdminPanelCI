<?php $this->load->view('inc/header');?>
			<div class="profile-view-client-head">
				<div  class="row">

					<div class="col-lg-3 col-md-4">
						<div class="clients-image">
							<img src="https://webprojectmockup.com/custom/ticket-app/public/<?php echo $records['data']['image']; ?>">
						</div>
					</div>
					<div class="col-lg-9 col-md-8 my-auto">
						<div class="clients-info">
							<h3><?php echo $records['data']['name']; ?></h3>
							<p>Email : <span><?php echo $records['data']['email']; ?></span></p>
							<p>Phone : <span><?php echo $records['data']['number']; ?></span></p>
							<p>Address : <span> <?php echo $records['data']['address']; ?></span></p>
						</div>
					</div>
				</div>
			</div>
<?php $this->load->view('inc/footer'); ?>	