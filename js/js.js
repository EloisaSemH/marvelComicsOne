window.addEventListener("load", () => {
    let url = window.location.pathname;

    url = url.split('/')
    url = url[url.length - 1].split('.')

    if (url[0] == 'index') {
        navbar.className = navbar.className + ' indexNavbar'
    } else {
        navbar.className = navbar.className + ' bg-dark'
    }
})