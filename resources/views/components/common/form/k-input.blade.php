<div class="k-input-container">
    <div class="k-input-wrapper d-flex align-items-center gap-2">
        @if (isset($icon))
            <i class="icon {{ $icon ?? 'ic-user' }}"></i>
        @endif
        <input name="{{ $name ?? '' }}" id="{{ $id ?? '' }}" type="{{ $type ?? 'text' }}" placeholder="{{ $placeholder ?? '' }}" class="k-input">
        @if (!empty($error))
            <div class="mt-3">
                <span class="text-danger">{{ $error }}</span>
            </div>
        @endif
    </div>
</div>