<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Semantic UI -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.js"></script>
        <!-- My script -->
        <script src="{{ asset('js/books.js') }}"></script>
        <!-- Semantic UI CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.css"/>

        <title>Book Keeping App</title>
    </head>

    <body>
        <div class="ui centered grid" style="margin-top:1em;">
            <div class="row">
                <div class="ui left aligned segment" style="width:40%;">
                    <div class="ui dividing header">Add a new book</div>
                    <p><div class="ui labeled input">
                        <div class="ui label">Title</div>
                        <input id="newTitle" type="text" required>
                    </div></p>
                    <p><div class="ui labeled input">
                        <div class="ui label">Author</div>
                        <input id="newAuthor" type="text" required>
                    </div></p>
                    <div id="submitBtn" class="ui primary button">Add</div>
                </div>
            </div>
            <div class="row">
                <div class="ui left aligned segment" style="width:40%;">
                    <div class="ui dividing header">Current list of books</div>
                    <table id="bookList" class="ui celled table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
