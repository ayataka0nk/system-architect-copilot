<x-layouts.user title='機能編集'>
    <x-toolbar :prevName="$estimate->name" :prevLink="route('estimates.show', $estimate->id)" title='機能編集'>
    </x-toolbar>
    <section class='p-4'>
        <form action="{{ route('features.update', $feature->id) }}" method="post">
            @csrf
            @method('PUT')
            <x-text-field label="name" name='name' :value="$feature->name" :error="$errors->first('name')" />
            <x-text-field multiline label="description" name='description' :value="$feature->description" :error="$errors->first('description')" />
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
