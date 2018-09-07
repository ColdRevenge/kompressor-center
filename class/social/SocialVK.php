<?php

/**
 * Необходимо создать приложение на http://vk.com/editapp?act=create
 */
class SocialVK implements Social {

    private $_client_vk_id = '4819843';
    private $_client_vk_secret = 'Ey9FgmabpKMV1Z4K8DUp';
    private $_redirect_url = '';

    public function __construct() {
        $registry = Registry::getInstance();
        $this->_redirect_url = $registry->base_url . 'auth/social/vk/';
    }

    public function getLinks() {
        $url = 'http://oauth.vk.com/authorize';
        $params = array(
            'client_id' => $this->_client_vk_id,
            'redirect_uri' => $this->_redirect_url,
            'response_type' => 'code',
            'social' => 'vk'
        );

        return $url . '?' . urldecode(http_build_query($params));
    }

    public function getToken($code) {
        $params = array(
            'client_id' => $this->_client_vk_id,
            'redirect_uri' => $this->_redirect_url,
            'client_secret' => $this->_client_vk_secret,
            'code' => $code,
        );
        $return = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);

        return $return;
    }

    public function getUserInfo($token) {
        $params = array(
            'uids' => $token['user_id'],
            'fields' => 'uid,first_name,last_name,screen_name,sex,bdate,photo_big',
            'access_token' => $token['access_token']
        );

        $userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params))), true);
      
        if (isset($userInfo['response']) && isset($userInfo['response'][0])) {
            $return = array();
            $return['login'] = ($userInfo['response'][0]['screen_name']) . '_' . $userInfo['response'][0]['uid'];
            $return['password'] = $userInfo['response'][0]['uid'];
            $return['name'] = ($userInfo['response'][0]['last_name']) . ' ' . ($userInfo['response'][0]['first_name']);
            $return['social_type'] = 'vk';
            $return['social_uid'] = $userInfo['response'][0]['uid'];
            $return['social_screen_name'] = ($userInfo['response'][0]['screen_name']);
            $return['city'] = '';
            $return['phone'] = '';
            $return['email'] = '';
            $return['birthday'] = '';
            return $return;
        } else {
            return false;
        }
        return $userInfo;
    }

}
