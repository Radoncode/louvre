<?php
/**
 * Created by PhpStorm.
 * User: radoncode
 * Date: 22/02/18
 * Time: 01:24
 */

namespace LP\ReservationBundle\Service;


class RandomNumber
{
    public function Random(){

        $secure = random_bytes(5);
        $random_code = bin2hex($secure);
        return $random_code;
    }
}