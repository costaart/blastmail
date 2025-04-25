<x-app-layout>
    <x-slot name="header">
        <x-h2>
            {{ __('Campaigns') }} > {{ $campaign->name }} > {{ __(str($tab)->title()->toString()) }}
        </x-h2>
    </x-slot>

    <x-card>
        <div>
            {{ $campaign->description }}
        </div>
        <x-tabs :tabs="[
            
            __('Statistics') => route('campaigns.show.statistics', ['campaign' => $campaign, 'tab' => 'statistics']),
            __('Open') => route('campaigns.show.open', ['campaign' => $campaign, 'tab' => 'open']),
            __('Clicked') => route('campaigns.show.clicked', ['campaign' => $campaign, 'tab' => 'clicked']),

        ]"></x-tabs>

        @include('campaigns.show.'.$tab)
    </x-card>
</x-app-layout>
