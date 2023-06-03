@props([
    'disabled' => false,
    'withicon' => false,
])
@php
    $withiconClasses = $withicon ? 'pl-11 pr-4' : 'px-4'
@endphp
<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
    $withiconClasses .'bg-gray-50  border border-gray-300 text-gray-900 text-sm m-3
        rounded-lg focus:ring-blue-500 focus:border-blue-500
        w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
    ]) !!} >
    {{ $slot }}
</select>
