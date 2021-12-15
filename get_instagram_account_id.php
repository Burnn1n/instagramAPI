<?php
	include 'defines.php';
	if(isset( $_GET['userid'] )){
		$_SESSION["userid"] = $_GET['userid'];
}
if(isset($_SESSION["userid"])){
		$userid = $_SESSION["userid"];
}
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "loginsystem";
$conn = mysqli_connect($servername, $username, $password, $dbname);
	// get instagram account id endpoint
	$endpointFormat = ENDPOINT_BASE . 'me/accounts?access_token={access-token}';
	$instagramAccountEndpoint = ENDPOINT_BASE . 'me/accounts';

	$accessToken = $_SESSION["accessToken"];
	// endpoint params
	$igParams = array(
		'fields' => 'instagram_business_account',
		'access_token' => $accessToken
	);
	
	echo($accessToken);

	// add params to endpoint
	$instagramAccountEndpoint .= '?' . http_build_query( $igParams );

	// setup curl
	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_URL, $instagramAccountEndpoint );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

	// make call and get response
	$response = curl_exec( $ch );
	curl_close( $ch );
	$responseArray = json_decode( $response, true );
	$ig = $responseArray['data']['0']['instagram_business_account']['id'];
	$id = $responseArray['data']['0']['id'];
	//echo $ig;
	$sql = "UPDATE users
        SET instagram_id = '$ig', facebook_page_id = '$id'
        WHERE id = '$userid';";
        mysqli_query($conn,$sql);

				header("Location: https://localhost:3000/admin");
				die();
	// unset( $responseArray['data'][0]['access-token']);
	// echo '<pre>';
	// print_r($responseArray);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Get Page's Instagram Business Account</title>
	</head>
	<body>
		<h1>Get Page's Instagram Business Account</h1>
		<hr />
		<h3>Endpoint: <?php echo $endpointFormat; ?></h3>
		<hr />
		<h3>Display:</h3>
		<h4>Instagram Business Account Id: <?php echo $ig; ?></h4>
		<h4>Facebook Page ID: <?php echo $responseArray['id']; ?></h4>
		<hr />
		<h3>Raw Response</h3>
		<textarea style="width:100%;height:300px;"><?php print_r( $responseArray ); ?></textarea>
	</body>
</html>