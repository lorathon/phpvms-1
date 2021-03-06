<?php

namespace App\Http\Controllers\Api;

use App\Repositories\AirportRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\Airport as AirportResource;

use Illuminate\Support\Facades\Cache;
use VaCentral\Airport as AirportLookup;

class AirportController extends AppBaseController
{
    protected $airportRepo;

    public function __construct(
        AirportRepository $airportRepo
    ) {
        $this->airportRepo = $airportRepo;
    }

    /**
     * Do a lookup, via vaCentral, for the airport information
     * @param $id
     * @return AirportResource
     */
    public function lookup($id)
    {
        $airport = Cache::remember(
            config('cache.keys.AIRPORT_VACENTRAL_LOOKUP.key') . $id,
            config('cache.keys.RANKS_PILOT_LIST.time'),
            function () use ($id) {
                return AirportLookup::get($id);
            }
        );

        return new AirportResource(collect($airport));
    }
}
