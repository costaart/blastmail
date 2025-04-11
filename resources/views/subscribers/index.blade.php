<x-app-layout>
    <x-slot name="header">
        <x-h2>
            {{ __('Email List') }} > {{ $emailList->title }} > {{ __('Subscribers') }}
        </x-h2>
    </x-slot>

    <x-card>
        <div class="flex justify-between items-center mb-4">
            <x-link-button :href="route('subscribers.create', $emailList)">
                {{ __('Add a new subscriber') }}
            </x-link-button>

            <x-form :action="route('subscribers.index', $emailList)" method="GET" class="w-2/5">
                <x-text-input name="search" placeholder="{{ __('Search') }}" :value="$search" />
            </x-form>
        </div>
            <x-table :headers="['#', __('Name'), __('# Email'), __('Actions')]">
                <x-slot name="body">
                    @foreach ($subscribers as $subscriber)
                        <tr>
                            <x-table.td>{{ $subscriber->id }}</x-table.td> 
                            <x-table.td>{{ $subscriber->name }}</x-table.td>
                            <x-table.td>{{ $subscriber->email }}</x-table.td>
                            <x-table.td>
                                <x-form :action="route('subscribers.destroy', [$emailList, $subscriber])" delete flat
                                onsubmit="return confirm('{{ __('Are you sure you want to delete this subscriber?') }}')">
                                    <x-secondary-button type="submit">
                                        {{ __('Delete') }}
                                    </x-secondary-button>
                                </x-form>
                            </x-table.td>
                        </tr> 
                    @endforeach
                </x-slot>
            </x-table>

            <div class="mt-4">
                {{ $subscribers->links() }}
            </div>
    </x-card>
</x-app-layout>
