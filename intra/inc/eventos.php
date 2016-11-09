<?php 
/*$con = new mariamedebe;
$noticias = $con->runQuery("SELECT count(idnoticia) as id from noticias");

$item_per_page = 2;

//$results = mysqli_query($con, "SELECT COUNT(id_cliente) FROM clientes");
//$results->execute();
$get_total_rows = "";

//breaking total records into pages

foreach($noticias as $key=>$value){
	
	$get_total_rows = $noticias[$key]['id']; 
} 

$pages = ceil($get_total_rows/$item_per_page); */
?>
<div id="results"></div>
<div class="paging_link"></div>