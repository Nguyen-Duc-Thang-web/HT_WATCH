@extends('admin.layouts.master')

@section('noidung')
    <main class="container mt-3">
        <h2 class="text-center text-danger display-4 custom-font">BANNER MAKETING<br></h2>
        <div class="container m-3">
            <div class="row align-items-center">
                <div class="col-md-4 mb-3 mb-md-0">
                    <a href="{{ route('banners.create') }}"><button type="button"
                            class="btn btn-outline-dark shadow-none me-lg-3 me-2">
                            Thêm sản phẩm
                        </button></a>
                </div>
            </div>
        </div>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>BANNER MAKETING</th>
                    <th>ALT</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><img src="{{ Storage::url($item->image) }}" alt="Product Image" width="400px" height="auto">
                        </td>
                        <td>{{ $item->alt }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-between">
                                <form action="{{ route('banners.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Bạn có chắc chắn muốn xóa mục này không?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash2" viewBox="0 0 16 16">
                                            <path
                                                d="M14 3a.7.7 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.7.7 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2M3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5s-3.69-.311-4.785-.793" />
                                        </svg>
                                    </button>
                                </form>
                                <a class="btn btn-warning" href="{{ route('banners.edit', $item->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection
