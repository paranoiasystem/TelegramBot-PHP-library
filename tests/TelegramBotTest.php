<?php
 
use Telegram\TelegramBot;
 
class TelegramBotTest extends PHPUnit_Framework_TestCase {
 
  public function testTelegram()
  {
    $telegramBot = new TelegramBot("117903737:AAHj6OYikiEbOEhcnWk0lcnBF7Jte5aJLjU", "test_libphp_bot");
    $this->assertTrue($telegramBot->test($telegramBot->getMe()));
  }
 
}