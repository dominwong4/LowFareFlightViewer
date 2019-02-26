<?php

namespace App\Containers\Flights\Tasks;

use App\Containers\Flights\Data\Repositories\FlightsRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindFlightsByIdTask extends Task
{

    protected $repository;

    public function __construct(FlightsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
