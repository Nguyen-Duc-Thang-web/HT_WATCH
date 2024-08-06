@extends('client.layouts.master')

@section('noidung')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('trangchu') }}">Trang Chủ</a> <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">{{ Str::limit($data->name, 30) }}</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <form action="{{ route('themgiohang') }}" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ Storage::url($data->image) }}" data-lightbox="image-1">
                            <img src="{{ Storage::url($data->image) }}" alt="Image placeholder" class="img-fluid">
                        </a>
                    </div>
                    @csrf
                    <div class="col-md-6">
                        <h2>{{ $data->name }}</h2>
                        <p class="size text-danger font-weight-bold"> {{ number_format($data->price, 0, ',', '.') }} vnd</p>
                        <p> Số Lượng Trong Kho : {{ $data->quantity }}</p>
                        <p>{{ $data->short_description }}</p>
                        <div class="mb-5">
                            <div class="input-group mb-3" style="max-width: 120px;">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                </div>
                                <input type="number" class="form-control text-center" name="quantity" value="1"
                                    placeholder="" aria-label="Example text with button addon"
                                    aria-describedby="button-addon1">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                </div>
                            </div>
                            <input type="hidden" value="{{ $data->id }}" name="watch_id">
                        </div>
                        @auth
                            <button type="submit" class="buy-now btn btn-sm btn-primary">Thêm vào giỏ hàng</button>
                        @else
                            <a href="{{ route('login') }}" class="buy-now btn btn-sm btn-primary">Đăng nhập để mua hàng</a>
                        @endauth
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="site-section block-3 site-blocks-2 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>Mô Tả Sản Phẩm</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-36">
                    <div class="">
                        <p class="w-100">{{ $data->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="site-section block-3 site-blocks-2 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>Sản Phẩm Tương Tự</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="nonloop-block-3 owl-carousel">
                        <div class="item">
                            <div class="block-4 text-center">
                                <figure class="block-4-image">
                                    <img src="{{ asset('theme/images/cloth_1.jpg') }}" alt="Image placeholder"
                                        class="img-fluid">
                                </figure>
                                <div class="block-4-text p-4">
                                    <h3><a href="#">Tank Top</a></h3>
                                    <p class="mb-0">Finding perfect t-shirt</p>
                                    <p class="text-primary font-weight-bold">$50</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="block-4 text-center">
                                <figure class="block-4-image">
                                    <img src="{{ asset('theme/images/shoe_1.jpg') }}" alt="Image placeholder"
                                        class="img-fluid">
                                </figure>
                                <div class="block-4-text p-4">
                                    <h3><a href="#">Corater</a></h3>
                                    <p class="mb-0">Finding perfect products</p>
                                    <p class="text-primary font-weight-bold">$50</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="block-4 text-center">
                                <figure class="block-4-image">
                                    <img src="{{ asset('theme/images/cloth_2.jpg') }}" alt="Image placeholder"
                                        class="img-fluid">
                                </figure>
                                <div class="block-4-text p-4">
                                    <h3><a href="#">Polo Shirt</a></h3>
                                    <p class="mb-0">Finding perfect products</p>
                                    <p class="text-primary font-weight-bold">$50</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="block-4 text-center">
                                <figure class="block-4-image">
                                    <img src="{{ asset('theme/images/cloth_3.jpg') }}" alt="Image placeholder"
                                        class="img-fluid">
                                </figure>
                                <div class="block-4-text p-4">
                                    <h3><a href="#">T-Shirt Mockup</a></h3>
                                    <p class="mb-0">Finding perfect products</p>
                                    <p class="text-primary font-weight-bold">$50</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="block-4 text-center">
                                <figure class="block-4-image">
                                    <img src="{{ asset('theme/images/shoe_1.jpg') }}" alt="Image placeholder"
                                        class="img-fluid">
                                </figure>
                                <div class="block-4-text p-4">
                                    <h3><a href="#">Corater</a></h3>
                                    <p class="mb-0">Finding perfect products</p>
                                    <p class="text-primary font-weight-bold">$50</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
