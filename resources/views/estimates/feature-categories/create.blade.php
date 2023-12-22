<x-layouts.user title='機能カテゴリ作成'>
    <x-toolbar :prevName="$featureGroup->estimate->name" :prevLink="route('estimates.show', $featureGroup->estimate->id)" title='機能カテゴリ作成'>
    </x-toolbar>
    <section class='p-4'>
        <form action="{{ route('feature-groups.feature-categories.store', $featureGroup->id) }}" method="post">
            @csrf
            <x-text-field label="name" name='name' :error="$errors->first('name')" />
            <x-text-field multiline label="memo" name='memo' :error="$errors->first('memo')" />
            <x-button type='submit'>保存する</x-button>
        </form>
    </section>
</x-layouts.user>
