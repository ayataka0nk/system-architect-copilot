<x-layouts.user title='見積作成'>
    <x-toolbar prevName="一覧" :prevLink="route('projects.estimates.index', $projectId)" title='見積作成'>
    </x-toolbar>
    <section class='p-4'>
        <form action="{{ route('projects.estimates.store', $projectId) }}" method="post">
            @csrf
            <x-text-field label="name" name='name' :error="$errors->first('name')" />
            <x-text-field multiline label="description" name='description' :error="$errors->first('description')" />
            <x-button type='submit'>保存する</x-button>
        </form>
    </section>
</x-layouts.user>
