<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
{
    $botman = app('botman');

    $botman->hears('{message}', function($botman, $message) {
        if ($message == 'hello') {
            $this->askName($botman);
        } elseif ($message == 'how are you') {
            $this->replyHowAreYou($botman);
        } elseif ($message == 'i have a problem') {
            $this->provideHelp($botman);
        } else {
            $botman->reply("Sorry, I didn't understand that.");
        }
    });

    $botman->listen();
}

public function askName($botman)
{
    $botman->ask('Hello! What is your name?', function(Answer $answer) {
        $name = $answer->getText();
        $this->say('Nice to meet you, '.$name.'!');
    });
}

public function replyHowAreYou($botman)
{
    $botman->reply("I'm a bot, so I don't have feelings, but thank you for asking!");
}


public function provideHelp($botman)
{
    $botman->reply("How can I assist you? If you have any questions or need help, feel free to ask.");

    $botman->ask("Please provide your contact information (e.g., email or phone number) so that we can reach out to you.", function($answer, $botman) {
        $contactInfo = $answer->getText();
        $botman->say("Thank you for sharing your contact information. Our team will get in touch with you soon to assist with your queries.");
    });

    $botman->hears('{message}', function($botman, $message) {
        $botman->reply("I received your message: " . $message);
        $botman->say("Thanks for reaching out. We will contact you soon to address your problem.");
    });
}





}
