$(document).ready(function() {
    var $modal = $('#editable_area_modal');
    var _Token = $('body').attr('data-csrf');
    // $('.editable-area-panel-button').on('click', function () {
    //     $modal.modal({
    //         backdrop: 'static'
    //     })
    // });

    $modal.on('show.bs.modal', function(e) {
        var $button = $(e.relatedTarget);
        var area_code = $button.data('areacode');
        var area_id = $button.data('areaid');
        $.ajax({
            type: 'post',
            url: '/area/gettext',
            dataType: 'json',
            data: {
                id: area_id
            },
            success: function(resp) {
                if (resp.success) {
                    $modal.find('.editable-area-save-btn').attr('data-area', area_id);
                    $modal.find('.modal-title').text("Редактирование области: " + resp.name);
                    var ckredactor = CKEDITOR.instances['editable-area-modal-editor'];
                    if (ckredactor)
                        ckredactor.destroy();
                    CKEDITOR.replace('editable-area-modal-editor', {
                        "defaultLanguage": "ru",
                        "height": 200,
                        "allowedContent": true,
                        "extraPlugins": "uploadimage,texttransform,image2,justify,youtube,uploadfile,spoiler,bt_table",
                        "uploadUrl": "http://roz.loc/admin/ckeditor/upload/image?_token=" + _Token,
                        "filebrowserUploadUrl": "http://roz.loc/admin/ckeditor/upload/image?_token=" + _Token
                    });
                    $('#editable-area-modal-editor').val(resp.text);
                    $modal.modal('show');
                }
            }
        });
    });
    $modal.find('.btn-secondary,.close').on('click', function() {
        $modal.modal('hide');
    });
    $modal.find('.editable-area-save-btn').on('click', function() {
        var $this = $(this);
        $.ajax({
            type: 'post',
            url: '/area/save',
            dataType: 'json',
            data: {
                id: $this.data("area"),
                text: CKEDITOR.instances['editable-area-modal-editor'].getData()
            },
            success: function(resp) {
                if (resp.success)
                    location.reload();
            }
        });
    })
});