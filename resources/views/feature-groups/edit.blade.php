<x-layouts.user title='機能グループ編集'>
    <x-toolbar :prevName="$estimate->name" :prevLink="route('estimates.show', $estimate->id)" title='機能グループ編集'>
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
            'name' => '機能グループ編集',
        ],
    ]" />
    <section class='p-4'>
        <form action="{{ route('feature-groups.update', $featureGroup->id) }}" method="post">
            @csrf
            @method('PUT')
            <x-text-field label="name" name='name' :value="$featureGroup->name" :error="$errors->first('name')" />
            <x-text-field multiline label="memo" name='memo' :value="$featureGroup->memo" :error="$errors->first('memo')" />
            <x-button type='submit'>保存する</x-button>
        </form>
    </section>
    <hr />
    <form class='p-4' action="{{ route('feature-groups.destroy', $featureGroup->id) }}" method='post'
        onsubmit="return confirm('本当に削除しますか？');">
        @csrf
        @method('DELETE')
        <x-button icon='trash' color='secondary' variant='filled'>削除</x-button>
    </form>
</x-layouts.user>
