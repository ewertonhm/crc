<?php
require_once 'config.php';

 $tipos = \Carbon\Carbon::parse(\Carbon\Carbon::now()->subMonth(2)->toDateTimeString())->isoFormat('MMM');

var_dump($tipos);