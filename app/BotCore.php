<?php

namespace app;

/**
 * Class BotCore
 * @package app
 */
class BotCore
{
    const API_URL = 'https://api.telegram.org/bot';

    /** @var string $requestUrl */
    private $requestUrl;

    /** @var string $requestUrl */
    private $chatId;

    /** @var string $requestUrl */
    private $firstName;

    /** @var string $requestUrl */
    private $message;

    /**
     * BotCore constructor.
     */
    public function __construct()
    {
        $botApiKey = getenv('BOT_ACCESS_TOKEN');
        $this->requestUrl = static::API_URL . $botApiKey;

        $this->setupOutputData();
    }

    public function produceTestMessage()
    {
        $this->sendMessage(
            $this->chatId,
            'You tell: "' . $this->message . '"'
        );
    }

    /**
     * @param $chatId
     * @param $message
     */
    private function sendMessage($chatId, $message)
    {
        file_get_contents($GLOBALS['api'] . '/sendMessage?chat_id=' . $chatId . '&text=' . urlencode($message));
    }

    private function setupOutputData()
    {
        $output = json_decode(file_get_contents('php://input'), true);

        $this->chatId = $output['message']['chat']['id'];
        $this->firstName = $output['message']['chat']['first_name'];
        $this->message = $output['message']['text'];
    }
}
