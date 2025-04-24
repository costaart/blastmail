<x-app-layout>
    <x-slot name="header">
        <x-h2>
            {{ __('Campaigns') }} > {{ __('Create a new campaign') }}
        </x-h2>
    </x-slot>

    <x-card>
        <x-tabs :tabs="[
            
            __('Setup') => route('campaigns.create'),
            __('Email Body') => route('campaigns.create', ['tab' => 'template']),
            __('Schedule') => route('campaigns.create', ['tab' => 'schedule']),
        ]"></x-tabs>

        
        <x-form :action="route('campaigns.create', compact('tab'))" post>  
            @include('campaigns.create.'.$form)
            
            <div class="flex items-center space-x-4 mt-4">
                <x-link-secondary-button :href="route('campaigns.index')">
                    {{ __('Cancel') }}
                </x-link-secondary-button>
                <x-primary-button type="submit">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </x-form>
    </x-card>
</x-app-layout>
