<?php

namespace App\Http\Controllers\Api;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::with(['category'])->get(); per passare anche i valori della tabella delle categorie

        $posts = Post::with(['category', 'tags'])->paginate(2); //per avere solo 2 elementi per pagina

        foreach ($posts as $post){

            if ($post->cover) {
                $post->cover = url('storage/'.$post->cover);
            } else {
                $post->cover = url('img/fallback.jpg');
            }
        }

        return response()->json(
            [
                'results' => $posts,
                'success' => true           
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', "=", $slug)->with(['category', 'tags'])->first();

        if ($post) {
            return response()->json(
                [
                    'result' => $post,
                    'success' => true
                ]
            );
        } else {
            return response()->json(
                [
                    'result' => 'Nessun risultato',
                    'success' => false
                ]
            );
        }
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
