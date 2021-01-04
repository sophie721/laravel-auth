<?php


namespace App\Http\Controllers;


use App\Models\Astro;
use Artisan;
use Carbon\Carbon;

class AstroCrawlerController
{
    public function show()
    {
        if (Astro::where('date', Carbon::now()->format('Y-m-d'))->count() === 0) {
            Artisan::call('command:fetchAstroData');
        }

        $data = Astro::all()->toArray();
        return view('astro.show')->with(['data' => $data]);
    }
}