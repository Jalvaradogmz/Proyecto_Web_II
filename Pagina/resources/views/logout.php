<?php
require_once './shared/sessions.php';

session_destroy();
header('Location: /');