

window.addEventListener('load', () => {
    error = document.querySelector('.error-messages');
    if(error) {
        error.style.top =0;
            document.querySelector('.error-close')
            .addEventListener('click', function() {
                close(error);
        })
        setTimeout(() => {
            close(error);
        }, 8000)
    }
})

function close($node){
    $node.style.top = '-200px';
    setTimeout(() => {
        error.remove();
    }, 1000)
}