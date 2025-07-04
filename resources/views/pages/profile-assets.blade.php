@use(\App\Enums\DeclarationType);

<x-layouts.app>
    <div class="container py-8">
        <div class="flex flex-col justify-between gap-4 py-3 md:flex-row-reverse">
            <x-profile.select :$person :$statement :type="DeclarationType::ASSETS" />

            <x-profile.header :$person :$statement />
        </div>

        <section>
            <h1 class="mt-2 text-3xl font-semibold tracking-tight text-gray-900 text-pretty sm:text-4xl">
                {{ __('app.headings.immovable') }}
            </h1>

            <livewire:statement-assets.plots :$statement />
            <livewire:statement-assets.buildings :$statement />
        </section>

        <section>
            <h1 class="mt-2 text-3xl font-semibold tracking-tight text-gray-900 text-pretty sm:text-4xl">
                {{ __('app.headings.movable') }}
            </h1>

            <livewire:statement-assets.vehicles :$statement />
            <livewire:statement-assets.collectibles :$statement />
        </section>

        <section>
            <h1 class="mt-2 text-3xl font-semibold tracking-tight text-gray-900 text-pretty sm:text-4xl">
                {{ __('app.headings.transfers') }}
            </h1>

            <livewire:statement-assets.transfers :$statement />
        </section>

        <section>
            <h1 class="mt-2 text-3xl font-semibold tracking-tight text-gray-900 text-pretty sm:text-4xl">
                {{ __('app.headings.financial_assets') }}
            </h1>

            <livewire:statement-assets.accounts :$statement />
            <livewire:statement-assets.placements :$statement />
            <livewire:statement-assets.assets :$statement />
        </section>

        <section>
            <h1 class="mt-2 text-3xl font-semibold tracking-tight text-gray-900 text-pretty sm:text-4xl">
                {{ __('app.headings.debts') }}
            </h1>

            <livewire:statement-assets.debts :$statement />
        </section>

        <section>
            <h1 class="mt-2 text-3xl font-semibold tracking-tight text-gray-900 text-pretty sm:text-4xl">
                {{ __('app.headings.gifts') }}
            </h1>

            <livewire:statement-assets.gifts :$statement />
        </section>

        <section>
            <h1 class="mt-2 text-3xl font-semibold tracking-tight text-gray-900 text-pretty sm:text-4xl">
                {{ __('app.headings.incomes') }}
            </h1>

            <livewire:statement-assets.incomes :$statement />
        </section>
    </div>
</x-layouts.app>
