<?php

namespace App\Containers\Flights\Tasks;

use App\Containers\Flights\Data\Repositories\FlightsRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteFlightsTask extends Task
{

    protected $repository;

    public function __construct(FlightsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
