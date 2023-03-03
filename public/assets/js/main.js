$(document).ready(function(){
    $('.select_author').select2();

    //Login
    loginPerform();

    //Datatables
    authorDatatable();
    readerDatatable();
    bookDatatable();
    readersBookDatatable();

    //Add records Forms
    authorFormAdd();
    bookFormAdd();
    readerFormAdd();

});

function dynamicAjax(fileName , reqType , dataObj, succFunction, processData, contentType){
    $.ajax({
        url: fileName,
        type: reqType,
        dataType: 'json',
        data: dataObj,
        contentType:contentType,
        processData:processData,
        success: succFunction,
        error: function (error) {
            console.log(error);
        }
    });
}

function add_action(form, modal_html, modal, modal_html_text){
    console.log(form);
    $('#'+form).trigger("reset");
    $('#'+modal_html).html(modal_html_text);
    $('#'+modal).modal('show');
    $('#id').val('');
}

function loginPerform(){

    $("#loginForm").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8
            }
        },
        messages: {
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 8 characters long"
            },
            email: "Please enter a valid email address"
        },
        submitHandler: function(form) {

            dynamicAjax('/login_perform','POST',$("#loginForm").serializeArray(), function (data){
                if (data.status) {
                    window.location = data.redirect;
                }else{
                    $(".alert").remove();
                    $.each(data.errors, function (key, val) {
                        $("#errors-list").append("<div class='alert alert-danger'>" + val + "</div>");
                    });
                }
            });
        }

    });

}


/* Librarian */

    // Author

    function authorDatatable(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#authors_table').DataTable({
            processing: true,
            serverSide: true,
            ajax:"/librarian/dashboard/authors",
            columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'surname'},
                { data: 'librarian.name'},
                {data: 'action'},
            ],
            order: [[0, 'desc']]
        });
    }

    function authorFormAdd(){
        $('#AuthorForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            dynamicAjax($(this).data('url'),'POST',formData, function (data){
                $("#author-modal").modal('hide');
                var oTable = $('#authors_table').dataTable();
                oTable.fnDraw(false);
                $("#btn-save").html('Submit');
                $("#btn-save").attr("disabled", false);
            },false,false);
        });
    }

    function authorEdit(id){

        dynamicAjax("authors/edit",'POST',{ id: id },function (data){
            $('#AuthorModal').html("Edit Author");
            $('#author-modal').modal('show');
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#surname').val(data.surname);
        });

    }

    function authorDelete(id){
        if (confirm("Delete Record?") == true) {
            var id = id;
            dynamicAjax("authors/delete",'POST',{ id: id }, function (data){
                var oTable = $('#authors_table').dataTable();
                oTable.fnDraw(false);
            });

        }
    }

    //Book

    function bookDatatable(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#books_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/librarian/dashboard/books',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            { data: 'description' },
            { data: 'book_number'},
            { data: 'author.name' },
            {data: 'action', name: 'action', orderable: false},
        ],
        order: [[0, 'desc']]
    });
}

    function bookFormAdd(){

        $('#BookForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            dynamicAjax('/librarian/dashboard/books/create','POST',formData, function (data){
                if(data.errors){

                    $.each(data.errors, function (key, val) {
                        $("#errors-list").append("<div class='alert alert-danger'>" + val + "</div>");
                    });
                }else{
                    $("#book-modal").modal('hide');
                    var oTable = $('#books_table').dataTable();
                    oTable.fnDraw(false);
                    $("#btn-save-books").html('Submit');
                    $("#btn-save-books").attr("disabled", false);
                }
            },false,false);


    });
}

    function booksEdit(id){

    dynamicAjax("books/edit",'POST',{ id: id }, function (data){
        $('#BookModal').html("Edit Books");
        $('#book-modal').modal('show');
        $('#id').val(data.id);
        $('#title').val(data.title);
        $('#description').val(data.description);
        $('#book_number').val(data.book_number);
        $("#select_author").val(data.author_id).trigger('change');
    });

    }

    function booksDelete(id){
    if (confirm("Delete Record?") == true) {
        var id = id;
        dynamicAjax("books/delete",'POST',{ id: id }, function (data){
            var oTable = $('#books_table').dataTable();
            oTable.fnDraw(false);
        });
    }
}

    //Reader

    function readerDatatable(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#readers_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/librarian/dashboard/readers',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'surname', name: 'surname' },
            { data: 'email', name: 'email' },
            {data: 'action', name: 'action', orderable: false},
        ],
        order: [[0, 'desc']]
    });
}

    function readerFormAdd(){

       $('#ReaderForm').submit(function(e) {
           e.preventDefault();
           var formData = new FormData(this);
           dynamicAjax('/librarian/dashboard/readers/create','POST',formData, function (data){

               if(data.errors){
                   $(".alert").remove();
                   $.each(data.errors, function (key, val) {
                       $("#errors-list").append("<div class='alert alert-danger'>" + val + "</div>");
                   });
               }else{
                   $("#reader-modal").modal('hide');
                   var oTable = $('#readers_table').dataTable();
                   oTable.fnDraw(false);
                   $("#btn-save-readers").html('Submit');
                   $("#btn-save-readers").attr("disabled", false);
               }

               },false,false);
       });
    }

    function readerEdit(id){
        dynamicAjax("readers/edit",'POST',{ id: id }, function (data){
            $('#ReaderModal').html("Edit readers");
            $('#reader-modal').modal('show');
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#surname').val(data.surname);
            $('#email').val(data.email);

        });

}

    function readerDelete(id){
    if (confirm("Delete Record?") == true) {
        var id = id;
        dynamicAjax("readers/delete",'POST',{ id: id }, function (data){
            var oTable = $('#readers_table').dataTable();
            oTable.fnDraw(false);
        });
    }
}


/* END Librarian */



/* Reader */

    function readersBookDatatable(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#readers_books_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/reader/dashboard/books',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            { data: 'description', name: 'description' },
            { data: 'book_number', name: 'book_number' },
            { data: 'author.name' },
        ],
        order: [[0, 'desc']]
    });
}

/* END Reader */
