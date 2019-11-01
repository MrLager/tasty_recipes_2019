<?php
namespace TastyRecipes\Integration;

class CommentStore
{
  private $all_comments_querry; 
  private $delete_querry;
  private $comment_querry;

  // $comments_user_query = "SELECT username FROM comments;";
  // $x_response = @mysqli_query($dbc, $all_comments_querry);
  // $comments_comment_query = "SELECT comment from comments;";

  // $x = mysqli_fetch_assoc($x_response);
  // echo $x[0];
  
  public function __construct()
  {
    $this->all_comments_querry = "SELECT * FROM comments WHERE dish_id = ? ";
    $this->delete_querry = "DELETE FROM comments WHERE comment_id = ? ";
    $this->comment_querry = "INSERT INTO comments (dish_id, comment, user_id) VALUES ( ? , ? , ? )";
    $this->last_comment_querry = "SELECT * FROM comments WHERE dish_id = ? ORDER BY comment_id DESC LIMIT 1";
  }

  public function get_all_comments($dishId)
  { 
    return (new DatabaseConnection())->querry($this->all_comments_querry, array('i', $dishId));
  }

  public function delete_comment($commentId)
  {
    (new DatabaseConnection())->querry($this->delete_querry, array('i', $commentId));
  }

  public function write_comment($dishId, $comment, $userId)
  {
    (new DatabaseConnection())->querry($this->comment_querry, array('isi', $dishId, $comment, $userId));
  }

  public function get_latest_comment($dishId)
  { 
    return (new DatabaseConnection())->querry($this->last_comment_querry, array('i', $dishId))[0];
  }
}