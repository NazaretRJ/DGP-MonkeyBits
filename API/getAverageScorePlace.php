<?PHP
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
$hostname="localhost";
$database="routability";
$username="luis";
$password="12345";
$json=array();
	if(isset($_GET["IdPlace"])){
		$IdPlace = $_GET['IdPlace'];

		$connection=mysqli_connect($hostname,$username,$password,$database);
		
		//$sql="SELECT IdRoute FROM favoriteroutes WHERE Email IN ('".$Email."')";
		$sql = "SELECT AVG(Rating) FROM visit WHERE IdPlace IN ('".$IdPlace."')";
		$result=mysqli_query($connection,$sql);

		if($sql){
			if($reg=mysqli_fetch_array($result)){
				$json['data'][]=$reg;
			}
			
			$json['OPERATION']="GET_AVERAGE_SCORE_PLACE";
			mysqli_close($connection);
			echo json_encode($json);
		}
	}
?>