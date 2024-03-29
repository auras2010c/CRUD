<nav  class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="http://localhost/public/"><?= $querybuilder->selectfetch('settings', 'logo');?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="">Home<span class="sr-only">(current)</span></a>
      </li>
      <?php if(!Session::exists('id')) : ?>
      <li class="nav-item">
        <a class="nav-link" href="login">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register">Register</a>
      </li>
      <?php endif; ?>
        <a class="<?php if(Session::exists('id')) { ?> nav-link <?php }else{ ?> nav-link disabled <?php } ?>" href="todo">Todo APP</a>
      </li>
      <?php if(Session::exists('id')) : ?>
      <li class="nav-item">
        <a class="nav-link" href="logout">Logout</a>
      </li>
    <?php endif; ?>
    <?php if(Session::exists('id') && Session::exists('group') && Session::get('group') == 2):?>
      <li class="nav-item">
        <a class="nav-link" href="admin">Admin</a>
      </li>
    <?php endif; ?>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<!--nav-link disabled-->