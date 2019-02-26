<?php

namespace App\Containers\Flights\Tasks;

use App\Containers\Flights\Data\Repositories\FlightsRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllFlightsTask extends Task
{

    protected $repository;

    public function __construct(FlightsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
