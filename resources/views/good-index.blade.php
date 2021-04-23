@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-6">
                      <h4>Goods Table</h4>
                    </div>
                    <div class="col-md-6">
                      <div class="text-right">
                        <a href="{{ route('goods.trash') }}" class="btn btn-warning btn-md">Trash</a>
                        <a href="{{ route('goods.create') }}" class="btn btn-info btn-md text-white">New</a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card-body">
                  <table class="table table-hover table-striped table-responsive-sm">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Options</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $good)
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>
                            <a href="{{ url('/goods/12/edit') }}" class="btn btn-sm btn-success">Edit</a>
                            <a href="{{ route('goods.delete') }}" class="btn btn-sm btn-danger">Delete</a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th scope="col">#id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Category</th>
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
