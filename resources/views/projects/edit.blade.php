<x-layouts.user title="プロジェクト編集">
    <x-breadcrumb :items="[
        [
            'name' => 'プロジェクト一覧',
            'path' => route('projects.index'),
        ],
        [
            'name' => $project->name,
            'path' => route('projects.show', $project),
        ],
        [
            'name' => '編集',
        ],
    ]" />
    <section class='p-4'>

        <form action="{{ route('projects.update', $project) }}" method="post">
            @csrf
            @method('PUT')
            <x-text-field label="name" name='name' :value="$project->name" :error="$errors->first('name')" />
            <x-text-field multiline label="description" name='description' :value="$project->description" :error="$errors->first('description')" />
            <x-button type='submit'>保存する</x-button>
        </form>

    </section>
</x-layouts.user>
