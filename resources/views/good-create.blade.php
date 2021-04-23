@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-6">
                      <h4>Goods Create</h4>
                    </div>
                    <div class="col-md-6">
                      <div class="text-right">
                        <a href="{{ url()->previous() }}" class="btn btn-info btn-md text-white">Back</a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card-body">
                  @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                    </div><br />
                  @endif
                  <form action="{{ route('goods.store') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Good Name</span>
                      </div>
                      <input type="text" class="form-control" name="name" placeholder="Good Name" aria-label="name" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Good Description</span>
                      </div>
                      <textarea  type="text" class="form-control" name="description" placeholder="Good Description" aria-label="name" aria-describedby="basic-addon1"></textarea>
                    </div>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Good Category</span>
                      </div>
                      <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                        <option></option>
                        @foreach($data['categories'] as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <button type="submit" class="btn btn-success">Save</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
