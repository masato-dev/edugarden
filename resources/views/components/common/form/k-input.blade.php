<div class="k-input-wrapper d-flex align-items-center gap-2">
    @if (isset($icon))
        <i class="icon {{ $icon ?? 'ic-user' }}"></i>
    @endif
    <input name="{{ $name ?? '' }}" id="{{ $id ?? '' }}" type="{{ $type ?? 'text' }}" placeholder="{{ $placeholder ?? '' }}" class="k-input">
</div>