<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
        input[type='text'] {
            width: 400px;
            height: 40px;
        }
        input[type='search'] {
            width: 400px;
            height: 40px;
            margin-left: 60px
        }
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;
        }
        .table_deg {
            text-align: center;
            margin: auto;
            border: 2px skyblue;
            margin-top: 50px;
            width: 500px;
        }
       
        th{
background-color: skyblue;
padding: 15px;
font-size: 20px;
font-weight: bold;
color: white;

        }
        td{ 
            
    padding: 15px;
    color: white;
    border: 1px solid skyblue;
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
  </head>
  <body>
  @include('admin.header')
  @include('admin.sidebar')
    
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
          <form action="{{url('product_search')}}" method="get" >
            @csrf 
            <input type="search" name="search">
            <input type="submit" class="btn btn-secondary" name="Search">
          </form>

          <div class="div_deg">
        
          <table class="table_deg">
    
        <tr>
            <th>Product Title</th>
            <th>Description</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Image</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($product as $products)
                        <tr>
                            <td>{{$products->title}}</td>
                            <td>{!!Str::limit($products->description,50)!!}</td>
                            <td>{{$products->category}}</td>
                            <td>{{$products->price}}</td>
                            <td>{{$products->quantity}}</td>
                            <td>
                                <img height="120px" width="120px" src="products/{{$products->image}}">
                            </td>
                            <td><a class="btn btn-success" href="{{url('update_product',$products->id)}}">Edit</a></td>
                            <td><a class="btn btn-danger" onClick="confirmation(event)" href="{{url('delete_product',$products->id)}}">Delete</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>

                <!-- Pagination Links -->
                <div class="pagination">
                    {{ $product->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript files-->
     <!-- Latest compiled and minified CSS -->
    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}"></script>
    <!-- @include('admin.js') -->
  </body>
</html>