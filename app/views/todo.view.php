<?php require 'partials/head.php'; 
require 'partials/nav.php';
?>
<!---->
<main>
  <div class="container my-5">
   <div class="card-body text-center">
    <h4 class="card-title">Bun venit, <?php echo $querybuilder->selectusername(Session::get('id')); ?></h4>
    <p class="card-text">Astazi este: <?php echo date("Y-m-d") ?></p>
  </div>
  <div class="card">
    <button id="add__new__list" type="button" class="btn btn-success position-absolute" data-toggle="modal" data-target="#new-list"><i class="fas fa-plus"></i> Add a new List</button>
    <table class="table table-hover">
      <thead>

        <tr>
          <th scope="col">ID</th>
          <th scope="col">Date</th>
          <th scope="col">To do..</th>
          <th scope="col">Edit</th>
        </tr>

      </thead>
      <tbody>
        <?php error_reporting(E_ERROR | E_PARSE); ?>
        <?php foreach($crud->select(Session::get('id')) as $rows) : ?>
          <tr>
            <th scope="row">#</th>
            <td> <?= $rows['data']; ?> </td>
            <td> <?= $rows['message']; ?> </td>
            <td>
              <form action="action" method="GET">
              <button type="submit" name="edit" class="btn btn-sm btn-primary" value="<?= $rows['id']; ?>"><i class="far fa-edit"></i> edit</a>
              <button type="submit" name="delete" class="btn btn-sm btn-danger" value="<?= $rows['id']; ?>"><i class="fas fa-trash-alt"></i>delete</a>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>

      </tbody>
    </table>
  </div>
<!-- Bootstrap modal for new item -->
  <div class="modal fade" data-backdrop="false" id="new-list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add new item</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="false">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Message</label>
              <input type="text" name="message" class="form-control" id="recipient-name">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="submit">Add</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<!-- END Bootstrap modal for new item -->


  <?php require 'partials/footer.php'; ?>