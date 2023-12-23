@if ($paginator->hasPages())
    <nav class='flex items-center justify-between gap-0'>
        <x-icon-button icon='chevron-left' :href="$paginator->previousPageUrl()" :disabled="$paginator->onFirstPage()" />
        <div>{{ $paginator->firstItem() }}-{{ $paginator->lastItem() }}件目 / 全{{ $paginator->total() }}件中</div>
        <x-icon-button icon='chevron-right' :href="$paginator->nextPageUrl()" :disabled="!$paginator->hasMorePages()" />
    </nav>
@endif
