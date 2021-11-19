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
                                <div class="welcome_user" style="text-align: center; margin-bottom:30px">
                                    <h1>Welcome <b>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </b> to Layout Index</h1>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="body">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Search here...">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-primary" type="button">Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach($products as $product)
                                        <div class="card col-lg-3">
                                            <img class="card-img-top" src="{{ asset(Helper::getProductMainImage($product->id)) }}" alt="Card image cap">
                                            <div class="body">
                                                <h4 class="card-title">{{ $product->name }}</h4>
                                                <div class="card-subtitle">
                                                    @foreach ($product->categories as $key => $category) 
                                                        {{ Helper::getCategoryFromID($category->category_id) }}
                                                        @if (!$loop->last)
                                                            /
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <a href="javascript:void(0)" class="btn btn-primary">View Product</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>

@endsection