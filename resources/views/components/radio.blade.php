@props(['id'])

<div class="flex items-center justify-start gap-2 font-medium text-on-surface has-disabled:opacity-75 dark:text-on-surface-dark">
    <input id="{{ $id }}" {{ $attributes }}type="radio" class="before:content[''] relative h-4 w-4 appearance-none rounded-full border border-outline bg-surface-alt before:invisible before:absolute before:left-1/2 before:top-1/2 before:h-1.5 before:w-1.5 before:-translate-x-1/2 before:-translate-y-1/2 before:rounded-full before:bg-on-primary checked:border-primary checked:bg-primary checked:before:visible focus:outline-2 focus:outline-offset-2 focus:outline-outline-strong checked:focus:outline-primary disabled:cursor-not-allowed dark:border-outline-dark dark:bg-surface-dark-alt dark:before:bg-on-primary-dark dark:checked:border-primary-dark dark:checked:bg-primary-dark dark:focus:outline-outline-dark-strong dark:checked:focus:outline-primary-dark">
    <label for="{{ $id }}" class="text-sm">{{ $slot }}</label>
</div>