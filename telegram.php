<?php

if (!file_exists('madeline.php')) {
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
include 'madeline.php';

$MadelineProto = new \danog\MadelineProto\API('session.madeline');
$MadelineProto->start();

$me = $MadelineProto->get_self();

\danog\MadelineProto\Logger::log($me);

if (!$me['bot']) {
    $MadelineProto->messages->sendMessage(['peer' => '@danogentili', 'message' => "Hi!\nThanks for creating MadelineProto! <3"]);
    $MadelineProto->channels->joinChannel(['channel' => '@MadelineProto']);

    try {
        $MadelineProto->messages->importChatInvite(['hash' => 'https://t.me/joinchat/G2J3wUjsUUOcrino67fhCg']);
    } catch (\danog\MadelineProto\RPCErrorException $e) {
    }

    $MadelineProto->messages->sendMessage(['peer' => 'https://t.me/joinchat/G2J3wUjsUUOcrino67fhCg', 'message' => 'Testing MadelineProto!']);
}
echo 'OK, done!'
?>
