<?php
/**
 * Created by PhpStorm.
 * User: hoyinwong
 * Date: 2019-03-06
 * Time: 01:53
 */

namespace App\Containers\Facebook\Value;


use App\Containers\HKExpress\Value\RouteListItem;
use App\Containers\Location\Enum\LocationEnum;
use App\Ship\Parents\Values\Value;
use Carbon\Carbon;

class FacebookMessage extends Value
{
    private $array;
    private $message;
    private $status;

    public function __construct($array)
    {
        $this->array = $array;
        count($this->array)==0?$this->status=false:$this->status=true;
        $this->message = '';
    }

    /**
     * @param mixed $array
     */
    public function setArray($array): void
    {
        $this->array = $array;
    }

    private function newLine()
    {
        return '
        ';
    }

    private function separator()
    {
        $this->appendMessage('---------------');
    }

    public function getMessage()
    {
        $this->buildFacebookMessage();
        return $this->message;
    }

    private function appendMessage($messageToBeAppended, $newLine = true)
    {
        $this->message .= $messageToBeAppended;
        $newLine ? $this->message .= $this->newLine() : $this->message;
    }

    private function buildFacebookMessage()
    {

        $this->appendMessage('暫時最便宜航班推薦 - HKExpress');
        $this->appendMessage('更新日期為：', false);
        $this->appendMessage(Carbon::now('Asia/Hong_Kong'));
        $this->appendMessage('實際價格請以官方網站為準，價格亦可能因已被搶購令價格變動。');
        if (count($this->array) == 0) {
            $this->appendMessage('暫無推薦');
            $this->status = false;
        } else {
            $this->status = true;
            if (count($this->array) > 1) {
                usort($this->array, function ($a, $b) {
                    return $a->getFrom()[0]->flight_date <=> $b->getFrom()[0]->flight_date;
                });
            }
            $from = $this->array[0]->getFrom()[0]->departure_station;
            $to = $this->array[0]->getFrom()[0]->arrival_station;
            $this->appendMessage('由' . LocationEnum::getValue($from) . '飛往' . LocationEnum::getValue($to));
            for ($numberOfRoute = 1; $numberOfRoute <= count($this->array); $numberOfRoute++) {
                $this->buildRouteMessageTile($numberOfRoute, $this->array[$numberOfRoute - 1]);
            }
        }
    }

    private function buildRouteMessageTile($routeNumber, RouteListItem $item)
    {
        $this->separator();
        $this->appendMessage('路線' . $routeNumber . ':');
        $this->appendMessage('出發日');
        foreach ($item->getFrom() as $from) {
            $this->appendMessage($from->flight_date, false);
            $this->appendMessage(' $' . $from->amount);
        }

        $this->appendMessage('回程日');
        foreach ($item->getTo() as $to) {
            $this->appendMessage($to->flight_date, false);
            $this->appendMessage(' $' . $to->amount);
        }
        $this->separator();
    }

    /**
     * @return bool
     */
    public function isTrue(): bool
    {
        return $this->status;
    }

    /**
     * @param bool $status
     */
    public function setStatus(bool $status): void
    {
        $this->status = $status;
    }
}
