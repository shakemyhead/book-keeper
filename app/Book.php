<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = ['id'];

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

    public function search($text) {
        return Book::where('title','like',"%$text%")
            ->orWhere('author','like',"%$text%")
            ->get()->toArray();
    }

    public function sortByTitle() {
        return Book::orderBy('title','ASC')->get()->toArray();
    }

    public function sortByAuthor() {
        return Book::orderBy('author','ASC')->get()->toArray();
    }

    public function updateAuthor($id,$author) {
        Book::find($id)->update([
            'author' => $author
        ]);
        return $this->read();
    }
}
