<?php

/**
 * Необходимо создать приложение на https://oauth.yandex.ru/client/new
 */
class SocialYandex implements Social {

    private $_client_id = '65bd0fdb4a25437ea6004d4bc2ea41c6';
    private $_client_secret = '14069db73a2948c086a23563220ea996';
    private $_redirect_url = '';

    public function __construct() {
        $registry = Registry::getInstance();
        $this->_redirect_url = $registry->base_url . 'auth/social/yandex/';
    }

    public function getLinks() {

        $url = 'https://oauth.yandex.ru/authorize';

        $params = array(
            'response_type' => 'code',
            'client_id' => $this->_client_id,
            'display' => 'popup',
            'social' => 'yandex'
        );

        return $url . '?' . urldecode(http_build_query($params));
    }

    public function getToken($code) {
        if ($code) {
            $url = 'https://oauth.yandex.ru/token';

            $params = array(
                'grant_type' => 'authorization_code',
                'code' => $code,
                'client_id' => $this->_client_id,
                'client_secret' => $this->_client_secret
            );

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($params)));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $result = curl_exec($curl);
            curl_close($curl);
            $tokenInfo = json_decode($result, true);
        }
        return $tokenInfo;
    }

    public function getUserInfo($token) {
        $params = array(
            'format' => 'json',
            'oauth_token' => $token['access_token']
        );
        $userInfo = json_decode(file_get_contents('https://login.yandex.ru/info' . '?' . urldecode(http_build_query($params))), true);

        if (isset($userInfo['first_name'])) {
            $return = array();
            //   $user_id = $users->addUserSocial(, 'vk', $get_user['response'][0]['uid'], ($get_user['response'][0]['screen_name']), 0, '', 0);

            $return['login'] = ($userInfo['display_name']) . '_' . $userInfo['id'];
            $return['password'] = $userInfo['id'];
            $return['name'] = ($userInfo['last_name']) . ' ' . ($userInfo['first_name']);
            $return['social_type'] = 'yandex';
            $return['social_uid'] = $userInfo['id'];
            $return['social_screen_name'] = ($userInfo['display_name']);
            $return['city'] = '';
            $return['birthday'] = strtotime($userInfo['birthday']);
            $return['phone'] = '';
            $return['email'] = $userInfo['default_email'];
            return $return;
        } else {
            return false;
        }
    }

}
