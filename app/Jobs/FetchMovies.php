<?php

namespace App\Jobs;

use App\Models\Movie;
use Bepsvpt\Blurhash\Facades\BlurHash;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class FetchMovies implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $path = "kino/covers/";
        $response = Http::get("https://unifilm.eu/kinodateien/api/api_hs_muenchen.php");
        $json = $response->json();

//        DB::transaction(function () use ($json) {
        Movie::truncate();

        Storage::disk("public")->deleteDirectory($path);

        collect($json)->each(function ($item) {
            $movie = new Movie();

            $movie->title = $item["Termin_Titel"];
            $movie->date = $item["Termin_Datum"];
            $movie->time = str($item["Termin_Uhrzeit"])->matchAll("/\d{1,2}:\d{2}/")->first();
            $movie->fsk = $item["FSK"];
            $movie->genre = $item["Genre"];
            $movie->length = $item["Laufzeit"];
            $movie->info = $item["Filminfo"];
            $movie->content = $item["Filminhalt"];
            $movie->room = $item["Abw_Raum"] ?? $item["Allg_Raum"];
            $movie->coverUrl = $item["Img_Filmplakat"];
            $movie->trailerUrl = $item["URL_Trailer"];
            $movie->unifilmUrl = $item["MD5_Rand"];

            $movie->save();
        });
//        });

        foreach (Movie::lazy() as $movie) {
            $coverUrl = $movie->coverUrl;
            $filename = collect(explode("/", $coverUrl))->last();

            if (Storage::disk("public")->missing($path . $filename)) {
                $response = Http::get($coverUrl);
                if ($response->status() == "200")
                    Storage::disk("public")->put($path . $filename, $response->body());
            }
            if (Storage::disk("public")->exists($path . $filename)) {
                $movie->coverUrl = asset("storage/kino/covers/" . $filename);
                $movie->coverBlurhash = BlurHash::encode(Storage::disk("public")->path($path . $filename));
            } else {
                $movie->coverUrl = null;
            }

            $movie->save();
        }

        Cache::forget("movies");
    }
}
