@extends('client.layouts.master')

@section('noidung')
    <div class="container  m-3 ">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header text-dark text-center" style="font-size:30px;">Đăng Ký</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-3 ml-5 mr-5">
                                <label for="name" class="form-label">Họ Tên</label>
                                {{-- <label for="name" class="col-md-4 col-form-label text-md-end form-label">Họ Tên</label> --}}
                                {{-- {{ __('Name') }} --}}
                                <div>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 ml-5 mr-5">
                                <label for="email" class="form-label">Email</label>
                                {{-- <label for="email" class="col-md-4 col-form-label text-md-end">Email</label> --}}
                                {{-- {{ __('Email Address') }} --}}
                                <div>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 ml-5 mr-5">
                                <label for="password" class="form-label">Mật Khẩu</label>
                                {{-- <label for="password" class="col-md-4 col-form-label text-md-end">Mật Khẩu</label> --}}
                                {{-- {{ __('Password') }} --}}
                                <div>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 ml-5 mr-5">
                                <label for="password-confirm" class="form-label">Nhập Lại Mật
                                    Khẩu</label>
                                {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Nhập Lại Mật
                                    Khẩu</label> --}}

                                {{-- {{ __('Confirm Password') }} --}}
                                <div>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Đăng Ký
                                        {{-- {{ __('Register') }} --}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
