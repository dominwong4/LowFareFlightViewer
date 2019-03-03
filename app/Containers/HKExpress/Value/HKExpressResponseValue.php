<?php
/**
 * Created by PhpStorm.
 * User: hoyinwong
 * Date: 2019-02-22
 * Time: 23:27
 */

namespace App\Containers\HKExpress\Value;


use App\Ship\Parents\Values\Value;
use Carbon\Carbon;

class HKExpressResponseValue extends Value
{
    protected $arrivalStation;

    /**
     * @return mixed
     */
    public function getArrivalStation()
    {
        return $this->arrivalStation;
    }

    /**
     * @param mixed $arrivalStation
     */
    public function setArrivalStation($arrivalStation): void
    {
        $this->arrivalStation = $arrivalStation;
    }

    /**
     * @return mixed
     */
    public function getDepartureStation()
    {
        return $this->departureStation;
    }

    /**
     * @param mixed $departureStation
     */
    public function setDepartureStation($departureStation): void
    {
        $this->departureStation = $departureStation;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return round($this->amount,2);
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = Carbon::parse($date);
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        if($this->status == 'Available'){
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    public function getAirline(){
        return 'hkexpress';
    }

    protected $departureStation;

    protected $amount;

    protected $date;

    protected $status;
}
