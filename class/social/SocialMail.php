<?php

/**
 * Необходимо создать приложение на http://api.mail.ru/sites/my/add
 */
class SocialMail implements Social {

    private $_client_id = '731180';
    private $_client_secret = '6a33a0dcc1c453458a443132304cfaec';
    private $_redirect_url = '';

    public function __construct() {
        $registry = Registry::getInstance();
        $this->_redirect_url = $registry->base_url . 'auth/social/mail/';
    }

    public function getLinks() {
        $url = 'https://connect.mail.ru/oauth/authorize';

        $params = array(
            'client_id' => $this->_client_id,
            'response_type' => 'code',
            'redirect_uri' => $this->_redirect_url
        );

        return $url . '?' . urldecode(http_build_query($params));
    }

    public function getToken($code) {
        $params = array(
            'client_id' => $this->_client_id,
            'client_secret' => $this->_client_secret,
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => $this->_redirect_url
        );

        $url = 'https://connect.mail.ru/oauth/token';

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

            $sign = md5("app_id={$this->_client_id}method=users.getInfosecure=1session_key={$token['access_token']}{$this->_client_secret}");

            $params = array(
                'method' => 'users.getInfo',
                'secure' => '1',
                'app_id' => $this->_client_id,
                'session_key' => $token['access_token'],
                'sig' => $sign
            );
            $userInfo = json_decode(file_get_contents('http://www.appsmail.ru/platform/api' . '?' . urldecode(http_build_query($params))), true);

            if (isset($userInfo[0]['uid'])) {
                $return = array();

                $return['login'] = $userInfo['email'] . '_' . $userInfo[0]['uid'];
                $return['password'] = $userInfo[0]['id'];
                $return['name'] = ($userInfo[0]['first_name']) . ' ' . ($userInfo[0]['last_name']);
                $return['social_type'] = 'mail';
                $return['social_uid'] = $userInfo[0]['uid'];
                $return['social_screen_name'] = $userInfo[0]['email'];
                $return['city'] = '';
                $return['phone'] = '';
                $return['email'] = $userInfo[0]['email'];
                $return['birthday'] = strtotime($userInfo[0]['birthday']);
                return $return;
            } else {
                return false;
            }
        }
    }

}
