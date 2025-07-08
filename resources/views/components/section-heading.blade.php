@props([
    'title' => null,
    'description' => null,
])

<div class="max-w-[65ch]">
    @if ($title)
        <h1 class="mt-2 text-xl font-semibold tracking-tight text-gray-900 text-pretty sm:text-2xl">
            {{ $title }}
        </h1>
    @endif

    @if ($description)
        <p class="mt-2 text-gray-600 text-pretty">
            {{ $description }}
        </p>
    @endif
</div>
