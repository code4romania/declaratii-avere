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

        {{ $person->name }}

        {{ $statement }}
    </div>
</x-layouts.app>
