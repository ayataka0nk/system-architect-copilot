<x-layouts.user title="見積編集">
    <x-toolbar :prevName="$estimate->name" :prevLink="route('estimates.show', $estimate->id)" title="編集">
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
            'name' => '見積編集',
        ],
    ]" />
    <section class='p-4'>
        <form action="{{ route('estimates.update', $estimate->id) }}" method="post">
            @csrf
            @method('PUT')
            <x-text-field label="name" name='name' :value="$estimate->name" :error="$errors->first('name')" />
            <x-text-field multiline label="description" name='description' :value="$estimate->description" :error="$errors->first('description')" />
            <x-button type='submit'>保存する</x-button>
        </form>
    </section>
    <hr />
    <form class='p-4' action="{{ route('estimates.destroy', $estimate->id) }}" method='post'
        onsubmit="return confirm('本当に削除しますか？');">
        @csrf
        @method('DELETE')
        <x-button icon='trash' color='secondary' variant='filled'>削除</x-button>
    </form>
</x-layouts.user>
