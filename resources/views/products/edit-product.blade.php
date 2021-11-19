@extends('layouts.master')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Add new product</a></li>
@endsection

@section('content')

    @include('layouts.include.pre_loader')
    @include('layouts.include.top_nav_bar')
    @include('layouts.include.breadcrumb')

    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>

        {{-- sidebar navigation --}}
        @include('layouts.include.sidebar')

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <!-- Forms Grid -->
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger mb-4 layout-top-spacing" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>Error!</strong> {{ $error }}</div>
                @endforeach
            @endif
            <div class="account-settings-container layout-top-spacing">
                <div id="flFormsGrid" class="col-lg-12 col-mg-12 layout-spacing layout-top-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12" style="margin-top:15px;">
                                    <h4>Add New Product</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form method="POST"  id="editProduct">
                                @csrf
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="name">Product Name*</label>
                                        <input type="text" name="name" class="form-control" placeholder="Product name" value="{{$product->name}}" required />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Product SKU*</label>
                                        <input type="text" name="sku" class="form-control" placeholder="ABC-111" value="{{$product->sku}}" required />
                                    </div>
                                </div>
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="role">Select categories*</label>
                                        <select class="multiselect multiselect-custom form-control" multiple="multiple" data-live-search="true" name="categories[]" id="categories" required>
                                            <option value="0">None</option>
                                            @if($categories)
                                                @foreach($categories as $category)
                                                    <?php $dash=''; ?>
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @if(count($category->subcategory))
                                                        @include('category.subCategoryList-option',['subcategories' => $category->subcategory])
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="price_variation" style="border: 1px solid white; padding:5px">
                                    <div class="form-row mb-4">

                                        <div class="form-group col-md-12">
                                            <h2>Price Variation</h2>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="button" value="ADD ROW" class="add_price_row form-control">
                                        </div>
                                    </div>
                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-6">
                                            <table >
                                                <thead>
                                                    <tr>
                                                        <th>Price</th>
                                                        <th>Quantity</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ( $product->product_prices as $item )
                                                    <tr class="price_row">
                                                        <td><input type="number" name="price[]" class="form-control" placeholder="price" value="{{ $item->price }}"  /></td>
                                                        <td><input type="number" name="quantity[]" class="form-control" placeholder="quantity" value="{{ $item->quantity }}"  /></td>
                                                        <td><input type="button" value="Remove ROW" class="remove_price_row form-control"></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-12">
                                        <label for="name">Product Description*</label>
                                        <textarea id="ckeditor" class="form-control" name="description">{{ $product->description }}</textarea>
                                    </div>
                                </div>

                                <div class="container">
                                    <label for="name">Upload Images</label>
                                    <div class="row" style="clear: both;margin-top: 18px;">
                                        <div class="col-12">
                                          <div class="dropzone" id="file-dropzone"></div>
                                        </div>
                                    </div>
                                </div>

                                <div id="submitDiv">
                                    <button type="submit" id="submit" class="btn btn-primary mt-3">Update Product</button>
                                </div>
                            </form>
                            <br><br>
                            @if (count($images)>0)
                                <div class="container">
                                    <label for="name">Product Images</label>
                                    <div class="d-flex">
                                        <div class="usr-img-frame mr-2">

                                                @foreach ($images as $image)
                                                    <img alt="avatar" class="img-fluid " src="{{ asset($image->file_path) }}">
                                                @endforeach

                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!--  END CONTENT AREA  -->
    </div>

@endsection

@section('css')
    <link href="{{ asset('plugins/notification/snackbar/snackbar.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/multi-select/css/multi-select.css') }}">
    <link href="{{ asset('assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/js/loader.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

@endsection

@section('js')
<script src="{{ asset('assets/vendor/ckeditor/ckeditor.js') }}"></script><!-- Ckeditor -->
<script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('plugins/notification/snackbar/snackbar.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/forms/editors.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
<script>
    // var prod_id = {{ json_encode($product->id); }}
    Dropzone.options.fileDropzone = {
      url: '{{ route('images.store', json_encode($product->id)) }}',
      acceptedFiles: ".jpeg,.jpg,.png,.gif",
      maxFilesize: 8,
      headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
      },
      addRemoveLinks: true,
      removedfile: function(file)
      {
        jQuery.noConflict();
        var name = file.upload.filename;
        $.ajax({
          type: 'POST',
          url: '{{ route('image.remove',json_encode($product->id)) }}',
          data: { "_token": "{{ csrf_token() }}", name: name},
          success: function (data){
              console.log("File has been successfully removed!!");
          },
          error: function(e) {
              console.log(e);
          }});
          var fileRef;
          return (fileRef = file.previewElement) != null ?
          fileRef.parentNode.removeChild(file.previewElement) : void 0;
      },
      success: function (file, response) {
        console.log(file);
      },
    }
  </script>
<script>
    $(document).ready(function(){

        $('.add_price_row').click(function(){

        $element = '<tr class="price_row">' +
                        '<td><input type="number" name="price[]" class="form-control" placeholder="price" value=""  /></td>' +
                        '<td><input type="number" name="quantity[]" class="form-control" placeholder="quantity" value=""  /></td>' +
                        '<td><input type="button" value="Remove ROW" class="remove_price_row form-control"></td>' +
                    '</tr>';

        $("tbody").append($element);
        });

        $(document).on('click', '.remove_price_row' ,function(){
        console.log(3);
        $(this).closest('tr').remove();
        });

        var success = '{{ Session::get('success')}}';
        if(success)
        {
            setTimeout(function(){
                Snackbar.show({
                    text: success,
                    pos: 'top-right',
                    actionTextColor: '#fff',
                    backgroundColor: '#8dbf42'
                });
            },500); // milliseconds

        }

    });
</script>
@endsection
