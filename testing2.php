<html>
<head>
    <link rel="stylesheet" href="assignment3.css">
    <meta charset="UTF-8">
</head>
<body><h1>Parsing by Jacob Weissman</h1>
<form action="http://localhost:5000/parse.php" method="post">
    <p>source name:</p>
    <p><input type="text" name="source_name" required="true"></p>
    <p>source url:</p>
    <p><input type="text" class = "url" name="source_url" required="true"></p>
    <p>source begin (optional):</p>
    <p><input type="text" name="source_begin" required="false"></p>
    <p>source end (optional):</p>
    <p><input type="text" name="source_end" required="false"></p>
    <!--         <p><input type="text" name="source_name"/></p>-->
    <!--         <p><input type="text" name="source_url"/></p>-->
    <p><input type="submit" value="Parse"/></p>
</form>
<?php
$source_name = $source_url = $source_begin = $source_end = "";
<!--if ($_SERVER["REQUEST_METHOD"] == "POST") {-->
<!--  $source_name = test_input($_POST["source_name"]);-->
<!--  $source_url = test_input($_POST["source_url"]);-->
<!--  $source_begin = test_input($_POST["source_begin"]);-->
<!--  $source_end = test_input($_POST["source_end"]);-->
<!--  echo $source_name;-->
<!--}-->
<!--function test_input($data) {-->
<!--  $data = trim($data);-->
<!--  $data = stripslashes($data);-->
<!--  $data = htmlspecialchars($data);-->
<!--  return $data;-->
<!--}-->
>
</body>
<style>
    .url{
        width: 50%;
    }
</style>
</html>
