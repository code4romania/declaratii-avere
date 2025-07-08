@use(\App\Enums\DeclarationType)

<x-layouts.app>
    <div class="container py-8">
        <div class="flex flex-col justify-between gap-4 py-3 md:flex-row-reverse">
            <x-profile.select :$person :$statement :type="DeclarationType::ASSETS" />

            <x-profile.header :$person :$statement />
        </div>

        <hr class="my-8" />

        <section>
            <x-section-heading :title="__('app.headings.immovable')" />

            <livewire:statement-assets.plots :$statement />
            <livewire:statement-assets.buildings :$statement />
        </section>

        <hr class="my-8" />

        <section>
            <x-section-heading :title="__('app.headings.movable')" />

            <livewire:statement-assets.vehicles :$statement />
            <livewire:statement-assets.collectibles :$statement />
        </section>

        <hr class="my-8" />

        <section>
            <x-section-heading :title="__('app.headings.transfers')" />

            <livewire:statement-assets.transfers :$statement />
        </section>

        <hr class="my-8" />

        <section>
            <x-section-heading :title="__('app.headings.financial_assets')" />

            <livewire:statement-assets.accounts :$statement />
            <livewire:statement-assets.placements :$statement />
            <livewire:statement-assets.assets :$statement />
        </section>

        <hr class="my-8" />

        <section>
            <x-section-heading :title="__('app.headings.debts')" />

            <livewire:statement-assets.debts :$statement />
        </section>

        <hr class="my-8" />

        <section>
            <x-section-heading
                :title="__('app.headings.gifts')"
                :description="__('app.subheadings.gifts')" />

            <livewire:statement-assets.gifts :$statement />
        </section>

        <hr class="my-8" />

        <section>
            <x-section-heading
                :title="__('app.headings.incomes')"
                :description="__('app.subheadings.incomes')" />

            <livewire:statement-assets.incomes :$statement />
        </section>
    </div>
</x-layouts.app>
