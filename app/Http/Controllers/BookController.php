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

    public function remove() {
        $model = new Book();
        $model->remove(Input::get('id'));
    }

    public function read() {
        $model = new Book();
        return $model->read();
    }
}
