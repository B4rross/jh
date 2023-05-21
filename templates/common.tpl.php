<?php declare(strict_types = 1);?>

<?php function drawFooter() { ?>
    </main>
    
    <footer>
        Ticketopia
    </footer>
</body>
</html>
<?php } ?>

<?php function drawLoginForm() { ?>
    <form action = "../actions/action_login.php" method = "post" class = "login">
        <input type = "email" name = "email" placeholder = "Email">
        <input type = "password" name = "password" placeholder = "Password">
        <button type = "submit" class="fa-solid fa-arrow-right-to-bracket arrowLogin"></button> 
    </form>
    <a href = '../pages/signup.php' class = "signupMainMenu">Signup</a>
<?php } ?> 

<?php function drawLogoutForm() { ?>
    <a class = "LogOutButton" href = "../actions/action_logout.php">Logout</a>
<?php }?>

<?php function drawRegisterForm() { ?>
    <form action = "../actions/action_signup.php" method = "post" id = "register">
        <h1>Signup</h1>
        <input type = "text" placeholder = "Enter name" id = "nameReg" name = "name" required>
        <input type = "text" placeholder = "Enter username" id = "nameReg" name = "username" required>
        <input type = "email" placeholder = "Enter email" id = "emailReg" name = "email" required>
        <input type = "password" placeholder = "Enter password" id = "passReg" name = "password" required>
        <button type = "submit" id= regButton name = "register">Signup</button>
    </form>    
<?php } ?>

<?php function drawEditProfileButton() { ?>
    <form action = "../pages/editProfile.php">
        <button type = "submit" class='fa-regular fa-user-circle-o' id = "profileButton"></button>
    </form>
<?php } ?>