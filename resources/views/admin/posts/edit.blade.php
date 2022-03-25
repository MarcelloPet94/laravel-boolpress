<div class="align_controller">
@include('layouts.admin')
    <div class="container">
    <h1>Stai modificando il post: {{$post->id}}</h1>
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input
                type="text" class="form-control" id="title"
                name="title"
                placeholder="Titolo del post"
                value="{{ old('title') ?? $post->title }}"
                >
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror                
            </div>
            <div class="form-group">
                <textarea class="form-control" id="content" 
                name="content"
                placeholder="Descrizione del prodotto">{{ old('content') ?? $post->content }}</textarea>
            </div>
            
            <select name="category_id" class="form-control">
                <option value=""> -- </option>
                @foreach ($categories as $option)
                    <option value="{{ $option->id }}" {{ $option->id == old('category_id', $post->category_id) ? 'selected' : '' }} > {{ $option->name }} </option>
                @endforeach
            </select>  

            <div class="form-group mt-3">
                
                
                @foreach ($tags as $tag)
                    
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="tags[]" value="{{$tag->id}}" {{$post->tags->contains($tag) ? 'checked' : ''}}>
                    <label for="{{$tag->slug}}">{{$tag->name}}</label>
                </div>
                
                @endforeach
                
                @error('tags[]')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            
            </div>          

            <div class="form-group">
                <input type="file" name="image" class="form-control">
            </div>

            <div class="space_btn_area">
                <a href="{{ route('admin.posts.index')}}" class="btnStyl goback">Go back</a>                
                <button type="submit" class="btn_funct save_edit_btn">Edit</button>
            </div>  
            
        </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>  
</div>    