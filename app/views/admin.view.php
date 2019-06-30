	<?php require 'partials/head.php'; 
	require 'partials/nav.php';
	if(Input::exists()) : ?>
		<br><div class="alert alert-primary text-center" role="alert">
			<?php foreach($querybuilder->successmessages() as $row) : echo $row; endforeach;  ?>
		</div>
	<?php endif; ?>
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Type</th>
				<th scope="col">Modify</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th scope="row">1</th>
				<td>Settings</td>
				<td>Title</td>

				<!--button-->
				<td>
					<button type="button" class="btn btn-primary" data-toggle="modal" aria-pressed="false" autocomplete="off" data-target="#Title-edit" >Edit</button>
				</td>
				<!--START 2nd button-->
			</tr>
			<tr>
				<th scope="row">2</th>
				<td>Settings</td>
				<td>Logo</td>
				<td>
					<button type="button" class="btn btn-primary" data-toggle="modal" aria-pressed="false" autocomplete="off" data-target="#Logo-edit" >Edit</button>
				</td>
			</tr>
			<tr>
				<th scope="row">3</th>
				<td>Settings</td>
				<td>Users</td>
				<td>
					<button type="button" class="btn btn-primary" data-toggle="modal" aria-pressed="false" autocomplete="off" data-target=".Show-users" >Show</button>
					<!--end button start bootstrap modal-->
				</td>
			</tr>
			<tr>
				<th scope="row">3</th>
				<td>Settings</td>
				<td>Top 10 users by number of rows.</td>
				<td>
					<button type="button" class="btn btn-primary" data-toggle="modal" aria-pressed="false" autocomplete="off" data-target=".Show-top-users" >Show</button>
					<!--end button start bootstrap modal-->
				</td>
			</tr>
		</tbody>
	</table>

	<?php require 'partials/modals.php' ?>
	<?php require 'partials/footer.php'; ?>