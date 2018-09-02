<?php

class BaseElement {
    private $title;
    public $description;
    public $visible;
    public $months;

    public function __construct($title, $description, $visible, $months) {
        $this->setTitle($title);
        $this->description = $description;
        $this->visible = $visible;
        $this->months = $months;

    }
    public function setTitle($title) {
        if ($title == '') {
            $this->title = 'N/A';
        } else {
            $this->title = $title;
        }
    }

    public function getTitle() {
        return $this->title;
    }

    //devuelve el tiempo de duracion del trabajo en el formato "x años, y meses"
    public function getFormatDuration() {
        $years = floor($this->months / 12);
        $extraMonths = $this->months % 12;

        if($years == 1) {
            return "$years year, $extraMonths months";
        } else {
            return "$years years, $extraMonths months";
        }
    }
}