<?php

class Job {
    private $title;
    public $description;
    public $visible;
    public $months;

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }
}

$job1 = new Job();

$job1->setTitle('PHP Developer');
$job1->description = "I'm an awesome PHP developer";
$job1->visible = true;
$job1->months = 16;

$job2 = new Job();

$job2->setTitle('Java Developer');
$job2->description = "I'm an awesome Java developer";
$job2->visible = true;
$job2->months = 24;

$jobs = [
    $job1, $job2
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
  $years = floor($months/12);
  $extraMonths = $months % 12;

  if($years == 1) {
    return "$years year, $extraMonths months";
  } else {
    return "$years years, $extraMonths months";
  }
    
}

function printJob($job) {
  if($job->visible != true) {
    return NULL;
  }
              
  echo '<li class="work-position">';
  echo '<h5>'.$job->getTitle().'</h5>';
  echo '<p>'.$job->description.'</p>';
  echo '<p>'.getDuration($job->months).'</p>';
  echo '<strong>Achievements:</strong>';
  echo '<ul>';
  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
  echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
  echo '</ul>';
  echo '</li>';

}