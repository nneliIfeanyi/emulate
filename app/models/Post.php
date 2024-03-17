<?php
  class Post {
    private $db;
    
    public function __construct(){
      $this->db = new Database;
    }

    // Get All Posts
    public function getPosts(){
      $this->db->query("SELECT * FROM posts WHERE user_id = :id AND week = :week ORDER BY posts.created_at DESC;");
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':week', date('W'));
      $results = $this->db->resultset();

      return $results;
    }

     // Get All Posts With Limit
    public function getPosts2(){
      $this->db->query("SELECT * FROM posts WHERE user_id = :id AND week = :week ORDER BY posts.created_at DESC LIMIT 2;");
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':week', date('W'));
      $results = $this->db->resultset();

      return $results;
    }

     // Get sum of Expense
    public function getExpense(){
      $this->db->query("SELECT SUM(amount) FROM posts WHERE user_id = :id AND type = :type AND week = :week;");
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':type', 'expense');
      $this->db->bind(':week', date('W'));
      //Execute
      $row = $this->db->sumColumn();

      return $row;
      }

       // Get sum of income
    public function getIncome(){
      $this->db->query("SELECT SUM(amount) FROM posts WHERE user_id = :id AND type = :type AND week = :week;");
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':type', 'income');
      $this->db->bind(':week', date('W'));
      //Execute
      $row = $this->db->sumColumn();

      return $row;
      }
   


    // Get Post By ID
    public function getPostById($id){
      $this->db->query("SELECT * FROM posts WHERE id = :id");

      $this->db->bind(':id', $id);
      
      $row = $this->db->single();

      return $row;
    }

    // Add Post
    public function addPost($data){
      // Prepare Query
      $this->db->query('INSERT INTO posts (amount, user_id, caption, type, day, d_num, week, month, year) 
      VALUES (:amount, :user_id, :caption, :type, :day, :d_num, :week, :month, :year)');

      // Bind Values
      $this->db->bind(':amount', $data['amount']);
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':caption', $data['caption']);
      $this->db->bind(':type', $data['type']);
      $this->db->bind(':day', $data['day']);
      $this->db->bind(':d_num', $data['d_num']);
      $this->db->bind(':week', $data['week']);
      $this->db->bind(':month', $data['month']);
      $this->db->bind(':year', $data['year']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    

    // Update Post
    public function updatePost($data){
      // Prepare Query
      $this->db->query('UPDATE posts SET amount = :amount, caption = :caption, type = :type WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':amount', $data['amount']);
      $this->db->bind(':caption', $data['caption']);
      $this->db->bind(':type', $data['type']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Delete Post
    public function deletePost($id){
      // Prepare Query
      $this->db->query('DELETE FROM posts WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $id);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }