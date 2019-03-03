$(document).ready(function() {
    //load books into table
    $.ajax({
        url: 'getBooks',
        type: 'GET',
        success: function(books) {
            console.log(books)
            let html = "";
            books.forEach(function(book) {
                html += `<tr><td>${book.title}</td>
                <td>${book.author}</td>
                <td style="text-align:center;">
                <button class="ui small icon button" onclick="deleteBook(${book.id})">
                <i class="trash alternate icon"></i>
                </button>
                </td></tr>`;
            });
            $("#bookList tbody").html(html);
        }
    });

    //when adding new book
    $("#submitBtn").on('click',function(e) {
        const title = $("#newTitle").val();
        const author = $("#newAuthor").val();
        if (title && author) {
            //create new
            $.ajax({
                url: 'addBook',
                data: {
                    'title':title,
                    'author':author
                },
                type: 'POST',
                success: function() {
                    alert('Successfully added book');
                    window.location.reload();
                }
            });
        } else {
            //require user to provide both
            alert('Please include both title and author');
        }
    });
});

function deleteBook(id) {
    if (window.confirm("Do you really want to remove this book?")) {
        $.ajax({
            url: "/removeBook",
            data: {
                'id': id
            },
            type: 'DELETE',
            success: function() {
                alert('Successfully removed book');
                window.location.reload();
            }
        });
    }
}