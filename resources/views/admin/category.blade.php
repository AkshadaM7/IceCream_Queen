<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
        .table_deg {
            text-align: center;
            margin: auto;
            border: 2px skyblue;
            margin-top: 50px;
            width: 600px;
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
    </style>
  </head>
  <body>
  @include('admin.header')

  @include('admin.sidebar')
    
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

          <div class="div_deg">
            <h1 style='color: white'>Add Category</h1>
        
    <form action="{{url('add_category')}}" method="post">
        @csrf
        <div>
            <input type="text" name="category">
    
            <input class="btn btn-primary" type="submit" value="Add category">

        </div>
    </form>
      </div>

      <div>
        <table class="table_deg">
        
            <tr>
                <th>Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($data as $data)
            <tr>
                <td>{{$data->category_name}}</td>
                <td><a class="btn btn-success" href="{{url('edit_category',$data->id)}}">Edit </a></td>
                <td><a class="btn btn-danger" onClick="confirmation(event)" href="{{url('delete_category',$data->id)}}"> Delete  </a></td>
            </tr>
            <!-- <tr><td>Sports</td></tr> -->
            @endforeach
       </table>
      </div>

      <div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script type="text/javascript">
    function confirmation(ev)
    {
        ev.preventDefault();//if someone clicks delet button it will stop browser from reloading and refreshing
        var urlToRedirect=ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        swal({
            title:"Are you sure to delete this?",
            text:"This delete is permanent",
            icon:"Warning!",
            buttons: true,
            dangerMode: true, 

        })
        .then((willCancel)=>{
            if(willCancel){
                window.location.href=urlToRedirect;
            }

        });
    } 
    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}></script>
  </body>
</html>