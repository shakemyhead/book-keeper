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
        <!-- author name editing modal -->
        <div class="ui mini modal">
            <div class="header">Edit Author</div>
            <div class="content">
                <div class="ui fluid action input">
                    <input id="newAuthorName" type="text">
                    <div class="ui small primary button" id="updateAuthor">Update</div>
                </div>
            </div>
            <div class="actions">
                <div class="ui small cancel button">Cancel</div>
            </div>
        </div>

        <div class="ui centered grid" style="margin-top:1em;">
            <div class="row">        
                <!-- adding new book section -->
                <div class="ui left aligned segment" style="width:40%;">
                    <div class="ui dividing header">Add a new book</div>
                    <p><div class="ui fluid labeled input">
                        <div class="ui label">Title</div>
                        <input id="newTitle" type="text">
                    </div></p>
                    <p><div class="ui fluid labeled input">
                        <div class="ui label">Author</div>
                        <input id="newAuthor" type="text">
                    </div></p>
                    <div id="submitBtn" class="ui right floated primary button">Add</div>
                </div>
            </div>
            <div class="row">
            <!-- listing all books section -->
                <div class="ui left aligned segment" style="width:40%;">
                    <div class="ui dividing header">Current list of books</div>
                    <div class="ui fluid action input">
                        <input type="text" placeholder="Search..." id="searchText">
                        <div class="ui icon button" id="search"><i class="search icon"></i></div>
                    </div>
                
                    <table id="bookList" class="ui celled table">
                        <thead>
                            <tr>
                                <th>Title <button class="ui mini right floated icon button" id="sortByTitle"><i class="sort icon"></i></button></th>
                                <th>Author <button class="ui mini right floated icon button" id="sortByAuthor"><i class="sort icon"></i></button></th>
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
