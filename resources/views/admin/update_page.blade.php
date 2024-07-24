<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style type="text/css">
        input[type='text'] {
            width: 200px;
            height: 40px;
        }
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }
        h1 {
            color: white;
        }
        label {
            display: inline-block;
            width: 250px;
            font-size: 18px!important;
            color: white!important;
        }
        textarea {
            width: 400px;
            height: 80px;
        }
        .input_deg {
            padding: 15px;
        }
    </style>
</head>
<body>
@include('admin.header')
@include('admin.sidebar')

<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
            <h1>Update Product</h1>
            <div class="div_deg">
                <form>
               <form action="{{ url('edit_product', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input_deg">
                       <label>Product Title</label>
                        <input type="text" name="title" value="{{ $data->title }}" required>
                    </div>
                    <div class="input_deg">
                        <label>Description</label>
                        <textarea name="description" required>{{$data->description}}</textarea>
                    </div>
                    <div class="input_deg">
                        <label>Price</label>
                        <input type="text" name="price" value="{{ $data->price }}">
                    </div>
                    <div class="input_deg">
                        <label>Quantity</label>
                        <input type="number" name="quantity" value="{{ $data->quantity }}">
                    </div>
                    <div class="input_deg">
                        <label>Product category</label>
                        <select name="category" required>
                            <option value="{{ $data->category}}">{{ $data->category}}</option>
                            @foreach($category as $category)
                            <option value=" {{ $category->category_name == $data->category ? 'selected' : '' }}">{{ $category->category_name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <img height="120px" width="120px" src="/products/{{ $data->image }}">
                    </div>
                    <div class="input_deg">
                        <label>Current Image</label>
                        <input type="file" name="image">
                    </div>
                    <div class="input_deg">
                        <input class="btn btn-success" type="submit" value="Update Product">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('/admincss/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
<script src="{{ asset('/admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
<script src="{{ asset('/admincss/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('/admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('/admincss/js/charts-home.js') }}"></script>
<script src="{{ asset('/admincss/js/front.js') }}"></script>
</body>
</html>
