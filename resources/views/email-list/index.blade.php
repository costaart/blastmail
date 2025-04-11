<x-app-layout>
    <x-slot name="header">
        <x-h2>
            {{ __('Email List') }}
        </x-h2>
    </x-slot>

    <x-card>
        @if ($emailLists->isNotEmpty())
            <div class="flex justify-between items-center mb-4">
                <x-link-button :href="route('email-list.create')">
                    {{ __('Create a new email list') }}
                </x-link-button>

                <x-form :action="route('email-list.index')" method="GET" class="w-2/5">
                    <x-text-input name="search" placeholder="{{ __('Search') }}" :value="$search" />
                </x-form>
            </div>
        @endif

        @if ($emailLists->isNotEmpty())
            <x-table :headers="['#', __('Email List'), __('# Subscribers'), __('Actions')]">
                <x-slot name="body">
                    @foreach ($emailLists as $list)
                        <tr>
                            <x-table.td>{{ $list->id }}</x-table.td> 
                            <x-table.td>{{ $list->title }}</x-table.td>
                            <x-table.td>{{ $list->subscribers_count }}</x-table.td>
                            <x-table.td>
                                <x-link-button :href="route('subscribers.index', $list)" class="mr-2">
                                    {{ __('View Subscribers') }}
                                </x-link-button>
                            </x-table.td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-table>

            <div class="mt-4">
                {{ $emailLists->links() }}
            </div>

        @elseif ($search)
            <div class="text-center py-8 text-on-surface-variant dark:text-on-surface-dark-variant">
                {{ __('No email lists found for your search.') }}
            </div>
        @else
            <div class="flex justify-center">
                <x-link-button :href="route('email-list.create')">
                    {{ __('Create your first email list') }}
                </x-link-button>
            </div>
        @endif
    </x-card>
</x-app-layout>
