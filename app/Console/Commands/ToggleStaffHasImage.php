<?php

namespace App\Console\Commands;

use FaithPromise\Shared\Models\Staff;
use Illuminate\Console\Command;

class ToggleStaffHasImage extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'staff:toggle-has-image';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates the has_photo field for staff based on existence of photo.';

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

            $has_image = asset_exists($staffer->image_path) ? 1 : 0;

            if ($staffer->has_image != $has_image) {
                $staffer->has_image = $has_image;
                $staffer->save();
            }

        });

    }
}
