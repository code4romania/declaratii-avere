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

        <section>
            <h1 class="mt-2 text-3xl font-semibold tracking-tight text-gray-900 text-pretty sm:text-4xl">
                {{ __('app.headings.immovable') }}
            </h1>

            <livewire:statement-assets.plots :statement="$statement" />
            <livewire:statement-assets.buildings :statement="$statement" />
        </section>

        <section>
            <h1 class="mt-2 text-3xl font-semibold tracking-tight text-gray-900 text-pretty sm:text-4xl">
                {{ __('app.headings.movable') }}
            </h1>

            <livewire:statement-assets.vehicles :statement="$statement" />
            <livewire:statement-assets.collectibles :statement="$statement" />
        </section>

    </div>

</x-layouts.app>
