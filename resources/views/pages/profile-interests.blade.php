@use(\App\Enums\DeclarationType);

<x-layouts.app>
    <div class="container py-8">
        <div class="flex flex-col justify-between gap-4 py-3 md:flex-row-reverse">
            <x-profile.select :$person :$statement :type="DeclarationType::INTERESTS" />

            <x-profile.header :$person :$statement />
        </div>
    </div>
</x-layouts.app>
