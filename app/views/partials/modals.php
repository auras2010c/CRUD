				<!--end button start bootstrap modal-->
				<div data-backdrop="false" class="modal fade" id="Logo-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Editing your logo name..</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="POST" action="">
									<div class="form-group">
										<span>Your logo must have at least 20 characters.</span><br>
										<label for="recipient-name" class="col-form-label">Type:</label>
										<input type="text" class="form-control" id="recipient-name" name="logo">
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary" name='submit'>Change</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!--end bootstrap modal-->



				<!--end button start bootstrap modal-->
				<div data-backdrop="false" class="modal fade" id="Title-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Editing your title..</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="POST" action="">
									<div class="form-group">
										<span>Title must have at least 30 characters.</span><br>
										<label for="recipient-name" class="col-form-label">Type:</label>
										<input type="text" class="form-control" id="recipient-name" name="title">
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary" name='submit'>Change</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!--end bootstrap modal-->




				<div  data-backdrop="false" class="modal fade Show-users" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<table class="table table-hover table-dark">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Name</th>
										<th scope="col">Username</th>
										<th scope="col">Joining date</th>
										<th scope="col">e-mail</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($querybuilder->selectall('users') as $rows) : ?>
										<tr>
											<th scope="row"><?= $rows['id']; ?></th>
											<td><?= $rows['name']; ?></td>
											<td><?= $rows['username']; ?></td>
											<td><?= $rows['joined']; ?></td>
											<td><?= $rows['email']; ?></td>
											<td><button type="button" class="btn btn-primary" data-toggle="modal" aria-pressed="false" autocomplete="off" data-target="#cp" >CP</button></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>





				<div data-backdrop="false" class="modal fade" id="cp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Changing password..</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="POST" action="">
									<div class="form-group">
										<label for="recipient-name" class="col-form-label">Type your new password:</label>
										<input type="password" class="form-control" id="recipient-name" name="cp">
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary" name='submit'>Change</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

				<!--Start more options modal -->

				<div data-backdrop="false" class="modal fade options" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<table class="table table-hover table-dark">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Action</th>
										<th scope="col">Press on button</th>
									</tr>
								</thead>
								<tbody>
										<tr>
											<th scope="row">1</th>
											<td>Delete all of your rows..</td>
											<form action="" method="GET">
											<td><button type="submit" name="deletetodos" value="success" class="btn btn-primary">Delete</button></td>
											</form>
										</tr>
										<tr>
											<th scope="row">2</th>
											<td>Filter your lists..</td>
											<td><button type="submit" name="filterdone" value="success" class="btn btn-primary" data-toggle="modal" data-target=".doneitems">Done</button>
											<button type="submit" name="filterundone" value="success" class="btn btn-primary" data-toggle="modal" data-target=".undoneitems">Undone</button>
											</td>
										</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>


				<!-- end -->

				<!-- start top users modal -->


				<div  data-backdrop="false" class="modal fade Show-top-users" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<table class="table table-hover table-dark">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Username</th>
										<th scope="col">Number of rows..</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($crud->selecttoplists() as $rows) : ?>
										<tr>
											<th scope="row">#</th>
											<td><?= $rows['username_todo']; ?></td>
											<td><?= $rows['nr_todo']; ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<!--start filtering todo lists -->
				<div  data-backdrop="false" class="modal fade doneitems" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<table class="table table-hover table-dark">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">To do..</th>
										<th scope="col">Created on..</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($querybuilder->selectmarks('todo', 1) as $rows) : ?>
										<tr>
											<th scope="row">#</th>
											<td><?= $rows['message']; ?></td>
											<td><?= $rows['data']; ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- filtering ...... one more -->

				<div  data-backdrop="false" class="modal fade undoneitems" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<table class="table table-hover table-dark">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">To do..</th>
										<th scope="col">Created on..</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($querybuilder->selectmarks('todo', 2) as $rows) : ?>
										<tr>
											<th scope="row">#</th>
											<td><?= $rows['message']; ?></td>
											<td><?= $rows['data']; ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>