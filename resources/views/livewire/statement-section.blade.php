@php
    $stats = $this->getStats();

@endphp

<section class="py-12">

    <h1 class="font-semibold tracking-tight text-gray-900 sm:text-lg text-pretty max-w-[65ch]">
        {{ $this->getTitle() }}
    </h1>

    @if ($stats->isNotEmpty())
        <dl @class([
            'grid gap-5 grid-cols-1 mb-8',
            'sm:grid-cols-2' => $stats->count() % 2 === 0,
            'sm:grid-cols-3' => $stats->count() % 3 === 0,
            'lg:grid-cols-4' => $stats->count() % 4 === 0,
            'lg:grid-cols-3' => $stats->count() % 5 === 0,
        ])>
            @foreach ($stats as $item)
                <x-card
                    :label="$item->category->getLabel()"
                    :icon="$item->category->getIcon()"
                    :value="$item->total" />
            @endforeach
        </dl>
    @endif

    <div class="mt-8">
        {{ $this->table }}
    </div>
</section>
