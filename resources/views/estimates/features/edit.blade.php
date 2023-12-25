<x-layouts.user title='機能編集'>
    <x-toolbar :prevName="$estimate->name" :prevLink="route('estimates.show', $estimate->id)" title='機能編集'>
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
            'name' => '機能編集',
        ],
    ]" />
    <section class='p-4'>
        <form action="{{ route('features.update', $feature->id) }}" method="post">
            @csrf
            @method('PUT')
            <x-text-field label="name" name='name' :value="$feature->name" :error="$errors->first('name')" />
            <x-text-field multiline label="description" name='description' :value="$feature->description" :error="$errors->first('description')" />
            <x-text-field label="estimated_hours" name='estimated_hours' :value="$feature->estimated_hours" :error="$errors->first('estimated_hours')" />
            <x-button type='submit'>保存する</x-button>
        </form>
    </section>
    <hr />
    <form class='p-4' action="{{ route('features.destroy', $feature->id) }}" method='post'
        onsubmit="return confirm('本当に削除しますか？');">
        @csrf
        @method('DELETE')
        <x-button icon='trash' color='secondary' variant='filled'>削除</x-button>
    </form>
</x-layouts.user>
