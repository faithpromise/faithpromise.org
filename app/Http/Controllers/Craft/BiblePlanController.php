<?php

namespace App\Http\Controllers\Craft;

use App\Http\Controllers\Controller;
use FaithPromise\Shared\Models\BiblePlan;

class BiblePlanController extends Controller {
    public function index() {

        $result = [];

        $items = BiblePlan::query()->select(['day', 'passage', 'passage_text'])->get()->groupBy('day');

        foreach ($items as $day => $item) {
            $result[] = [
                'day'      => $day,
                'passages' => $item,
            ];
        }

        return $result;

    }
}
