<?php $this->load->view('inc/header'); ?>
		<a href="#modal-alert" data-uid="" class="mt-1 mb-3 float-right msg_send" style="margin-left:500px;" data-toggle="modal">
				<div class="create-project">
					<div class="icon-create-project">
						<img src="<?php echo base_url();?>assets/create-project.png">
					</div>
					<div class="text-create-project">
						<p>Add Vehicle</p>
					</div>
				</div>
		</a>
			<div class="modal fade" id="modal-alert">
				<div class="modal-dialog">
					<div class="modal-content p-4">
					<a href="javascript:;" class="btn btn-white close-modal-x" data-dismiss="modal"><span class="fas fa-times"></span></a>
						<div class="projects-headings">
							<h3>Add Vehicle</h3>
						</div>
						<div class="projects-input">
						    <form action="<?php echo base_url()."add_vehicle";?>" method="post">
							<div class="row">
								<div class="col-lg-12 col-md-6">
									<input type="text" id="title" required name="title" maxlength="40" placeholder="Vehicle">
								</div>
								<div class="col-lg-12 col-md-6">
									<input type="text" id="reg_number" required maxlength="15" name="reg_number" placeholder="Registration Number">
								</div>
								<div class="col-lg-12 col-md-6">
									<input type="text" id="no_of_seats" required maxlength="4" name="no_of_seats" placeholder="No of Seat">
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
					      <th scope="col">Vehicle</th>
					      <th scope="col">Registration Number</th>
					      <th scope="col">No of Seat</th>
						  <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody class="thead-body category-body">
						<?php  $i = 1; foreach ($query as $row) :?>
					    <tr>
					      <td><?php echo $i++; ?></td>
					      <td ><?php echo $row->title ; ?></td>
					      <td ><?php echo $row->reg_number; ?></td>
					      <td ><?php echo $row->no_of_seats; ?></td>
						  <td class="text-center btnssss">
								 <a data-title="<?php echo $row->title; ?>" 
								    data-registration_number="<?php echo $row->reg_number; ?>"
								    data-no_of_seats="<?php echo $row->no_of_seats;  ?>"
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
								<h3>Edit Vehicle</h3>
							</div>
							<div class="projects-input">
							   <form action="<?php echo base_url()."edit_vehicle"; ?>" method="post">
								<div class="row">
									<div class="col-lg-12 col-md-6">
									         <input type="hidden" name="id" id="e-vehicle_id">
											<input type="text" required maxlength="40" id="v-title" name="title" placeholder="Title">
									</div>
									<div class="col-lg-12 col-md-6">
										<input type="text" required maxlength="15" id="v-registration_number" name="reg_number" placeholder="Registration Number">
									</div>
									<div class="col-lg-12 col-md-6">
										<input type="text" required maxlength="4" id="v-no_of_seats" name="no_of_seats" placeholder="No of Seat">
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
							<h3>Delete Vehicle</h3>
						</div>
						<div class="projects-input">
							<div class="row">
								<form action="<?php echo base_url()."delete_vehicle"; ?>" method="post">
								<div class="col-lg-12 text-right">
								    <input type="hidden" name="id" id="vehicle_id">
									<a href="<?php echo base_url()."delete_vehicle"; ?>">
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
                                $("#vehicle_id").val(id);
                                $("#v-modal-delete").modal();
                          });
                        });
                $(document).ready(function(){
                  $(".edBtn").click(function(){
                        var id = $(this).attr('data-id');
                        var title = $(this).attr('data-title');
                        var reg_number = $(this).attr('data-registration_number');
                        var no_of_seats = $(this).attr('data-no_of_seats');
                        $("#e-vehicle_id").val(id);
                        $("#v-title").val(title);
                        $("#v-registration_number").val(reg_number);
                        $("#v-no_of_seats").val(no_of_seats);
                        $("#v-modal-edit").modal();
                  });
                });
                function edit_vehicle(){
                    $.ajax ({
                            type : "POST",
                            data : {"title" : $('#v-title').val() ,"reg_number" :  $('#v-registration_number').val() ,
                                    "no_of_seats" : $('#v-no_of_seats').val()},
                            url : "<?php echo base_url()."edit_vehicle"; ?>",
                            success : function (data) {
                            },
                            error : function (xhr) {
                                alert( "error" );
                                console.log(xhr);
                            }
                        });
                }
            </script>
<?php $this->load->view('inc/footer'); ?>