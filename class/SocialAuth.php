<?php

interface Social {

    public function getLinks();

    public function getToken($code);

    public function getUserInfo($token);
}

/*
 * Авторизация через соц. сети
 * @author Kisa
 * По статье http://ruseller.com/lessons.php?rub=37&id=1674
 */
/*

 */

class SocialAuth implements Social {

    private $_social_obj = null;

    public function __construct($socital_type) {
        Lavra_Loader::LoadClass('Users');
        Lavra_Loader::LoadClass('Application');

        switch ($socital_type) {
            case 'vk':
                Lavra_Loader::LoadClass('SocialVK', null, 'social');
                $this->_social_obj = new SocialVK();
                break;
            case 'yandex':
                Lavra_Loader::LoadClass('SocialYandex', null, 'social');
                $this->_social_obj = new SocialYandex();
                break;
            case 'google':
                Lavra_Loader::LoadClass('SocialGoogle', null, 'social');
                $this->_social_obj = new SocialGoogle();
                break;
            case 'mail':
                Lavra_Loader::LoadClass('SocialMail', null, 'social');
                $this->_social_obj = new SocialMail();
                break;
            case 'odnoklassniki':
                Lavra_Loader::LoadClass('SocialOdnoklassniki', null, 'social');
                $this->_social_obj = new SocialOdnoklassniki();
                break;
            case 'facebook':
                Lavra_Loader::LoadClass('SocialFacebook', null, 'social');
                $this->_social_obj = new SocialFacebook();
                break;
            default:
                break;
        }
    }

    public function getLinks() {
        return $this->_social_obj->getLinks();
    }

    public function getToken($code) {
        return $this->_social_obj->getToken($code);
    }

    public function getUserInfo($token) {
        return $this->_social_obj->getUserInfo($token);
    }

    public function auth() {
        $registry = Registry::getInstance();
        if (isset($_GET['code'])) {
            $token = $this->_social_obj->getToken($_GET['code']);
            if (isset($token['access_token'])) {
                $get_user = $this->_social_obj->getUserInfo($token);

                if (isset($get_user['login'])) { //Если данные получены
                    $users = new Users();
                    $get_social_user = $users->getSocialUser($get_user['social_type'], $get_user['social_uid']);

                    if (isset($get_social_user->id)) { //Если пользователь существует
                        $_SESSION['is_auth'] = $get_social_user->user_type;
                        $_SESSION['user_id'] = $get_social_user->id;
                        $_SESSION['login'] = $get_social_user->login;
                        $_SESSION['b2b_price'] = $get_social_user->b2b_price;
                        return true;
                    } else {
//                        if (!empty($get_user['email'])) {
//                            
//                        }
//                        if (!empty($get_user['email'])) { //Если указан емайл то делаем логин емайлом
                        $get_user['login'] = $get_user['email'];
//                        }
                        $is_email_user = $users->getUserEmail($get_user['email']);
                        if (isset($is_email_user->id)) {
                            $_SESSION['is_auth'] = $is_email_user->user_type;
                            $_SESSION['user_id'] = $is_email_user->id;
                            $_SESSION['login'] = $is_email_user->login;
                            $_SESSION['b2b_price'] = $is_email_user->b2b_price;
                            return true;
                        } else {
                            $users->addUserSocial(trim($get_user['login']), trim($get_user['password']), $get_user['name'], $get_user['social_type'], $get_user['social_uid'], $get_user['social_screen_name'], 0, '', $get_user['birthday'], '', $get_user['email']);
                            
                            $get_social_user = $users->getSocialUser($get_user['social_type'], $get_user['social_uid']);
                            if (isset($get_social_user->id)) { //Если пользователь существует
                                $users->setUserForum($get_social_user->id, $get_user['name'], $get_user['email'], 1);
                                $_SESSION['is_auth'] = $get_social_user->user_type;
                                $_SESSION['user_id'] = $get_social_user->id;
                                $registry->social_reg_login = $_SESSION['login'] = $get_social_user->login;
                                $registry->social_reg_password = $get_social_user->password;
                                $registry->social_reg_email = $get_social_user->email;
                                $_SESSION['b2b_price'] = $get_social_user->b2b_price;
                                return true;
                            }
                        }
                    }
                }
            }
            return false;
        }
    }

}
