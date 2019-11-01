<?php
  if($this->session->get('CHAT_CONTR_KEY')->get_user_login_status())
  {    
    echo '<form action="PostComment" method="post" id="comment_form">
      <input type="text" name="comment" value="write your comment here!">
    <br>
      <input type="submit" value="submit your comment!">
    </form>';
  }

  // echo $row_all_comments;
  $row_all_comments = $this->session->get('CHAT_CONTR_KEY')->get_all_comments(0);

  foreach ($row_all_comments as &$row)
  {
    
    // $USERNAME_q = "SELECT user_name FROM user WHERE user_id = '" . $row[4] . "';";
    
    // $USERNAME_q_response = @mysqli_query($dbc, $USERNAME_q);
  
    // $row_USERNAME_q = mysqli_fetch_assoc($USERNAME_q_response);
    $row_USERNAME_q = $this->session->get('CHAT_CONTR_KEY')->get_username_for_id($row[4]);
    
    //echo $row;
    // $comment_row =  mysqli_fetch_assoc($row);
    // print_r($row);
    // echo $row[3];
    echo '<div class="comment_section">
    <div>';
    if($this->session->get('CHAT_CONTR_KEY')->get_user_login_status())
    {
      if($this->session->get('CHAT_CONTR_KEY')->get_user_id()===$row[4]){
      
        echo'<form action="DeleteComment" method="post">
        <input type="hidden" name="commentId" value="'.$row[0].'">
        <button>delete</button>
        </form>';
        
      }
    }
     
      echo '<p>User '.$row_USERNAME_q.' commented:</p>
    </div>
    <div>
      <p>'.$row[3].'</p>
      <p>Date: '.$row[1].'</p>
    </div>
    </div>';
  }
?>