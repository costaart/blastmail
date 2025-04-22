@props([
    'headers',
    'body'
])

<div class="overflow-hidden w-full overflow-x-auto rounded-radius border border-gray-300 dark:border-gray-600">
    <table class="w-full text-left text-sm text-on-surface dark:text-on-surface-dark">
        <thead class="border-b border-gray-300 bg-surface-alt text-sm text-on-surface-strong dark:border-gray-600 dark:bg-surface-dark-alt dark:text-on-surface-dark-strong">
            <tr>
                @foreach ($headers as $header)
                    <th scope="col" class="p-4">{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-300 dark:divide-gray-600">
            {{ $body }}
        </tbody>
    </table>
</div>