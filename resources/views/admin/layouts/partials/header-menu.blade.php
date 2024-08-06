<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="">HT Watch</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation shadow-none">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('categorys.index') }}">
                            Danh Mục
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="{{ route('watchs.index') }}">Sản Phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="{{ route('banners.index') }}">Banner</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="{{ route('bills.index') }}">Đơn Hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="{{ route('list') }}">Người Dùng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('khuyenmais.index') }}">Mã Khuyến Mại</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
