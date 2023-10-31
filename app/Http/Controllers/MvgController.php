<?php

namespace App\Http\Controllers;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;


class MvgController extends Controller
{
    public function departures(Request $request, string $station): JsonResponse
    {
        $data = Redis::get("mvg:departures:" . $station);
        if ($data) {
            return \response()->json($data);
        } else {
            $response = Http::get("https://www.mvg.de/api/fib/v2/departure", [
                "globalId" => $station,
                "limit" => 20,
            ]);
            $body = $response->body();
            Redis::set("mvg:departures:" . $station, $body, "EX", 30);
            return \response()->json($body);
        }
    }
}
