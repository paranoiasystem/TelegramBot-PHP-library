<?php
 
use Telegram\TelegramBot;
 
class TelegramBotTest extends PHPUnit_Framework_TestCase {
 
  public function testNachHasCheese()
  {
    $telegramBot = new TelegramBot("");
    $this->assertTrue($telegramBot->test());
  }
 
}