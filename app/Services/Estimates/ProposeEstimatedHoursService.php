<?php

namespace App\Services\Estimates;

use App\Adapters\LanguageModelClient\LanguageModelClientFactory;
use App\Models\FeatureCategory;
use Illuminate\Support\Facades\Log;
use OpenAI;

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

        $systemPrompt = <<<EOF
* あなたは熟練したエンジニアであり、5年の経験があります。あなたのタスクは、指定された機能に対する見積もりを行うことです。この見積もりは、実装フェイズに限定され、設計フェイズやテストフェイズは含まれません。

* 各機能について、以下の情報が提供されます：
機能名 (name): 機能の簡潔な名前です。
機能の説明 (description): 機能の詳細な説明です。これには、機能が何をするか、どのようなユーザーインターフェースが必要か、どのようなデータ処理が必要かなどの情報が含まれます。

* あなたの仕事は、各機能に対して以下の見積もりを提供することです：
見積時間の数値 (proposed_estimated_hours): この数値は、機能の実装に必要と思われる時間（時間単位）です。何らかの理由で見積もりができない場合は、0を入力してください。
見積の内訳と理由 (proposed_estimated_hours_reason): この部分では、提案された見積時間の数値に至った理由を詳細に説明します。考慮すべき点には、機能の複雑さ、必要な技術の種類、実装に必要とされるリソースの量などがあります。

# 返答は以下のjsonフォーマットを使用してください。
{
    "features": [
        {
            "id": "機能ID",
            "name": "機能名",
            "description": "機能の説明",
            "proposed_estimated_hours_reason": "見積の内訳と理由",
            "proposed_estimated_hours": "見積時間の数値",
        },
    ]
}
EOF;

        $userPrompt = <<<EOF
次の機能一覧に対して、見積もりを日本語でお願いします。
{
    "features": $featuresString
}
EOF;
        $messages = [
            ['role' => 'system', 'content' => $systemPrompt],
            ['role' => 'user', 'content' => $userPrompt]
        ];

        $client = OpenAI::client(config('app.open_ai_api_key'));
        $result = $client->chat()->create([
            'model' => 'gpt-4-1106-preview',
            'messages' => $messages,
            'response_format' => ['type' => 'json_object'],
            'temperature' => 0.0,
        ]);
        $completion = $result->choices[0]->message->content;
        Log::debug($completion);
        $completionJson = json_decode($completion, true);
        Log::debug($completionJson);
        return collect($completionJson['features']);
    }
}
