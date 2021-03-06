<?php $this->load->view('inc/header');?>
			<a href="#modal-alert" data-uid="" class="mt-1 mb-3 float-right msg_send" style="margin-left:500px;" data-toggle="modal">
				<div class="create-project">
					<div class="icon-create-project">
						<img src="<?php echo base_url();?>assets/create-project.png">
					</div>
					<div class="text-create-project">
						<p>Create Notification</p>
					</div>
				</div>
			</a>
			<div class="modal fade" id="modal-alert">
				<div class="modal-dialog">
					<div class="modal-content p-4">
					<a href="javascript:;" class="btn btn-white close-modal-x" data-dismiss="modal"><span class="fas fa-times"></span></a>
						<div class="projects-headings">
							<h3>Create Notification</h3>
						</div>
						<div class="projects-input">
						<form action="<?php echo base_url()."add_notification";?>" method="post">
							<div class="row">
								<div class="col-lg-12 col-md-6">
									<input type="text" id="title" required  maxlength="40" name="title" placeholder="Title">
								</div>
								<div class="col-lg-12 col-md-6">
									<input type="text" id="description" required  maxlength="60" name="description" placeholder="Description">
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
						  <th scope="col">Created At</th>
					    </tr>
					  </thead>
					  <tbody class="thead-body category-body">
					  <?php $i = 1; if(!empty($records)):foreach ($records['data'] as $record) :?>
					    <tr>
					      <td><?php echo $i++; ?></td>
					      <td class="title"><?php echo $record['title'];?></td>
					      <td class="description"><?php echo $record['description'];?></td>
					      <td><?php echo $record['created_at'];?></td>
						 <!-- <td class="text-center btnssss">-->
						 <!--       <a class="msg_send ml-2 myBtn" data-id="<?php echo $record['id'];?>">-->
							<!--		 <button class="in-progress px-4 trash-icon"><span class="fa fa-trash"></span></button>-->
							<!--	 </a>-->
							<!--	 <a data-title="<?php echo $record['title']; ?>" data-description="<?php echo $record['description']; ?>" data-id="<?php echo $record['id'];?>" class="msg_send edBtn" >-->
							<!--		 <button class="in-progress px-4 edit-icon"><span class="fa fa-edit"></span></button>-->
							<!--	 </a>-->
							<!--</td>	-->
					    </tr>
						<?php endforeach; endif;?>	
					  </tbody>
				</table>
			</div>
					  <!-- Edit Modal	-->
			 <div class="modal fade" id="n-modal-edit">
					<div class="modal-dialog">
						<div class="modal-content p-4">
						<a href="javascript:;" class="btn btn-white close-modal-x" data-dismiss="modal"><span class="fas fa-times"></span></a>
							<div class="projects-headings">
								<h3>Edit Notification</h3>
							</div>
							<div class="projects-input">
							<form action="<?php echo base_url()."edit_notification"; ?>" method="post">
								<div class="row">
								    <input type="hidden" name="id" id="ed_notify_id">
									<div class="col-lg-12 col-md-6">
										<input type="text" name="title" required  maxlength="40" id="edit_title" placeholder="Title">
									</div>
									<div class="col-lg-12 col-md-6">
										<input type="text" name="description" required  maxlength="60" id="edit_description" placeholder="Description">
									</div>
									<div class="col-lg-12 text-right">
										<a href="<?php echo base_url()."edit_notification"; ?>">
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
			<div class="modal fade" id="n-modal-delete">
					<div class="modal-dialog">
						<div class="modal-content p-4">
						<a href="javascript:;" class="btn btn-white close-modal-x" data-dismiss="modal"><span class="fas fa-times"></span></a>
							<div class="projects-headings">
								<h3>Delete Notification</h3>
							</div>
							<div class="projects-input">
								<div class="row">
								     <form action="<?php echo base_url()."delete_notification"; ?>" method="post">
									<div class="col-lg-12 text-right">
									    <input type="hidden" name="id" id="notify_id">
										<a href="<?php echo base_url()."delete_notification"; ?>">
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
                        $("#notify_id").val(id);
                        $("#n-modal-delete").modal();
                  });
                });
                
                $(document).ready(function(){
                  $(".edBtn").click(function(){
                        var id = $(this).attr('data-id');
                        var title = $(this).attr('data-title');
                        var description = $(this).attr('data-description');
                        $("#ed_notify_id").val(id);
                        $("#edit_title").val(title);
                        $("#edit_description").val(description);
                        $("#n-modal-edit").modal();
                  });
                });
                function edit_notification(){
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