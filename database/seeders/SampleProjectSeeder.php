<?php

namespace Database\Seeders;

use App\Models\Estimate;
use App\Models\Feature;
use App\Models\FeatureCategory;
use App\Models\FeatureGroup;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SampleProjectSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Project::factory()->state([
            'name' => 'サンプルプロジェクト',
            'description' => 'サンプルプロジェクトの説明',
            'created_at' => Carbon::now()->addHour(),
            'updated_at' => Carbon::now()->addHour()
        ])->has(
            Estimate::factory()->state([
                'name' => 'サンプル見積もり',
                'description' => 'サンプル見積もりの説明'
            ])->has(
                FeatureGroup::factory()->state([
                    'name' => 'ECサイト',
                    'memo' => null,
                    'sequence' => 0
                ])->has(
                    FeatureCategory::factory()->state([
                        'name' => '商品一覧',
                        'memo' => null,
                        'sequence' => 1
                    ])->has(
                        Feature::factory()->state([
                            'name' => '商品一覧の表示',
                            'description' => '商品一覧を表示する',
                            'estimated_hours' => null,
                            'proposed_estimated_hours' => null,
                            'sequence' => 0
                        ])
                    )->has(
                        Feature::factory()->state([
                            'name' => '商品一覧のソート',
                            'description' => "次の条件でソートする\n・価格の安い順\n・価格の高い順\n・新着順",
                            'estimated_hours' => null,
                            'proposed_estimated_hours' => null,
                            'sequence' => 1
                        ])
                    )->has(
                        Feature::factory()->state([
                            'name' => 'ページネーション',
                            'description' => '一般的なページネーション。1ページあたりの表示件数は10件',
                            'estimated_hours' => null,
                            'proposed_estimated_hours' => null,
                            'sequence' => 2
                        ])
                    )->has(
                        Feature::factory()->state([
                            'name' => '商品検索',
                            'description' => 'キーワード検索',
                            'estimated_hours' => null,
                            'proposed_estimated_hours' => null,
                            'sequence' => 3
                        ])
                    )
                )
            )->has(
                FeatureGroup::factory()->state([
                    'name' => '管理画面',
                    'memo' => null,
                    'sequence' => 1
                ])->has(
                    FeatureCategory::factory()->state([
                        'name' => '商品管理',
                        'memo' => null,
                        'sequence' => 0
                    ])
                )
            )->has(
                FeatureGroup::factory()->state([
                    'name' => 'LP',
                    'memo' => null,
                    'sequence' => 2
                ])->has(
                    FeatureCategory::factory()->state([
                        'name' => 'メインLP',
                        'memo' => null,
                        'sequence' => 0
                    ])->has(
                        Feature::factory()->state([
                            'name' => 'メインLP',
                            'description' => '6セクション程度の一般的なLP',
                            'estimated_hours' => null,
                            'proposed_estimated_hours' => null,
                            'sequence' => 0
                        ])
                    )
                )
            )
        )->create();
    }
}
