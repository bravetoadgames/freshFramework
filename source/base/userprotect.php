<?php
/*
 * FreshFramework
 * written by Arjen Schumacher
 * 2015-2019
 * -----------------------------------
 * e-mail:  arjen.schumacher@gmail.com
 * twitter: @arjenschumacher
 */

namespace base;

class userprotect
{

    /**
     * Check if admin is logged in
     * @return type
     */
    protected function allowedAccess()
    {
        $this->session = new Session();
        if (!$this->session->get('administrator')) {
            header("location: /beheer/login");
            exit();
        }
    }

    public function getHash($password = '')
    {
        $cost = 10;
        $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
        $salt = sprintf("$2a$%02d$", $cost) . $salt;
        return crypt(trim($password), $salt);
    }

    public function validatePassword($hash, $password)
    {
        if (!function_exists('hash_equals')) {

            function hash_equals($str1, $str2)
            {
                if (strlen($str1) != strlen($str2)) {
                    return false;
                } else {
                    $res = $str1 ^ $str2;
                    $ret = 0;
                    for ($i = strlen($res) - 1; $i >= 0; $i--)
                        $ret |= ord($res[$i]);
                    return !$ret;
                }
            }

        }
        dd(hash_equals($hash, crypt($hash, $password)));
        return hash_equals($hash, crypt($hash, $password));
    }

}
