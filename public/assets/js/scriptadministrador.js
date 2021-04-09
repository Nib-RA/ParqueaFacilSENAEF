$(document).ready(function () {
    $('.eliminar').click(function() {
        let action = $(this).attr('data-id');
        $('#modal-form-delete').attr('action', action);
    });
});