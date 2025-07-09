@use(\App\Enums\DeclarationType)

<nav class="flex flex-col items-end gap-4">
    <x-filament::tabs>
        @foreach (DeclarationType::options() as $key => $label)
            <x-filament::tabs.item
                :href="route('front.profile.' . $key, ['person' => $person])"
                :active="$type->is($key)"
                tag="a">
                {{ $label }}
            </x-filament::tabs.item>
        @endforeach
    </x-filament::tabs>

    <x-filament::dropdown placement="bottom-end">
        <x-slot name="trigger">
            <x-filament::button
                :badge="$statements->count()"
                icon="heroicon-o-chevron-down"
                icon-position="after">
                {{ $statement->statement_date->toDateString() }}
            </x-filament::button>
        </x-slot>

        <x-filament::dropdown.list>
            @foreach ($statements as $statement)
                <x-filament::dropdown.list.item
                    :href="route('front.profile.' . $type->value, ['person' => $person, 'statement' => $statement])"
                    tag="a">
                    {{ $statement->statement_date->toDateString() }}
                </x-filament::dropdown.list.item>
            @endforeach

        </x-filament::dropdown.list>
    </x-filament::dropdown>
</nav>
