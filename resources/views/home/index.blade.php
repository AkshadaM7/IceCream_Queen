<!DOCTYPE html>
<html>

<head>
  
@include('home.css')

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    </header>
    <!-- end header section -->

    <!-- slider section -->

    @include('home.slider')    
    <!-- end slider section -->

  <!-- shop section -->
    @include('home.product') 
  

  <!-- end shop section -->


  <!-- contact section -->
  @include('home.contact') 

  <!-- end contact section -->

   

  <!-- info section -->
@include('home.footer')
</body>

</html>