<?php
use App\Http\Controllers\BotManController;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;

/* $botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});

$botman->hears('What is your name', function ($bot) {
    $bot->reply('My name is mohamed samir!');
});

$botman->hears('age', function ($bot) {
    $bot->reply('22!');
});

$botman->hears('image', function ($bot) {
    $image = new Image("https://botman.io/img/logo.png");

    $message = OutgoingMessage::create("This is botman logo")
        ->withAttachment($image);
        
    $bot->reply($message);
});

$botman->fallback(function ($bot) {
    $bot->reply("Sorry i can't understand!");
});

$botman->hears('Start conversation', BotManController::class.'@startConversation'); */