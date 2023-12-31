
<x-base-layout>
 @section('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('asset_admin/css/plugins/datatables.bootstrap.min.css') }}"/>
  @endsection
  <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Products</h3>
                        <p class="animated fadeInDown">
                          ALL <span class="fa-angle-right fa"></span> Products
                        </p>
                    </div>
                  </div>
              </div>
              <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                @if(Session::has('message'))
                    <div style="color: green">{{ Session::get('message') }}</div>
                    @endif
                  <div class="panel">
                    <div class="panel-heading"><h3 style="margin-bottom: 1em;"><b>Products</b><a class="btn btn-primary" style="float: right;" href="{{ route('product.create') }}">Add New Product</a></h3></div>
                    <div class="panel-body">
                      <div class="responsive-table">
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Stock Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($products as $product)
                          <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td><img src="{{ asset('images\products') }}/{{ $product->image }}" width="80px" alt="{{$product->name}}"></td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->stock_status}}</td>
                            <td>
                              <a href="{{ route('product.edit', $product->id) }}"><i style="color: blue; font-size: 20px" class="ml-3 fa fa-edit mr-3"></i></a>
                              <button onclick='if(confirm("Are you sure to delete this item?")){ document.getElementById("del-p-{{$product->id}}").submit(); }'><i style="color: red; font-size: 20px" class="fa fa-trash"></i></button>
                              <form id="del-p-{{$product->id}}" method="POST" action="{{ route('product.destroy', $product->id) }}" >
                                @csrf
                                @method('delete')
                              </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      </div>
                  </div>
                </div>
              </div>  
              </div>
              @section('scripts')
              <script src="{{ asset('asset_admin/js/plugins/jquery.datatables.min.js') }}"></script>
              <script src="{{ asset('asset_admin/js/plugins/datatables.bootstrap.min.js') }}"></script>

              <script type="text/javascript">
                $(document).ready(function(){
                  $('#datatables-example').DataTable();
                });
              </script>
              @endsection
</x-base-layout>
