<?php

require_once 'Asap.php';
require_once 'AsapDoctor.php';

$asap = new \Asap\AsapDoctor();

if ($asap->checkSystem()) {
    // Redirect to the index.php at the home
} else {
    // Oops. Something is wrong! Take me to the doctor!
    header("Location: /asap/doctor.php");
    die();
}
