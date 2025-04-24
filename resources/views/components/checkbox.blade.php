@props(['label', 'name', 'checked' => null, 'isCheckedWhen' => null])

<label for="{{ $name }}" class="inline-flex items-center">
    <input id="{{ $name }}" type="checkbox" {{ $attributes }} @if ($checked or $isCheckedWhen == $attributes->get('value')) checked @endif
    class="w-4 h-4 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:checked:bg-indigo-600 dark:checked:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="{{ $name }}" />
    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400 whitespace-nowrap"> {{ $label }}</span>
</label>
