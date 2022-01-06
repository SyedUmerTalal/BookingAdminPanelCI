<?php $this->load->view('inc/header'); ?>
		<a href="#modal-alert" data-uid="" class="mt-1 mb-3 float-right msg_send" style="margin-left:500px;" data-toggle="modal">
				<div class="create-project">
					<div class="icon-create-project">
						<img src="<?php echo base_url();?>assets/create-project.png">
					</div>
					<div class="text-create-project" id='add_vehicle'>
						<p>Add Vehicle Location</p>
					</div>
				</div>
		</a>
			<div class="modal fade" id="modal-alert">
				<div class="modal-dialog">
					<div class="modal-content p-4">
					<a href="javascript:;" class="btn btn-white close-modal-x" data-dismiss="modal"><span class="fas fa-times"></span></a>
						<div class="projects-headings">
							<h3>Add Vehicle Location</h3>
						</div>
						<div class="projects-input">
						    <form action="<?php echo base_url()."add_vehiclelocation";?>" method="post">
							<div class="row">
								<div class="col-lg-12 col-md-6">
									<select required name="vehicle_id"  id="vehicle_id"class="form-control">
										<option value="">Vehicles</option>
										<?php
											$query = "select * from vehicles";
											$ss = $this->location_model->rawQuery($query);
										?>
										<?php foreach($ss as $row): ?>
											<option value='<?php echo $row["id"]; ?>'><?php echo $row["title"]; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-lg-12 col-md-6">
									<select required name="to_location_id" id="to_location_id" class="form-control">
									</select>
								</div>
								<div class="col-lg-12 col-md-6">
									<select required name="location_id" id="location_id" class="form-control">
									</select>
								</div>
								<div class="col-lg-12 col-md-6">
								    
								    <label>Departure Time</label>
									<input type="time" id="departure_time"  required name="departure_time" placeholder="De">
								</div>
								<div class="col-lg-12 col-md-6">
								    <label>Arrival Time</label>
									<input type="time" id="arrival_time" required name="arrival_time" placeholder="Amount">
								</div>
								<div class="col-lg-12 col-md-6">
									<input type="number" id="amount" required name="amount" min="0" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==6) return false;" placeholder="Amount">
								</div>
								<div class="col-lg-12 text-right">
									<a href="#">
										<button type="submit" class="btn-all btn-done">Add</button>
									</a>
								</div>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="table-responsive projects-table">
				
				<table id="mytable" class="table">
					  <thead class="thead-table-projects">
					    <tr>
					      <th scope="col">S No.</th>
					      <th scope="col">Vehicles</th>
					      <th scope="col">To Location</th>
					      <th scope="col">From Location</th>
					      <th scope="col">Departure Time</th>
					      <th scope="col">Arrival Time</th>
					      <th scope="col">Amount</th>
						  <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody class="thead-body category-body">
					    <?php $data['query'] = $this->location_model->get_vehicle_location(); ?>
						<?php  $i = 1; foreach ($data['query']  as $row) :?>
					    <tr>
					      <td><?php echo $i++; ?></td>
					      <td ><?php echo $row->title ; ?></td>
					      <td ><?php echo $row->to_loc; ?></td>
					      <td ><?php echo $row->from_loc; ?></td>
					      <td ><?php echo date('H:i:s a',strtotime($row->departure_time)); ?></td>
					      <td ><?php echo date('H:i:s a',strtotime($row->arrival_time)); ?></td>
					      <td ><?php echo $row->amount; ?></td>
						  <td class="text-center btnssss">
								 <a data-title="<?php echo $row->title; ?>"
								    data-vehicle_id="<?php echo $row->vehicle_id; ?>" 
								    data-to_loc="<?php echo $row->to_loc;?>"
								    data-from_loc="<?php echo $row->from_loc;  ?>"
								    data-to_location_id="<?php echo $row->to_location_id;?>"
								    data-location_id="<?php echo $row->location_id;  ?>"
								    data-departure_time="<?php echo $row->departure_time; ?>"
								    data-arrival_time="<?php echo $row->arrival_time; ?>"
								    data-amount="<?php echo $row->amount;  ?>"
								    data-id="<?php echo $row->id; ?>" class="msg_send edBtn" >
									 <button class="in-progress px-4 edit-icon"><span class="fa fa-edit"></span></button>
								 </a>
								 <a class="msg_send ml-2 myBtn" data-id="<?php echo $row->id;?>">
									 <button class="in-progress px-4 trash-icon"><span class="fa fa-trash"></span></button>
								 </a>
							</td>
					    </tr>
					    <?php endforeach; ?>
					  </tbody>
				</table>
			</div>
			 <!-- Edit Modal	-->
		    <div class="modal fade" id="v-modal-edit">
					<div class="modal-dialog">
						<div class="modal-content p-4">
						<a href="javascript:;" class="btn btn-white close-modal-x" data-dismiss="modal"><span class="fas fa-times"></span></a>
							<div class="projects-headings">
								<h3>Edit Vehicle Location</h3>
							</div>
							<div class="projects-input">
							   <form action="<?php echo base_url()."edit_vehiclelocation"; ?>" method="post">
								<div class="row">
									<div class="col-lg-12 col-md-6">
									    <input type="hidden" name="id" id="e-id">
									    <input type="hidden" name="vehicle_id" id="v-vehicle_id">
										<input type="text" id="v-title" placeholder="Vehicle">
									</div>
									<div class="col-lg-12 col-md-6">
									    <input type="hidden" id="v-to_location_id" name="to_location_id">
										<input type="text" id="v-to_loc" placeholder="To Location">
									</div>
									<div class="col-lg-12 col-md-6">
									    <input type="hidden" id="v-location_id" name="location_id" >
										<input type="text" id="v-from_loc" placeholder="From Location">
									</div>
									<div class="col-lg-12 col-md-6">
										<input type="time" required id="v-departure_time" name="departure_time" placeholder="Departure Time">
									</div>
									<div class="col-lg-12 col-md-6">
										<input type="time" required id="v-arrival_time" name="arrival_time" placeholder="From Location">
									</div>
									<div class="col-lg-12 col-md-6">
										<input type="text" required id="v-amount" name="amount" placeholder="Amount">
									</div>
									<div class="col-lg-12 text-right">
									    <a href="<?php echo base_url()."edit_vehicle"; ?>">
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
		<div class="modal fade" id="v-modal-delete">
				<div class="modal-dialog">
					<div class="modal-content p-4">
					<a href="javascript:;" class="btn btn-white close-modal-x" data-dismiss="modal"><span class="fas fa-times"></span></a>
						<div class="projects-headings">
							<h3>Delete Vehicle Location</h3>
						</div>
						<div class="projects-input">
							<div class="row">
								<form action="<?php echo base_url()."delete_vehiclelocation"; ?>" method="post">
								<div class="col-lg-12 text-right">
								    <input type="hidden" name="id" id="e_id">
									<a href="<?php echo base_url()."delete_vehiclelocation"; ?>">
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
                                $("#e_id").val(id);
                                $("#v-modal-delete").modal();
                          });
                        });
                $(document).ready(function(){
                  $(".edBtn").click(function(){
                        var id = $(this).attr('data-id');
                        var vehicle_id = $(this).attr('data-vehicle_id');
                        var title =$(this).attr('data-title');
                        var to_loc =$(this).attr('data-to_loc');
                        var from_loc =$(this).attr('data-from_loc');
                        var to_location_id = $(this).attr('data-to_location_id');
                        var location_id = $(this).attr('data-location_id');
                        var departure_time = $(this).attr('data-departure_time');
                        var arrival_time = $(this).attr('data-arrival_time');
                        var amount = $(this).attr('data-amount');
                        $("#e-id").val(id);
                        $("#v-vehicle_id").val(vehicle_id);
                        $("#v-title").val(title);
                        $("#v-to_loc").val(to_loc);
                        $("#v-from_loc").val(from_loc);
                        $("#v-to_location_id").val(to_location_id);
                        $("#v-location_id").val(location_id);
                        $("#v-departure_time").val(departure_time);
                        $("#v-arrival_time").val(arrival_time);
                        $("#v-amount").val(amount);
                        $("#v-modal-edit").modal();
                  });
                });
                $("#add_vehicle").on('click',() => {
                    
                        var data = '';
                        $.ajax({ 
                            type: "GET",
                            url: "<?php echo base_url().'location/cities'; ?>",             
                            dataType: "json",                
                            success: function(response){ 
                                data += "<option value=''>Choose From City</option>";
                                for(var i=0; i < response.length; i++)
                                {
                                    data += "<option value='"+response[i].id+"'>"+response[i].location+"</option>";
                                }
                                $("#to_location_id").html(data); 
                            }
                        });
                        
                });
                        var temp = null;
                        var s = new Array();
                        $("#to_location_id").change(() => {
                             var datas = '';
                             $("#location_id").empty();
                            let get_id_two = $("#to_location_id").val();
                            $.ajax({ 
                                type: "GET",
                                url: `<?php echo base_url().'location/cities?id=${get_id_two}'; ?>`,             
                                dataType: "json",                
                                success: function(response){ 
                                    datas += "<option value=''>Choose to City</option>";
                                    for(var i=0; i < response.length; i++)
                                    {
                                        datas += "<option value='"+response[i].id+"'>"+response[i].location+"</option>";
                                    }
                                    $("#location_id").html(datas); 
                                }
                            });
                        });
            </script>
<?php $this->load->view('inc/footer'); ?>