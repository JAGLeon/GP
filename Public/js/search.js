document.addEventListener('keyup',e => {
    if(e.target.matches('#search')){
        document.querySelectorAll('.article').forEach(x => {
            x.textContent.toLocaleLowerCase().includes(e.target.value.toLocaleLowerCase())
            ? x.parentElement.classList.remove('filtro')
            : x.parentElement.classList.add('filtro');
        })
    }
})