@extends('admin.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="">
                About Page
            </h4>

            <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('admin.about.update') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $data['about']->title }}">
                            </div>
                            <div class="mb-3">
                                <label for="short_text" class="form-label">Short Text</label>
                                <textarea class="form-control" id="short_text" rows="6" name="short_text">{{ $data['about']->short_text }}</textarea> 
                            </div>
                            <div class="mb-3">
                                <label for="text" class="form-label">Text</label>
                                <textarea class="form-control" id="text" rows="6" name="text">{{ $data['about']->text }}</textarea> 
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
