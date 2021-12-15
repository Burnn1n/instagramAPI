<?php
	session_start();

	define("FACEBOOK_APP_ID","625291618609742");
	define("FACEBOOK_APP_SECRET","d46c39a70530e055fd1e2c87a4092147");
	define("FACEBOOK_REDIRECT_URI","https://localhost/projects/fbToken/obtainingAccessToken.php");
	define('ENDPOINT_BASE', 'https://graph.facebook.com/v5.0/' );

	// accessToken
	//$accessToken = 'EAAI4swzO6k4BABGQfCFZC3IqY5UZAeDYQgEZCwXGW1UMs9MPCpv89gp0KEue36rEpiKgV0qV2Xms2py1pXGMAEPREg7Vqhs3OQiD6EgbSraylfyH9Mec98eEW3moeP3ucMCMAWMsG9SABXZCXZCZCdDRAQXKP6GLxXGSscCEARPzLzzckOMLGXwEP5apFb9DRQrC3M5eRFCXbTf0k8qUxwIzR3qUQLzrnOZC0TW3NvGWwZDZD';

	// page id
	$pageId = '1424130850936255';

	// instagram business account id
	$instagramAccountId = '17841434582425345';
