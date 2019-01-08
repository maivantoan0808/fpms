var Treeview = function () {
    var demo4 = function() {
        $('#m_tree_4').jstree({
            'core': {
                'themes': {
                    'responsive': true
                }, 
                // so that create works
                'check_callback': true,
                'data': {
                    'url': '/getTree/' + id,
                    'dataType': 'json'
                }
            },
            'types': {
                'default_dir': {
                    'icon': 'fa fa-folder m--font-brand'
                },
                'file_word': {
                    'icon': 'fa fa-file-word-o m--font-brand'
                },
                'file_excel': {
                    'icon': 'fa fa-file-excel-o m--font-brand'
                },
                'file_powerpoint': {
                    'icon': 'fa fa-file-powerpoint-o m--font-brand'
                },
                'file_pdf': {
                    'icon': 'fa fa-file-pdf-o m--font-brand'
                },
                'file_database': {
                    'icon': 'fa fa-database m--font-brand'
                },
                'file_image': {
                    'icon': 'fa fa-file-photo-o m--font-brand'
                },
                'default_file': {
                    'icon': 'fa fa-file  m--font-brand'
                }
            },
            'state': { 'key': 'demo2' },
            'plugins': [ 'state', 'types' ]
        }).on('select_node.jstree', function(e,data) {
            var node = data.node.a_attr.id;
            var documentLink = data.node.original.document_link;
            $('#' + node).attr("href", documentLink);
        });
    }

    return {
        //main function to initiate the module
        init: function () {
            demo4();
        }
    };
}();

jQuery(document).ready(function() {    
    Treeview.init();
});
