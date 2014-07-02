<?php
class ldap
{
    private $ldap = null;
    private $ldapServer = '172.16.2.3';
    private $ldapPort = '389';
    public $suffix = '';
    public $baseDN = 'ou=people,dc=tvu,dc=edu,dc=vn';
    private $ldapUser = 'admin';
    private $ldapPassword = 'Pas5w0rd';

    public function  __construct()
    {
        $this->ldap = ldap_connect($this->ldapServer, $this->ldapPort);
        ldap_set_option($this->ldap, LDAP_OPT_REFERRALS, 0);
        ldap_set_option($this->ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
    }

    public function getl()
    {
        return $this->ldap;
    }

    public function auth($user, $pass)
    {
        if (empty($user) or empty($pass)) {
            return false;
        }
        //uid=[username],ou=people,dc=tvu,dc=edu,dc=vn
        $uid = 'uid=' . $user . ',' . $this->baseDN;
        @$good = ldap_bind($this->ldap, $uid, $pass);
        if ($good === true) {
            return true;
        } else {
            return false;
        }
    }

    public function __destruct()
    {
        ldap_unbind($this->ldap);
    }

    public function getInfo($user, $pass)
    {
        $username = $user . $this->suffix;
        $attributes = array('*');
        $filter = "(uid=$username)";
        $uid = 'uid=' . $user . ',' . $this->baseDN;
        ldap_bind($this->ldap, $uid, $pass);
        $result = ldap_search($this->ldap, $this->baseDN, $filter, $attributes);
        $entries = ldap_get_entries($this->ldap, $result);

        return $this->formatInfo($entries);
    }

    private function formatInfo($array)
    {
        $info = array();
        $info['name'] = $array[0]['displayname'][0];
        $info['last_name'] = $array[0]['sn'][0];
        //$info['name'] = $info['first_name'] .' '. $info['last_name'];
        $info['email'] = $array[0]['mail'][0];
        $info['user'] = $array[0]['uid'][0];
        // $info['groups'] = $this->groups($array[0]['memberof']);

        return $info;
    }

    private function groups($array)
    {
        $groups = array();
        $tmp = array();

        foreach ($array as $entry) {
            $tmp = array_merge($tmp, explode(',', $entry));
        }

        foreach ($tmp as $value) {
            if (substr($value, 0, 2) == 'CN') {
                $groups[] = substr($value, 3);
            }
        }

        return $groups;
    }
}

?>