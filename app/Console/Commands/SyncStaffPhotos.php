<?php

namespace App\Console\Commands;

use App\Models\Asset;
use FaithPromise\Shared\Models\Staff;
use Illuminate\Console\Command;

class SyncStaffPhotos extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'staff:sync-photos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates the photo_id field for staff based on existence of photo in assets table.';

    /**
     * Create a new command instance.
     *
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {

        $staff = Staff::all();

        $staff->each(function ($staffer) {

            $image = Asset::where('path', '=', $staffer->image_path)->first();

            // Add photo
            if ($image && $image->id !== $staffer->photo_id) {
                $staffer->photo_id = $image->id;
                $staffer->save();
            }

            // Remove photo
            if (!$image && $staffer->photo_id) {
                $staffer->photo_id = null;
                $staffer->save();
            }

        });

    }
}
