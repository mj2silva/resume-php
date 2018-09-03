<?php

require_once 'vendor/autoload.php';

use App\Models\Job;
use App\Models\Project;

$jobs = Job::all();
$projects = Project::all();

function printElement($element) {
//   if($element->visible != true) {
//     return NULL;
//   }
              
  echo '<li class="work-position">';
  if ($element ->title) {
    echo '<h5>' . $element->title . '</h5>';
  } else {
    echo '<h5>' . $element->name . '</h5>';
  }
  
  echo '<p>'. $element->description.'</p>';
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