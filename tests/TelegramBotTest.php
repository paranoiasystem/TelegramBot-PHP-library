<?php
 
use Telegram\TelegramBot;
 
class TelegramBotTest extends PHPUnit_Framework_TestCase {
 
  public function testTelegram()
  {
    $telegramBot = new TelegramBot("106915375:AAFmuEPDrhodeWU7k4sx_uRJpzxPBMFGqfk", "paranoia_bot");
    $this->assertTrue($telegramBot->test($telegramBot->getMe()));
  }
 
}