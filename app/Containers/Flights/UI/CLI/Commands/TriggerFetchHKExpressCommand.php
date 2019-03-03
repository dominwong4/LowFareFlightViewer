<?php
/**
 * Created by PhpStorm.
 * User: hoyinwong
 * Date: 2019-03-02
 * Time: 21:39
 */

namespace App\Containers\Flights\UI\CLI\Commands;


use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Commands\ConsoleCommand;

class TriggerFetchHKExpressCommand extends ConsoleCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lowfareflight:fetch:hkexpress {country}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Trigger Fetch HKExpress Prices';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $country_id = $this->argument('country');
        Apiato::call('HKExpress@TriggerHKExpressFetchAction',[$country_id]);
    }
}
