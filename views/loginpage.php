<?php
#header("Expires: Mon, 26 Jul  05:00:00 GMT");
// header("Cache-Control: 500");
// header("Pragma: no-cache");
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
        <h2>Login</h2>
        
            <form method="post" action="login">
                
                USERNAME:<br>
                <input type="text" name="user_name" value="Username" data-bind="value: userName"> 
                <br>
                PASSWORD:<br>
                <input type="password" name="pass" value="Pass" data-bind="value: passWord">
                <br><br>
                <input type="button" value="Submit" id="loggin_btn" data-bind="click: logIn">
                <!-- <?php echo('<h3 class="error">'.$credentialsInvalid.'</h3>'); ?> -->
            </form>
    </article>
</div>
   
</div>
<?php
    include_once(__DIR__ . '\..\resources\includes\footer.php');
?>
</body>
</html>