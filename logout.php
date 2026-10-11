<?php
require_once __DIR__ . '/phpFiles/core/config.php';
logout_user();
redirect('login.php');
