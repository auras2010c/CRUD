<?php require 'partials/head.php'; 
      require 'partials/nav.php';
?>

<?php if(Input::exists()) :?>
  <div class="alert alert-warning text-center" role="alert">
    <?php foreach($validate->errors() as $errors) : ?>
      <strong><?= $errors.'<br>'; ?></strong>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<div class="login-page">
  <div class="form">
    <form class="login-form" action="" method="POST">
      <input type="text" name="username" placeholder="username"/>
      <input type="password" name="password" placeholder="password"/>
      <button name='submit'>login</button>
      <p class="message">Not registered? <a href="register">Create an account</a></p>
    </form>
  </div>
</div>
<?php require 'partials/footer.php'; ?>