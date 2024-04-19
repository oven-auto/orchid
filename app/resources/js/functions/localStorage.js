window.setToLocalStorage = function (key, param) {
    localStorage.setItem(key, JSON.stringify(param))
}

window.getFromLocalStorage = function (key) {
    return JSON.parse(localStorage.getItem(key))
}
