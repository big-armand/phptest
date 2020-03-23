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

    <ul>

    <?php
    $filename = 'friends.txt';
    $file = fopen($filename, "a") or die("Unable to open file!");
    $new_name = $_POST[name];
    fwrite($file, $new_name . '\n');
    fclose($file);

    $file = fopen($filename, "r") or die("Unable to open file!");
    while (!feof($file)) {
      $name = fgets($file);
      echo "<li>$name</li>";
    }
    fclose($file);


     ?>
    </ul>
  </body>
</html>
