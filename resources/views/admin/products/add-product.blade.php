<x-base-layout>
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <h3 class="animated fadeInLeft">Products</h3>
                <p class="animated fadeInDown">
                    Add <span class="fa-angle-right fa"></span> Product
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-12 panel">
            @if(Session::has('message'))
            <div style="color: green">{{ Session::get('message') }}</div>
            @endif
            <div class="col-md-12 panel-heading">
                <h4>Add New Product</h4>
            </div>
            <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                <div class="col-md-12">
                    <form class="cmxform" id="signupForm" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" class="form-text" id="validate_firstname" name="name">
                                <span style="color: red;">@error('name') {{ $message }} @enderror</span>
                                <label>Name</label>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <textarea name="description" class="form-text"></textarea>
                                <span style="color: red;">@error('description') {{ $message }} @enderror</span>
                                <label>Description</label>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <select class="form-text" name="category">
                                    <option value="">select category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <span style="color: red;">@error('category') {{ $message }} @enderror</span>
                                <label>Category</label>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="file" class="form-text" id="validate_firstname" name="image">
                                <span style="color: red;">@error('image') {{ $message }} @enderror</span>
                                <label>Image</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="number" class="form-text" id="validate_firstname" name="quantity">
                                <span style="color: red;">@error('quantity') {{ $message }} @enderror</span>
                                <label>Quantity</label>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="number" class="form-text" id="validate_firstname" name="price">
                                <span style="color: red;">@error('price') {{ $message }} @enderror</span>
                                <label>Price</label>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <select class="form-text" name="stock_status">
                                    <option value="">select stock status</option>
                                    <option value="in_stock">In stock</option>
                                    <option value="out_stock">Out stock</option>
                                </select>
                                <span style="color: red;">@error('stock_status') {{ $message }} @enderror</span>
                                <label>Stock status</label>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="file" class="form-text" id="validate_firstname" name="images">
                                <span style="color: red;">@error('images') {{ $message }} @enderror</span>
                                <label>Images</label>
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