<?php require 'includes/dbh.php'?>
<?php require 'header.php'?>
<body>
    <div class="breadcrumb background-pink">
        <p><a href="../index.php">Homepage /</a></p>
        <p><a>My account</a></p>
    </div>
    <section class="user-main">
      <div class="user-sidenav">
        <h1>Your Account</h1>
        <?php require 'user_aside.php'?>
      </div>
      <div class="user-content">
        <div>
          <h1>Account Settings</h>
        </div>
        <div>
        <p style="font-weight: bold;">Username</p>
        <p><?php if(isset($_SESSION['name'])) { echo $_SESSION['name']; }?></p>
        </div>
        <div>
        <p style="font-weight: bold;">First Name</p>
        <p><?php if(isset($_SESSION['first_name'])) { echo $_SESSION['first_name']; }?></p>
        </div>
        <div>
        <p style="font-weight: bold;">Last Name</p>
        <p><?php if(isset($_SESSION['last_name'])) { echo $_SESSION['last_name']; }?></p>
        </div>
        <div>
        <p style="font-weight: bold;">Email Address</p>
        <p><?php if(isset($_SESSION['email'])) { echo $_SESSION['email']; }?></p>
        </div>
      </div>
    </section>
</body>
<?php require 'footer.php'?>