@extends('layouts.master')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
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
            <div class="account-settings-container layout-top-spacing">
                <div id="flFormsGrid" class="col-lg-12 col-mg-12 layout-spacing layout-top-spacing">
                    
                    <div class="statbox widget box box-shadow" style="padding: 40px">                    
                        <div class="br-pagebody">
                            <div class="br-section-wrapper">
                                <div class="welcome_user" style="text-align: center; margin-bottom:50px">
                                    <h1>Welcome <b>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </b> to Layout Index</h1>
                                </div>
                                {{-- search bar --}}
                                <div class="row clearfix" style="text-align: center; margin-bottom:70px">
                                    <div class="col-lg-12">
                                        <input type="text" class="form-control" placeholder="Search..." onkeyup="search_data(this.value, 'result');">
                                        <div id="results">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>

@endsection

@section('js')

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script><!-- Ckeditor -->
<script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('plugins/notification/snackbar/snackbar.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/forms/editors.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('assets/bundles/lightgallery.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/medias/image-gallery.js') }}"></script>
<script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>    
<script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <script>


        $(document).ready(function(){
            $("#results").hide();
        });
    </script>
@endsection