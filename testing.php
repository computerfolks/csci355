<html>
<head>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <meta charset="UTF-8">
</head>
<style>
#header{
color: white;
}
.input-category{
margin-top: 30px;
color: blue;
}
</style>
<body><h1 id = "header">Parsing by Jacob Weissman</h1>
<form action="parse.php" method="post">
    <p class = "input-category">source name:</p>
    <p><input type="text" name="source_name" required="true"></p>
    <p class = "input-category">source url:</p>
    <p><input type="text" class = "url" name="source_url" required="true"></p>
    <p class = "input-category">source begin (optional):</p>
    <p><input type="text" name="source_begin"></p>
    <p class = "input-category">source end (optional):</p>
    <p><input type="text" name="source_end"></p>
    <!--         <p><input type="text" name="source_name"/></p>-->
    <!--         <p><input type="text" name="source_url"/></p>-->
    <p class = "submit-btn"><input type="submit" value="Parse"/></p>
</form>
<?php
$source_name = $source_url = $source_begin = $source_end = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $source_name = test_input($_POST["source_name"]);
  $source_url = test_input($_POST["source_url"]);
  $source_begin = test_input($_POST["source_begin"]);
  $source_end = test_input($_POST["source_end"]);
  echo $source_name;
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
</body>
<style>
    .url{
        width: 50%;
    }
</style>
</html>
