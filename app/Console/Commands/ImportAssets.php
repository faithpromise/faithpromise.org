<?php

namespace App\Console\Commands;

use FaithPromise\Shared\Models\Staff;
use Illuminate\Console\Command;
use Symfony\Component\Finder\Iterator\RecursiveDirectoryIterator;

class ImportAssets extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assets:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates the assets table based on files in storage/assets.';

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

        $paths = [];
        $assets_root = storage_path('assets');
        $assets_root = '/home/vagrant/assets.faithpromise.org/assets';

        $iter = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($assets_root, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::SELF_FIRST,
            \RecursiveIteratorIterator::CATCH_GET_CHILD
        );

        foreach($iter as $path => $file) {
            if ($file->isFile() && !preg_match('/\.DS_Store$/', $path)) {
// TODO: Only process if file updated within the last x minutes
                $rel_path = str_replace($assets_root . '/', '', $path);
                $asset = \App\Models\Asset::firstOrNew(['path' => $rel_path]);
                $asset->file_last_modified = date('Y-m-d H:i:s', $file->getMTime());
                $asset->save();

            }
        }

    }
}
