<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <title>Edit Sản Phẩm</title>
    <style>
        * {
            font-family: "Roboto", sans-serif;
        }

        .h-font {
            font-family: "Merienda", cursive;
        }
    </style>
</head>

<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">HT Watch</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation shadow-none">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= BASE_DIR; ?>?act=list_dm">
                                Danh Mục
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-2" href="<?= BASE_DIR; ?>?act=list_sp">Sản Phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-2" href="#">Đơn Hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link me-2" href="#">Người Dùng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Trợ Giúp</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASE_DIR; ?>?act=edit_sp">EDIT SP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASE_DIR; ?>?act=edit_dm">EDIT DANH MỤC</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container mt-5">
        <h2 class="text-center text-primary display-4">Chỉnh Sửa Sản Phẩm</h2>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="">
                        <div class="mb-3">
                            <label class="form-label">TÊN</label>
                            <input name="name" type="text" class="form-control shadow-none" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">DANH MỤC</label>
                            <select name="danhmuc" class="form-control shadow-none">
                                <option value="">----</option>
                                <option value="">DANH MỤC 1</option>
                                <option value="">DANH MỤC 2</option>
                                <option value="">DANH MỤC 3</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">GIÁ</label>
                            <input name="gia" type="number" class="form-control shadow-none" />
                        </div>
                        <div class="mb-4">
                            <label class="form-label">SỐ LƯỢNG</label>
                            <input name="soluong" type="number" class="form-control shadow-none" />
                        </div>
                        <div class="mb-4">
                            <label class="form-label">MÔ TẢ</label>
                            <textarea name="mota" class="form-control shadow-none"></textarea>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success shadow-none">Lưu Thay Đổi</button>
                            <button type="reset" class="btn btn-secondary shadow-none">Hủy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer class="bg-light py-4 mt-5">
        <div class="container">
            <div class="row mt-4">
                <div class="col">
                    <p class="text-center">&copy; 2024 HT Watch. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>