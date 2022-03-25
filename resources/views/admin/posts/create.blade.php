<div class="align_controller">
@include('layouts.admin')
    <div class="container">
    <h1>Crea un nuovo post</h1>
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <input type="text" class="form-control" id="title" name="title" placeholder="Titolo del post">
            </div>
            <div class="form-group">
                <textarea class="form-control" id="content" name="content"
                    placeholder="Descrizione del prodotto"></textarea>
            </div>

            <select name="category_id" class="form-control">
                <option value=""> -- </option>
                @foreach ($categories as $option)
                    <option value="{{ $option->id }}"> {{ $option->name }} </option>
                @endforeach
            </select>              

            <div class="form-group mt-3">

                @foreach ($tags as $tag)
                <div class="form-check">                   
                    <input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="{{$tag->slug}}" name="tags[]">
                    <label class="form-check-label" for="{{$tag->slug}}">
                        {{$tag->name}}
                    </label>
                </div>    
                @endforeach   
                
            </div>

            <div class="form-group">
                <input type="file" name="image" class="form-control">
            </div>            

            <div class="space_btn_area">
                 <a href="{{ route('admin.posts.index')}}" class="btnStyl goback">Go back</a>
                <button type="submit" class="btn_funct save_edit_btn">Create</button>
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