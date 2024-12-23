<!DOCTYPE html>
<html>

<head>
  
@include('home.css')
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
        .cart_value {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 40px;
        }
        table {
            text-align: center;
            margin: auto;
            border: 2px solid black;
            margin-top: 50px;
            width: 800px;
            
        }
        th{
background-color: black;
padding: 15px;
font-size: 15px;
font-weight: bold;
color: white;}
td{ 
            
            padding: 15px;
            color: black;
            border: 1px solid skyblue;
                }
                .order_deg{
                    
                padding: 10px;
                }
                label{
display:inline-block;
width: 150px;
padding: 15px;
                }
        </style>

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    </header>
    <!-- end header section -->
</div>

<div class="div_deg">
    <div class='order_deg'>
        <form action="{{route('confirm_order')}}" method="Post">
        @csrf <div>
    <label>Receiver Name</label>
    <input type="text" name="name" value="{{Auth::user()->name}}">
    </div>

    <div>
    <label>Receiver Address</label>
    <textarea name="address" value="{{Auth::user()->address}}"></textarea>
    </div>

    <div>
    <label>Receiver Phone</label>
    <input type="text" name="phone" value="{{Auth::user()->phone}}">
    </div>

    <div>
    <input class ="btn btn-primary" type="submit" value="Place Order">
    </div>
            </form>
            </div>
            

<table>
<tr>
<th>Product Title</th>
<th>Price</th>
<th>Image</th>
<th>Remove</th>


</tr>

<?php
$value=0;
?>
@foreach($cart as $cart)
<tr>
<td>{{$cart->product->title}}</td>
<td>Rs {{$cart->product->price}}</td>
<td><img height="120px" width="120px" src="/products/{{$cart->product->image}}"></td>
<td><a class="btn btn-danger" onClick="confirmation(event)" href="{{url('delete_cart',$cart->id)}}"> Remove  </a></td>


</tr>
<?php
$value=$value + $cart->product->price;
?>
@endforeach
</table>
</div></div>

<div class='cart_value'>
<h3>Total value of cart is: Rs {{$value}}</h3>

</div>

  <!-- info section -->
@include('home.footer')
</body>

</html>