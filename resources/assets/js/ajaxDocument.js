function getAjaxDocument() {
    this.init = function() {
        this.ajax();
    };

    this.ajax = function() {
        $('#search').change(function(event) {
            event.preventDefault();
            var text = $('#search').val().replace(/\s\s+/g, ' ');

            $.ajax({
                url: '/getDocument/search/' + id,
                type: 'GET',
                data: {
                    'data': text
                },
                dataType: 'JSON',
            }).done(function(data){
                $('#data-search').html(data.html);
            });
        });
    };
}

let ajaxDocument = new getAjaxDocument();

ajaxDocument.init();
