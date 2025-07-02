@php
    $stats = $this->getStats();
@endphp

<section>
    <h1 class="text-3xl font-semibold">{{ $this->getTitle() }}</h1>

    <dl @class([
        'grid gap-5 grid-cols-1',
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

    <div>
        {{ $this->table }}
    </div>
</section>
