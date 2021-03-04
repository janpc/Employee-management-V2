

window.addEventListener('load', () => {
    error = document.querySelector('.error-messages');
    if(error) {
            document.querySelector('.error-close')
            .addEventListener('click', function() {
                error.remove();
        })
        setTimeout(() => {
            error.remove();
        }, 2000)
    }
})