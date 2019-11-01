<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="header" id="head">
<button class="openbtn" onclick="openNav()">&#9776;</button>
    <h1><a href="IndexPage" style="text-decoration: none; letter-spacing: 3px; color:inherit">Tasty Recipes</a></h1>
    <ul class="main_menu">
        <li class="nav_links"><a id=<?php echo$selected[0]; ?> href="IndexPage">Home</a></li>
        <li class="nav_links"><a id=<?php echo$selected[1]; ?> href="CalenderPage">Calender</a></li>
        <!--@todo: add arrow to indicate when recepis is shown or not -->
        <li class="nav_links" data-bind="event: { mouseover: function(data, event){enableDropdown(data, event, $element);}, mouseout: disableDropdown40}"><a id=<?php echo$selected[2]; ?>>Recipes <i class="fa fa-caret-down"></i></a></li>

        <li class="login_button">
        <button id="logg_in" data-bind="text: loggedIn, click: logginAction"></button>
        <!-- <form id="register_form" data-bind="visible: register" action="RegisterPage"> -->
        <!-- <button id="register_btn" action="RegisterPage">Register</button> -->
        <!-- </form> -->
        <?php
            if($this->session->get('CHAT_CONTR_KEY')->get_user_login_status())
            {        
                // echo
                // '<form action="logout" method="post"> 
                // <button id="logg_in">Logg out</button>
                // </form>';
            }
            else
            {
                // echo '<button onclick="showLogginForm()" id="logg_in">Logg in</button><form id="register_form" action="RegisterPage">';
                if($selected[3]!='reg')
                {
                    echo ' <form id="register_form" data-bind="visible: register" action="RegisterPage">
                    <button id="register_btn" action="RegisterPage">Register</button>
                    </form>';
                }
                // echo'</form>';
            }
        ?>

            <div id="logg_in_form" data-bind="visible: showLoginForm"> 
            <!-- <button onclick="showLogginForm()" id="close_logg_in">x</button> -->
            <button data-bind="click: logginAction" id="close_logg_in">x</button>
            <form method="post" action="login">
                
                USERNAME:<br>
                <input type="text" name="user_name" value="Username" data-bind="value: userName"> 
                <br>
                PASSWORD:<br>
                <input type="password" name="pass" value="Pass" data-bind="value: passWord">
                <br><br>
                <input type="button" value="Submit" id="loggin_btn" data-bind="click: logIn">
                <?php echo('<h3 class="error">'. $credentialsInvalid. '</h3>'); ?>
            </form>
            </div>
        
        </li>
    </ul>
    <div class="clear"></div>
</div>
<div id="dropdown_menu" data-bind="visible: dropdownEnabled, event:{mouseover: function(data, event){enableDropdown(data, event, $element);}, mouseout: disableDropdown}"> 
        <ul>
        <a href="RecipePage?recipe_id=0"><li><img src="../../resources/images/meatballs.jpg" alt="random picture found on hardrive"></li></a>
        <a href="RecipePage?recipe_id=1"><li><img src="../../resources/images/pancake.jpeg" alt="random picture found on hardrive"></li></a>
            <li><img src="../../resources/images/more_recipes.png" alt="random picture found on hardrive"></li>
            <li><img src="../../resources/images/more_recipes.png" alt="random picture found on hardrive"></li> 
            <li><img src="../../resources/images/more_recipes.png" alt="random picture found on hardrive"></li> 
            <li><img src="../../resources/images/more_recipes.png" alt="random picture found on hardrive"></li> 
            <li><img src="../../resources/images/more_recipes.png" alt="random picture found on hardrive"></li> 
            <li><img src="../../resources/images/more_recipes.png" alt="random picture found on hardrive"></li> 
            <li><img src="../../resources/images/more_recipes.png" alt="random picture found on hardrive"></li> 
            <li><img src="../../resources/images/more_recipes.png" alt="random picture found on hardrive"></li> 
            <li><img src="../../resources/images/more_recipes.png" alt="random picture found on hardrive"></li> 
            <li><img src="../../resources/images/more_recipes.png" alt="random picture found on hardrive"></li> 
            <li><img src="../../resources/images/more_recipes.png" alt="random picture found on hardrive"></li> 
            <li><img src="../../resources/images/more_recipes.png" alt="random picture found on hardrive"></li> 
            <li><img src="../../resources/images/more_recipes.png" alt="random picture found on hardrive"></li> 
            <li><img src="../../resources/images/more_recipes.png" alt="random picture found on hardrive"></li> 
            <li><img src="../../resources/images/more_recipes.png" alt="random picture found on hardrive"></li> 
            <li><img src="../../resources/images/more_recipes.png" alt="random picture found on hardrive"></li> 
            <li><img src="../../resources/images/more_recipes.png" alt="random picture found on hardrive"></li> 
            <li><img src="../../resources/images/more_recipes.png" alt="random picture found on hardrive"></li> 
            <li><img src="../../resources/images/more_recipes.png" alt="random picture found on hardrive"></li> 
            <li><img src="../../resources/images/more_recipes.png" alt="random picture found on hardrive"></li>  
          <!-- @todo: something needs to hadle the recipes that goes outside the browser window "overflow" -->
        </ul>
    <div class="clear"></div>    
</div>

<!-- mobile friendly meny -->
<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a id=<?php echo$selected[0]; ?> href="IndexPage">Home</a>
  <a class="nav_links"><a id=<?php echo$selected[1]; ?> href="CalenderPage">Calender</a>
  <button class="dropdown-btn" data-bind="click: showDropdownMobileMenuFunc">Recipes
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container" data-bind="visible: showDropdownMobileMenu">
  <a href="RecipePage?recipe_id=0"><li>meatballs</li></a>
  <a href="RecipePage?recipe_id=1"><li>pancakes</li></a>
  </div>
  <a href="LoginPage" data-bind="text: loggedIn, click: function(data, event){logginAction(data, event, true);}"></a>
  <a href="RegisterPage">Register</a>
</div>

<!-- <div id="main">
 
  <h2>Collapsed Sidebar</h2>
  <p>Content...</p>
</div> -->