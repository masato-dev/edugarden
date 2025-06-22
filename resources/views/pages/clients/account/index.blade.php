@extends('layout.clients.main')

@component('components.common.notification.alert')@endcomponent

@section('content')
    <div class="container py-5">

        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb k-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thông tin cá nhân</li>
            </ol>
        </nav>

        <div class="row g-5">
            <div class="col-md-3 mb-3 p-3 rounded border border-1" style="height: fit-content;">
                <div class="list-group" id="profile-tab" role="tablist">
                    <a class="k-list-group-item list-group-item list-group-item-action active" data-bs-toggle="list" href="#basic-info" role="tab">Thông tin cơ bản</a>
                    <a class="k-list-group-item list-group-item list-group-item-action" data-bs-toggle="list" href="#change-password" role="tab">Đổi mật khẩu</a>
                    <a class="k-list-group-item list-group-item list-group-item-action text-danger" href="{{ route('auth.client.logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Đăng xuất
                    </a>
                    <form id="logout-form" action="{{ route('auth.client.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

            <div class="col-md-9 ">
                <div class="tab-content" id="profile-tabContent">
                    @include('pages.clients.account.blocks.information')
                    @include('pages.clients.account.blocks.reset-password')
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/pages/account.js'])
@endpush