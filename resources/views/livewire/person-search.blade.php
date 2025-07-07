<div class="w-full py-8">
    <x-filament-panels::form wire:submit.prevent class="container py-8">
        {{ $this->form }}
    </x-filament-panels::form>

    <div class="container py-8">
        <span class="flex w-full gap-3 pb-4 mb-5 text-base font-semibold text-gray-900 border-b border-gray-200"
            wire:loading>
            <x-lucide-loader-2 class="inline-block w-5 h-5 animate-spin text-primary-600" />
            <span>{{ __('app.loading') }}</span>
        </span>

        @if ($this->query)
            <div wire:loading.remove>
                @php
                    $count = $this->people->count();
                @endphp

                <h3 class="pb-4 mb-5 text-base font-semibold text-gray-900 border-b border-gray-200">
                    {{ trans_choice('app.search_results', $count) }}
                </h3>

                @if ($count)
                    <ul class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($this->people as $person)
                            <li class="py-2">
                                <a href="{{ route('front.profile', $person) }}" class="text-blue-600 hover:underline">
                                    {{ $person->name }}<br />
                                    {{ $person->position->title }},
                                    {{ $person->institution->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endif
    </div>

</div>
