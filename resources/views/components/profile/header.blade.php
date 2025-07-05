@props(['person', 'statement'])

<header class="flex flex-col gap-2">
    <h1 class="text-3xl font-bold text-gray-900">
        {{ $person->name }}
    </h1>
    <div class="text-lg text-zinc-800">
        {{ $statement->position->title }}, {{ $statement->institution->name }}
    </div>
    <div class="text-lg text-zinc-800">
        {{ $statement->statement_date }}, {{ $statement->type->getLabel() }}
    </div>
</header>
