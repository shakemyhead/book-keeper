<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Book;

class BookController extends Controller
{
    public function create() {
        $model = new Book();
        $model->create(Input::all());
    }
    
    public function exportBooks($format,$content) {
        $model = new Book();
        $model->exportBooks($format,$content);
    }

    public function read() {
        $model = new Book();
        return $model->read();
    }

    public function remove() {
        $model = new Book();
        $model->remove(Input::get('id'));
    }

    public function sortByTitle() {
        $model = new Book();
        return $model->sortByTitle();
    }

    public function sortByAuthor() {
        $model = new Book();
        return $model->sortByAuthor();
    }

    public function search($text) {
        $model = new Book();
        return $model->search($text);
    }

    public function updateAuthor($id,$author) {
        $model = new Book();
        return $model->updateAuthor($id,$author);
    }
}
