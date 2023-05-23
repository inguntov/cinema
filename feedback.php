<?php
require_once "db.php";

if ($_POST['name'] == 'ilya') {
header("Location: admin.php"); 
} 
else {
  if(!empty($_POST['name']) && !empty($_POST['last_name']) && !empty($_POST['tel']) )
    {
      $stmt = $pdo->prepare("INSERT INTO booking(name, last_name, tel) VALUES(?,?,?)");
      $stmt->execute([
      $_POST['name'],
      $_POST['last_name'],
      $_POST['tel']
      ]);
    }
};

header("Location: film_1.php");
?>