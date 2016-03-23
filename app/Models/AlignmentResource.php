<?php

namespace App\Models;

class AlignmentResource extends \FaithPromise\Shared\Models\AlignmentResource {

    public function getImageAttribute() {

        if (empty($this->getOriginal('image'))) {
            return 'images/alignments/' . $this->series->slug . '/' . $this->slug . '-tall.jpg';
        }

        return $this->getOriginal('image');
    }

}
