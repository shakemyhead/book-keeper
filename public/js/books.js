$(document).ready(function() {
    //load books into table
    $.ajax({
        url: 'getBooks',
        type: 'GET',
        success: function(books) {
            populateBooksTable(books);
        }
    });

    //dropdown
    $('.ui.dropdown')
    .dropdown();

    //when exporting csv
    $("#exportCSVTitles").on('click',{ 'format':'csv','content':'titles' },exportBooks);
    $("#exportCSVAuthors").on('click',{ 'format':'csv','content':'authors' },exportBooks);
    $("#exportCSVFull").on('click',{ 'format':'csv','content':'full' },exportBooks);
    
    //when exporting xml
    $("#exportXMLTitles").on('click',{ 'format':'xml','content':'titles' },exportBooks);
    $("#exportXMLAuthors").on('click',{ 'format':'xml','content':'authors' },exportBooks);
    $("#exportXMLFull").on('click',{ 'format':'xml','content':'full' },exportBooks);

    //when adding new book
    $("#submitBtn").on('click',addNewBook);

    //searching by text
    $("#search").on('click',searchBooks);

    //sorting by title
    $("#sortByTitle").on('click',sortByTitle);

    //sorting by author
    $("#sortByAuthor").on('click',sortByAuthor);
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

function addNewBook() {
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
}

function editAuthorModal(authorName,id) {
    $('.mini.modal')
        .modal('show');
    $("#newAuthorName").val(authorName);
    $("#updateAuthor").on('click',{ 'id':id },updateAuthor);
}

function exportBooks(event) {
    $.ajax({
        url: `exportBooks/${event.data.format}/${event.data.content}`,
        type: 'GET',
        success: function() {
            window.open(`books_${event.data.content}.${event.data.format}`, '_blank');
        }
    });
}

function updateAuthor(event) {
    const newAuthorName = $("#newAuthorName").val();
    $.ajax({
        url: `updateAuthor/${event.data.id}/${newAuthorName}`,
        type: 'PATCH',
        success: function(results) {
            $('.mini.modal')
                .modal('hide');
            populateBooksTable(results);
        }
    });
}

function populateBooksTable(books) {
    let html = "";
    books.forEach(function(book) {
        html += `<tr><td>${book.title}</td>
        <td>${book.author} 
            <button class="ui right floated mini class icon button" onclick="editAuthorModal('${book.author}',${book.id})">
                <i class="edit icon"></i>
            </button>
        </td>
        <td style="text-align:center;">
            <button class="ui small icon button" onclick="deleteBook(${book.id})">
                <i class="trash alternate icon"></i>
            </button>
        </td></tr>`;
    });
    $("#bookList tbody").html(html);
}

function searchBooks() {
    const searchText = $("#searchText").val();
    $.ajax({
        url: `search/${searchText}`,
        type: 'GET',
        success: function(results) {
            populateBooksTable(results);
        }
    });
}

function sortByTitle() {
    $.ajax({
        url: `sortByTitle`,
        type: 'GET',
        success: function(results) {
            populateBooksTable(results);
        }
    });
}

function sortByAuthor() {
    $.ajax({
        url: `sortByAuthor`,
        type: 'GET',
        success: function(results) {
            populateBooksTable(results);
        }
    });
}