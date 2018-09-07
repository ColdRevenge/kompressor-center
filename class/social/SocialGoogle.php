<?php

/**
 * Необходимо создать приложение на https://code.google.com/apis/console/
 */
class SocialGoogle implements Social {

    private $_client_id = '720829278169-k3uj4ae3plmgprnt487u3lbrbgeiab2g.apps.googleusercontent.com';
    private $_client_secret = 'f6PAHocbvtgn3nPkJqqnZu1u';
    private $_redirect_url = 'https://lalipop.ru/auth/social/google/';

    public function __construct() {
        $registry = Registry::getInstance();
        $this->_redirect_url = 'https://lalipop.ru/auth/social/google/';
    }

    public function getLinks() {
        $url = 'https://accounts.google.com/o/oauth2/auth';

        $params = array(
            'redirect_uri' => $this->_redirect_url,
            'response_type' => 'code',
            'client_id' => $this->_client_id,
            'scope' => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile'
        );



        return $url . '?' . urldecode(http_build_query($params));
    }

    public function getToken($code) {
        if ($code) {
            $result = false;

            $params = array(
                'client_id' => $this->_client_id,
                'client_secret' => $this->_client_secret,
                'redirect_uri' => $this->_redirect_url,
                'grant_type' => 'authorization_code',
                'code' => $code
            );

            $url = 'https://accounts.google.com/o/oauth2/token';
        }

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($params)));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($curl);
        curl_close($curl);

        $tokenInfo = json_decode($result, true);

        return $tokenInfo;
    }

    public function getUserInfo($token) {

        if (isset($token['access_token'])) {
            $params['access_token'] = $token['access_token'];

            $userInfo = json_decode(file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo' . '?' . urldecode(http_build_query($params))), true);

            if (isset($userInfo['id'])) {

                $return = array();
                //   $user_id = $users->addUserSocial(, 'vk', $get_user['response'][0]['uid'], ($get_user['response'][0]['screen_name']), 0, '', 0);

                $return['login'] = $userInfo['email'] . '_' . $userInfo['id'];
                $return['password'] = $userInfo['id'];
                $return['name'] = ($userInfo['family_name']) . ' ' . ($userInfo['given_name']);
                $return['social_type'] = 'google';
                $return['social_uid'] = $userInfo['id'];
                $return['social_screen_name'] = $userInfo['email'];
                $return['city'] = '';
                $return['birthday'] = 0;
                $return['phone'] = '';
                $return['email'] = $userInfo['email'];
                return $return;
            } else {
                return false;
            }
        }
    }

}
