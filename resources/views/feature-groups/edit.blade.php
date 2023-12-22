<x-layouts.user title='機能グループ編集'>
    <x-toolbar :prevName="$estimate->name" :prevLink="route('estimates.show', $estimate->id)" title='機能グループ編集'>
    </x-toolbar>
    <section class='p-4'>
        <form action="{{ route('feature-groups.update', $featureGroup->id) }}" method="post">
            @csrf
            @method('PUT')
            <x-text-field label="name" name='name' :value="$featureGroup->name" :error="$errors->first('name')" />
            <x-text-field multiline label="memo" name='memo' :value="$featureGroup->memo" :error="$errors->first('memo')" />
            <x-button type='submit'>保存する</x-button>
        </form>
    </section>
</x-layouts.user>
