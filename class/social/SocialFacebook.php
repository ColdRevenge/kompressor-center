<?php

/**
 * Необходимо создать приложение на https://developers.facebook.com/apps
 */
class SocialFacebook implements Social {

    private $_client_id = '823422581064758';
    private $_client_secret = '1a4848ebbffe56ae78d04ddc981dc503';
    private $_redirect_url = '';

    public function __construct() {
        $registry = Registry::getInstance();
        $this->_redirect_url = $registry->base_url . 'auth/social/facebook/';
    }

    public function getLinks() {
        $url = 'https://www.facebook.com/dialog/oauth';

        $params = array(
            'client_id' => $this->_client_id,
            'redirect_uri' => $this->_redirect_url,
            'response_type' => 'code',
            'scope' => 'email,user_birthday'
        );

        return $url . '?' . urldecode(http_build_query($params));
    }

    public function getToken($code) {
        if (isset($code)) {

            $params = array(
                'client_id' => $this->_client_id,
                'redirect_uri' => $this->_redirect_url,
                'client_secret' => $this->_client_secret,
                'code' => $code
            );

            $url = 'https://graph.facebook.com/oauth/access_token';
        }
        $tokenInfo = null;
        parse_str(file_get_contents($url . '?' . http_build_query($params)), $tokenInfo);

        return $tokenInfo;
    }

    public function getUserInfo($token) {

        if (isset($token['access_token'])) {
            $params = array('access_token' => $token['access_token']);

            $userInfo = json_decode(file_get_contents('https://graph.facebook.com/me' . '?' . urldecode(http_build_query($params))), true);
      
            if (isset($userInfo['id'])) {
                $return = array();

                $return['login'] = $userInfo['email'] . '_' . $userInfo['id'];
                $return['password'] = $userInfo['id'];
                $return['name'] = ($userInfo['first_name']) . ' ' . ($userInfo['last_name']);
                $return['social_type'] = 'facebook';
                $return['social_uid'] = $userInfo['id'];
                $return['social_screen_name'] = $userInfo['email'];
                $return['city'] = '';
                $return['birthday'] = strtotime($userInfo['birthday']);
                $return['phone'] = '';
                $return['email'] = $userInfo['email'];
                return $return;
            } else {
                return false;
            }
        }
    }

}
