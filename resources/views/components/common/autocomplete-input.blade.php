<div class="position-relative">
    <div class="input-group">
        <input id="{{ $id }}" class="form-control" placeholder="Nhập từ khóa...">
        <input type="hidden" name="{{ $name }}" id="{{ $id }}Hidden">
        <button type="button" class="btn btn-outline-secondary" id="{{ $id }}ClearBtn">&times;</button>
    </div>
    <ul id="{{ $id }}Results" class="list-group mt-1 d-none w-100" style="position: absolute; z-index: 1000; max-height: 400px; overflow-y: auto"></ul>
</div>

<script>
    ;(function() {
        let timeout = null;
        const inputId = @json($id);
        const input = document.getElementById(inputId);
        const hiddenInput = document.getElementById(`${inputId}Hidden`);
        const resultList = document.getElementById(`${inputId}Results`);
        const clearBtn = document.getElementById(`${inputId}ClearBtn`);

        const fetchData = async (keyword = '') => {
            const url = `{{ route('ajax.autocomplete.index', ['queryTable' => $queryTable, 'queryColumn' => $queryColumn]) }}&keyword=${encodeURIComponent(keyword)}`;
            const response = await fetch(url);
            if (response.ok) {
                const data = await response.json();
                return data.data || [];
            }
            return [];
        };

        const showResults = (items) => {
            if (items.length === 0 || input.value.trim() === '') {
                resultList.classList.add('d-none');
                return;
            }

            resultList.innerHTML = items.map(item => `
                <li class="list-group-item list-group-item-action" style="cursor: pointer">${item[`${@json($queryColumn)}`]}</li>
            `).join('');
            resultList.classList.remove('d-none');

            resultList.querySelectorAll('li').forEach(li => {
                li.addEventListener('click', () => {
                    input.value = li.textContent;
                    hiddenInput.value = item.id;
                    resultList.classList.add('d-none');
                });
            });
        };

        input.addEventListener('focus', async () => {
            if (input.value.trim() === '') return;
            const results = await fetchData(input.value);
            showResults(results);
        });

        input.addEventListener('input', () => {
            clearTimeout(timeout);
            const keyword = input.value.trim();

            timeout = setTimeout(async () => {
                if (keyword === '') {
                    resultList.classList.add('d-none');
                    return;
                }
                const results = await fetchData(keyword);
                showResults(results);
            }, 300);
        });

        input.addEventListener('blur', () => {
            setTimeout(() => {
                resultList.classList.add('d-none');
            }, 200);
        });

        clearBtn.addEventListener('click', () => {
            input.value = '';
            resultList.classList.add('d-none');
        });
    })();

</script>
