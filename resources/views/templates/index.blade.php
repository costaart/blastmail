<x-app-layout>
    <x-slot name="header">
        <x-h2>
            {{ __('Templates') }} 
        </x-h2>
    </x-slot>

    <x-card>
        <div class="flex justify-between items-center mb-4">
            <x-link-button :href="route('templates.create')">
                {{ __('Create new template') }}
            </x-link-button>

            <x-form :action="route('templates.index')" method="GET" class="w-2/5">
                <x-text-input name="search" placeholder="{{ __('Search') }}" :value="$search" />
            </x-form>
        </div>
            <x-table :headers="['#', __('Name'), __('Actions')]">
                <x-slot name="body">
                    @foreach ($templates as $template)
                        <tr>
                            <x-table.td>{{ $template->id }}</x-table.td> 
                            <x-table.td>{{ $template->name }}</x-table.td>
                            <x-table.td>
                                <div class="flex items-center space-x-2">
                                    <x-purple-button :href="route('templates.show', $template)">
                                        {{ __('View') }}
                                    </x-purple-button>

                                    <x-link-button secondary :href="route('templates.edit', $template)">
                                        {{ __('Edit') }}
                                    </x-link-button>

                                    <x-form :action="route('templates.destroy', $template)" delete flat
                                    onsubmit="return confirm('{{ __('Are you sure you want to delete this template?') }}')">
                                        <x-secondary-button type="submit">
                                            {{ __('Delete') }}
                                        </x-secondary-button>
                                    </x-form>
                                </div>
                            </x-table.td>
                            
                        </tr> 
                    @endforeach
                </x-slot>
            </x-table>

            <div class="mt-4">
                {{ $templates->links() }}
            </div>
    </x-card>
</x-app-layout>
