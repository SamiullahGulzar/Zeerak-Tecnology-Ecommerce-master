<x-base-layout>
<div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Categories</h3>
                        <p class="animated fadeInDown">
                          Add <span class="fa-angle-right fa"></span> Category
                        </p>
                    </div>
                  </div>
              </div>
                <div class="col-md-6">
                  <div class="col-md-12 panel">
                    @if(Session::has('message'))
                    <div style="color: green">{{ Session::get('message') }}</div>
                    @endif
                    <div class="col-md-12 panel-heading">
                      <h4>Add New Category</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                      <div class="col-md-12">
                        <form class="cmxform" id="signupForm" method="POST" action="{{ route('category.store') }}">
                            @csrf
                          <div class="col-md-12">
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="text" class="form-text" id="validate_firstname" name="name">
                              <span style="color: red;">@error('name') {{ $message }} @enderror</span>
                              <label>Name</label>
                            </div>
                          </div>               
                          <div class="col-md-12">
                              <input class="submit btn btn-danger" type="submit" value="Submit">
                        </div>
                      </form>

                    </div>
                  </div>
                </div>
                </div>
</x-base-layout>