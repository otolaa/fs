$(document).ready(function () {
    /* the submit forms */
    $(document).on("submit", "form.SubmitFormAjax", addFormSubmitNew);
});

const addFormSubmitNew = function (event) {
    event.preventDefault();
    var form_ =  $(this);

    $.ajax({
        url: form_.attr("action"),
        type: form_.attr("method"),
        dataType: "JSON",
        data: new FormData(this),
        processData: false,
        contentType: false,
        beforeSend: function() { },
        complete: function() { },
        success: function (res) {
            if (res.id) {
                let jsn = JSON.stringify(res, undefined, 2);
                clickModal(res.slug, '<pre>'+jsn+'</pre>');
                console.log(jsn);
            }

            if (res.error) {
                console.log(JSON.stringify(res,undefined, 2));
            }

            form_.trigger("reset");
        },
        error: function (res){
            console.log(res);
        }
    });

    return false;
}

const clickModal = (title, body) => {
    var popup = document.getElementById('popupModal');
    $(popup).find('h1').html(title);
    $(popup).find('div.modal-body').html(body);
    var myModal = new bootstrap.Modal(popup);
    myModal.show();
}