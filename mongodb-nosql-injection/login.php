<?php
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $qry = new MongoDB\Driver\Query([]);

    if(isset($_POST['login'])) {
      $postedUsername = $_POST['username'];
      $postedPassword = $_POST['password'];

      $filter = ['username' => $postedUsername, 'password' => $postedPassword];
      $query = new MongoDB\Driver\Query($filter);
      $rows = $mng->executeQuery('exploit.users', $query);
      $found_user = false;

      foreach ($rows as $row) {
        $found_user = true;
      }
    
      if($found_user == true) {
        echo "Login succeeded";
      } else {
        echo "Login failed";
      }
    } 
?>