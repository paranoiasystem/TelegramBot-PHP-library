<?php

/**
 * TelegramBot PHP unofficial library.
 *
 * TelegramBot is an unofficial library for use the Telegram APIs for bot.
 *
 * @version 1.0.1
 * @author ParanoiaSystem
 */

namespace Telegram;

class TelegramBot
{
    function __construct($token, $username){
        define('TOKEN', $token);
        define('USERNAME', $username);
        
    }

    function getMe()
    {
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . TOKEN . "/getMe");
        return $jsonResponse;
    }

    function sendMessage($chat_id, $text, $disable_web_page_preview = false, $reply_to_message_id = false, $reply_markup = false){
    	$arrayPost = array('chat_id' => $chat_id, 'text' => $text);
        if($reply_to_message_id)
            array_push_assoc($arrayPost, 'reply_to_message_id', $reply_to_message_id);
        if($disable_web_page_preview)
            array_push_assoc($arrayPost, 'disable_web_page_preview', $disable_web_page_preview);
        if($reply_markup)
            array_push_assoc($arrayPost, 'reply_markup', $reply_markup);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . TOKEN . "/sendMessage", $arrayPost);
        return $jsonResponse;
    }

    function forwardMessage($chat_id, $from_chat_id, $message_id){
    	$arrayPost = array('chat_id' => $chat_id, 'from_chat_id' => $from_chat_id, 'message_id' => $message_id);
    	$jsonResponse = $this->curl_call("https://api.telegram.org/bot" . TOKEN . "/forwardMessage", $arrayPost);
        return $jsonResponse;
    }
    
    function sendPhoto($chat_id, $photo, $caption = false, $reply_to_message_id = false, $reply_markup = false){
    	$arrayPost = array('chat_id' => $chat_id, 'photo' => $photo);
    	if($caption)
            array_push_assoc($arrayPost, 'caption', $caption);
        if($reply_to_message_id)
            array_push_assoc($arrayPost, 'reply_to_message_id', $reply_to_message_id);
        if($reply_markup)
            array_push_assoc($arrayPost, 'reply_markup', $reply_markup);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . TOKEN . "/sendPhoto", $arrayPost);
        return $jsonResponse;
    }

    function sendAudio($chat_id, $audio, $duration = 0, $reply_to_message_id = false, $reply_markup = false){
    	$arrayPost = array('chat_id' => $chat_id, 'audio' => $audio);
    	if($duration > 0)
            array_push_assoc($arrayPost, 'duration', $duration);
        if($reply_to_message_id)
            array_push_assoc($arrayPost, 'reply_to_message_id', $reply_to_message_id);
        if($reply_markup)
            array_push_assoc($arrayPost, 'reply_markup', $reply_markup);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . TOKEN . "/sendAudio", $arrayPost);
        return $jsonResponse;
    }

    function sendDocument($chat_id, $document, $reply_to_message_id = false, $reply_markup = false){
    	$arrayPost = array('chat_id' => $chat_id, 'document' => $document);
    	if($reply_to_message_id)
            array_push_assoc($arrayPost, 'reply_to_message_id', $reply_to_message_id);
        if($reply_markup)
            array_push_assoc($arrayPost, 'reply_markup', $reply_markup);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . TOKEN . "/sendDocument", $arrayPost);
        return $jsonResponse;
    }
    
    function sendSticker($chat_id, $sticker, $reply_to_message_id = false, $reply_markup = false){
    	$arrayPost = array('chat_id' => $chat_id, 'sticker' => $sticker);
    	if($reply_to_message_id)
            array_push_assoc($arrayPost, 'reply_to_message_id', $reply_to_message_id);
        if($reply_markup)
            array_push_assoc($arrayPost, 'reply_markup', $reply_markup);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . TOKEN . "/sendSticker", $arrayPost);
        return $jsonResponse;
    }
    
    function sendVideo($chat_id, $video, $duration = 0, $caption = false, $reply_to_message_id = false, $reply_markup = false){
    	$arrayPost = array('chat_id' => $chat_id, 'video' => $video);
    	if($duration > 0)
            array_push_assoc($arrayPost, 'duration', $duration);
        if($caption)
            array_push_assoc($arrayPost, 'caption', $caption);
        if($reply_to_message_id)
            array_push_assoc($arrayPost, 'reply_to_message_id', $reply_to_message_id);
        if($reply_markup)
            array_push_assoc($arrayPost, 'reply_markup', $reply_markup);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . TOKEN . "/sendVideo", $arrayPost);
        return $jsonResponse;
    }

    function sendLocation($chat_id, $latitude, $longitude, $reply_to_message_id = false, $reply_markup = false){
    	$arrayPost = array('chat_id' => $chat_id, 'latitude' => $latitude, 'longitude' => $longitude);
    	if($reply_to_message_id)
            array_push_assoc($arrayPost, 'reply_to_message_id', $reply_to_message_id);
        if($reply_markup)
            array_push_assoc($arrayPost, 'reply_markup', $reply_markup);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . TOKEN . "/sendLocation", $arrayPost);
        return $jsonResponse;
    }

    function sendChatAction($chat_id, $action){
    	$arrayPost = array('chat_id' => $chat_id, 'action' => $action);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . TOKEN . "/sendChatAction", $arrayPost);
        return $jsonResponse;
    }
    
    function getUserProfilePhotos($user_id, $offset = false, $limit = false){
    	$arrayPost = array('user_id' => $user_id);
    	if($offset)
    		array_push_assoc($arrayPost, 'offset', $offset);
    	if($limit)
    		array_push_assoc($arrayPost, 'limit', $limit);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . TOKEN . "/getUserProfilePhotos", $arrayPost);
        return $jsonResponse;
    }

    function getUpdates($offset = false, $limit = false, $timeout = false)
    {
        $arrayPost = array();
        if ($offset)
            array_push_assoc($arrayPost, 'offset', $offset);
        if ($limit)
            array_push_assoc($arrayPost, 'limit', $limit);
        if ($timeout)
            array_push_assoc($arrayPost, 'timeout', $timeout);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . TOKEN . "/getUpdates", $arrayPost);
        return $jsonResponse;
    }

    function setWebhook($url = false){
        $arrayPost = array();
        if ($url)
            array_push_assoc($arrayPost, 'url', $url);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . TOKEN . "/setWebhook", $arrayPost);
        return $jsonResponse;
    }

    function test($json)
    {
        $json = json_decode($json, true);
        if(USERNAME == $json['result']['username'])
            return true;
        else
            return false;
    }

    function array_push_assoc(&$array, $key, $value){
	   $array[$key] = $value;
    }

    function curl_call($url, $post=array()){
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_USERAGENT, "ParanoiaBot 1.0");
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		if (count($post)) {
			curl_setopt($ch, CURLOPT_POST, count($post));
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
		}
		$r = curl_exec($ch);
		curl_close($ch);
		return $r;
    }
}
