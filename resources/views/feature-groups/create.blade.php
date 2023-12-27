<x-layouts.user title='機能グループ作成'>
    <x-toolbar :prevName="$estimate->name" :prevLink="route('estimates.show', $estimate->id)" title='機能グループ作成'>
    </x-toolbar>
    <x-breadcrumbs :items="[
        [
            'name' => 'プロジェクト一覧',
            'url' => route('projects.index'),
        ],
        [
            'name' => $estimate->project->name,
            'url' => route('projects.show', $estimate->project->id),
        ],
        [
            'name' => '見積一覧',
            'url' => route('projects.estimates.index', $estimate->project->id),
        ],
        [
            'name' => $estimate->name,
            'url' => route('estimates.show', $estimate->id),
        ],
        [
            'name' => '機能グループ作成',
        ],
    ]" />
    <section class='p-4'>
        <form action="{{ route('estimates.feature-groups.store', $estimate->id) }}" method="post">
            @csrf
            <x-text-field label="name" name='name' :value="old('name')" :error="$errors->first('name')" />
            <x-text-field multiline label="memo" name='memo' :value="old('memo')" :error="$errors->first('memo')" />
            <x-button type='submit'>保存する</x-button>
        </form>
    </section>
</x-layouts.user>
