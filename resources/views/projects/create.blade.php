<x-layouts.user title='プロジェクト作成'>
    <x-breadcrumb :items="[
        ['name' => 'プロジェクト一覧', 'path' => route('projects.index')],
        ['name' => 'プロジェクト作成', 'path' => route('projects.create')],
    ]" />
    <section class='p-4'>
        <form action="{{ route('projects.store') }}" method="post">
            @csrf
            <x-text-field label="name" name='name' :error="$errors->first('name')" />
            <x-text-field multiline label="description" name='description' :error="$errors->first('description')" />
            <x-button type='submit'>保存する</x-button>
        </form>
    </section>
</x-layouts.user>
