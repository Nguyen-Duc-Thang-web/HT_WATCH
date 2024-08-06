@extends('client.layouts.master')
@section('noidung')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
        <ol class="carousel-indicators">
            @foreach ($banner as $index => $b)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}"
                    class="{{ $loop->first ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($banner as $index => $b)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img class="d-block w-100" src="{{ Storage::url($b->image) }}" alt="{{ $b->alt }}" height="400px">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="site-section block-3 site-blocks-2 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>Sản Phẩm Nổi Bật</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="nonloop-block-3 owl-carousel ">
                        @foreach ($data as $item)
                            <div class="item zoom-on-hover">
                                <div class="block-4 text-center">
                                    <figure class="block-3-image">
                                        <a href="{{ route('chitiet', ['id' => $item->id]) }}"> <img
                                                src="{{ Storage::url($item->image) }}" alt="Image placeholder"
                                                class="img-fluid"></a>
                                    </figure>
                                    <div class="block-4-text p-4">
                                        <h3><a
                                                href="{{ route('chitiet', ['id' => $item->id]) }}">{{ Str::limit($item->name, 40) }}</a>
                                        </h3>
                                        <p class="mb-0">{{ $item->mota }}</p>
                                        <p class="text-danger font-weight-bold">
                                            {{ number_format($item->price, 0, ',', '.') }} vnd</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="site-section site-section-sm site-blocks-1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-truck"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">Giao Hàng Miễn Phí</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer
                            accumsan tincidunt fringilla.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-refresh2"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">Hoàn Trả Miễn Phí</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer
                            accumsan tincidunt fringilla.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-help"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">Hỗ Trợ Khách Hàng</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer
                            accumsan tincidunt fringilla.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section block-3 site-blocks-2 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>Sản Phẩm Mới Ra Mắt</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="nonloop-block-3 owl-carousel">
                        @foreach ($newProducts as $item)
                            <div class="item zoom-on-hover">
                                <div class="block-4 text-center">
                                    <figure class="block-3-image">
                                        <img src="{{ Storage::url($item->image) }}" alt="Image placeholder"
                                            class="img-fluid">
                                    </figure>
                                    <div class="block-4-text p-4">
                                        <h3><a
                                                href="{{ route('chitiet', ['id' => $item->id]) }}">{{ Str::limit($item->name, 40) }}</a>
                                        </h3>
                                        <p class="mb-0">{{ $item->mota }}</p>
                                        <p class="text-primary font-weight-bold">${{ $item->price }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section site-blocks-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>Danh Mục</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($data1 as $item)
                    <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                        <a class="block-2-item" href="#">
                            <figure class="image">
                                <img src="{{ $item->image }}" alt="" class="img-fluid">
                            </figure>
                            <div class="text">
                                <span class="text-uppercase">{{ $item->name }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
