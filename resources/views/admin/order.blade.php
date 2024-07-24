<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
    <style type="text/css">
        input[type='text'] {
            width: 400px;
            height: 40px;
        }
        
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;
        }
        table {
            text-align: center;
            margin: auto;
            border: 2px skyblue;
            margin-top: 50px;
            width: 500px;
        }
        th {
            background-color: skyblue;
            padding: 15px;
            font-size: 15px;
            font-weight: bold;
            color: white;
        }
        td {
            padding: 15px;
            color: white;
            border: 1px solid skyblue;
            background-color: white;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
    
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <div class="div_deg">
            <table>
              <tr>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Product Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Status</th>
                <th>Change Status</th>
              </tr>
              @foreach($data as $data)
              <tr>
                <td>{{$data->name}}</td>
                <td>{{$data->rec_address}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->product->title}}</td>
                <td>{{$data->price}}</td>
                <td>
                <img height="120px" width="120px" src="products/{{$data->product->image}}">
            </td>
            <td>{{$data->status}}</td>
          
            <td><a class="btn btn-primary" href="{{url('on_the_way',)}}">On the way</a></td>
        
            <td><a class="btn btn-success" href="{{url('delivered',)}}">Delivered</a></td>
            <td><a class="btn btn-secondary" href="{{url('print_pdf',)}}">Print PDF</a></td></tr>

          </tr>

              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
    
    @include('admin.js')
  </body>
</html>
