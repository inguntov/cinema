<?php
require_once "db.php";
$stmt = $pdo->query("select * from booking");
$messages = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/normalize.css">
  <link rel="stylesheet" href="./css/main.css">
  <title>Admin</title>
</head>

<body>
  <div class="container-admin">
    <div class="admin">
    <h2>Сообщения</h2>
    <table border="1" style="border: 1px solid red;">
      <tr>
        <th>#</th>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>Телефон</th>
        <th>Дата и время</th>
      </tr>
      <?php foreach ($messages as $key => $message) : ?>
        <tr>
          <td><?= $key + 1 ?></td>
          <td><?= htmlspecialchars($message['name']) ?></td>
          <td><?= htmlspecialchars($message['last_name']) ?></td>
          <td><?= htmlspecialchars($message['tel']) ?></td>
          <td><?= $message['created_at'] ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
    <br>
    <p class="count">0</p>
</div>
  </div>
  <script>
    let i = document.querySelector(".count");
    console.log(i);
    let neme = localStorage.getItem('testName');
    console.log(neme);
    i.textContent = neme
    
  </script>
</body>

</html>