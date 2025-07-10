<div class="relative w-full py-8">
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
                            <li class="relative py-2 group">
                                <h4
                                    class="font-semibold tracking-tight text-gray-900 text-lg/8 group-hover:text-gray-600">
                                    <a href="{{ route('front.profile', $person) }}">
                                        <span class="absolute inset-0"></span>
                                        {{ $person->name }}
                                    </a>
                                </h4>
                                <p class="text-gray-600 text-base/7">{{ $person->position->title }}</p>
                                <p class="text-gray-500 text-sm/6">{{ $person->institution->name }}</p>

                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endif
    </div>

</div>
