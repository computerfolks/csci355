<html>
<head>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <meta charset="UTF-8">
</head>
<body>
<table class = 'table table-dark'> <thead> <tr>
<th scope = 'col'>Source ID</th>
<th scope = 'col'>Source Name</th>
<th scope = 'col'>Source URL</th>
<th scope = 'col'>Source Begin</th>
<th scope = 'col'>Source End</th>
<th scope = 'col'>Parsed DTM</th>
<th scope = 'col'>Words</th>
</tr>
</thead> 
<tbody>
<?php
$servername = "mars.cs.qc.cuny.edu";
$username = "weja7251";
$password = "23907251";
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
//if ($conn->connect_error) {
    //die("Connection failed: " . $conn->connect_error);
//}
//echo "Connected successfully";
//collect all rows in the database
if ($result = mysqli_query($conn, "SELECT * FROM weja7251.src ORDER BY source_id")) {
  //echo "Returned rows are: " . mysqli_num_rows($result);
  while ($row=mysqli_fetch_row($result))
  {
	  echo "<tr>";
	    $current_source_id = "<td>" . $row[0] . "</td>";
	  echo $current_source_id;
	  $current_source_name = "<td>" . $row[1] . "</td>";
	  echo $current_source_name;
	  $current_source_url = "<td><a href = $row[2]>" . "Read Full Book" . "</a></td>";
	  echo $current_source_url;
	  $current_source_begin = "<td>" . $row[3] . "</td>";
	  echo $current_source_begin;
	  $current_source_end = "<td>" . $row[4] . "</td>";
	  echo $current_source_end;
	  $current_source_date = "<td>" . $row[5] . "</td>";
	  echo $current_source_date;
	  //$current_word_list = "<form action = 'wordlist.php' method = 'get'> <input type = 'submit' value = 'word list'> </form>";
	  $href = "wordlist.php/" . $row[0];
	  $current_word_list = "<td><a href = $href>word list</a></td>";
	  echo $current_word_list; 
	echo "</tr>";
    }
}
echo "</tbody> </table>";

?>
</body>
