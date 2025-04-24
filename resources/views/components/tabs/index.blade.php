@props(['tabs' => []])

<div class="w-full">
    <div class="flex gap-2 overflow-x-auto border-b border-outline dark:border-outline-dark dark:border-gray-600" role="tablist" aria-label="tab options">
        @foreach ($tabs as $title => $route)

        @php
            $selected = request()->getUri() == $route;
        @endphp

            <a
               @class(['h-min px-4 py-2 text-sm',
               'font-bold text-[#4f46e5] border-b-2 border-[#4f46e5] dark:border-[#4f46e5] dark:text-[#4f46e5]' => $selected,
               'text-slate-700 font-medium dark:text-slate-300 dark:hover:border-b-slate-300 dark:hover:text-white hover:border-b-2 hover:border-slate-800 hover:text-black' => !$selected,])
            
            href="{{ $route }}" >{{ $title }}</a>

        @endforeach
    </div>
    <div class="px-2 py-4 text-on-surface dark:text-on-surface-dark">
        {{ $slot}}
    </div>
</div>
