<?php

namespace App\Adapters\LanguageModelClient;

interface LanguageModelClient
{
    /**
     * @param Message[] $messages
     */
    public function createChatCompletion(array $messages): ChatCompletion;
}

class Message
{
    public function __construct(public string $role, public string $content)
    {
    }
}

class ChatCompletion
{
    public function __construct(public string $content)
    {
    }
}
