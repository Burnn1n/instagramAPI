<?php
    include 'defines.php';

    // load graph-sdk files
    require_once __DIR__ . '/vendor/autoload.php';

    // facebook credentials array
    $creds = array(
        'app_id' => FACEBOOK_APP_ID,
        'app_secret' => FACEBOOK_APP_SECRET,
        'default_graph_version' => 'v3.2',
        'persistent_data_handler' => 'session'
    );

    // create facebook object
    $facebook = new Facebook\Facebook( $creds );

    // helper
    $helper = $facebook->getRedirectLoginHelper();

    // oauth object
    $oAuth2Client = $facebook->getOAuth2Client();

    if ( isset( $_GET['code'] ) ) { // get access token
        try {
            $accessToken = $helper->getAccessToken();
        } catch ( Facebook\Exceptions\FacebookResponseException $e ) { // graph error
            echo 'Graph returned an error ' . $e->getMessage;
        } catch ( Facebook\Exceptions\FacebookSDKException $e ) { // validation error
            echo 'Facebook SDK returned an error ' . $e->getMessage;
        }

        if ( !$accessToken->isLongLived() ) { // exchange short for long
            try {
                $accessToken = $oAuth2Client->getLongLivedAccessToken( $accessToken );
            } catch ( Facebook\Exceptions\FacebookSDKException $e ) {
                echo 'Error getting long lived access token ' . $e->getMessage();
            }
        }

        echo '<pre>';
        var_dump( $accessToken );

        $accessToken = (string) $accessToken;
        echo '<h1>Long Lived Access Token</h1>';
        print_r( $accessToken );
    } else { // display login url
        $permissions = [
            'public_profile', 
            'instagram_basic', 
            'pages_show_list'
        ];
        $loginUrl = $helper->getLoginUrl( FACEBOOK_REDIRECT_URI, $permissions );
    
        echo '<a href="' . $loginUrl . '">
            Login With Facebook
        </a>';
    }

	//https://www.facebook.com/v3.2/dialog/oauth?client_id=625291618609742&amp;state=823c7696c562990e9fddd6b39a5efc8b&amp;response_type=code&amp;sdk=php-sdk-5.1.4&amp;redirect_uri=http%3A%2F%2Flocalhost%2Fprojects%2FfbToken%2FobtainingAccessToken.php&amp;scope=public_profile%2Cinstagram_basic%2Cpages_show_list%2Cinstagram_manage_insights%2Cinstagram_manage_comments%2Cmanage_pages%2Cads_management%2Cbusiness_management%2Cinstagram_content_publish%2Cpages_read_engagement
