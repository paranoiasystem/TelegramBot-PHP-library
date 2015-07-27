# TelegramBot-PHP-library

[![Travis](https://img.shields.io/travis/paranoiasystem/TelegramBot-PHP-library.svg?style=flat-square)](https://travis-ci.org/paranoiasystem/TelegramBot-PHP-library)
[![Packagist](https://img.shields.io/packagist/v/paranoiasystem/telegrambot-php-library.svg?style=flat-square)](https://packagist.org/packages/paranoiasystem/telegrambot-php-library)
[![Total Downloads](https://img.shields.io/packagist/dt/paranoiasystem/telegrambot-php-library.svg?style=flat-square)](https://packagist.org/packages/paranoiasystem/telegrambot-php-library)
[![GitHub license](https://img.shields.io/badge/license-GPLv2-blue.svg?style=flat-square)](LICENSE)

TelegramBot is an unofficial library in PHP for use the [Telegram APIs for bot](https://core.telegram.org/bots/api)


## Install

Via Composer

``` bash
$ composer require paranoiasystem/telegrambot-php-library
```

## Usage

Send Message

``` php
<?php
	namespace Telegram;

    require_once __DIR__ . '/vendor/autoload.php'; 

	$bot = new TelegramBot('YOUR_BOT_API_TOKEN', 'YOUR_BOT_USERNAME');

	$bot->sendMessage('chat_id', 'text');
```

Send Photo

``` php
<?php
	namespace Telegram;

    require_once __DIR__ . '/vendor/autoload.php'; 

	$bot = new TelegramBot('YOUR_BOT_API_TOKEN', 'YOUR_BOT_USERNAME');

	$bot->sendPhoto('chat_id', 'path_to_photo');

	//or

	$bot->sendPhoto('chat_id', array('file_id'  => 'file_id_value'));
```

## Bot Example

Set WebHook

``` php
<?php
	namespace Telegram;

    require_once __DIR__ . '/vendor/autoload.php'; 

    $bot = new TelegramBot('YOUR_BOT_API_TOKEN', 'YOUR_BOT_USERNAME');

    $response = $bot->setWebhook("https://url.to/hook.php"); //only https

	if($response->description == "Webhook was set")
		echo "Ok! The bot is ready!";
	else{
		echo "Ops! Error <br>";
		print_r($response);
	}
?>
```

BotCore (hook.php)

``` php
<?php
	namespace Telegram;

    require_once __DIR__ . '/vendor/autoload.php'; 

    $bot = new TelegramBot('YOUR_BOT_API_TOKEN', 'YOUR_BOT_USERNAME');

    $response = $bot->hook();

	$comand = $response->message->text;

	if(substr($comand, 0, strlen("/echo")) === "/echo")
		$bot->sendMessage($response->message->chat->id, str_replace("/echo", "", $comand));

	if(substr($comand, 0, strlen("/img")) === "/img")
		$bot->sendPhoto($response->message->chat->id, 'path_to_photo');
?>
```