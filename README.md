# TelegramBot-PHP-library

[![Travis](https://img.shields.io/travis/paranoiasystem/TelegramBot-PHP-library.svg?style=flat-square)](https://travis-ci.org/paranoiasystem/TelegramBot-PHP-library)
[![Packagist](https://img.shields.io/packagist/v/paranoiasystem/telegrambot-php-library.svg?style=flat-square)](https://packagist.org/packages/paranoiasystem/telegrambot-php-library)
[![Total Downloads](https://img.shields.io/packagist/dt/paranoiasystem/telegrambot-php-library.svg?style=flat-square)](https://packagist.org/packages/paranoiasystem/telegrambot-php-library)
[![GitHub license](https://img.shields.io/badge/license-GPLv2-blue.svg?style=flat-square)](LICENSE)

TelegramBot is an unofficial library wirte in PHP for use the [Telegram APIs for bot](https://core.telegram.org/bots/api)


## Install

Via Composer

``` bash
$ composer require paranoiasystem/telegrambot-php-library
```

## Usage

Send Message

``` php
<?php
	require_once __DIR__ . '/vendor/autoload.php'; 

	use Telegram\TelegramBot;

	$bot = new TelegramBot('YOUR_BOT_API_TOKEN', 'YOUR_BOT_USERNAME');

	$bot->sendMessage('chat_id', 'text');
```
	
Send Photo

``` php
<?php
	require_once __DIR__ . '/vendor/autoload.php'; 

	use Telegram\TelegramBot;

	$bot = new TelegramBot('YOUR_BOT_API_TOKEN', 'YOUR_BOT_USERNAME');

	$bot->sendPhoto('chat_id', 'path_to_photo');

	//or

	$bot->sendPhoto('chat_id', array('file_id'  => 'file_id_value'));
```