<?php

//fw/fw.php

require '../framework/Database.php';
require '../framework/Model.php';
require '../framework/View.php';

session_start();

define("KEY", "develoteca");
define("COD", "AES-128-ECB");