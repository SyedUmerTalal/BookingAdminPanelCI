<?php $this->load->view('inc/header'); ?>
			<div class="table-responsive projects-table">	
				<table id="mytable" class="table">
					  <thead class="thead-table-projects">
					    <tr>
					      <th scope="col">S No.</th>
					      <th scope="col">Reserved By</th>
					      <th scope="col">Vechicle</th>
					      <th scope="col">Booking Date</th>
					      <th scope="col">Departure Time</th>
					      <th scope="col">Arrival Time</th>
						  <th scope="col">From</th>
						  <th scope="col">To</th>
						  <th scope="col">Total Seat</th>
						  <th scope="col">Seat Type</th>
						  <th scope="col">Total Amount</th>
						  <th scope="col">Booking Status</th>
						</tr>
					  </thead>
					  <?php $data['query'] = $this->booking_model->get_history();?>
					  <tbody class="thead-body category-body">
					  <?php $i = 1; if(!empty($data['query'])):foreach ( $data['query'] as $data) :?>
					    <tr>
					      <td><?php echo $i++; ?></td>
					      <td><?php echo $data->user_name; ?></td>
					      <td><?php echo $data->vehicle_title; ?></td>
					      <td><?php echo date($data->booking_date); ?></td>
					      <td><?php echo date('H:i:s a',strtotime($data->departure_time)); ?></td>
					      <td><?php echo date('H:i:s a',strtotime($data->arrival_time)); ?></td>
					      <td><?php echo $data->from_loc; ?></td>
					      <td><?php echo $data->to_loc; ?></td>
					      <td><?php echo $data->total_seats; ?></td>
					      <td><?php if($data->type == 1) { echo 'Economy';} else if ($data->type == 2) {echo 'Business';} else if ($data->type == 3) {echo 'First';} ?></td>
					       <td><?php echo $data->total_amount; ?></td>
					      <td><?php if($data->status == 1) { echo 'Booked';} else if ($data->status == 0) {echo 'Cancelled';} ?></td>
					    </tr>
					    <?php endforeach; endif; ?>
					  </tbody>
				</table>
			</div>
<?php $this->load->view('inc/footer'); ?>