<?php

namespace App\Adapters\LanguageModelClient;

class LanguageModelClientFactory
{
    const TURBO = 'turbo';
    const PRECISION = 'precision';

    public function make(string $mode): LanguageModelClient
    {
        if ($mode === 'turbo') {
            return app()->make(\App\Adapters\LanguageModelClient\OpenAI\OpenAIClient::class);
        } else if ($mode === 'precision') {
            return app()->make(\App\Adapters\LanguageModelClient\OpenAI\OpenAIClient::class);
        } else {
            throw new \Exception('Invalid mode');
        }
    }
}
