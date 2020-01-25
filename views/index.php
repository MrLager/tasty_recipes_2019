<?php
#header("Expires: Mon, 26 Jul  05:00:00 GMT");
// header("Cache-Control: max-age=100");
#header("Pragma: no-cache");
?>

<!-- add the header header  -->
<?php
    include_once(__DIR__ . '\..\resources\includes\header.php');
?>
<div id="container">
<?php
    $selected = array('selected','no1','no2');
    include_once(__DIR__ . '\..\resources\includes\nav.php');
?>
    
<div id="content">
    <article>
        <h2>Welcome to Tasty Recipes!</h2>
        <img src="../../resources/images/food_calender_promo.png" alt="picture of the food calender">
        <p>Checkout the awesome meal <a href=calender.html title="Go to the calender page!">calendar page</a>. Here you will find daily recipes for super-nutricious, super-delish food.</p>
    </article>

   

<?php
    include_once(__DIR__ . '\..\resources\includes\footer.php');
?>
</div>
</div>
</body>
</html>