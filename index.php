<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Test PHP</title>
  </head>
  <body>
    <h1>Friends</h1>

    <form class="" action="index.php" method="post">
      Name: <input type="text" name="name" value="Name">
      <input type="submit">
    </form>

    <?php
    $filename = 'friends.txt';
    $file = fopen($filename, "r");
    while (!feof($file)) {
      $name = fgets($file);
      echo "<li>$name</li>";
    }
    echo "lol";
     ?>
  </body>
</html>
