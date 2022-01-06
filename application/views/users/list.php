<?php $this->load->view('inc/header'); ?>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
			<a href="#modal-alert" data-uid="" class="mt-1 mb-3 float-right msg_send" style="margin-left:500px;" data-toggle="modal">
				<div class="create-project">
					<div class="icon-create-project">
						<img src="<?php echo base_url();?>assets/create-project.png">
					</div>
					<div class="text-create-project">
						<p>Create User</p>
					</div>
				</div>
			</a>
			<div class="modal fade" id="modal-alert">
				<div class="modal-dialog">
					<div class="modal-content p-4">
					<a href="javascript:;" class="btn btn-white close-modal-x" data-dismiss="modal"><span class="fas fa-times"></span></a>
						<div class="projects-headings">
							<h3>Create User</h3>
						</div>
						<div class="projects-input">
						<form action="<?php echo base_url()."add_user";?>" method="post">	
							<div class="row">
								<div class="col-lg-12 col-md-6">
									<input type="text" id="name" required  maxlength="40" name="name" placeholder="User Name" autocomplete="off">
								</div>
								<div class="col-lg-12 col-md-6">
									<input type="email" id="email" required  maxlength="80" name="email" placeholder="Email">
								</div>
								<div class="col-lg-12 col-md-6">
									<input type="password" id="password" required name="password" placeholder="Password">
								</div>
								<div class="col-lg-12 col-md-6">
									<input type="text" id="number" name="number" required  maxlength="21" placeholder="Phone">
								</div>
								<div class="col-lg-12 col-md-6">
									<input type="text" id="address" name="address" required  maxlength="80" placeholder="Address">
								</div>
								<div class="col-lg-12 text-right">
									<a href="#">
										<button type="submit" class="btn-all btn-done">Create</button>
									</a>
								</div>
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
			<div class="table-responsive projects-table">		
				<table id="myTable" class="table">
					  <thead class="thead-table-projects">
					    <tr>
					      <th scope="col">S No.</th>
					      <th scope="col">Profile Picture</th>
					      <th scope="col">Name</th>
					      <th scope="col">Email</th>
						  <th scope="col">Phone</th>
						  <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody class="thead-body category-body">
						<?php  $i = 1; foreach ($query as $row) :?>
					    
					    <tr>
					      <td><?php echo $i++; ?></td>
					      <td><img src="https://webprojectmockup.com/custom/ticket-app/public/<?php echo $row->image; ?>"></td>
					      <td ><?php echo $row->name ; ?></td>
					      <td ><?php echo $row->email; ?></td>
					      <td ><?php echo $row->number; ?></td>
						  <td class="text-center btnssss">
								 <a data-name="<?php echo $row->name; ?>" 
								    data-email="<?php echo $row->email; ?>"
								    data-phone="<?php echo $row->number;  ?>"
								    data-address="<?php echo $row->address; ?>"
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
			 <div class="modal fade" id="u-modal-edit">
					<div class="modal-dialog">
						<div class="modal-content p-4">
						<a href="javascript:;" class="btn btn-white close-modal-x" data-dismiss="modal"><span class="fas fa-times"></span></a>
							<div class="projects-headings">
								<h3>Edit User</h3>
							</div>
							<div class="projects-input">
							    <form action="<?php echo base_url()."edit_user"; ?>" method="post">
								<div class="row">
								    <input type="hidden" name="id" id="e-user_id">
									<div class="col-lg-12 col-md-6">
										<input type="text" id="u-name" required  maxlength="40" name="name" placeholder="User Name">
									</div>
									<div class="col-lg-12 col-md-6">
										<input type="email" id="u-email" required  maxlength="80" name="email" placeholder="Email">
									</div>
									<div class="col-lg-12 col-md-6">
										<input type="text" id="u-phone" required  maxlength="21" name="number" placeholder="Phone">
									</div>
									<div class="col-lg-12 col-md-6"> 
										<input type="text" id="u-address" required  maxlength="80" name="address" placeholder="Address">
									</div>
									<div class="col-lg-12 text-right">
									    <a href="<?php echo base_url()."edit_user"; ?>">
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
			<div class="modal fade" id="u-modal-delete">
				<div class="modal-dialog">
					<div class="modal-content p-4">
					<a href="javascript:;" class="btn btn-white close-modal-x" data-dismiss="modal"><span class="fas fa-times"></span></a>
						<div class="projects-headings">
							<h3>Delete User</h3>
						</div>
						<div class="projects-input">
							<div class="row">
							     <form action="<?php echo base_url()."delete_user"; ?>" method="post">
								<div class="col-lg-12 text-right">
								    <input type="hidden" name="id" id="user_id">
									<a href="<?php echo base_url()."delete_user"; ?>">
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
		    $(document).ready( function () {
                $('#myTable').DataTable();
            } );
                $(document).ready(function(){
                  $(".myBtn").click(function(){
                        var id = $(this).attr('data-id');
                        $("#user_id").val(id);
                        $("#u-modal-delete").modal();
                  });
                });
                
                $(document).ready(function(){
                  $(".edBtn").click(function(){
                        var id = $(this).attr('data-id');
                        var name = $(this).attr('data-name');
                        var email = $(this).attr('data-email');
                        var number = $(this).attr('data-phone');
                        var address = $(this).attr('data-address');
                        $("#e-user_id").val(id);
                        $("#u-name").val(name);
                        $("#u-email").val(email);
                        $("#u-phone").val(number);
                        $("#u-address").val(address);
                        $("#u-modal-edit").modal();
                  });
                });
                function edit_notification(){
                    $.ajax ({
                            type : "POST",
                            data : {"name" : $('#u-name').val() ,"email" :  $('#u-email').val() ,
                                    "phone" : $('#u-phone').val() , "address" : $('#u-address').val()},
                            url : "<?php echo base_url()."edit_user"; ?>",
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