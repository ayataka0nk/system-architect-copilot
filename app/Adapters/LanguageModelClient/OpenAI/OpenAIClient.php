<?php

namespace App\Adapters\LanguageModelClient\OpenAI;

use App\Adapters\LanguageModelClient\ChatCompletion;
use App\Adapters\LanguageModelClient\LanguageModelClient;
use App\Adapters\LanguageModelClient\Message;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OpenAIClient implements LanguageModelClient
{
    /**
     * @param Message[] $promptMessages
     */
    public function createChatCompletion(array $messages): ChatCompletion
    {
        Log::debug('Start Creating chat completion', [
            'messages' => $messages,
        ]);

        $messages = array_map(function (Message $message) {
            return [
                'role' => $message->role,
                'content' => $message->content,
            ];
        }, $messages);
        $apiKey = config('open_ai_api_key');

        $res = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey
        ])->timeout(60)->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => $messages,
            'max_tokens' => 1000,
            'temperature' => 1,
            'top_p' => 1,
        ]);

        if ($res->failed()) {
            throw new \Exception('Failed to create chat completion');
        }

        $body = $res->json();
        $content = $body['choices'][0]['message']['content'];
        return new ChatCompletion(content: $content);
    }
}
