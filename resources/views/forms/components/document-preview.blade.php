@php
    $url = $getUrl();
@endphp

@if (filled($url))
    <iframe src="{{ $url }}#view=FitH" frameborder="0" class="w-full h-full"></iframe>
@else
    <x-filament-tables::empty-state
        icon="heroicon-o-eye-slash"
        :heading="__('empty_state_header')"
        :description="__('empty_state_description')" />
@endif
