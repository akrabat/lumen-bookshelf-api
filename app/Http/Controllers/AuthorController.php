<?php

namespace App\Http\Controllers;

use App\Author;
use App\Transformer\AuthorTransformer;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Symfony\Component\HttpFoundation\Response;
use League\Fractal\Serializer\JsonApiSerializer;

class AuthorController extends Controller
{
    public function list(Manager $fractal) : Response
    {
        $authors = Author::all();

        $resource = new Collection($authors, new AuthorTransformer, 'authors');
        return response()->json(
            $fractal->createData($resource)->toArray(),
            200,
            ['content-type' => 'application/vnd.api+json']
        );
    }

    public function show(Manager $fractal, int $id) : Response
    {
        $author = Author::findOrFail($id);

        $resource = new Item($author, new AuthorTransformer, 'authors');
        return response()->json(
            $fractal->createData($resource)->toArray(),
            200,
            ['content-type' => 'application/vnd.api+json']
        );
    }

    public function add(Manager $fractal, Request $request) : Response
    {
        $data = $this->validate($request, [
            'name' => 'required|max:100',
            'biography' => 'nullable',
        ]);

        $author = Author::create($data);
        $author->save();

        $resource = new Item($author, new AuthorTransformer, 'authors');
        return response()->json(
            $fractal->createData($resource)->toArray(),
            201,
            ['content-type' => 'application/vnd.api+json']
        );
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

        $resource = new Item($author, new AuthorTransformer, 'authors');
        return response()->json(
            $fractal->createData($resource)->toArray(),
            200,
            ['content-type' => 'application/vnd.api+json']
        );
    }

    public function delete($id) : Response
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return response('', 204);
    }
}
