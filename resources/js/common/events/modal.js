;(function () {
    const kModals = document.querySelectorAll('.k-modal');
    const kModalCloseBtns = document.querySelectorAll('.k-modal-close');

    const hideModalOnClick = (event) => {
        if (event.target === event.currentTarget) {
            event.currentTarget.classList.remove('show');
        }
    };

    kModals.forEach(item => {
        item.addEventListener('click', hideModalOnClick);
    });

    kModalCloseBtns.forEach(item => {
        item.addEventListener('click', () => {
            item.closest('.k-modal').classList.remove('show');
        });
    });
})();