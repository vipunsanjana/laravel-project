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
                                <section class="u-clearfix u-section-1" id="sec-9878">
                                  @foreach ($product->categories as $key => $category) 
                                    <code>{{ Helper::getCategoryFromID($category->category_id) }}</code>
                                      @if (!$loop->last)
                                          ->
                                      @endif
                                  @endforeach
                                    <div class="u-clearfix u-sheet u-sheet-1">
                                      <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
                                        <div class="u-layout">
                                          <div class="u-layout-row">
                                            <div class="u-align-left u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                                              <div class="u-container-layout u-container-layout-1">
                                                <div class="u-carousel u-expanded-width u-gallery u-layout-thumbnails u-lightbox u-no-transition u-show-text-always u-gallery-1" id="carousel-e131" data-interval="5000" data-u-ride="carousel">
                                                  <div class="u-carousel-inner u-gallery-inner" role="listbox">
                                                    {{-- Carousal --}}
                                                    @foreach ($product_images as $key => $product_image)
                                                        <div class=" {{ $loop->first ? 'u-active' : ''  }} u-carousel-item u-gallery-item u-carousel-item-{{ $key + 1 }}">
                                                            <div class="u-back-slide">
                                                            <img class="u-back-image u-expanded" src="{{ asset($product_image->file_path) }}">
                                                            </div>
                                                            <div class="u-over-slide u-over-slide-2">
                                                            <h3 class="u-gallery-heading">Sample Title</h3>
                                                            <p class="u-gallery-text">Sample Text</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    {{-- End of the carousal --}}
                                                  </div>
                                                  <a class="u-absolute-vcenter u-carousel-control u-carousel-control-prev u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-carousel-control-1" href="#carousel-e131" role="button" data-u-slide="prev">
                                                    <span aria-hidden="true">
                                                      <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
                                                    </span>
                                                    <span class="sr-only">
                                                      <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
                                                    </span>
                                                  </a>
                                                  <a class="u-absolute-vcenter u-carousel-control u-carousel-control-next u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-carousel-control-2" href="#carousel-e131" role="button" data-u-slide="next">
                                                    <span aria-hidden="true">
                                                      <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
                                                    </span>
                                                    <span class="sr-only">
                                                      <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
                                                    </span>
                                                  </a>
                                                  {{-- Thubnails --}}
                                                  <ol class="u-carousel-thumbnails u-spacing-10 u-carousel-thumbnails-1">
                                                      @foreach ($product_images as $key => $product_image)
                                                        <li class="u-active u-carousel-thumbnail u-carousel-thumbnail-1" data-u-target="#carousel-e131" data-u-slide-to="0">
                                                            <img class="u-carousel-thumbnail-image u-image" src="{{ asset($product_image->file_path) }}">
                                                        </li>
                                                      @endforeach
                                                  </ol>
                                                  {{-- End of thubnails --}}
                                                </div>
                                              </div>
                                            </div>
                                            <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                                              <div class="u-container-layout u-container-layout-2">
                                                <h1 class="u-text u-text-default u-text-1" style="margin-top: 0px">{{ $product->name }}</h1>
                                                <p class="u-small-text u-text u-text-default u-text-variant u-text-2">SKU:{{ $product->sku }}</p>
                                                <div class="container" style="margin-left: 15px">
                                                    <p class="u-text u-text-default u-text-3 u-text-variant" style="margin-left: 10px">{!! $product->short_description  !!}</p>
                                                </div>
                                                <form method="POST">
                                                    <div class="form-group col-md-6" style="margin-left: 15px">
                                                        <label for="name">Quantity</label>
                                                        <input type="number" name="qty" class="form-control" placeholder="1" value="1" min="1" step="1" />
                                                    </div>
                                                    <div id="outer">
                                                        <div class="inner"><button class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-6 u-btn-1" disabled>Add to cart</button></div>
                                                        <div class="inner"><button class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-6 u-btn-1" disabled>Buy Now</button></div>
                                                    </div>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="u-expanded-width u-tab-links-align-left u-tabs u-tabs-1">
                                        <ul class="u-border-2 u-border-palette-1-base u-spacing-10 u-tab-list u-unstyled" role="tablist">
                                          <li class="u-tab-item" role="presentation">
                                            <a class="active u-active-palette-1-base u-button-style u-grey-10 u-tab-link u-text-active-white u-text-black u-tab-link-1" id="link-tab-0da5" href="#tab-0da5" role="tab" aria-controls="tab-0da5" aria-selected="true">Description</a>
                                          </li>
                                        </ul>
                                        <div class="u-tab-content">
                                            <div class="u-container-style u-tab-active u-tab-pane u-white u-tab-pane-1" id="tab-0da5" role="tabpanel" aria-labelledby="link-tab-0da5" style="background-color: #1b2e4b">
                                                <div class="u-container-layout u-valign-top u-container-layout-3">
                                                    <h4 class="u-text u-text-default u-text-4" style="color: white">{{ $product->name }}</h4>
                                                    <p style="color: black">
                                                        {!! $product->description  !!}
                                                    </P>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                  </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/nicepage.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('assets/css/Home.css') }}" media="screen">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <script class="u-script" type="text/javascript" src="{{ asset('assets/js/jquery.js') }}" defer=""></script>
    <script class="u-script" type="text/javascript" src="{{ asset('assets/js/nicepage.js') }}" defer=""></script>
    <style>
        #outer
        {
            width:100%;
            text-align: left;
        }
        .inner
        {
            display: inline-block;
        }
    </style>
@endsection

@section('js')
    
@endsection