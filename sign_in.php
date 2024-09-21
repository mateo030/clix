<?php require 'header.php'?>
<body>
    <div class="acc-main">
        <form action="includes/login_user.php" method="POST">
            <div class="form-text">
                <h1>Hello</h1>
                <p>Sign in or<a href="sign_up.php"> create an account</a></p>
            </div>
            <input type="text" name='name' placeholder="Email or username">
            <input type="text" name='pass' placeholder="Password">
            <button>Continue</button>
            <?php
            if (isset($_GET['error'])) {
                echo '<p class="errors">' . $_GET['error'] . '</p>';
            }
            ?>
        </form>
    </div> 
    <?php require 'footer.php'?>
</body>
</html>