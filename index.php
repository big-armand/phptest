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
    $filename = 'friends.txt';
    $arr = array();

    $file = fopen($filename, "r") or die("Unable to open file!");
    while (!feof($file)) {
      $name = fgets($file);
      if (strcmp($name, "")) {
        $arr[] = $name;
      }
    }
    fclose($file);

    $new_name = $_POST["name"];
    if (strcmp($new_name, "") != 0)
      $arr[] = $new_name;


    if (isset($_POST["delete"])) {
      unset($arr[$_POST["delete"]]);
      $arr = array_values($arr);
    }


    $file = fopen($filename, "w") or die("Unable to open file!");
    foreach ($arr as $key => $value) {
      fwrite($file, $value);
    }
    fclose($file);

    echo "<form action=\"index.php\" method=\"post\">";
    foreach ($arr as $key => $name) {
      if (strcmp($name, "") != 0) {
        if (strcmp($filter, "") == 0) {
          echo "<li>" . $name . "<button type='submit' name='delete' value='$key'>Delete</button></li>";
        }
        elseif ($_POST["startingWith"]) {
          if (strpos($name, $filter) === 0)
            echo "<li>" . $name . "<button type='submit' name='delete' value='$key'>Delete</button></li>";
        }
        elseif (strstr($name, $filter) != false) {
          echo "<li>" . $name . "<button type='submit' name='delete' value='$key'>Delete</button></li>";
        }
      }
    }
    echo "</form>"

     ?>
    </ul>

    <form class="" action="index.php" method="post">
      Filter: <input type="text" name="filter" value="">
      <input type="checkbox" name="startingWith" <?php if ($startingWith=='TRUE') echo "checked"?> value="TRUE">Only names starting with</input>
      <input type="submit" value="Filter list">
    </form>

  </body>
</html>
