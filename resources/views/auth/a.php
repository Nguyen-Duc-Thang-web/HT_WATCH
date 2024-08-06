<div class="modal fade " id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fs-5 d-flex align-items-center">
                        <i class="bi bi-person-circle fs-3 me-2"></i> Đăng Nhập
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Email :</label>
                        <input type="email" class="form-control shadow-none @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Mật Khẩu :</label>
                        <input type="password" class="form-control shadow-none @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password" />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-check m-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                            ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <button type="submit" class="btn btn-info shadow-none">{{ __('Login') }}</button>
                        <a href="{{ route('password.request') }}" class="text-secondary text-decoration-none">Quên Mật
                            Khẩu ?</a>
                    </div>
                </div>
            </form>


        </div>
    </div>
</div>

<div class="modal fade" id="RegisterModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true" class="mt-3">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="">
                <div class="modal-header">
                    <h5 class="modal-title fs-5 d-flex align-items-center">
                        <i class="bi bi-person-circle fs-3 me-2"></i> Đăng Ký
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Tên : </label>
                        <input type="text" class="form-control shadow-none" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email :</label>
                        <input type="email" class="form-control shadow-none" />
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Mật Khẩu</label>
                        <input type="password" class="form-control shadow-none" />
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Nhập Lại Mật Khẩu</label>
                        <input type="password" class="form-control shadow-none" />
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <button type="submit" class="btn btn-dark shadow-none">
                            Đăng Ký
                        </button>
                        <a href="javascript: void(0)" class="text-secondary text-decoration-none">
                            Đã Có Tài Khoản</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal"
    data-bs-target="#loginModal">
    Đăng Nhập
</button>
<button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#RegisterModal">
    Đăng Ký
</button>
