;(async function () {
    const registerModalChurchInput = document.getElementById('registerModalChurchInput');
    const response = await fetch(route('ajax.churchs.index'));
    if(response.ok) {
        const json = await response.json();
        const data = json.data;
        const churchs = data.map((item) => {
            return {
                label: item.name,
                value: item.id
            }
        });
        
        VirtualSelect.init({
            ele: '#churchSelect',
            placeholder: 'Hội thánh',
            search: true,
            options: churchs,
        })
    }

    document.querySelector('#churchSelect').addEventListener('change', e => {
        const churchId = e.target.value;
        registerModalChurchInput.value = churchId;
    });
})();