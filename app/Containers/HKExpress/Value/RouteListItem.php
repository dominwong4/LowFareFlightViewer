<?php
/**
 * Created by PhpStorm.
 * User: hoyinwong
 * Date: 2019-02-26
 * Time: 22:48
 */

namespace App\Containers\HKExpress\Value;


use App\Ship\Parents\Values\Value;
use Carbon\Carbon;

class RouteListItem extends Value
{
    private $from = [];

    private $to = [];

    /**
     * @return mixed
     */
    public function getFrom()
    {
        usort($this->from, function($a, $b) {
            return $a->flight_date <=> $b->flight_date;
        });
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
        usort($this->to, function($a, $b) {
            return $a->flight_date <=> $b->flight_date;
        });
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

    function sortByDate($a, $b) {
        return Carbon::parse($a->flight_date) - Carbon::parse($a->flight_date);
    }
}
