<?php
  class Post {
    private $db;
    
    public function __construct(){
      $this->db = new Database;
    }

    // // Get All Posts 
    public function getPosts(){
      $this->db->query("SELECT * FROM posts WHERE user_id = :id  ORDER BY posts.created_at DESC;");
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultset();
      return $results;
    }

    // Get last 7 recent Posts //
    public function getPosts_LIMIT_7(){
      $this->db->query("SELECT * FROM posts WHERE user_id = :id ORDER BY posts.created_at DESC LIMIT 7;");
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultset();
      return $results;
    }

     // Get sum of Expense
    public function getExpenseTotal_all(){
      $this->db->query("SELECT SUM(amount) FROM posts WHERE user_id = :id AND type = :type;");
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':type', 'expense');
      //Execute
      $row = $this->db->sumColumn();
      return $row;
    }

    // Get sum of Expense
    public function getIncomeTotal_all(){
      $this->db->query("SELECT SUM(amount) FROM posts WHERE user_id = :id AND type = :type;");
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':type', 'income');
      //Execute
      $row = $this->db->sumColumn();
      return $row;
    }








    public function get_added_rows(){
      $this->db->query("SELECT * FROM posts WHERE user_id = :id AND d_num = :day AND month = :month AND year = :year ORDER BY posts.created_at DESC;");
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':day', date('jS'));
      $this->db->bind(':month', date('M'));
      $this->db->bind(':year', date('Y'));
      $this->db->resultset();
      $rows = $this->db->rowCount();
      return $rows;
    }
    

     // Get All Posts for current day
    public function getPostsAll(){
      $this->db->query("SELECT * FROM posts WHERE user_id = :id AND d_num = :day AND month = :month AND year = :year ORDER BY posts.created_at DESC;");
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':day', date('jS'));
      $this->db->bind(':month', date('M'));
      $this->db->bind(':year', date('Y'));
      $results = $this->db->resultset();

      return $results;
    }

     // Get All Posts for current week //
    public function getCurrentWeek(){
      $this->db->query("SELECT * FROM posts WHERE user_id = :id AND week = :week AND year = :year ORDER BY posts.created_at DESC;");
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':week', date('W'));
      $this->db->bind(':year', date('Y'));
      $results = $this->db->resultset();

      return $results;
    }

     // Get All Posts for current week //
    public function getCurrentMonth(){
      $this->db->query("SELECT * FROM posts WHERE user_id = :id AND month = :month AND year = :year ORDER BY posts.created_at DESC;");
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':month', date('M'));
      $this->db->bind(':year', date('Y'));
      $results = $this->db->resultset();

      return $results;
    }

     public function getDistinctDate(){
      $this->db->query("SELECT DISTINCT(d_num) FROM posts WHERE user_id = :id;");
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultset();
      return $results;
    }
     public function getDistinctMonth(){
      $this->db->query("SELECT DISTINCT(month) FROM posts WHERE user_id = :id;");
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultset();
      return $results;
    }
     public function getDistinctWeek(){
      $this->db->query("SELECT DISTINCT(week) FROM posts WHERE user_id = :id;");
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultset();
      return $results;
    }

    public function getDistinctDay(){
      $this->db->query("SELECT DISTINCT(day) FROM posts WHERE user_id = :id;");
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultset();
      return $results;
    }

     public function getDistinctYear(){
      $this->db->query("SELECT DISTINCT(year) FROM posts WHERE user_id = :id;");
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultset();
      return $results;
    }

     // Fetch specific date
    public function getSpecificDate($id, $date, $month, $year){
      $this->db->query("SELECT * FROM posts WHERE user_id = :id AND d_num = :day AND month = :month AND year = :year ORDER BY posts.created_at DESC;");
      $this->db->bind(':id', $id);
      $this->db->bind(':day', $date);
      $this->db->bind(':month', $month);
      $this->db->bind(':year', $year);
      $results = $this->db->resultset();

      return $results;
    }
     // Fetch specific week
    public function getSpecificWeek($id, $week, $year){
      $this->db->query("SELECT * FROM posts WHERE user_id = :id AND week = :week AND year = :year ORDER BY posts.created_at DESC;");
      $this->db->bind(':id', $id);
      $this->db->bind(':week', $week);
      $this->db->bind(':year', $year);
      $results = $this->db->resultset();
      return $results;
    }
     // Get sum of Expense
    public function getExpense(){
      $this->db->query("SELECT SUM(amount) FROM posts WHERE user_id = :id AND type = :type AND d_num = :day AND month = :month AND year = :year;");
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':type', 'expense');
      $this->db->bind(':day', date('jS'));
      $this->db->bind(':month', date('M'));
      $this->db->bind(':year', date('Y'));
      //Execute
      $row = $this->db->sumColumn();

      return $row;
      }

       // Get sum of income
    public function getIncome(){
      $this->db->query("SELECT SUM(amount) FROM posts WHERE user_id = :id AND type = :type AND d_num = :day AND month = :month AND year = :year;");
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':type', 'income');
       $this->db->bind(':day', date('jS'));
      $this->db->bind(':month', date('M'));
      $this->db->bind(':year', date('Y'));
      //Execute
      $row = $this->db->sumColumn();

      return $row;
      }

   
    // Get sum of Expense for a selected date
    public function getExpenseDate($id, $date, $month, $year, $expense){
      $this->db->query("SELECT SUM(amount) FROM posts WHERE user_id = :id AND type = :type AND d_num = :day AND month = :month AND year = :year;");
      $this->db->bind(':id', $id);
      $this->db->bind(':type', $expense);
      $this->db->bind(':day', $date);
      $this->db->bind(':month', $month);
      $this->db->bind(':year', $year);
      //Execute
      $row = $this->db->sumColumn();

      return $row;
      }


      // Get sum of Expense for a selected date
    public function getIncomeDate($id, $date, $month, $year, $income){
      $this->db->query("SELECT SUM(amount) FROM posts WHERE user_id = :id AND type = :type AND d_num = :day AND month = :month AND year = :year;");
      $this->db->bind(':id', $id);
      $this->db->bind(':type', $income);
      $this->db->bind(':day', $date);
      $this->db->bind(':month', $month);
      $this->db->bind(':year', $year);
      //Execute
      $row = $this->db->sumColumn();

      return $row;
      }

      // Get sum of Expense for a selected week
    public function getExpenseWeek($id, $week, $year, $expense){
      $this->db->query("SELECT SUM(amount) FROM posts WHERE user_id = :id AND type = :type AND week = :week AND year = :year;");
      $this->db->bind(':id', $id);
      $this->db->bind(':type', $expense);
      $this->db->bind(':week', $week);
      $this->db->bind(':year', $year);
      //Execute
      $row = $this->db->sumColumn();

      return $row;
      }

       // Get sum of Income for a selected week
    public function getIncomeWeek($id, $week, $year, $income){
      $this->db->query("SELECT SUM(amount) FROM posts WHERE user_id = :id AND type = :type AND week = :week AND year = :year;");
      $this->db->bind(':id', $id);
      $this->db->bind(':type', $income);
      $this->db->bind(':week', $week);
      $this->db->bind(':year', $year);
      //Execute
      $row = $this->db->sumColumn();

      return $row;
      }


      // Get sum of Expense for current week
    public function getCurrentWeekExpense(){
      $this->db->query("SELECT SUM(amount) FROM posts WHERE user_id = :id AND type = :type AND week = :week AND year = :year;");
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':type', 'expense');
      $this->db->bind(':week', date('W'));
      $this->db->bind(':year', date('Y'));
      //Execute
      $row = $this->db->sumColumn();

      return $row;
      }


    // Get sum of Expense for current week
    public function getCurrentWeekIncome(){
      $this->db->query("SELECT SUM(amount) FROM posts WHERE user_id = :id AND type = :type AND week = :week AND year = :year;");
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':type', 'income');
      $this->db->bind(':week', date('W'));
      $this->db->bind(':year', date('Y'));
      //Execute
      $row = $this->db->sumColumn();

      return $row;
    }

      // Get sum of Expense for current week
    public function getCurrentMonthIncome(){
      $this->db->query("SELECT SUM(amount) FROM posts WHERE user_id = :id AND type = :type AND month = :month AND year = :year;");
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':type', 'income');
      $this->db->bind(':month', date('M'));
      $this->db->bind(':year', date('Y'));
      //Execute
      $row = $this->db->sumColumn();

      return $row;
    }

    public function getCurrentMonthExpense(){
      $this->db->query("SELECT SUM(amount) FROM posts WHERE user_id = :id AND type = :type AND month = :month AND year = :year;");
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':type', 'expense');
      $this->db->bind(':month', date('M'));
      $this->db->bind(':year', date('Y'));
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
      $this->db->query('UPDATE posts SET amount = :amount, caption = :caption, type = :type, day = :day, d_num = :d_num, week = :week WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':amount', $data['amount']);
      $this->db->bind(':caption', $data['caption']);
      $this->db->bind(':type', $data['type']);
      $this->db->bind(':day', $data['day']);
      $this->db->bind(':d_num', $data['date']);
      $this->db->bind(':week', $data['week']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    // Update Post
    public function addMore($data){
      // Prepare Query
      $this->db->query("UPDATE posts SET amount = :amount, caption = :caption, type = :type WHERE id = :id ");

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':amount', $data['amount']);
      $this->db->bind(':caption', $data['caption']);
      $this->db->bind(':type', $data['type']);
      // $this->db->bind(':d_num', $data['date']);
      // $this->db->bind(':week', $data['week']);
      
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


    public function deleteEmpty(){
      // Prepare Query
      $this->db->query("DELETE FROM posts WHERE caption = '' AND type = '' AND amount = '' ");

      // Bind Values
      //$this->db->bind(':id', $id);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

  }