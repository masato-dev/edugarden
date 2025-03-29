;(async function () {
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
})();