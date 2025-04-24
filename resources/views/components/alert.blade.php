@props(['title', 'success' => null, 'info' => null, 'warning' => null, 'danger' => null])

@php
    $iconPath = '';

    if ($success) {
        $iconPath = 'M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z';
    } elseif ($info) {
        $iconPath = 'M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-7-4a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM9 9a.75.75 0 0 0 0 1.5h.253a.25.25 0 0 1 .244.304l-.459 2.066A1.75 1.75 0 0 0 10.747 15H11a.75.75 0 0 0 0-1.5h-.253a.25.25 0 0 1-.244-.304l.459-2.066A1.75 1.75 0 0 0 9.253 9H9Z';
    } elseif ($warning) {
        $iconPath = 'M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-8-5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 10 5Zm0 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z';
    } elseif ($danger) {
        $iconPath = 'M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8.28 7.22a.75.75 0 0 0-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 1 0 1.06 1.06L10 11.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L11.06 10l1.72-1.72a.75.75 0 0 0-1.06-1.06L10 8.94 8.28 7.22Z';
    }
@endphp


<div @class([
    'relative w-full overflow-hidden rounded-sm border bg-surface text-on-surface dark:bg-surface-dark dark:text-on-surface-dark',
    'border-green-500' => $success, 
    'border-sky-500' => $info,
    'border-amber-500' => $warning,
    'border-red-500' => $danger,

]) role="alert">
    <div class="flex w-full items-center gap-2 bg-success/10 p-4">
        <div @class(['rounded-full p-1',
        'bg-green-500/15 text-green-500' => $success,
        'bg-sky-500/15 text-sky-500' => $info,
        'bg-amber-500/15 text-amber-500' => $warning,
        'bg-red-500/15 text-red-500' => $danger,
        ]) aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-6" aria-hidden="true">
                <path fill-rule="evenodd" d="{{ $iconPath }}" clip-rule="evenodd" />
            </svg>
        </div>
        <div class="ml-2">
            <h3 @class([
                'text-sm font-semibold',
                'text-green-500' => $success,
                'text-sky-500' => $info,
                'text-amber-500' => $warning,
                'text-red-500' => $danger,
            ])>{{ $title }}</h3>
            @if($slot)
                <p class="text-xs font-medium sm:text-sm">{{ $slot }}</p>
            @endif
        </div>
    </div>
</div>