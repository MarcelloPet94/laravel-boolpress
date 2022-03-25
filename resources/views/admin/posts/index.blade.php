<div class="align_controller">
@include('layouts.admin')
    <div class="container">
        <div class="space_btn_area align_between">
            <h2>Lista dei post</h2>
            <a href="{{ route('admin.posts.create')}}" class="btnStyl goback">Create</a>
        </div>           

        @foreach ($posts as $post)
            <div class="row mb-5">
                <div class="col media_container">
                    @if ($post->image == null)
                    <h3>Immagina un'immagine</h3> 
                    @else
                    <img src='{{asset("storage/".$post->image)}}'>
                    @endif
                </div> 
    
                <div class="col">
                    <ul>
                        <li><span>Title:</span>{{$post->title}}</li>
                        <li><span>Content:</span>{{$post->content}}</li>
                        <li><span>Slug:</span>{{$post->slug}}</li>
                        <li><span>Category:</span>{{$post->category ? $post->category->name : 'No category'}}</li>
                        <li><span>Tags:</span>
                            @foreach ($post->tags as $tag)
                                {{ $tag->name }}
                            @endforeach
                        </li>
                    </ul>    
                    <div class="space_btn_area">
                        <a class="btn_funct goback" href="{{ route('admin.posts.show', $post->id) }}">Open</a>
                        <a class="btn_funct goback" href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>

                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn_funct delete_btn">x</button>
                        </form>
                    </div>    
                </div> 
            </div>                
        @endforeach  

    </div>        

    {{--             <ul>
                ID</li>
                <li>Title</li>
                <li>Contenuto</li>
                <li>Slug</li>
                <li>Categoria</li>
                <li>Tags</li>
                <li>Operation</li>
            </ul> --}}