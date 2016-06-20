<?php

require_once('../app/BotCore.php');

use app\BotCore as Bot;

echo 'yes!';

$bot = new Bot();
$bot->produceTestMessage();
