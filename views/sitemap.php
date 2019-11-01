<?php
#header("Expires: Mon, 26 Jul  05:00:00 GMT");
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
        <h2>Sitemap:</h2>
        <a href="IndexPage" title="Go to the home page">Home</a><br>
        <a href="CalenderPage" title="Go to the calender page">Calender</a><br>
        <p>Recipes</p>
            <a class="tab" href="RecipePage?recipe_id=0" title="Go to the meatball recipe">-Meatballs</a><br>
            <a class="tab" href="RecipePage?recipe_id=1" title="Go to the pancake recipe">-Pancaces</a><br>
        <a href="LoginPage" title="Go to the login page">Login</a><br>
        <a href="RegisterPage" title="Go to the register page">Register</a><br>
    </article>
</div>
   
</div>
<?php
    include_once(__DIR__ . '\..\resources\includes\footer.php');
?>
</body>
</html>