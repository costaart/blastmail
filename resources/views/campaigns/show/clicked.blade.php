<div>
    <div class="flex justify-end mb-3" >
        <x-form :action="route('campaigns.show.clicked', ['campaign' => $campaign, 'tab' => $tab])" get class="w-1/5">
            <x-text-input name="search" placeholder="{{ __('Search an email...') }}" value="{{ $search }}" />
        </x-form>
    </div>
    <x-table :headers="[__('Name'), __('Clicks'), __('Email')]">
        <x-slot name="body">
            @foreach ($query as $clicked)
            <tr>
                <x-table.td>{{ $clicked->subscriber->name }}</x-table.td>
                <x-table.td>{{ $clicked->clicks }}</x-table.td>
                <x-table.td>{{ $clicked->subscriber->email }}</x-table.td>
            </tr>
        @endforeach
        </x-slot>
    </x-table>
    
    <div class="mt-4">
        {{ $query->links() }}
    </div>
    
</div>
    
