<?php

/**
 * Необходимо создать приложение на http://www.odnoklassniki.ru/dk?st.cmd=appEditWizard&st._aid=Apps_Info_MyDev_AddApp
 */
class SocialOdnoklassniki implements Social {

    private $_client_id = '1126880768';
    private $_client_secret = 'FE0811556FCB3663F913765F';
    private $_public_key = 'CBAHNLCEEBABABABA';
    private $_redirect_url = '';

    public function __construct() {
        $registry = Registry::getInstance();
        $this->_redirect_url = 'https://lalipop.ru/auth/social/odnoklassniki/';
    }

    public function getLinks() {
        $url = 'http://www.odnoklassniki.ru/oauth/authorize';
        $params = array(
            'client_id' => $this->_client_id,
            'response_type' => 'code',
            'redirect_uri' => $this->_redirect_url
        );


        return $url . '?' . urldecode(http_build_query($params));
    }

    public function getToken($code) {
        $params = array(
            'code' => $code,
            'redirect_uri' => $this->_redirect_url,
            'grant_type' => 'authorization_code',
            'client_id' => $this->_client_id,
            'client_secret' => $this->_client_secret
        );

        $url = 'http://api.odnoklassniki.ru/oauth/token.do';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url); // url, куда будет отправлен запрос
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($params))); // передаём параметры
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($curl);
        curl_close($curl);
        $tokenInfo = json_decode($result, true);
        return $tokenInfo;
    }

    public function getUserInfo($token) {

        if (isset($token['access_token'])) {
            $sign = md5("application_key={$this->_public_key}format=jsonmethod=users.getCurrentUser" . md5("{$token['access_token']}{$this->_client_secret}"));
            
            $params = array(
                'method' => 'users.getCurrentUser',
                'access_token' => $token['access_token'],
                'application_key' => $this->_public_key,
                'format' => 'json',
                'sig' => $sign
            );

            $userInfo = json_decode(file_get_contents('http://api.odnoklassniki.ru/fb.do' . '?' . urldecode(http_build_query($params))), true);

            if (isset($userInfo['uid'])) {
                $return = array();
                $return['login'] = '_' . $userInfo['uid'];
                $return['password'] = $userInfo['id'];
                $return['name'] = ($userInfo['first_name']) . ' ' . ($userInfo['last_name']);
                $return['social_type'] = 'odnoklassniki';
                $return['social_uid'] = $userInfo['uid'];
                $return['social_screen_name'] = $userInfo['uid'];
                $return['city'] = '';
                $return['birthday'] = strtotime($userInfo['birthday']);;
                $return['phone'] = '';
                $return['email'] = '';
                return $return;
            } else {
                return false;
            }
        }
    }

}
