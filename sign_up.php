<?php require 'header.php'?>
    <section class="signup-container">
        <div class="signup-img">
            <img src="images/guys.jpg">
        </div>
        <div class="signup-form">
            <form action="includes/insert_user.php" method="POST">
                <h1>Create an account</h1>
                <div>
                    <input type="text" name="first_name" placeholder="First name">
                    <input type="text" name="last_name" placeholder="Last name">
                </div>
                <input type="text" name="username" placeholder="Username">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="user_pass" placeholder="Password">
                <button>Create account</button>
                <?php
                if (isset($_GET['error'])) {
                    echo '<p class="errors">' . $_GET['error'] . '</p>';
                }
                ?>
            </form>
        </div>
    </section>
</body>
</html>