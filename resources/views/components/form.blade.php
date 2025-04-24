@props([
    'post' => null,
    'put' => null,
    'delete' => null,
    'flat' => false,
    'patch' => null,
])

@php
    $method = ($post || $put || $delete || $patch) ? 'POST' : 'GET';
@endphp

<form {{ $attributes->class(['flex flex-col gap-4' => !$flat]) }} method="{{ $method }}">
    @if($method != 'GET')
        @csrf
    @endif

    @if($put)
        @method('PUT')
    @endif

    @if($delete)
        @method('DELETE')
    @endif

    @if($patch)
        @method('PATCH')
    @endif

    {{ $slot }}
</form>