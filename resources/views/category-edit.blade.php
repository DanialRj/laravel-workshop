@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-6">
                      <h4>Categories Create</h4>
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
                  <form action="{{ url('/categories/' . $data['id'] . '/edit') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Category Name</span>
                      </div>
                      <input type="text" class="form-control" name="name" value="{{ $data['name'] }}" placeholder="Category Name" aria-label="name" aria-describedby="basic-addon1">
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
