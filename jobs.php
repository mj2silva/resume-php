<?php

class Job {
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

$job1 = new Job('PHP Developer',"I'm an awesome PHP developer",true,16);

// $job1->setTitle('PHP Developer');
// $job1->description = "I'm an awesome PHP developer";
// $job1->visible = true;
// $job1->months = 16;

$job2 = new Job('Java Developer',"I'm an awesome Java developer",true,27);

// $job2->setTitle('Java Developer');
// $job2->description = "I'm an awesome Java developer";
// $job2->visible = true;
// $job2->months = 27;

$job3 = new Job('Artificial intelligence Developer',"I'm an awesome Artificial intelligence developer",true,14);

// $job3->setTitle('Artificial intelligence');
// $job3->description = "I'm an awesome AI developer";
// $job3->visible = true;
// $job3->months = 14;

$jobs = [
    $job1, $job2, $job3
];

// $jobs = [
//   [
//     'title' => 'PHP Developer',
//     'description' => "I'm an awesome PHP developer",
//     'visible' => true,
//     'months' => 16
//   ],
//   [
//     'title' => 'Java Developer',
//     'description' => "I'm an awesome Java developer",
//     'visible' => false,
//     'months' => 24
//   ],
//   [
//     'title' => 'Artificial intelligence',
//     'description' => "I'm an awesome AI developer",
//     'visible' => true,
//     'months' => 12
//   ],
//   [
//     'title' => 'C++ & C# Developer',
//     'description' => "I'm an awesome C++ & C# developer",
//     'visible' => true,
//     'months' => 16
//   ],
//   [
//     'title' => 'Mobile application designer',
//     'description' => "I'm an awesome Mobile application designer",
//     'visible' => true,
//     'months' => 32
//   ],

// ];

function getDuration($months) {

    
}

function printJob($job) {
  if($job->visible != true) {
    return NULL;
  }
              
  echo '<li class="work-position">';
  echo '<h5>'.$job->getTitle().'</h5>';
  echo '<p>'.$job->description.'</p>';
  echo '<p>'.$job->getFormatDuration().'</p>';
  echo '<strong>Achievements:</strong>';
  echo '<ul>';
  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
  echo '</ul>';
  echo '</li>';

}

// al final del archivo, cuando es un archivo php puro, se puede omitir el cierre
// de hecho, se recomienda no cerrar para evitar redundancia