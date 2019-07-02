@extends('home')
@section('title','Edit Customer')
@section('content')
    <h1>Cập nhật khách hàng</h1>
    <form action="{{route('customers.update', $customer->id)}}" method="post">
        @csrf
        <div class="col-10">
            <div class="form-group">
                <label>Tên khách hàng</label>
                <input type="" class="form-control" name="name" value="{{$customer->name}}" placeholder="Nhập tên"
                       required>
            </div>
            <div class="form-group">
                <label>Ngày sinh</label>
                <input type="date" class="form-control" name="dob" value="{{$customer->dob}}" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="{{$customer->email}}" placeholder="Nhập email"
                        required>

            </div>
            <div class="form-group">
                <label>Tỉnh thành</label>
                <select class="form-control" name="city_id">
                    @foreach($cities as $city)
                        <option
                                @if($customer->city_id == $city->id)
                                {{"selected"}}
                                @endif
                                value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Sửa</button>
            <a href="{{route('customers.index')}}">
                <button type="button" class="btn btn-danger">Hủy</button>
            </a>
        </div>
    </form>
@endsection
