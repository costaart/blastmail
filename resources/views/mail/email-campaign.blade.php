<x-mail::message>

{!! $campaign->body !!}


{{ __('Thanks') }}, <br>
    
{{ config('app.name') }} {{ __('is sending your campaign!') }}
</x-mail::message>