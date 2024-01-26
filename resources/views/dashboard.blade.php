<x-layouts.user title='dashboard'>
    <x-toolbar title='ダッシュボード'>
    </x-toolbar>

    <div class="p-0">
        <section class='p-4'>
            <h2 class='mb-2 text-xl font-bold'>最近のプロジェクト</h2>
            <div class='grid gap-2'>
                @foreach ($projects as $project)
                    <x-projects.summary-card :project="$project" />
                @endforeach
            </div>
            <x-button class='mt-2' :href="route('projects.index')">全プロジェクトを表示</x-button>
        </section>
        <section class='p-4'>
            <h2 class='mb-2 text-xl font-bold'>最近の見積</h2>
            <div class='grid gap-2'>
                @foreach ($estimates as $estimate)
                    <x-estimates.summary-card :estimate="$estimate" />
                @endforeach
        </section>
        <!-- Well begun is half done. - Aristotle -->
    </div>
</x-layouts.user>
