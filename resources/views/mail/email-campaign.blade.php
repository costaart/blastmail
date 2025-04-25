<x-mail::message>

{!! $body !!}


{{ __('Thanks') }}, <br>
    
{{ config('app.name') }} {{ __('is sending your campaign!') }}

<img src="{{ route('tracking.openings', $mail) }}" style="display: none">
</x-mail::message>