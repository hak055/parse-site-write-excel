<?php
include_once('simple_html_dom.php');

// Создаем объект DOM на основе кода, полученного по ссылке
$html = file_get_html('http://superzapravka.ru/katalog');
// $html = file_get_html('http://superzapravka.ru/katalog/internet-magazin?action=rsrtme&catid=20000&offset=1620');



$news = $html->find("table tr");

foreach($news as $elem){
	echo $elem->first_child ()." | ".$elem->children (1)." | ".$elem->children (2)." | ".$elem->children (3)." | ".$elem->children (4)." | ".$elem->children (5)." | ".$elem->children (6)." | ".$elem->children (7)." | ".$elem->children (8)." | ".$elem->children (9)."<br>";
}