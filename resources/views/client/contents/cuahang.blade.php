@extends('client.layouts.master')

@section('noidung')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ route('trangchu') }}">Trang Chủ</a>
                    <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Cửa Hàng</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="container m-2">
        <div class="row align-items-center">
            <div class="col-md-8 mb-md-0 container">
                <form action="{{ route('cuahang') }}" method="GET" class="d-flex">
                    <input class="form-control me-2" type="search" name="search" placeholder="Tìm kiếm sản phẩm"
                        aria-label="Search" value="{{ request('search') }}">
                    <button class="btn btn-outline-success" type="submit">Tìm kiếm</button>
                </form>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-9 order-2">
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="text-black h5 mb-4">Shop All</h2>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                        id="dropdownMenuReference" data-toggle="dropdown">
                                        Lọc Sản Phẩm
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-5">
                        @if ($data->isEmpty())
                            <div class="col-12">
                                <p class="text-center">Không tồn tại sản phẩm nào phù hợp với từ khóa tìm kiếm.</p>
                            </div>
                        @else
                            @foreach ($data as $item)
                                <div class="col-sm-6 col-lg-4 mb-4 zoom-on-hover" data-aos="fade-up">
                                    <div class="block-4 text-center border">
                                        <figure class="block-3-image">
                                            <a href="{{ route('chitiet', ['id' => $item->id]) }}"><img
                                                    src="{{ Storage::url($item->image) }}" alt="Image placeholder"
                                                    class="img-fluid"></a>
                                        </figure>
                                        <div class="block-4-text p-4">
                                            <h3><a
                                                    href="{{ route('chitiet', ['id' => $item->id]) }}">{{ Str::limit($item->name, 30) }}</a>
                                            </h3>
                                            <p class="mb-0">{{ $item->mota }}</p>
                                            <p class="text-danger font-weight-bold">
                                                {{ number_format($item->price, 0, ',', '.') }} vnd</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $data->links() }}
                    </div>
                </div>

                <div class="col-md-3 order-1 mb-5 mb-md-0">
                    <div class="border p-4 rounded mb-4">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Danh Mục</h3>
                        <ul class="list-unstyled mb-0">
                            @foreach ($data1 as $item)
                                <li class="mb-1">
                                    <a href="{{ route('cuahang', ['category_id' => $item->id]) }}" class="d-flex">
                                        <span>{{ $item->name }}</span>
                                        <span class="text-black ml-auto">({{ $item->count }})</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="site-section site-blocks-2">
                        <div class="row justify-content-center text-center mb-5">
                            <div class="col-md-7 site-section-heading pt-4">
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
                                            <h3></h3>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
