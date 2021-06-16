<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/employee/index.php"><img class="nav-item rounded-circle border border-info " src="/employee/img/login.png" alt="Employee" width="40" height="40"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/employee/home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/employee/insert.php">Insert</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/employee/account.php">Account</a>
      </li>
      
    </ul>
     <img class="nav-item rounded-circle border border-info" src="/employee/img/<?php echo $_SESSION['img']; ?>" alt="" width="40" height="40">
    <p  class="nav-item my-2 mx-3 text-light" > Hello - <?php echo strtoupper($_SESSION['user']);?></p>
    <a class="btn btn-outline-danger mx-3" href="/employee/partials/_logout.php" role="button">Logout</a>
  </div>
</nav>