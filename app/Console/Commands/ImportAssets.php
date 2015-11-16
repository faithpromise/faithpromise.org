<?php

namespace App\Console\Commands;

use App\Models\Asset;
use FaithPromise\Shared\Models\Staff;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
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

                $key = 'asset_ts_' . md5($path);
                $timestamp = Cache::get($key);

                if ($timestamp !== $file->getMTime()) {
                    $rel_path = str_replace($assets_root . '/', '', $path);
                    $asset = \App\Models\Asset::firstOrNew(['path' => $rel_path]);
                    $asset->file_last_modified = date('Y-m-d H:i:s', $file->getMTime());
                    $asset->save();
                    Cache::forever($key, $file->getMTime());
                }

            }
        }

        Asset::all()->each(function($asset) use ($assets_root) {
            $path = $assets_root . '/' . $asset->path;
            if (!file_exists($path)) {
                $asset->delete();
            }
        });

    }
}
