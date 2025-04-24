<x-app-layout>
    <x-slot name="header">
        <x-h2>
            {{ __('Templates') }} > {{ __('Create a new template') }}
        </x-h2>
    </x-slot>

    <x-card>
        <x-form :action="route('templates.store')" post>

            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" name="name" :value="old('name')" autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="body" :value="__('Body')" />
                <x-richtext id="body" class="block mt-1 w-full" name="body" :value="old('body')" autofocus />
                <x-input-error :messages="$errors->get('body')" class="mt-2" />
            </div>

            <div class="flex items-center space-x-4">
                <x-link-secondary-button :href="route('templates.index')">
                    {{ __('Cancel') }}
                </x-link-button>
                <x-primary-button type="submit">
                    {{ __('Add Template') }}
                </x-primary-button>
            </div>

        </x-form>
    </x-card>

</x-app-layout>
