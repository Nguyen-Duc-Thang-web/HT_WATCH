@extends('client.layouts.master')

@section('noidung')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('trangchu') }}">Trang chủ</a> <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Giới thiệu</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section border-bottom" data-aos="fade">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="block-16">
                        <figure>
                            <img src="{{ asset('theme/images/blog_1.jpg') }}" alt="Image placeholder"
                                class="img-fluid rounded">
                            <a href="https://vimeo.com/channels/staffpicks/93951774" class="play-button popup-vimeo"><span
                                    class="ion-md-play"></span></a>

                        </figure>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">


                    <div class="site-section-heading pt-3 mb-4">
                        <h2 class="text-black">Chúng tôi bắt đầu như thế nào</h2>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius repellat, dicta at laboriosam, nemo
                        exercitationem itaque eveniet architecto cumque, deleniti commodi molestias repellendus quos sequi
                        hic fugiat asperiores illum. Atque, in, fuga excepturi corrupti error corporis aliquam unde nostrum
                        quas.</p>
                    <p>Accusantium dolor ratione maiores est deleniti nihil? Dignissimos est, sunt nulla illum autem in,
                        quibusdam cumque recusandae, laudantium minima repellendus.</p>

                </div>
            </div>
        </div>
    </div>
@endsection
