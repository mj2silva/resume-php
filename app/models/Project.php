<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

    protected $table = 'projects';

    public function getFormatDuration()
    {
        $years = floor($this->months / 12);
        $extraMonths = $this->months % 12;

        if ($years == 1) {
            return "Job duration: $years year, $extraMonths months";
        } else {
            return "Job duration: $years years, $extraMonths months";
        }
    }
}