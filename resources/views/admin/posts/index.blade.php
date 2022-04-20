@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <a href="{{route('admin.posts.create')}}" class="btn btn-success mb-3">Crea un post</a>

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Contenuto</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Categorie</th>
                        <th scope="col">Azioni</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{substr($post->content, 0, 30)}}</td>
                                <td>{{$post->slug}}</td>
                                <td>{{isset($post->category)?$post->category->name:'N.D.'}}</td>

                                <td class="d-flex">

                                    <a href="{{route('admin.posts.show', ['post' => $post->id])}}" class="btn btn-primary">Vai</a>

                                    <a href="{{route('admin.posts.edit', ['post' => $post->id])}}" class="btn btn-warning mx-2">Modifica</a>

                                    <form method="POST" action="{{route('admin.posts.destroy', ['post' => $post->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Sei sicuro di volerlo eliminare?')" type='submit' class="btn btn-danger">Elimina</button>
                                    </form>
                              
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
