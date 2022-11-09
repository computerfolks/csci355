<html>
<head>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <meta charset="UTF-8">
</head>
<body>
<style>
p{
color: blue;
}
</style>
<?php
$servername = "mars.cs.qc.cuny.edu";
$username = "weja7251";
$password = "23907251";
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<p>Connected successfully to database</p>";

//date and time
//date_default_timezone_set('America/New_York');
//$date = date('m/d/Y h:i:s a', time())

$source_name = $source_url = $source_begin = $source_end = "";
  $source_name = "'" . test_input($_POST["source_name"]) . "'";
  $source_url = '"' . test_input($_POST["source_url"]) . '"';
  $source_begin = "'" . test_input($_POST["source_begin"]) . "'";
  $source_end = "'" . test_input($_POST["source_end"]) . "'";
  $source_temp_begin = test_input($_POST["source_begin"]);
  $source_temp_end = test_input($_POST["source_end"]);
  //echo $source_name;
  //echo $source_temp_begin;
function test_input($data) {
  //$data = trim($data);
  //$data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Query
$sql = "INSERT INTO weja7251.src (source_name, source_url, source_begin, source_end) VALUES ($source_name, $source_url, $source_begin, $source_end)";

if ($conn->query($sql) === TRUE) {
    echo "<p>Successful entry of source into source database</p>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
$conn = new mysqli($servername, $username, $password);
// Check connection
//if ($conn->connect_error) {
    //die("Connection failed: " . $conn->connect_error);
//}
//echo "Connected successfully";
//$page = file_get_contents('http://stackoverflow.com/questions/ask');
//echo $page;

//obtain text from the url
$dom = new DOMDocument('1.0');
//@$dom->loadHTMLFile("https://gutenberg.org/cache/epub/132/pg132.txt");
@$dom->loadHTMLFile(test_input($_POST["source_url"]));
$html = $dom->saveHTML();
//echo $html;
//echo $source_begin;
//echo $source_temp_begin;
//echo $source_temp_end;

//check if src begin and src end are there
if (empty($source_temp_begin)){
	//echo "begin empty";
} else {
	$split = explode($source_temp_begin, $html,2);
	$html =  $split[1];
	//echo $html;
	//echo $source_temp_begin;
}	
if (empty($source_temp_end)){
	//echo "end empty";
} else {
        $split = explode($source_temp_end, $html,2);
        $html =  $split[0];
        //echo $html;
        //echo $source_temp_end;
}

//remove punctuation
$html = preg_replace('#[^a-zA-Z0-9 ]#', ' ', $html);
$html = preg_replace('#[^a-zA-Z0-9]+#', ' ', $html);
$html = str_replace('z 365', 'zu', $html);
$html = strtoupper($html);
//echo $html;

//turn into array
$wordlist = explode(' ', $html);
foreach ($wordlist as $word){
//echo "1";
}

//check for frequency
for ($i = 0; $i < count($wordlist); $i++){
	if (array_key_exists($wordlist[$i], $map)){
	// When key exists then update value
		$map[$wordlist[$i]] = $map[$wordlist[$i]] + 1;
	} else {
		// Add new element
		$map[$wordlist[$i]] = 1;
	}
}

//get current source_id
//$sql = "SELECT source_id FROM weja7251.src ORDER BY source_id DESC LIMIT 1";
//echo $sql;
//$current_source_id = mysqli_query($conn, $sql);
//$result = $conn->query($sql);
//$current_source_id = mysqli_num_rows($result["source_id"]);
//if ($result->num_rows > 0) {
  // output data of each row
  //while($row = $result->fetch_assoc()) {
    //$current_source_id = $row["source_id"]
  //}
//} 
//echo $current_source_id;
if ($result = mysqli_query($conn, "SELECT source_id FROM weja7251.src ORDER BY source_id DESC LIMIT 1")) {
  //echo "Returned rows are: " . mysqli_num_rows($result);
  while ($row=mysqli_fetch_row($result))
    {
	    $current_source_id = "'" . $row[0] . "'";
	    //echo $current_source_id;
    }
}
//echo $result
//add each occurance to database
foreach(array_keys($map) as $key){
	//echo $key . " " . $map[$key];
	$freq = $map[$key];
	$word = "'" . $key . "'";
	// Query
	$newstatement = "INSERT INTO weja7251.ocrthree (source_id, word, freq) VALUES ($current_source_id, $word, $freq)";
	//echo $newstatement;
	$sql = $newstatement;
	if ($conn->query($sql) === TRUE) {
    		//echo "New record created successfully";
	} else {
    		//echo "Error: " . $sql . "<br>" . $conn->error;
}
	
}



    //$anchors = $dom->getElementsByTagName('a');
    //for each ($anchors as $element){
	    //$href = $element->getAttribute('href');
	    //echo $href;
	//}
    //$pres = $dom->getElementsByTagName('pre');
//echo $pres->saveHTML();

//echo "Hello james";
//$content=file_get_contents($source_url);
//echo "<p>" . "$content" . "</p>";

//$page = fopen($source_url);
//or
//$page = file_get_contents($source_url);

//echo $page;


$conn->close();
?>
</body>
