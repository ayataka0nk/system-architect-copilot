<x-layouts.user title='dashboard'>
    <x-toolbar title='ダッシュボード'>
    </x-toolbar>
    <div class="p-4">
        <!-- Well begun is half done. - Aristotle -->
        <x-button :href="route('projects.index')">プロジェクト一覧</x-button>
    </div>
</x-layouts.user>
