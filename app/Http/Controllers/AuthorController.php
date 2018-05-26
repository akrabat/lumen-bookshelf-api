<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorController extends Controller
{
    public function list() : Response
    {
        $authors = Author::all();
        return response()->json($authors, 200);
    }

    public function show(int $id) : Response
    {
        $author = Author::findOrFail($id);
        return response()->json($author, 200);
    }

    public function add(Request $request) : Response
    {
        $data = $this->validate($request, [
            'name' => 'required|max:100',
            'biography' => 'nullable',
        ]);

        $author = Author::create($data);
        $author->save();

        return response()->json($author, 201);
    }

    public function update(Request $request, $id) : Response
    {
        $data = $this->validate($request, [
            'name' => 'required|max:100',
            'biography' => 'nullable',
        ]);

        $author = Author::findOrFail($id);
        $author->fill($data);
        $author->save();

        return response()->json($author, 200);
    }

    public function delete($id) : Response
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return response('', 204);
    }
}
