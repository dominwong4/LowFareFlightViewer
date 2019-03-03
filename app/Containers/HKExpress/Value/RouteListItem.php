<?php
/**
 * Created by PhpStorm.
 * User: hoyinwong
 * Date: 2019-02-26
 * Time: 22:48
 */

namespace App\Containers\HKExpress\Value;


use App\Ship\Parents\Values\Value;

class RouteListItem extends Value
{
    private $from = [];

    private $to = [];

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param mixed $from
     */
    public function setFrom($from): void
    {
        $this->from[] = $from ;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param mixed $to
     */
    public function setTo($to): void
    {
        $this->to[] = $to;
    }

    public function toArray(){
        $array = [
            'from' => $this->from,
            'to' => $this->to,
        ];

        return $array;
    }
}
