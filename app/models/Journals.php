<?php
  class Journals {
    private $db;
    
    public function __construct(){
      $this->db = new Database;
    }

    // Get All Posts
    public function getPosts(){
      $this->db->query("SELECT *, 
                        journal.id as postId, 
                        users.id as userId
                        FROM journal 
                        INNER JOIN users 
                        ON journal.user_id = users.id WHERE user_id = :id
                        ORDER BY journal.created_date DESC;");
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultset();

      return $results;
    }

    // Get Post By ID
    public function getPostById($id){
      $this->db->query("SELECT * FROM journal WHERE id = :id");

      $this->db->bind(':id', $id);
      
      $row = $this->db->single();

      return $row;
    }

    // Add Post
    public function addPost($data){
      // Prepare Query
      $this->db->query('INSERT INTO journal (title, user_id, body, date_, month, week, year, created_time) 
      VALUES (:title, :user_id, :body, :date_, :month, :week, :year, :created_time)');

      // Bind Values
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':body', $data['body']);
      $this->db->bind(':date_', $data['date_']);
      $this->db->bind(':month', $data['month']);
      $this->db->bind(':week', $data['week']);
      $this->db->bind(':year', $data['year']);
      $this->db->bind(':created_time', $data['created_time']);
      
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
      $this->db->query('UPDATE journal SET title = :title, body = :body, created_on = :created_on, edit_time = :edit_time WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':body', $data['body']);
      $this->db->bind(':created_on', $data['created_on']);
      $this->db->bind(':edit_time', $data['edit_time']);
      
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
      $this->db->query('DELETE FROM journal WHERE id = :id');

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