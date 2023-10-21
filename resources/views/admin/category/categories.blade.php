
<x-base-layout>
 @section('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('asset_admin/css/plugins/datatables.bootstrap.min.css') }}"/>
  @endsection
  <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Categories</h3>
                        <p class="animated fadeInDown">
                          All <span class="fa-angle-right fa"></span> Categories
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
                    <div class="panel-heading"><h3 style="margin-bottom: 1em;"><b>Categories</b><a class="btn btn-primary" style="float: right;" href="{{ route('category.create') }}">Add New Category</a></h3></div>
                    <div class="panel-body">
                      <div class="responsive-table">
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($categories as $category)
                          <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                              <a href="{{ route('category.edit', $category->id) }}"><i style="color: blue; font-size: 20px" class="ml-3 fa fa-edit mr-3"></i></a>
                              <button onclick="event.preventDefault(); document.getElementById('del-{{ $category->id }}').submit();"><i style="color: red; font-size: 20px" class="fa fa-trash"></i></button>
                              <form id="del-{{ $category->id }}" method="POST" action="{{ route('category.destroy', $category->id) }}">
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
