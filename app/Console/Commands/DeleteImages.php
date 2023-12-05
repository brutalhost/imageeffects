<?php

namespace App\Console\Commands;

use App\Models\Image;
use Illuminate\Console\Command;

class DeleteImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all images';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $imagesToDelete   = Image::all();

        foreach ($imagesToDelete as $image) {
            $image->delete();
        }
    }
}
