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
                console.log(res);
            }

            if (res.error) {
                console.log(res);
            }

            form_.trigger("reset");
        },
        error: function (res){
            console.log(res);
        }
    });

    return false;
}