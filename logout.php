<?php 
require_once 'app/app.php';

session_destroy();
header("Location: index.php?logout");