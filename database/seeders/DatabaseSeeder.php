<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Effect;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $effect1 = new Effect([
            'title'       => 'Stencil',
            'route_name' => 'stencil',
            'description' => 'This effect is used when creating stencils, as it allows you to emphasize the contours of the image, making it more contrasting and easily distinguishable. Using the stencil effect helps create an eye-catching and memorable design by drawing attention to the key elements of the image.',
            'image'       => 'stencil.jpg'
        ]);
        $effect2 = new Effect([
            'title'       => 'Polaroid',
            'route_name' => 'polaroid',
            'description' => 'The Polaroid effect is used to recreate the vintage look of a polaroid photograph. It adds a white frame, a slightly faded color palette, and a soft vignette around the edges of the image. This effect gives photos a nostalgic and timeless feel, reminiscent of the popular instant cameras from the past.',
            'image'       => 'polaroid.webp'
        ]);
        $effect3 = new Effect([
            'title'       => 'Demotivator',
            'route_name' => 'demotivator',
            'description' => 'This effect is used when creating stencils, as it allows you to emphasize the contours of the image, making it more contrasting and easily distinguishable. Using the stencil effect helps create an eye-catching and memorable design by drawing attention to the key elements of the image.',
            'image'       => 'demotivator.jpg'
        ]);
//        $effect1->save();
//        $effect2->save();
        $effect3->save();
    }
}
