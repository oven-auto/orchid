window.axiosConfig = function () {
    return {
        'content-type': 'multipart/form-data'
    }
}

window.makeUrl = function (str, params = null) {
    let firstChar = str.substring(0, 1)

    if (firstChar != '/')
        str = '/' + str

    let url = 'http://localhost:8090/api/front' + str

    return url
}
