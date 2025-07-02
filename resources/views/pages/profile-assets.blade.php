<x-layouts.app>
    <div class="container">
        <div class="py-3 ">
            <header class="flex flex-col gap-2">
                <h1 class="text-3xl font-bold text-gray-900">
                    {{ $person->name }}
                </h1>
                <div class="text-lg text-zinc-800">
                    {{ $statement->position->title }}, {{ $statement->institution->name }}
                </div>
            </header>
        </div>

        <div>
            {{ $person->name }}

            {{ $statement }}
        </div>

        <livewire:list-statement-asset-plots :statement="$statement" />

        <section>
            <h1 class="text-3xl font-semibold">Terenuri</h1>

            <dl class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($statement->plots->groupBy('category') as $plots)
                    <x-card
                        :label="$plots->first()->category->getLabel()"
                        :icon="$plots->first()->category->getIcon()"
                        :value="$plots->count()" />
                @endforeach
            </dl>

        </section>
        <section>
            <h1 class="text-3xl font-semibold">Clădiri</h1>

            <dl class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <x-card label="Test" value="12345" icon="heroicon-o-academic-cap" />
                <x-card label="Test" value="12345" />
                <x-card label="Test" value="12345" icon="heroicon-o-academic-cap" />
                <x-card label="Test" value="12345" icon="heroicon-o-academic-cap" />
            </dl>

        </section>

    </div>

</x-layouts.app>
