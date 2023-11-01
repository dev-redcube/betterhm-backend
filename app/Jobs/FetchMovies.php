<?php

namespace App\Jobs;

use App\Models\Movie;
use App\Models\MovieTime;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;
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
        $response = Http::get("https://unifilm.eu/kinodateien/api/api_hs_muenchen.php");
        $json = $response->json();

//        DB::transaction(function () use ($json) {
        Schema::disableForeignKeyConstraints();
        MovieTime::truncate();
        Movie::truncate();
        Schema::enableForeignKeyConstraints();
        collect($json)->each(function ($item) {
            $movie = new Movie();

            $movie->title = $item["Termin_Titel"];
            $movie->date = $item["Termin_Datum"];
            $movie->fsk = $item["FSK"];
            $movie->genre = $item["Genre"];
            $movie->runtime = $item["Laufzeit"];
            $movie->info = $item["Filminfo"];
            $movie->content = $item["Filminhalt"];
            $movie->coverUrl = $item["Img_Filmplakat"];
            $movie->trailerUrl = $item["URL_Trailer"];
            $movie->unifilmUrl = $item["MD5_Rand"];

            $movie->save();

            str($item["Termin_Uhrzeit"])
                ->matchAll("/\d{1,2}:\d{2}/")
                ->each(function ($match) use ($movie) {
                    $movie->times()->create(["time" => $match]);
                });
        });
//        });

        $path = "kino/covers/";
        foreach (Movie::lazy() as $movie) {
            $coverUrl = $movie->coverUrl;
            $filename = collect(explode("/", $coverUrl))->last();

            if (Storage::disk("public")->missing($path . $filename)) {
                $response = Http::get($coverUrl);
                Storage::disk("public")->put($path . $filename, $response->body());
            }
            if (Storage::disk("public")->exists($path . $filename)) {
                $movie->coverUrl = asset("storage/kino/covers/" . $filename);
                $movie->save();
            }
        }
    }
}
