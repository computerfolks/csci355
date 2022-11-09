<html>
<head>
	<meta charset="UTF-8">
</head>
<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat&display=swap');
*{
  box-sizing: border-box;
  margin:0;
  padding:0;
  font-family: "Monseratt", sans-serif;
}

html{
  background-color: #222629;
}
section h2 h1{
  font-family: "Monseratt", sans-serif;
  text-align: center;
  height: 200px;
  color: white;
  font-size: 20px;
}

ul {
  list-style-type: none;
  overflow: hidden;
}

.dropdown {
  float: left;
  text-align: center;
}
a {
  text-align: center;
}

.dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 15px;
  text-decoration: none;
}

li a:hover{
  background-color: #34495e;
}

.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
.dropdown-content a {
  color: grey;
  padding: 14px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #eeeeee;}

.dropdown:hover .dropdown-content {
  display: block;
}

/*Contact.html*/
.contact-section{
  background-size:cover;
  background: #222629;
  padding: 40px 0;
}

.contact-section h1{
  text-align: center;
  color: #E0E0E0;
}

.border{
  width:100px;
  height: 10px;
  background: #34495e;
  margin: 40px auto;
}

.contact-form{
  max-width: 600px;
  margin: auto;
  padding: 0 10px;
  overflow: hidden;
}

.contact-form-text{
  display: block;
  width: 100%;
  box-sizing border-box;
  margin: 16px 0;
  border: 0;
  background: #111;
  padding: 20px 40px;
  outline: none;
  color: #ddd;
  transition: 0.5s;
}

.contact-form-text:hover{
  box-shadow: : 0 0 10px 4px #34495e;
}

textarea.contact-form-text{
  resize: none;
  height:120px;
}
.contact-form-btn{
  float: right;
  border: 0;
  background: #34495e;
  padding: 12px 50px;
  border-radius: 20px;
  cursor: pointer;
  transition: 0.5s;
}

.contact-form-btn:hover{
  background: #2980b9;
}

th, td{
  color: white;
  text-align: center;
}

th{
        color: blue;
        width: 200px;
}

a{
        color: green;
}

tr, th{
  height: 100px;
}

#developer{
  margin-bottom: 1200px;
  color: white;
}

#contact{
  margin-bottom: 1200px;
  color: white;
}

.margin-top-1200{
  margin-top: 1200px;
}
#header{
text-align: center;
color: white;
}

</style
<body>	
<h1 id = "header">Src ID: <?php
echo basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); ?></h1>
<table class = 'table table-dark'> <thead> <tr>
<th scope = 'col'>Word</th>
<th scope = 'col'>Frequency</th>
<th scope = 'col'>%</th>
</tr>
</thead>
<tbody>
<?php
$servername = "mars.cs.qc.cuny.edu";
$username = "weja7251";
$password = "23907251";
// Create connection
$conn = new mysqli($servername, $username, $password);
//get sum of all word counts
$result = mysqli_query($conn, 'SELECT SUM(freq) 
	AS value_sum 
FROM weja7251.ocrthree 
WHERE source_id = ' . basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
//echo $sum;
$querysql = "SELECT * FROM weja7251.ocrthree WHERE (source_id = " . basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) . ")" . "ORDER BY freq DESC";
//echo $querysql;
if ($result = mysqli_query($conn, $querysql)) {
  //echo "Returned rows are: " . mysqli_num_rows($result);
  while ($row=mysqli_fetch_row($result))
  {
	  //strcmp($row[2], "DOCTYPE") == 0
	  if (!empty($row[2]) && strcmp($row[2], "DOCTYPE") != 0 && strcmp($row[2], "HTML") != 0){
          echo "<tr>";
            $current_source_id = "<td>" . $row[2] . "</td>";
          echo $current_source_id;
          $current_source_name = "<td>" . $row[3] . "</td>";
          echo $current_source_name;
          $current_source_url = "<td>" . (100 * $row[3])/$sum . "%</td>";
          echo $current_source_url;
          //$current_source_begin = "<td>" . $row[3] . "</td>";
          //echo $current_source_begin;
          //$current_source_end = "<td>" . $row[4] . "</td>";
          //echo $current_source_end;
          //$current_source_date = "<td>" . $row[5] . "</td>";
          //echo $current_source_date;
          //$current_word_list = "<form action = 'wordlist.php' method = 'get'> <input type = 'submit' value = 'word list'> </form>";
	  echo "</tr>";
	  }
    }
}
echo "</tbody> </table></body>";
?>
