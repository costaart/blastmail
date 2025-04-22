
<x-app-layout>
    <x-slot name="header">
        <x-h2>
            {{ __('Templates') }} 
        </x-h2>
    </x-slot>

    <x-card>
        <div class="flex justify-between items-center mb-4">
            <div>
                <span class="opacity-70">{{ __('Name') }}:</span> {{$template->name}} 
            </div>
            <x-link-button :href="route('template.index')">
                {{ __('Back to templates') }}
            </x-link-button>
        </div>
        <div class="p-20 border-2 border-gray-400 rounded flex justify-center mt-4">
            {!! $template->body !!}
        </div> 

    </x-card>
</x-app-layout>