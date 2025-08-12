@foreach ($items as $item)
    @php
        $isActive = Request::is(trim($item->url, '/') === '' ? '/' : trim($item->url, '/') . '*');
        $hasChildren = !empty($item->children) && count($item->children) > 0;
    @endphp

    <li class="nav-item {{ $hasChildren ? 'dropdown' : '' }}">
        <a href="{{ $item->url }}"
           class="nav-link d-flex align-items-center {{ $hasChildren ? 'dropdown-toggle' : '' }} {{ $isActive ? 'text-main fw-bold' : '' }}"
           @if($hasChildren) data-bs-toggle="dropdown" role="button" aria-expanded="false" @endif>
            {{ $item->title }}
            @if($hasChildren)
                <i class="icon ic-arrow-down ms-1 fs-6"></i>
            @endif
        </a>

        @if ($hasChildren)
            <ul class="dropdown-menu">
                @include('partials.clients.menu-items', ['items' => $item->children])
            </ul>
        @endif
    </li>
@endforeach
