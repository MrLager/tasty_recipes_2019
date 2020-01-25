<!-- add the header header  -->
<?php
#header("Expires: Mon, 26 Jul  05:00:00 GMT");
// header("Cache-Control: no-cache");
// header("Pragma: no-cache");
?>
<?php
    include_once(__DIR__ . '\..\resources\includes\header.php');
?>
<div id="container">
<?php
    $selected = array('no1','no2','selected');
    include_once(__DIR__ . '\..\resources\includes\nav.php');
?>

<div id="content">

<article>
  <h2><?php  echo $Headline; ?></h2>
    <img src="<?php echo $ImagePath;?>" alt="<?php echo 'a image of ' . $Headline;?> " width="300" height="300">
  <h3>Ingredients</h3>
  <ul>
  <?php
  for ($x = 0; $x < sizeof($Ingridients); $x++)
  {
    echo'<li>'.$Ingridients[$x].'</li>';
  }
  ?>
  </ul>
  <h3>Instructions</h3>
  <?php
  for ($x = 0; $x < sizeof($Instructions); $x++)
  {
    echo'<p>'.$Instructions[$x].'</p>';
  }
  ?>
  

<br>

<h3>Commentsection:</h3>

<?php
    $dish = 111;
    $dish_filename = __FILE__;
    include_once(__DIR__ . '\..\resources\includes\commentSection.php');
?>
</article>
<?php
    include_once(__DIR__ . '\..\resources\includes\footer.php');
?>
</div>
</div>

</body>
</html>