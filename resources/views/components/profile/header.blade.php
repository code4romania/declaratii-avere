@props(['person', 'statement'])

<header class="">
    <h1 class="mb-2 text-3xl font-bold text-gray-900">
        {{ $person->name }}
    </h1>

    @if (filled($statement->party))
        <div class="text-lg text-zinc-800">
            Afiliere politică: <span class="font-medium">{{ $statement->party }}</span>
        </div>
    @endif

    <div class="text-lg text-zinc-800">
        Funcție: <span class="font-medium">{{ $statement->position->title }}</span>
    </div>

    <div class="text-lg text-zinc-800">
        Instituție: <span class="font-medium">{{ $statement->institution->name }}</span>

    </div>

    <div class="text-lg text-zinc-800">
        Data declarației: <span class="font-medium">{{ $statement->statement_date->toDateString() }}</span>,
        {{ $statement->type->getLabel() }}
    </div>
</header>
