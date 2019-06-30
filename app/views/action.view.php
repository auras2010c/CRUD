<?php require 'partials/head.php'; 
	  require 'partials/nav.php';
?>
<?php if(Input::exists()) :?>
  <div class="alert alert-warning text-center" role="alert">
    <?php foreach($crud->getmessage() as $errors) : ?>
      <strong><?= $errors.'<br>'; ?></strong>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<?php if(isset($_GET['edit'])): ?>

<div class="login-page">
  <div class="form">
    <form class="login-form" method="POST" action="">
      <p>You are going to edit this line, are you sure ?</p>
      <input type="text" name="todoedit" value="<?php echo $crud->selectedit($_GET['edit']);?>"/>
      <button name="submit">Yes, edit</button></br></br>
      <a href="todo">Close</button>
    </form>
  </div>
</div>

<?php endif; ?>


<?php if(isset($_GET['delete'])): ?>

<div class="login-page">
  <div class="form">
    <form class="login-form" method="POST" action="">
      <p>Are you sure you want to delete:</p>
      <p>(<?= $crud->selectedit($_GET['delete']) ?>) ?</p>
      <button name="submit">Yes, delete !</button><br><br>
      <a href="todo">Close</button>
    </form>
  </div>
</div>

<?php endif; ?>

<?php require 'partials/footer.php'; ?>