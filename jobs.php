<?php

require 'app/models/Job.php';
require 'app/models/Project.php';
require 'lib1/Project.php';
require_once 'app/models/Printable.php';

use App\Models\Job;
use App\Models\Project;
use App\Models\Printable;

$job1 = new Job('PHP Developer',"I'm an awesome PHP developer",true,16);
$job2 = new Job('Java Developer',"I'm an awesome Java developer",true,27);
$job3 = new Job('Artificial intelligence Developer',"I'm an awesome Artificial intelligence developer",true,14);

$project1 = new Project('Project 1','Description',true,16);

$jobs = [
    $job1, $job2, $job3
];

$projects = [
  $project1
];

function printElement(Printable $element) {
  if($element->visible != true) {
    return NULL;
  }
              
  echo '<li class="work-position">';
  echo '<h5>'. $element->getTitle().'</h5>';
  echo '<p>'. $element->getDescription().'</p>';
  echo '<p>'. $element->getFormatDuration().'</p>';
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