<?php

require_once './../vendor/autoload.php';

use crojasaragonez\UtnDb\PgConnection;

$con = new PgConnection('postgres', 'postgres', 'proyect_database', 5432, 'localhost');
$con->connect();
