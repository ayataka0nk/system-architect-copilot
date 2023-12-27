<x-layouts.user title='プロジェクト作成'>
    <x-toolbar prevName="一覧" :prevLink="route('projects.index')" title='プロジェクト作成'>
    </x-toolbar>
    <x-breadcrumbs :items="[
        [
            'name' => 'プロジェクト一覧',
            'url' => route('projects.index'),
        ],
        [
            'name' => 'プロジェクト作成',
        ],
    ]" />

    <section class='p-4'>
        <form action="{{ route('projects.store') }}" method="post">
            @csrf
            <x-text-field label="name" name='name' :value="old('name')" :error="$errors->first('name')" />
            <x-text-field multiline label="description" name='description' :value="old('description')" :error="$errors->first('description')" />
            <x-button type='submit'>保存する</x-button>
        </form>
    </section>
</x-layouts.user>
