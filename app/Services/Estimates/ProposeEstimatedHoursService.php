<?php

namespace App\Services\Estimates;

use App\Adapters\LanguageModelClient\LanguageModelClientFactory;
use App\Adapters\LanguageModelClient\Message;
use App\Models\FeatureCategory;
use Illuminate\Support\Facades\Log;

class ProposeEstimatedHoursService
{
    public function __construct(private LanguageModelClientFactory $languageModelClientFactory)
    {
    }

    public function handle(int $featureCategoryId)
    {
        $client = $this->languageModelClientFactory->make(LanguageModelClientFactory::TURBO);
        $featureCategory = FeatureCategory::with(['features'])->findOrFail($featureCategoryId);
        $featuresJson = [];
        foreach ($featureCategory->features as $feature) {
            $array = [
                'id' => $feature->id,
                'name' => $feature->name,
                'description' => $feature->description,
                'proposed_estimated_hours_reason' => null,
                'proposed_estimated_hours' => null,
            ];
            $featuresJson[] = $array;
        }

        $featuresString = json_encode($featuresJson, JSON_UNESCAPED_UNICODE);

        $prompt = <<<EOF
あなたはプロジェクトの見積もりをしています。与えられた機能を実現するために必要な時間を見積り、提案してください。

見積もりは実装フェイズのみを対象とし、設計フェイズおよびテストフェイズは含めないものとします。

経験年数5年のエンジニアが作業をすることを想定してください。

返答は元のフォーマット通りのjson形式を保ち、proposed_estimated_hours_reasonに見積の内訳を日本語の文字列で、proposed_estimated_hoursに見積時間の数値を埋めてください。
{
    "features": $featuresString
}
EOF;
        $completion = $client->createChatCompletion(messages: [new Message(role: 'user', content: $prompt)]);
        Log::debug($completion->content);
        $result = json_decode($completion->content, true);
        Log::debug($result);
        return collect($result['features']);
    }
}
