<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function list()
    {
        $authors = Author::all();
        return $authors;
    }

    public function show(int $id)
    {
        $author = Author::findOrFail($id);
        return $author;
    }
}
