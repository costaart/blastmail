<div>
    <div class="flex justify-end mb-3" >
        <x-form :action="route('campaigns.show.open', ['campaign' => $campaign, 'tab' => $tab])" get class="w-1/5">
            <x-text-input name="search" placeholder="{{ __('Search an email...') }}" value="{{ $search }}" />
        </x-form>
    </div>
    <x-table :headers="[__('Name'), __('Openings'), __('Email')]">
        <x-slot name="body">
            @foreach ($query as $opening)
                <tr>
                    <x-table.td>{{ $opening->subscriber->name }}</x-table.td>
                    <x-table.td>{{ $opening->openings }}</x-table.td>
                    <x-table.td>{{ $opening->subscriber->email }}</x-table.td>
                </tr>
            @endforeach
        </x-slot>
    </x-table>
    
    <div class="mt-4">
        {{ $query->links() }}
    </div>
    
</div>
    
