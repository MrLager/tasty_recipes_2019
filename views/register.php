<?php
#header("Expires: Mon, 26 Jul  05:00:00 GMT");
// header("Cache-Control: max-age=500");
#header("Pragma: no-cache");
?>
<?php
    include_once(__DIR__ . '\..\resources\includes\header.php');
?>
<div id="container">
<?php
    $selected = array('no0','no1','no2', 'reg');
    include_once(__DIR__ . '\..\resources\includes\nav.php');
?>
<div id="content">
    <article>
        <h2>Register as a new user</h2>
        
        <form method="post" action="RegisterEntered">
                
                <br>
                <br>
                EMAIL:<br>
                <input type="text" name="email" value="Email">
                <br>
                <br>
                USERNAME:<br>
                <input type="text" name="user_name" value="Username">
                <?php echo('<h3 class="error">'.$userNameExist.'</h3>'); ?>
                <br>
                PASSWORD:<br>
                <input type="text" name="pass" value="Pass">
                <br><br>
                <input type="submit" value="Register !" id="loggin_btn">
            </form>
    </article>
</div>
   
</div>
<?php
    include_once(__DIR__ . '\..\resources\includes\footer.php');
?>
</body>
</html>