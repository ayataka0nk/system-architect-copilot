<x-layouts.guest title='Sanxbox'>
    <div class='flex flex-col gap-3'>
        <div>
            <x-button variant='filled' color='primary'>Filled Primary</x-button>
            <x-button variant='filled' color='secondary'>Filled Secondary</x-button>
            <x-button variant='filled' color='tertiary'>Filled Tertiary</x-button>
        </div>
        <div>
            <x-button variant='filled' color='primary' icon='plus'>
                Filled Primary Left Icon
            </x-button>
            <x-button variant='filled' color='secondary' icon='plus'>
                Filled Secondary Left Icon
            </x-button>
            <x-button variant='filled' color='tertiary' icon='plus'>
                Filled Tertiary Left Icon
            </x-button>
        </div>

        <div>
            <x-button variant='outlined' color='primary'>
                Outlined Primary
            </x-button>
            <x-button variant='outlined' color='secondary'>
                Outlined Secondary
            </x-button>
            <x-button variant='outlined' color='tertiary'>
                Outlined Tertiary
            </x-button>
        </div>
        <div>
            <x-button variant='outlined' color='primary' icon='plus'>
                Outlined Primary Left Icon
            </x-button>
            <x-button variant='outlined' color='secondary' icon='plus'>
                Outlined Secondary Left Icon
            </x-button>
            <x-button variant='outlined' color='tertiary' icon='plus'>
                Outlined Tertiary Left Icon
            </x-button>
        </div>
        <div>
            <x-button variant='text' color='primary'>
                Outlined Primary
            </x-button>
            <x-button variant='text' color='secondary'>
                Outlined Secondary
            </x-button>
            <x-button variant='text' color='tertiary'>
                Outlined Tertiary
            </x-button>
        </div>
        <div>
            <x-button variant='filled' color='primary' icon='camera'>
                Filled Icon
            </x-button>
            <x-button variant='outlined' color='primary' icon='camera'>
                Outlined Icon
            </x-button>
            <x-button variant='text' color='primary' icon='camera'>
                Outlined Icon
            </x-button>
        </div>
        <div>
            <x-icon-button variant='standard' icon='camera' />
            <x-icon-button variant='standard' icon='camera' :active="true" />
            <x-icon-button variant='standard' icon='camera' color='secondary' :active="true" />
            <x-icon-button variant='standard' icon='camera' color='tertiary' :active="true" />
        </div>
        <div class='grid gap-4'>
            <x-text-field id='foo' label='foo label' supportingText='Supporting Text' />
            <x-text-field id='bar' label='bar label' icon='magnifying-glass' supportingText='Supporting Text' />
            <x-text-field id='multiline' label='multiline' multiline icon="magnifying-glass" />
        </div>

    </div>
</x-layouts.guest>
