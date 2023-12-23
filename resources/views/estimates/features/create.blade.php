<x-layouts.user title='機能作成'>
    <x-toolbar :prevName="$estimate->name" :prevLink="route('estimates.show', $estimate->id)" title='機能作成'>
    </x-toolbar>
    <section class='p-4'>
        <form action="{{ route('feature-categories.features.store', $featureCategory->id) }}" method="post">
            @csrf
            <x-text-field label="name" name='name' :error="$errors->first('name')" />
            <x-text-field multiline label="description" name='description' :error="$errors->first('description')" />
            <x-button type='submit'>保存する</x-button>
        </form>
    </section>
</x-layouts.user>
