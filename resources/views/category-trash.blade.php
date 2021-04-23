@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-6">
                      <h4>Categories Table</h4>
                    </div>
                    <div class="col-md-6">
                      <div class="text-right">
                        <a href="{{ route('categories') }}" class="btn btn-warning btn-md">Back</a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card-body">
                  <table class="table table-hover table-striped table-responsive-sm">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">slug</th>
                        <th scope="col">Options</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $category)
                        <tr>
                          <th scope="row">{{ $loop->index+1 }}</th>
                          <td>{{ $category->name }}</td>
                          <td>{{ $category->slug }}</td>
                          <td>
                            <div class="row">
                              <form action="{{ route('categories.restore') }}" method="POST">
                                @csrf
                                <input type="text" name="id" value="{{ $category->id }}" hidden>
                                <button type="submit" class="btn btn-sm btn-success mr-1">Restore</button>
                              </form>

                              <form action="{{ route('categories.destroy') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="text" name="id" value="{{ $category->id }}" hidden>
                                <button type="submit" class="btn btn-sm btn-danger">Destroy</button>
                              </form>
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Options</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
