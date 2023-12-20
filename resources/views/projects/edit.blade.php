<x-layouts.user title="プロジェクト編集">
    <x-toolbar :prevName="$project->name" :prevLink="route('projects.show', $project->id)" title="編集">
    </x-toolbar>
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
