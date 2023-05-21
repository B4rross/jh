<?php
    declare(strict_types = 1);
    require_once(__DIR__ .'/../database/session.class.php');
    require_once(__DIR__ .'/../database/user.class.php')
?>

<?php function drawEditProfileForm($user, Session $session) { ?>
    <?php         
    <form action = "../actions/action_editprofile.php" method = "post" id = "editProfile">
        <h1>Update Profile</h1>
        <input type = "text" placeholder = "<?=$user->name?>" id = "nameUpdate" name = "name" >
        <input type = "password" placeholder = "Enter new password" id = "passUpdate" name = "password" >
        <input type = "tel" placeholder = "<?=$user->phoneNumber?>" id = "phoneNumberUpdate" name = "phoneNumber" pattern = "9[0-9]{8}" >
        <input type = "text" placeholder = "<?=$user->address?>" id = "addressUpdate" name = "address" >
        
        <button type = "submit">Update Profile</button>
    </form>  
<?php } ?>