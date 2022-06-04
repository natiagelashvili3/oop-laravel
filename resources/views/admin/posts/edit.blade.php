@extends('admin.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="">
                Edit Post
            </h4>

            <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('admin.posts.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data['post']->id }}">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $data['post']->title }}">
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="short_text" class="form-label">Short Text</label>
                                <textarea class="form-control" id="short_text" rows="6" name="short_text">{{ $data['post']->short_text }}</textarea> 
                                @error('short_text')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="text" class="form-label">Text</label>
                                <textarea class="form-control" id="text" rows="6" name="text">{{ $data['post']->text }}</textarea> 
                                @error('text')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($data['categories'] as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Tags</label>
                                <br>
                                @php
                                    $tagsId = $data['post']->tags()->allRelatedIds()->toArray();
                                @endphp
                                @foreach ($data['tags'] as $item)
                                    <div>
                                        <input 
                                            type="checkbox" 
                                            id="tag_id" 
                                            name="tag_id[]"  
                                            @if(in_array($item->id, $tagsId)) checked @endif
                                            value="{{ $item->id }}"> {{ $item->name }}
                                    </div>
                                @endforeach
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                @if($data['post']->image)
                                    <img style="width: 150px;display:block" src="{{ asset('storage/images/'.$data['post']->image) }}" alt="">
                                @endif
                                <label for="text" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image"> 
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
