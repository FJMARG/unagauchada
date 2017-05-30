<?php
function conectar(){
	$link = mysqli_connect("localhost", "root", "", "unagauchada") or die("Error " . mysqli_error($link));
	return $link;
}