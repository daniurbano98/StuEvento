<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Faker\Factory as Faker;

class EventosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Generar 10 eventos aleatorios
        for ($i = 0; $i < 10; $i++) {
            $evento = new Event();
            $evento->title = $faker->sentence(3);
            $evento->description = $faker->paragraph(2);
            $evento->location = $faker->city();
            $evento->date = $faker->dateTimeBetween('now', '+1 month');
            $evento->user_id = 1; // Generar un usuario aleatorio del 1 al 10
            $evento->created_at = Carbon::now()->subDays(rand(1, 30)); // Generar una fecha de creación aleatoria de hace 1 a 30 días
            $evento->updated_at = Carbon::now()->subDays(rand(1, 30)); // Generar una fecha de actualización aleatoria de hace 1 a 30 días
            $evento->save();
        }
    }
}
