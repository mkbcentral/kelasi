@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 ml-4 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
