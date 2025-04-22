@props([
    'post' => null,
    'put' => null,
    'delete' => null,
    'flat' => false,
])

@php
    $method = $post ? 'POST' : 'GET';
    $method = ($post || $put || $delete) ? 'POST' : 'GET';
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


    {{ $slot }}
</form>