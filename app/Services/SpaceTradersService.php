<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SpaceTradersService
{
    public function account()
    {
        $response = Http::get('https://api.spacetraders.io/users/' . env('USERNAME') . '?token=' . env('TOKEN'));
        return $response->json()['user'];
    }

    public function availableLoans()
    {
        $response = Http::get('https://api.spacetraders.io/game/loans?token=' . env('TOKEN'));
        return $response->json()['loans'];
    }

    public function takeOutLoan($type = 'STARTUP')
    {
        $response = Http::post('https://api.spacetraders.io/users/' . env('USERNAME') . '/loans?token=' . env('TOKEN') . '&type=' . $type);
        return $response->json();
    }

    public function shipsToPurchase($class = 'MK-I')
    {
        $response = Http::get('https://api.spacetraders.io/game/ships?token=' . env('TOKEN') . '&class=' . $class);
        return $response->json();
    }

    public function purchaseShip($type, $location)
    {
        $response = Http::post('https://api.spacetraders.io/users/' . env('USERNAME') . '/ships?token=' . env('TOKEN') . '&type=' . $type . '&location=' . $location);
        return $response->json();
    }

    public function purchaseShipFuel($shipId, $quantity = 20)
    {
        $response = Http::post('https://api.spacetraders.io/users/' . env('USERNAME') . '/purchase-orders?token=' . env('TOKEN') . '&shipId=' . $shipId . '&good=FUEL&quantity=' . $quantity);
        return $response->json();
    }

    public function viewMarketplace($location = 'OE-PM-TR')
    {
        $response = Http::get('https://api.spacetraders.io/game/locations/' . $location . '/marketplace?token=' . env('TOKEN'));
        return $response->json();
    }

    public function trade($shipId, $good = 'METALS', $quantity = 5)
    {
        $response = Http::post('https://api.spacetraders.io/users/' . env('USERNAME') . '/purchase-orders?token=' . env('TOKEN') . '&shipId=' . $shipId . '&good=' . $good . '&quantity=' . $quantity);
        return $response->json();
    }

    public function findNearbyPlanet($planet = 'OE')
    {
        $response = Http::get('https://api.spacetraders.io/game/systems/' . $planet . '/locations?token=' . env('TOKEN'));
        return $response->json();
    }

    public function createFlightPlan($shipId, $destination = 'OE-PM')
    {
        $response = Http::post('https://api.spacetraders.io/users/' . env('USERNAME') . '/flight-plans?token=' . env('TOKEN') . '&shipId=' . $shipId . '&destination=' . $destination);
        return $response->json();
    }

    public function viewFlightPlan($flightPlanId)
    {
        $response = Http::get('https://api.spacetraders.io/users/' . env('USERNAME') . '/flight-plans/' . $flightPlanId . '?token=' . env('TOKEN'));
        return $response->json();
    }

    public function sellGoods($shipId, $good = 'METALS', $quantity = 5)
    {
        $response = Http::post('https://api.spacetraders.io/users/' . env('USERNAME') . '/sell-orders?token=' . env('TOKEN') . '&shipId=' . $shipId . '&good=' . $good . '&quantity=' . $quantity);
        return $response->json();
    }

    public function payLoan($loanId)
    {
        $response = Http::put('https://api.spacetraders.io/users/' . env('USERNAME') . '/loans?token=' . env('TOKEN') . '&loanId=' . $loanId);
        return $response->json();
    }
}