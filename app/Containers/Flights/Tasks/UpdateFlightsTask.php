<?php

namespace App\Containers\Flights\Tasks;

use App\Containers\Flights\Data\Repositories\FlightsRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateFlightsTask extends Task
{

    protected $repository;

    public function __construct(FlightsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            return $this->repository->update($data, $id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
