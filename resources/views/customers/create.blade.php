@extends('home')
@section('title', 'Create Customer')
@section('content')
    <h1>Thêm mới khách hàng</h1>
    <form method="post" action="{{route('customers.store')}}">

        @csrf
        <div class="col-10">
            <div class="form-group">
                <label>Tên khách hàng</label>
                <input type="" class="form-control" name="name" placeholder="Nhập tên" required>
            </div>
            <div class="form-group">
                <label>Ngày sinh</label>
                <input type="date" class="form-control" name="dob" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Nhập email" required>
            </div>
            <div class="form-group">
                <label>Tỉnh thành</label>
                <select class="form-control" name="city_id">
                    @foreach($cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach

                </select>

            </div>

            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="{{route('customers.index')}}">
                <button type="button" class="btn btn-danger">Hủy</button>
            </a>
        </div>
    </form>
@endsection