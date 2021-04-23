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
                        <a href="{{ route('goods') }}" class="btn btn-warning btn-md">Back</a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card-body">
                  <table class="table table-hover table-striped table-responsive-sm">
                    <thead>
                      <tr>
                        <th scope="col">#id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Category</th>
                        <th scope="col">Options</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $good)
                        <tr>
                          <th scope="row">{{ $loop->index+1 }}</th>
                          <td>{{ $good->name }}</td>
                          <td>{{ $good->description }}</td>
                          <td>{{ $good->stock }}</td>
                          <td>{{ $good->category['name'] }}</td>
                          <td>
                         
                              <form action="{{ route('goods.restore') }}" method="POST">
                                @csrf
                                <input type="text" name="id" value="{{ $good->id }}" hidden>
                                <button type="submit" class="btn btn-sm btn-success mb-1">Restore</div>
                              </form>
                              
                              <form action="{{ route('goods.delete') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="text" name="id" value="{{ $good->id }}" hidden>
                                <button type="submit" class="btn btn-sm btn-danger">Destroy</div>
                              </form>
                          
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
