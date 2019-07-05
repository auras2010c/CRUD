<?php require 'partials/head.php'; 
require 'partials/nav.php';
?>
<!---->
<main>
  <div class="container my-5">
   <div class="card-body text-center">

    <h4 class="card-title">Bun venit, ~<?php echo $querybuilder->selectusername(Session::get('id')); echo '~'; 
    if ($querybuilder->selectgroup(Session::get('id')) == 1) {
      echo ' [Standard user]';
    } else {
      echo ' <a href="http://localhost/public/admin">[Administrator]</a>';
    }
    ?></h4>
    <p class="card-text">Astazi este: <?php echo date("Y-m-d") ?></p>
  </div>
  <div class="card">
        <button type="button" data-toggle="modal" data-target=".options"><i class="fas fa-trash-alt"></i>More options..</a> <!-- prelucrat pe partials/modals.php -->
      <button id="add__new__list" type="button" class="btn btn-success position-absolute" data-toggle="modal" data-target="#new-list"><i class="fas fa-plus"></i> Add a new List</button> <!-- prelucrat pe controllers/todo.php -->
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
          <?php foreach($crud->select(Session::get('id')) as $rows) : ?>
            <tr>
              <th scope="row">#</th> <!-- $rows['num']  -->
              <td> <?= $rows['data']; ?> </td>
              <td> 

                <?php if(!($crud->selectdone($rows['id']) == 1)) { ?>

                  <strike><?= $rows['message']; ?></strike>

                <?php }else{ ?>
                  <?= $rows['message']; ?>
                <?php } ?>
              </td>
              <td>
                <form action="action" method="GET">
                  <button type="submit" name="edit" class="btn btn-sm btn-primary" value="<?= $rows['id']; ?>"><i class="far fa-edit"></i> edit</a> <!-- prelucrat pe controllers/action.php -->
                    <button type="submit" name="delete" class="btn btn-sm btn-danger" value="<?= $rows['id']; ?>"><i class="fas fa-trash-alt"></i>delete</a> <!-- prelucrat pe controllers/action.php -->
                    </form>
                  </td>
                  <th>
                    <form action="" method="GET">
                      <button type="submit" name="done" value="<?= $rows['id'] ?>" class="btn btn-primary btn-sm">Done</button>
                      <button type="submit" name="undone" value="<?= $rows['id'] ?>" class="btn btn-primary btn-sm">Undone</button>
                    </form>
                  </th>
                <?php endforeach; ?>

              </tr>
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

  
        <?php require 'partials/footer.php'; 
              require 'partials/modals.php';
        ?>