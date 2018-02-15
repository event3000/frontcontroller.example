(function () {
    'use strict';

    let form = document.forms.add_good;
    form.addEventListener('submit', addGood);
    function addGood(event) {
        event.preventDefault();

        let formData = new FormData();
        formData.append("title", form.title.value);
        formData.append("price", form.price.value);
        formData.append("file", form.file.files[0]);

        // let xhr = new XMLHttpRequest();
        // // xhr.setRequestHeader();
        // xhr.addEventListener('load', function (event) {
        //     console.log("load", event);
        // });
        // xhr.addEventListener('loaded', function (event) {
        //     console.log("loaded", event);
        // });
        // xhr.addEventListener("error", function (event) {
        //     console.log("error");
        // });
        // xhr.onreadystatechange = function () {
        //     if (this.readyState !== 4) return;
        //     console.log(this.responseText);
        // };

        // xhr.open("POST", '/goods/add');
        // xhr.send(formData);

        $.ajax({
            url: '/goods/add',
            type: 'post',
            processData: false,
            contentType: false,
            data: formData,
            success: function(response) {
                console.log("response", response);
            }
        });
    }
}());