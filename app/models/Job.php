<?php

namespace App\Models;

require_once 'BaseElement.php';

class Job extends BaseElement{
    public function __construct($title, $description, $months) {
        $newTitle = 'Job: ' . $title;
        parent::__construct($newTitle, $description, $months);
    }

    public function getFormatDuration() {
        $years = floor($this->months / 12);
        $extraMonths = $this->months % 12;

        if ($years == 1) {
            return "Job duration: $years year, $extraMonths months";
        } else {
            return "Job duration: $years years, $extraMonths months";
        }
    }
}