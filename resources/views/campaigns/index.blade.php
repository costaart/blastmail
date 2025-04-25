<x-app-layout>
    <x-slot name="header">
        <x-h2>
            {{ __('Campaigns') }} 
        </x-h2>
    </x-slot>

    <x-card>
        <div class="flex justify-between items-center mb-4">
            <x-link-button :href="route('campaigns.create')">
                {{ __('Create new campaign') }}
            </x-link-button>

            <x-form :action="route('campaigns.index')" method="GET" class="w-2/5">
                <x-text-input name="search" placeholder="{{ __('Search') }}" :value="$search" />
            </x-form>
        </div>
            <x-table :headers="['#', __('Name'), __('Actions')]">
                <x-slot name="body">
                    @foreach ($campaigns as $campaign)
                        <tr>
                            <x-table.td>{{ $campaign->id }}</x-table.td> 
                            <x-table.td>{{ $campaign->name }}</x-table.td>
                            <x-table.td>
                                <div class="flex items-center space-x-2">
                                    <x-purple-button :href="route('campaigns.show.statistics', $campaign)">
                                        {{ __('View') }}
                                    </x-purple-button>

                                    <x-form :action="route('campaigns.destroy', $campaign)" delete flat
                                    onsubmit="return confirm('{{ __('Are you sure you want to delete this campaign?') }}')">
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
                {{ $campaigns->links() }}
            </div>
    </x-card>
</x-app-layout>
