<?php

namespace App\Console\Commands;

use App\Models\Image;
use Illuminate\Console\Command;

class DeleteOldImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-old-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete old images';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $imageStorageTime = config('app.image_storage_time');
        $timeAgo          = now()->subMinutes($imageStorageTime);
        $imagesToDelete   = Image::where('updated_at', '<', $timeAgo)->get();

        foreach ($imagesToDelete as $image) {
            $image->delete();
        }
    }
}
