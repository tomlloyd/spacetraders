<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\SpaceTradersService;

class SpaceTradersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'space:traders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Space traders automation';

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
     * @return int
     */
    public function handle()
    {
        $service = new SpaceTradersService;

        $output = $service->account();
        $credits = $output['credits'];
        $ships = $output['ships'];

        //$output = $service->availableLoans();
        //dump($output);

        //$output = $service->takeOutLoan();
        //dd($output);

        //$output = $service->shipsToPurchase();
        //dump($output);

        //$output = $service->purchaseShip('JW-MK-I', 'OE-PM-TR');
        //dump($output);

        //$shipId = 'cko3cb0l913493471ds66u5lljo2';

        //$output = $service->purchaseShipFuel($shipId);
        //dump($output);

        //$output = $service->viewMarketplace();
        //dump($output);

        //$output = $service->trade($shipId);
        //dump($output);

        //$output = $service->findNearbyPlanet();
        //dump($output);

        //$output = $service->createFlightPlan($shipId);
        //dump($output);

        //$flightPlanId = 'cko3csld316131901ds6hfaw3mpi';

        //$output = $service->viewFlightPlan($flightPlanId);
        //dump($output);

        //$output = $service->sellGoods($shipId);
        //dump($output);
    }
}
