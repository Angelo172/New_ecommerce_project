<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .div_deg
        {
           display: flex;
           justify-content: center;
           align-items: center;
        }
        label
        {
            display: inline-block;
            width: 200px;
            padding: 20px;
        }
        input[type='text']
        {
            width: 300px;
            height: 60px;
        }
        textarea
        {
            width: 450px;
            height: 100px;
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
            
          <h2>Update Product</h2>

        <div class="div_deg">
       <form action="{{url('edit_product',$data->id)}}" method="post" enctype="multipart/form-data">

       @csrf
       
       <div class="input_deg">
                    <label for="">Product Title</label>
                    <input type="text" name="title" value="{{$data->title}}">
                </div>

                <div class="input_deg">
                    <label>Description</label>
                    <textarea name="description">{{$data->description}}</textarea>
                </div>

                <div class="input_deg">
                    <label for="">Price</label>
                    <input type="text" name="price" value="{{$data->price}}">
                </div>

                <div class="input_deg">
                    <label for="">Quantity</label>
                    <input type="number" name="qty" value="{{$data->quantity}}">
                </div>

                <div class="input_deg">
                    <label for="">Product Category</label>

                    <select name="category">
                        <option value="{{$data->category}}">{{$data->category}}</option>
                      @foreach($category as $category)
                      <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                      @endforeach

                    </select>
                </div>

                <div class="input_deg">
                    <label for="">Current Image</label>
                    <img width="150" src="/products/{{$data->image}}" alt="">
                </div>

                <div>
                    <label for="">New Image</label>
                    <input type="file" name="image" >
                </div>

                <div>
                    <input class="btn btn-success" type="submit" value="Update Product">
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