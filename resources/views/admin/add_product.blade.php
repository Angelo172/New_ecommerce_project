<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
        .div_deg
        {
          display: flex;
          justify-content: center;
          align-items: center;
          margin-top: 60px;
        }
        label
        {
         display: flex;
         width: 200px;
         font-size: 18px!important;
         color: white!important;
        }
        input[type='text']
        {
         width: 350px;
         height: 50px;
        }
        textarea
        {
            width: 450px;
            height: 80px;
        }
        .input_deg
        {
            padding: 15px;
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
           <h1>Add Products</h1>
        <div class="div_deg">


            <form action="{{url('upload_product')}}" method="post"  enctype="multipart/form-data">
                
            @csrf

                <div class="input_deg">
                    <label for="">Product Title</label>
                    <input type="text" name="title" require>
                </div>

                <div class="input_deg">
                    <label for="">Description</label>
                    <textarea name="description" require></textarea>
                </div>

                <div class="input_deg">
                    <label for="">Price</label>
                    <input type="text" name="price">
                </div>

                <div class="input_deg">
                    <label for="">Quantity</label>
                    <input type="number" name="qty">
                </div>

                <div class="input_deg">
                    <label for="">Product Category</label>

                    <select name="category" require>
                        <option value="">Select a Option</option>

                        @foreach($category as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                        @endforeach

                    </select>
                </div>

                <div class="input_deg">
                    <label for="">Product Image</label>
                    <input type="file" name="image" >
                </div>

                <div class="input_deg">
                    <input class="bnt btn-success" type="submit" name="Add Product" >
                </div>
            </form>
        </div>

        </div>    
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('/Admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/Admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/Admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/Admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/Admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/Admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/Admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/Admincss/js/front.js')}}"></script>
  </body>
</html>