<script src="../../resources/javaScript/commentSection.js"></script>
<form id="comment_form" data-bind="visible: commentvisability, submit: storeComment">
    <input type="text" value="write your comment here!" data-bind="value: commentEntered, valueUpdate: 'afterkeydown'">
    <br>
    <input type="submit" value="submit your comment!">
</form>

<div data-bind="foreach: comments">
<!-- <ul data-bind="foreach: comments">
    <li>
        Name at position <span data-bind="text: user_id"> </span>:
         <span data-bind="text: name"> </span> 
        <a href="#" data-bind="click: $parent.removePerson">Remove</a> 
    </li>
</ul> -->
<div class="comment_section">
    <div>
    <!-- if($this->session->get('CHAT_CONTR_KEY')->get_user_login_status())
    {
      if($this->session->get('CHAT_CONTR_KEY')->get_user_id()===$row[4]){ -->

        <form action="DeleteComment" method="post">
        <button data-bind="click: $parent.deleteComment, visible: $parent.userInfo()['id'] == user_id && $parent.commentvisability()">delete</button> 
     
        </form> 


        <!--  echo(userInfo['id']); -->
         <!-- <input type="hidden" name="commentId" value="'.$row[0].'"> -->
        <!--
     
        
      }
    } -->
    
    <p>User <span data-bind="text: user_name"> </span> commented:</p>
    <p>Date:<span data-bind="text: date_entered"></p>
    </div>
    <div>
    <span data-bind="text: comment">
   
    </div>
    </div>
    </div>
<!--  
  $row_all_comments = $this->session->get('CHAT_CONTR_KEY')->get_all_comments(0);

  foreach ($row_all_comments as &$row)
  {
    
   
    $row_USERNAME_q = $this->session->get('CHAT_CONTR_KEY')->get_username_for_id($row[4]);
    
 
    <div class="comment_section">
    <div>
    if($this->session->get('CHAT_CONTR_KEY')->get_user_login_status())
    {
      if($this->session->get('CHAT_CONTR_KEY')->get_user_id()===$row[4]){
      
        <form action="DeleteComment" method="post">
        <input type="hidden" name="commentId" value="'.$row[0].'">
        <button>delete</button>
        </form>
        
      }
    }
     
    <p>User '.$row_USERNAME_q.' commented:</p>
    </div>
    <div>
    <p>'.$row[3].'</p>
    <p>Date: '.$row[1].'</p>
    </div>
    </div>
  }
?> -->