<?php $this->load->view('inc/header'); ?>
			<!--<a href="#add-alert"  class="mt-1 mb-3 float-right msg_send" style="margin-left:500px;" data-toggle="modal">-->
			<!--	<div class="create-project">-->
			<!--		<div class="icon-create-project">-->
			<!--			<img src="<?php echo base_url();?>assets/create-project.png">-->
			<!--		</div>-->
			<!--		<div class="text-create-project">-->
			<!--			<p>Create Complain</p>-->
			<!--		</div>-->
			<!--	</div>-->
			<!--</a>-->
			<div class="modal fade" id="add-alert">
				<div class="modal-dialog">
					<div class="modal-content p-4">
						<a href="javascript:;" class="btn btn-white close-modal-x" data-dismiss="modal"><span class="fas fa-times"></span></a>
						<div class="projects-headings">
							<h3>Create Complain</h3>
						</div>
						<div class="projects-input">
						<form action="<?php echo base_url()."add_complain";?>" method="post">
							<div class="row">
								<div class="col-lg-12 col-md-6">
									<input type="text" id="title" required required  maxlength="40" name="title" placeholder="Title">
								</div>
								<div class="col-lg-12 col-md-6">
									<input type="text" id="description" required required  maxlength="60" name="description" placeholder="Description">
								</div>
								<div class="col-lg-12 text-right">
									<a href="#">
										<button type="submit" class="btn-all btn-done">Create</button>
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
					      <th scope="col">Title</th>
					      <th scope="col">Description</th>
					      <th scope="col">Status</th>
						  <th scope="col">Action</th>
						</tr>
					  </thead>
					  <tbody class="thead-body category-body">
					  <?php $i = 1; if(!empty($records)):foreach ($records['data'] as $record) :?>
					    <tr>
					      <td><?php echo $i++; ?></td>
					      <td><?php echo $record['title'];?></td>
					      <td><?php echo $record['description'];?></td>
					      <td><?php if($record['is_resolved'] == 1) { echo 'Pending';} else if ($record['is_resolved'] == 2) {echo 'In Process';} else if ($record['is_resolved'] == 3) {echo 'Completed';} ?></td>
						  <td class="text-center btnssss">
								 <a data-status="<?php echo $record['is_resolved']; ?>" data-title="<?php echo $record['title']; ?>" data-description="<?php echo $record['description']; ?>" data-id="<?php echo $record['id'];?>" class="msg_send edBtn" >
									 <button class="in-progress px-4 edit-icon"><span class="fa fa-edit"></span></button>
								 </a>
								 <!--<a class="msg_send ml-2 myBtn" data-sd="<?php echo $record['id'];?>">-->
									<!-- <button class="in-progress px-4 trash-icon"><span class="fa fa-trash"></span></button>-->
								 <!--</a>-->
							</td>
					    </tr>
						<?php endforeach; endif;?>
					  </tbody>
				</table>
			</div>	  
					<!-- Edit Modal	-->
			 <div class="modal fade" id="c-modal-edit">
					<div class="modal-dialog">
						<div class="modal-content p-4">
						<a href="javascript:;" class="btn btn-white close-modal-x" data-dismiss="modal"><span class="fas fa-times"></span></a>
							<div class="projects-headings">
								<h3>Edit Complain</h3>
							</div>
							<div class="projects-input">
							  <form action="<?php echo base_url()."edit_complain"; ?>" method="post">
								<div class="row">
								    <input type="hidden" name="id" id="ed_comp_id">
									<div class="col-lg-12 col-md-6">
										<input type="text"  name="title" disabled  maxlength="40" id="edit_title" placeholder="Title">
									</div>
									<div class="col-lg-12 col-md-6">
										<input type="text" disabled maxlength="60"name="description" id="edit_description" placeholder="Description">
									</div>
									<div class="col-lg-12 col-md-6">
								        <select name="is_resolved" id="edit_status" class="form-control" >
								            <option value="1">Pending</option>
								            <option value="2">In Process</option>
                                            <option value="3">Completed</option>								            
								        </select>
									</div>
									<div class="col-lg-12 text-right">
										<a href="<?php echo base_url()."edit_complain"; ?>">
											<button onclick="edit_complain()" class="btn-all btn-done">Update</button>
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
								<h3>Delete Complain</h3>
							</div>
							<div>
								<div class="row">
								    <form action="<?php echo base_url()."delete_complain"; ?>" method="post">
									<div class="col-lg-12 text-right">
									    <input type="hidden" name="id" id="comp_id">
										 <a href="<?php echo base_url()."delete_complain"?>">
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
                        var id = $(this).attr('data-sd');
                        $("#comp_id").val(id);
                        $("#modal-delete").modal();
                  });
                });
                
                $(document).ready(function(){
                  $(".edBtn").click(function(){
                        var id = $(this).attr('data-id');
                        var title = $(this).attr('data-title');
                        var description = $(this).attr('data-description');
                        var status =$(this).attr('data-status');
                        $("#ed_comp_id").val(id);
                        $("#edit_title").val(title);
                        $("#edit_description").val(description);
                        $("#edit_status").val(status);
                        $("#c-modal-edit").modal();
                  });
                });
                
                function edit_complain(){
                    $.ajax ({
                            type : "POST",
                            data : {"title" : $('#edit_title').val() ,"description" :  $('#edit_description').val()},
                            url : "<?php echo base_url()."edit_complain"; ?>",
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