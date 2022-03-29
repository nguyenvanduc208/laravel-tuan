{{-- Home se ke thua view master --}}
@extends('layout.master')

{{-- section se thay doi
    phan yield trong master
    voi ten tuong ung --}}
@section('title')
    {{ isset($category) ? 'Edit category' : 'Create category' }}
@endsection

@section('content-title')
    {{ isset($category) ? 'Edit category' : 'Create category' }}
@endsection

@section('content')
    <form action="{{ route('cate-save') }}" method="POST">
        @csrf
        @if (isset($category))
            <input type="hidden" name="id" value="{{ $category->id }}"/>
        @endif
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" value="{{old('name',isset($category) ? $category->name : null )}}" name='name' aria-describedby="emailHelp">
            @error('name')
            <div class="alert alert-danger" role="alert">
                {{$message}}
              </div>
            @enderror
            
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">
                {{old('description',isset($category) ? $category->description : null )}}
            </textarea>
            @error('description')
            <div class="alert alert-danger" role="alert">
                {{$message}}
              </div>
            @enderror
            
        </div>

        <div class="md-3">
            <label for="exampleInputEmail1" class="form-label">Status</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="1" name="status" id="flexRadioDefault2"
                    @if (old('status',isset($category) ? $category->status : null ) == 1)
                        checked
                    @endif  >
                <label class="form-check-label" for="flexRadioDefault2">
                    Active
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="0" name="status" id="flexRadioDefault1"
                @if (old('status', isset($category) ? $category->status : null ) == 0)
                        checked
                    @endif
                >
                <label class="form-check-label" for="flexRadioDefault1">
                    Deactive
                </label>
            </div>
            
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
