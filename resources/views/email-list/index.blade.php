<x-app-layout>
    <x-slot name="header">
        <x-h2>
            {{ __('Email List') }}
        </x-h2>

    </x-slot>

    <x-card>
        @forelse ($emailLists as $list)
            //Listar
        @empty
        <div class="flex justify-center">
            <x-link-button :href="route('email-list.create')">
                {{__('Create your first email list')}}
            </x-link-button>
        </div>
        @endforelse
    </x-card>

</x-app-layout>
