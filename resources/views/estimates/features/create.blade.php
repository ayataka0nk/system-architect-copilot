<x-layouts.user title='機能作成'>
    <x-toolbar :prevName="$estimate->name" :prevLink="route('estimates.show', $estimate->id)" title='機能作成'>
    </x-toolbar>
    <x-breadcrumbs :items="[
        [
            'name' => 'プロジェクト一覧',
            'url' => route('projects.index'),
        ],
        [
            'name' => $estimate->project->name,
            'url' => route('projects.show', $estimate->project->id),
        ],
        [
            'name' => '見積一覧',
            'url' => route('projects.estimates.index', $estimate->project->id),
        ],
        [
            'name' => $estimate->name,
            'url' => route('estimates.show', $estimate->id),
        ],
        [
            'name' => '機能作成',
        ],
    ]" />
    <section class='p-4'>
        <form action="{{ route('feature-categories.features.store', $featureCategory->id) }}" method="post">
            @csrf
            <x-text-field label="name" name='name' :value="old('name')" :error="$errors->first('name')" />
            <x-text-field multiline label="description" name='description' :value="old('description')" :error="$errors->first('description')" />
            <x-text-field label="estimated_hours" name='estimated_hours' :value="old('estimated_hours')" :error="$errors->first('estimated_hours')" />
            <x-text-field label="estimated_hours_reason" name='estimated_hours_reason' :value="old('estimated_hours_reason')"
                :error="$errors->first('estimated_hours_reason')" />
            <input type='hidden' name='sequence' value="{{ $sequence }}" />
            <x-button type='submit'>保存する</x-button>
        </form>
    </section>
</x-layouts.user>
