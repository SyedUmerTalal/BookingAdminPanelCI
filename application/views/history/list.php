<?php $this->load->view('inc/header'); ?>
			<div class="table-responsive projects-table">	
				<table id="mytable" class="table">
					  <thead class="thead-table-projects">
					    <tr>
					      <th scope="col">S No.</th>
					      <th scope="col">Vehicle</th>
					      <th scope="col">Reserved By</th>
					      <th scope="col">Booking Date</th>
					      <th scope="col">Departure Time</th>
					      <th scope="col">Arrival Time</th>
						  <th scope="col">From</th>
						  <th scope="col">To</th>
						  <th scope="col">Total Seat</th>
						  <th scope="col">Unit Price</th>
						  <th scope="col">Total Amount</th>
						</tr>
					  </thead>
					  <?php $i = 1;  $data['query'] = $this->history_model->get_history();?>
					  <tbody class="thead-body category-body">
					  <?php $i = 1; if(!empty($data)):foreach ( $data['query'] as $data) :?>    
					    <tr>
					      <td><?php echo $i++; ?></td>
					      <td><?php echo $data->vehicle_id; ?></td>
					      <td><?php echo $data->reserved_by; ?></td>
					      <td><?php echo $data->booking_date; ?></td>
					      <td><?php echo $data->departure_time; ?></td>
					      <td><?php echo $data->arrival_time; ?></td>
					      <td><?php echo $data->from_loc; ?></td>
					      <td><?php echo $data->to_loc; ?></td>
					      <td><?php echo $data->total_seats; ?></td>
					      <td><?php echo $data->unit_cost; ?></td>
					      <td><?php echo $data->total_amount; ?></td>
					    </tr>
					    <?php endforeach; endif;?>
					  </tbody>
				</table>
			</div>
<?php $this->load->view('inc/footer'); ?>