<div class="flex flex-col gap-4" x-data="{ show: '{{ old('send_when', 'now') }}' }">

    <x-alert success :title="__('Your campaign is ready to be send!')"/>

    <div class="space-y-4">
        <div><span class="font-bold underline">{{__('From:')}}</span> {{ config('mail.from.address')}}</span></div>
        <div><span class="font-bold underline">{{__('To:')}}</span> <x-badge> {{ $countEmails }} {{ __('emails') }}</x-badge></div>
        <div><span class="font-bold underline">{{__('Subject:')}}</span> {{ $data['subject'] }}</div>
        <div><span class="font-bold underline">{{__('Template:')}}</span> <x-badge> {{ $template }} {{ __('emails') }}</x-badge></div>
    </div>
    <hr class="my-3 opacity-30"/>

    <div>
        <x-input-label :value="__('Schedule Delivery')" />
        <div class="flex flex-col gap-2 mt-2">
            <x-radio id="send_now" name="send_when" value="now" x-model="show"> {{__('Send Now')}} </x-radio>
            <x-radio id="send_later" name="send_when" value="later" x-model="show"> {{__('Send Later')}} </x-radio>
        </div>

        <div x-show="show == 'later'" x-transition>
            <x-text-input id="send_at" class="block mt-5 w-full" type="date" name="send_at" :value="old('send_at', $data['send_at'])" autofocus />
            <x-input-error :messages="$errors->get('send_at')" class="mt-2" />
        </div>
    </div>

</div>
