<div class="flex gap-4 px-4 py-5 overflow-hidden bg-white rounded-lg shadow sm:p-6">
    @if ($icon)
        <div class="p-3 bg-indigo-500 rounded-md">
            <x-dynamic-component :component="$icon" class="text-white size-6" />
        </div>
    @endif

    <div class="">
        <dd class="items-baseline text-2xl font-semibold text-gray-900">
            {{ $value }}
        </dd>
        <dt class="text-sm font-medium leading-4 text-gray-500 truncate">
            {{ $label }}
        </dt>
    </div>
</div>
