window.addEventListener("load", () => {
    let url = window.location.pathname;

    url = url.split('/')
    url = url[url.length - 1].split('.')

    if (url[0] == 'index') {
        navbar.className = navbar.className + ' indexNavbar'
    } else {
        navbar.className = navbar.className + ' bg-dark'
        TextLimit();
    }
})

function TextLimit() {
    let obj = document.querySelectorAll('.card-text');
    obj.forEach((txt) => {
        console.log(txt.textContent);
        let textC = txt.textContent;
        let lenght = 100;
        let txtFormated = textC.substr(0, lenght);
        txt.innerHTML = txtFormated + '...';
    });
}