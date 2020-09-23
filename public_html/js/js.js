window.addEventListener("load", () => {
    let url = window.location.pathname;

    url = url.split('/')
    url = url[url.length - 1].split('.')

    if (url[0] == 'index' || url == 'public_html' || url == '') {
        navbar.className = navbar.className + ' indexNavbar'
    } else {
        navbar.className = navbar.className + ' bg-dark'
        TextLimit();
    }
})

function TextLimit() {
    let obj = document.querySelectorAll('.card-text');
    obj.forEach((txt) => {
        if (txt.textContent != '') {
            let textC = txt.textContent;
            let lenght = 100;
            let txtFormated = textC.substr(0, lenght);
            txt.innerHTML = txtFormated + '...';
        }
    });
}

function OrderBy(orderby) {
    Swal.fire({
        title: 'Deseja ordenar nesta página?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#ff0000',
        confirmButtonText: 'Sim!'
    }).then((result) => {
        if (result.isConfirmed) {
            let url = window.location.pathname
            url = url.split('/')
            url = url[url.length - 1]
            url = url + '?orderby=' + orderby
            document.location.href = url;
        }
    })
}