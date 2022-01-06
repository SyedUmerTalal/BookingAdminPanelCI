<?php $this->load->view('inc/header'); ?>
			<a href="#add-alert"  class="mt-1 mb-3 float-right msg_send" style="margin-left:500px;" data-toggle="modal">
				<div class="create-project">
					<div class="icon-create-project">
						<img src="<?php echo base_url();?>assets/create-project.png">
					</div>
					<div class="text-create-project">
						<p>Add Seats</p>
					</div>
				</div>
			</a>
			<div class="modal fade" id="add-alert">
				<div class="modal-dialog">
					<div class="modal-content p-4">
						<a href="javascript:;" class="btn btn-white close-modal-x" data-dismiss="modal"><span class="fas fa-times"></span></a>
						<div class="projects-headings">
							<h3>Seats</h3>
						</div>
						<div class="projects-input">
						<form action="<?php echo base_url()."add_seat";?>" method="post">
							<div class="row">
								<div class="col-lg-12 col-md-6">
									<select name="vehicle_id" id="vehicle_id"class="form-control">
										<option value="">Vehicles</option>
										<?php
											$query = "select * from vehicles";
											$ss = $this->user_model->rawQuery($query);
										?>
										<?php foreach($ss as $row): ?>
											<option value='<?php echo $row["id"]; ?>'><?php echo $row["title"]; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-lg-12 col-md-6">
									<select name="type" id="type" class="form-control">
										<option value="">Seat Type</option>
										<option value="1">Economy</option>
										<option value="2">Business</option>
										<option value="3">First</option>
									</select>
								</div>
								<div class="col-lg-12 col-md-6">
									<input type="text" id="title" required  maxlength="40" name="title" placeholder="Seat Name">
								</div>
								<div class="col-lg-12 text-right">
									<a href="#">
										<button type="submit" class="btn-all btn-done">ADD</button>
									</a>
								</div>
							</div>
						</div>
						</form>	
					</div>
				</div>
			</div>
			<div class="table-responsive projects-table">	
				<table id="mytable" class="table">
					  <thead class="thead-table-projects">
					    <tr>
					      <th scope="col">S No.</th>
					      <th scope="col">Vehicle</th>
					      <th scope="col">Type</th>
					      <th scope="col">Seat Name</th>
						  <th scope="col">Action</th>
						</tr>
					  </thead>
					  <tbody class="thead-body category-body">
					  <?php $seat['query'] = $this->seat_model->get_seats(); ?>
					  <?php  $i = 1; foreach ($seat['query'] as $row) :?>
					    <tr>
					      <td><?php echo $i++; ?></td>
					      <td><?php echo $row->title; ?></td>
					      <td><?php if($row->type == 1) { echo 'Economy';} else if ($row->type == 2) {echo 'Business';} else if ($row->type == 3) {echo 'First';} ?></td>
					      <td><?php echo $row->seat_title ; ?></td>
						  <td class="text-center btnssss">
								 <a data-title="<?php echo $row->seat_title; ?>" data-type="<?php echo $row->type; ?>" 
								    data-vehicle_title="<?php echo $row->title; ?>"  data-vehicle_id="<?php echo $row->vehicle_id; ?>" data-id="<?php echo $row->id;?>" class="msg_send edBtn" >
									 <button class="in-progress px-4 edit-icon"><span class="fa fa-edit"></span></button>
								 </a>
								 <a class="msg_send ml-2 myBtn" data-id="<?php echo $row->id;?>">
									 <button class="in-progress px-4 trash-icon"><span class="fa fa-trash"></span></button>
								 </a>
							</td>
					    </tr>
						<?php endforeach;?>
					  </tbody>
				</table>
			</div>	  
					<!-- Edit Modal	-->
			 <div class="modal fade" id="c-modal-edit">
					<div class="modal-dialog">
						<div class="modal-content p-4">
						<a href="javascript:;" class="btn btn-white close-modal-x" data-dismiss="modal"><span class="fas fa-times"></span></a>
							<div class="projects-headings">
								<h3>Edit Seat</h3>
							</div>
							<div class="projects-input">
							  <form action="<?php echo base_url()."edit_seat"; ?>" method="post">
								<div class="row">
								    <input type="hidden" name="id" id="s_id">
								    <div class="col-lg-12 col-md-6">
										<input type="hidden" required name="vehicle_id" id="edit_vehicle_id" placeholder="Vehicle">
										<input type="text" disabled  name="vehicle_id" id="edit_vehicle_title" placeholder="Vehicle">
									</div>
								    <div class="col-lg-12 col-md-6">
								        <select name="type" id="edit_type" class="form-control" >
								            <option value="">Seat Type</option>
								            <option value="1">Economy</option>
								            <option value="2">Business</option>
                                            <option value="3">First</option>								            
								        </select>
									</div>
									<div class="col-lg-12 col-md-6">
										<input type="text" required  maxlength="40"  name="seat_title" id="edit_title" placeholder="Seat Name">
									</div>
									<div class="col-lg-12 text-right">
										<a href="<?php echo base_url()."edit_seat"; ?>">
											<button type="submit" class="btn-all btn-done">Update</button>
										</a>
									</div>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Delete Modal	-->
			<div class="modal fade" id="modal-delete" >
					<div class="modal-dialog">
						<div class="modal-content p-4">
						<a href="javascript:;" class="btn btn-white close-modal-x" data-dismiss="modal"><span class="fas fa-times"></span></a>
							<div class="projects-headings">
								<h3>Delete Seat</h3>
							</div>
							<div>
								<div class="row">
								    <form action="<?php echo base_url()."delete_seat"; ?>" method="post">
									<div class="col-lg-12 text-right">
									    <input type="hidden" name="id" id="sd_id" >  
										 <a href="<?php echo base_url()."delete_seat"?>">
											<button type="submit" class="btn-all btn-done">Yes</button>
										</a>
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script>
                $(document).ready(function(){
                  $(".myBtn").click(function(){
                        var id = $(this).attr('data-id');
                        $("#sd_id").val(id);
                        $("#modal-delete").modal();
                  });
                });
                
                $(document).ready(function(){
                  $(".edBtn").click(function(){
                        var id = $(this).attr('data-id');
                        var title = $(this).attr('data-title');
                        var type = $(this).attr('data-type');
                        var vehicle_title = $(this).attr('data-vehicle_title');
                        var vehicle_id = $(this).attr('data-vehicle_id');
                        $("#s_id").val(id);
                        $("#edit_vehicle_id").val(vehicle_id);
                        $("#edit_vehicle_title").val(vehicle_title);
                        $("#edit_title").val(title);  
                        if(type==1){
                            $("#edit_type").val("Economy");
                        }
                        else if(type==2){
                            $("#edit_type").val("Business");
                        }
                        else if(type==3){
                            $("#edit_type").val("First");
                        }
                        $("#c-modal-edit").modal();
                  });
                });
            </script>
<?php $this->load->view('inc/footer'); ?>