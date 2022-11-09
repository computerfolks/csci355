<?php

$page = file_get_contents('http://stackoverflow.com/questions/ask');
echo $page;


//obtain text from the url
$dom = new DOMDocument('1.0');
@$dom->loadHTMLFile("https://gutenberg.org/cache/epub/132/pg132.txt");
$html = $dom->saveHTML();
echo $html;

?>
