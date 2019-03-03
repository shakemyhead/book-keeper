<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function create($data) {
        $newBook = new Book();
        $newBook->title = $data['title'];
        $newBook->author = $data['author'];
        $newBook->save();
    }

    public function read() {
        return Book::get()->toArray();
    }

    public function remove($id) {
        Book::find($id)->delete();
    }
}
