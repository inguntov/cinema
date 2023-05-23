<?php
require_once "db.php";
$stmt = $pdo->query("select * from booking");
$booking = $stmt->fetchAll();


$stmt = $pdo->query("select * from newsletter");
$newsletter = $stmt->fetchAll();
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
        <?php foreach ($booking as $key => $book) : ?>
          <tr>
            <td><?= $key + 1 ?></td>
            <td><?= htmlspecialchars($book['name']) ?></td>
            <td><?= htmlspecialchars($book['last_name']) ?></td>
            <td><?= htmlspecialchars($book['tel']) ?></td>
            <td><?= $book['created_at'] ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
      <br>
      <h2>Количество забронированных мест</h2>
      <p class="count">0</p>
      <br>
      <h2>Заявки на новостную рассылку</h2>
      <table border="1" style="border: 1px solid red;">
        <tr>
          <th>#</th>
          <th>Email</th>
          <th>Дата и время</th>
        </tr>
        <?php foreach ($newsletter as $key => $letter) : ?>
          <tr>
            <td><?= $key + 1 ?></td>
            <td><?= htmlspecialchars($letter['email']) ?></td>
            <td><?= $letter['created_at'] ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
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