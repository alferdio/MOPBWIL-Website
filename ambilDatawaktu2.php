<?php  
	$koneksi = mysqli_connect('localhost', 'root', '', 'mobwil');
	$query = "SELECT * FROM jaraksensor2 GROUP BY id_jarak DESC LIMIT 10";
	$result = mysqli_query($koneksi,$query);
	//var_dump($result);
	$arr = array();
	while($row = mysqli_fetch_assoc($result)){
		$arr[] = $row['waktu'];
	}

	echo json_encode(array_reverse($arr));
?>