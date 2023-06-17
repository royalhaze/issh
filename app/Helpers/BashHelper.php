<?php
/**
 * GitHub: RoyalHaze
 * Date: 6/6/23
 * Time: 8:14 PM
 **/

namespace App\Helpers;

class BashHelper
{
    public static function create_user($username, $password)
    {
        shell_exec("sudo useradd -m $username");

        shell_exec("yes $password | sudo passwd $username");
    }

    public static function delete_user($username)
    {
        self::kill_user($username);

        shell_exec("sudo userdel -r $username");
    }

    public static function change_password($username, $password)
    {
        shell_exec("yes $password | sudo passwd $username");
    }

    public static function kill_user($username)
    {
        shell_exec("sudo killall -u $username");
    }
}
