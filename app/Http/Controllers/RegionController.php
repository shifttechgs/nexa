<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Service;

class RegionController extends Controller
{
    public function show(string $region)
    {
        $region = Region::findBySlug($region);

        abort_unless($region, 404);

        $services = Service::all();
        $others = Region::all()->reject(fn (Region $item) => $item->slug === $region->slug);

        return view('regions.show', compact('region', 'services', 'others'));
    }
}
