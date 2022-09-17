
<?php
$conn=mysqli_connect("localhost","root","");	
mysqli_select_db($conn,"trabalhoweb");
if($conn){
	echo "deu certo";
}
?>	
