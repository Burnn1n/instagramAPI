<?php
	session_start();

	define("FACEBOOK_APP_ID","625291618609742");
	define("FACEBOOK_APP_SECRET","d46c39a70530e055fd1e2c87a4092147");
	define("FACEBOOK_REDIRECT_URI","https://justinstolpe.com/blog_code/instagram_graph_api/obtaining_access_token.php");
	define( 'ENDPOINT_BASE', 'https://graph.facebook.com/v5.0/' );

	// accessToken
	$accessToken = 'YOUR-ACCESS-TOKEN-HERE';

	// page id
	$pageId = 'YOUR-PAGE-ID';

	// instagram business account id
	$instagramAccountId = 'YOUR-INSTAGRAM-ACCOUNT-ID';