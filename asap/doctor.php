<?php

namespace Asap;

require_once 'AsapDoctor.php';


$doctor = new AsapDoctor();
//$doctor->init();



$rootDir = join(DIRECTORY_SEPARATOR, [__DIR__, '..']);
echo $rootDir;


if (!is_file($rootDir . DIRECTORY_SEPARATOR . '.htaccess') ):
    echo 'no .htaccess';
endif;