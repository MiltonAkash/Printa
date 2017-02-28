<?php 

$to="mil10akash@gmail.com";
$subject="Feedback/Bug Report";
$from="Printa website";
$header="FROM:".$from;
mail($to,$subject,$_POST["text"],$header);



?>