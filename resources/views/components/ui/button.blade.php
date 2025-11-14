@props([
    'href' => null,
    'variant' => 'primary',
    'type' => null, // default, nanti di-handle otomatis
])

@php
    // Cek apakah component dipakai sebagai <a> atau <button>
    $isLink = $href || $attributes->get('href');

    // Kalau bukan <a>, otomatis jadi button
    $type = $isLink ? null : ($type ?? 'button');

    // Base style
    $base = "inline-flex items-center justify-center gap-1
             px-4 py-2.5 rounded-md text-sm font-medium leading-none
             transition box-border border border-transparent";

    // Color variants
    $variants = [
        'primary'   => 'bg-blue-600 text-white hover:bg-blue-700',
        'secondary' => 'bg-gray-200 text-gray-800 hover:bg-gray-300',
        'success'   => 'bg-green-600 text-white hover:bg-green-700',
        'danger'    => 'bg-red-600 text-white hover:bg-red-700',
    ];

    $classes = $base . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

@if ($isLink)
    {{-- Render sebagai <a> --}}
    <a href="{{ $href ?? $attributes->get('href') }}"
       {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    {{-- Render sebagai <button> --}}
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
