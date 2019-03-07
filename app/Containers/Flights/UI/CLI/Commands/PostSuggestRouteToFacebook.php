<?php
/**
 * Created by PhpStorm.
 * User: hoyinwong
 * Date: 2019-03-06
 * Time: 05:01
 */

namespace App\Containers\Flights\UI\CLI\Commands;


use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Commands\ConsoleCommand;

class PostSuggestRouteToFacebook extends ConsoleCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lowfareflight:post:facebook {country}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Post To Facebook Page';

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
        Apiato::call('Facebook@PostSuggestRouteMessageByCountryAction',[$country_id,14]);
    }
}
