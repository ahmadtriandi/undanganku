<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            "id_event"          => 1,
            "name_event"        => "Wedding",
            "type_event"        => "Wedding",
            "place_event"       => "Gedung X",
            "location_event"    => "Pati, Jawa Tengah",
            "start_event"       => "2023-12-28 09:00:00",
            "end_event"         => "2023-12-28 21:00:00",
            "information_event" => "Mohon kehadirannya, terimakasih",
            "image_event"       => "",
        ]);
    }
}
