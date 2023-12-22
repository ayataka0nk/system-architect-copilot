<x-layouts.user title="見積編集">
    <x-toolbar :prevName="$estimate->name" :prevLink="route('estimates.show', $estimate->id)" title="編集">
    </x-toolbar>
    <section class='p-4'>
        <form action="{{ route('estimates.update', $estimate->id) }}" method="post">
            @csrf
            @method('PUT')
            <x-text-field label="name" name='name' :value="$estimate->name" :error="$errors->first('name')" />
            <x-text-field multiline label="description" name='description' :value="$estimate->description" :error="$errors->first('description')" />
            <x-button type='submit'>保存する</x-button>
        </form>

    </section>
</x-layouts.user>
