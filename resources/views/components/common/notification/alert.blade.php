@session('message')
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                notification.toast(@json(session('message')), @json(session('alertType')));
            });
        </script>
    @endpush
@endsession
