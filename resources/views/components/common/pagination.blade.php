@vite(['resources/css/libraries/jquery-pagination.min.css', 'resources/js/libraries/jquery-pagination.min.js'])

<div>

    <div id="paginationLoader" style="display: none;">
        <div class="text-center my-5">
            <div class="spinner-border text-primary" role="status"></div>
            <p class="mt-2">Đang tải dữ liệu...</p>
        </div>
    </div>
    <div id="dataWrapper" class="{{ $rowWrappers }}"></div>
    <div class="mt-3 d-flex justify-content-center" id="pagination-container">
        <div id="paginationWrapper"></div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dataWrapper = document.getElementById('dataWrapper');
        const paginationWrapper = document.getElementById('paginationWrapper');

        const paginationApp = {
            start() {
                this.registerEvents();
            },

            paginate() {
                $('#paginationWrapper').pagination({
                    dataSource: '{{ $url }}',
                    locator: 'data',
                    totalNumberLocator: function(response) {
                        return response.total; // Tổng số record, dùng để tạo pagination
                    },
                    pageSize: {{ $perPage }},
                    ajax: {
                        method: '{{ $method }}',
                        dataType: 'json',
                        beforeSend: function() {
                            $('#paginationLoader').show();
                            $('#dataWrapper').hide(); // Ẩn nội dung cũ
                        }
                    },
                    callback: function(data, pagination) {
                        fetch(`{{ route('ajax.components.load-many') }}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                component: '{{ $component }}',
                                records: data,
                                recordType: '{{ $recordType }}'
                            })
                        })
                        .then(response => response.json())
                        .then(json => {
                            const htmls = Array.from(json.data).map(html => `<div class="col mt-3">${html}</div>`);
                            document.getElementById('dataWrapper').innerHTML = htmls.join('');
                            $('#paginationLoader').hide();
                            $('#dataWrapper').show();
                        });
                    }
                });

            },

            registerEvents() {
                this.paginate();
            }
        }

        paginationApp.start();
    })
</script>