<?php
#header("Expires: Mon, 26 Jul  05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");
?>

<!-- add the header header  -->
<?php
    include_once(__DIR__ . '\..\resources\includes\header.php');
?>
<div id="container">
<?php
    $selected = array('no1','selected','no2');
    include_once(__DIR__ . '\..\resources\includes\nav.php');
?>

<div id="content">
<h2>Calender:</h2>
<table>

<tr>
    <th colspan="7">Oktober 2019</th>
</tr>

<tr>
    <th>Su</th>
    <th>Mo</th>
    <th>Tu</th>
    <th>We</th>
    <th>Th</th>
    <th>Fr</th>
    <th>Sa</th>
</tr>

<tr>
    <td>1</td>
    <td>2</td>
    <td>3</td>
    <td>4</td>
    <td>5</td>
    <td>6
        <a href="RecipePage?recipe_id=1" title="Go to the pancake recipe!">
            <img src="../../resources/images/pancake.jpeg" alt="pancake" width="35" height="35">
        </a>
    </td>
    <td>7</td>
</tr>

<tr>
    <td>8</td>
    <td>9</td>
    <td>10</td>
    <td>11</td>
    <td>12</td>
    <td>13</td>
    <td>14</td>
</tr>

<tr>
    <td>15</td>
    <td>16</td>
    <td>17</td>
    <td>18</td> 
    <td>19
        <a href="RecipePage?recipe_id=0" title="Go to the meatball recipe!">
            <img src="../../resources/images/meatballs.jpg" alt="meatballs" width="35" height="35">
        </a>
    </td>
    <td>20</td>
    <td>21</td>
</tr>

<tr>
    <td>22</td>
    <td>23</td>
    <td>24</td>
    <td>25</td>
    <td>26</td>
    <td>27</td>
    <td>28</td>
</tr>

<tr>
    <td>29</td>
    <td>30</td>
    <td>31</td>

</tr>

</table>


</div>
</div>
<?php
    include_once(__DIR__ . '\..\resources\includes\footer.php');
?>
</body>
</html>