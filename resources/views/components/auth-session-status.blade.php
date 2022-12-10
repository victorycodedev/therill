@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-success  bold']) }}>
        {{ $status }}
    </div>
@endif
