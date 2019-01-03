function Text() {
    return '<div class="form-group m-form__group">' +
            '<label>' +
                '<h5>' +
                    'File Upload' +
                '</h5>' +
            '</label>' +
            '<div class="m-input-icon">' +
                '<input type="file" class="form-control m-input m-input--pill" name="file" placeholder="File">' +
            '</div>' +
        '</div>';
}

function ChangeInput() {
    this.init = function() {
        this.change();
    };

    this.change = function() {
        $('#type').change(function(){
            if ($(this).val() == 'file') {
                $('#upload').html(Text());
            } else {
                $('#upload').html('');
            }
        });
    };
}

let Change = new ChangeInput();

Change.init();
