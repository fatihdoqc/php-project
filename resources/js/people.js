$(document).ready( function () {
    var table = $('#example').DataTable({
        "columns": [
            { "title": "ID",
              "data" : "id"},

            { "title": "NAME",
            "data" : "name" },

            { "title": "ADDRESS",
            "data" : "address" },

            { "title": "PHONE",
            "data" : "phone" },

            { "title": "EMAIL",
            "data" : "email" },

            { "title": "WEBSITE",
            "data" : "website" },

            { "title": "ACTION"},
                  
        ],

        /*"columnDefs": [ {
            "targets": 0,
            "render": function ( data, type, row, meta ) {
                return '<a href="example.com/member/'+row.slug+'" target="_blank">'+row.name+'</a>';
            }
          } ]
        */
    });
    
  } );