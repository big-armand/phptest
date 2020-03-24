<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Test PHP</title>
  </head>
  <body>
    <h1>Friends</h1>

    <form class="" action="index.php" method="post">
      Name: <input type="text" name="name" value="">
      <input type="submit">
    </form>

    <ul>

    <?php

    $filter = $_POST["filter"];
    echo $filter;
    $filename = 'friends.txt';
    $file = fopen($filename, "a") or die("Unable to open file!");
    $new_name = $_POST["name"];
    if (strcmp($new_name, "") != 0)
      fwrite($file, $new_name . "\n");
    fclose($file);

    $file = fopen($filename, "r") or die("Unable to open file!");
    while (!feof($file)) {
      $name = fgets($file);
      if (strcmp($name, "") != 0) {
        if (strcmp($filter, "") != 0 || strcmp($filter, $name)) {
          echo "<li>" . $name . "</li>";
        }
      }
    }
    fclose($file);


     ?>
    </ul>

    <form class="" action="index.php" method="post">
      Filter: <input type="text" name="filter" value="">
      <input type="submit" value="Filter list">
    </form>

  </body>
</html>
