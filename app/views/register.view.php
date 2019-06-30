<?php require 'partials/head.php'; 
require 'partials/nav.php';
?>
<?php if(Input::exists()) :?>
  <div class="alert alert-warning text-center" role="alert">
    <?php foreach($validate->errors() as $errors) : ?>
      <strong><?= $errors.'<br>'; ?></strong>
    <?php endforeach; ?>
    <?php foreach($querybuilder->successmessages() as $msgs) : ?>
      <strong><?= $msgs; ?></strong>
    <?php endforeach; ?>
  </div>
<?php endif; ?>


<div class="login-page">
  <div class="form">
    <form class="login-form" method="POST" action="">
      <input type="text" name="name" placeholder="Your name"/>
      <input type="text" name="username" placeholder="Username"/>
      <input type="password" name="password" placeholder="Password"/>
      <input type="text" name="email" placeholder="Email address"/>
      <button name="submit">create</button>
      <p class="message">Already registered? <a href="login">Sign In</a></p>
    </form>
  </div>
</div>


<?php require 'partials/footer.php'; ?>