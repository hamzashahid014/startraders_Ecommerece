

@extends('admin.layouts.master')

@section('products_section')
      

        <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
            <td>
                <a class="btn btn-info btn-sm"
   data-bs-toggle="modal"
   data-bs-target="#modal-addclient">
    Add Product
</a>
            </td>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid --> 
    </section>
    
    <!-- Main content -->
    <section class="content">
      @if(session('success'))
    <div class="alert alert-success" id="success-alert">
        {{ session('success') }}
    </div>
@endif
      <div class="container-fluid">
        <div class="row">

          <div class="col-12">
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">ALL PRODUCTS</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr No#</th>
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th>Product Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>View Details</th>
                  </tr>
                  </thead>
                  <tbody>
                
                @foreach($products as $product)
                  <tr>
                     <td>{{$loop->iteration }}</td>
                  <td><a href="{{ route('admin.viewProduct', $product) }}">{{ $product->name }}</a></td>
                             <td>{{ $product->description }}</td>
                              <td><img src="{{  asset('storage/'.$product->image) }}"></td>
                            
                            <td><a class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modal-default{{ $product->id }}" title="Edit client">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a></td>
                            <td><a class="btn btn-danger btn-sm" href="{{ route('admin.deleteProduct', $product) }}" onclick="return confirm('Are you sure you want to delete this product?')">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a></td>
                            <td><a class="btn bg-teal btn-sm" href="{{ route('admin.viewProduct', $product) }}" title="View client details" >
                              <i class="fas fa-eye">
                              </i>
                               View Details
                          </a></td>

                          </tr>
                          @endforeach

                
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Sr No#</th>
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th>Product Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>View Details</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          
            <!-- /.card --> 
            
          </div>
          <!-- /.col --> 
        </div>
        <!-- /.row --> 
      </div>
      <!-- /.container-fluid --> 
    </section>
    <!-- /.content --> 
  </div>
  <!--Edit brand popup -->
       @foreach($products as $product)

      <div class="modal fade" id="modal-default{{ $product->id }}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <div class="" style="margin: 0px;min-height: 0;">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="h1_admin">
            <h1>Update Product</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card card-primary main_002">
              <div class="card-header">
                <h3 class="card-title"> Update {{ $product->name }} </h3>
              </div>
           <form role="form" action="{{ route('admin.updateProduct') }}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                 <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" class="form-control" id="" placeholder="Enter product Name" 
                    name="name" value="{{ $product->name }}" required />
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">ProductPrice</label>
                    <input type="number" class="form-control" id="" placeholder="Enter product Price" 
                    name="price" value="{{ $product->price }}" required />
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Product Sale Price</label>
                    <input type="number" class="form-control" id="" placeholder="Enter product Price" 
                    name="sale_price" value="{{ $product->sale_price }}" required />
                  </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Product Description</label>
                    <textarea class="form-control" id="" placeholder="Enter product Description" name="description" required>{{ $product->description }}</textarea>     
                  </div>
              
    
                      <div class="form-group">
                    <label for="exampleInputEmail1">Product Category</label>
                    <select class="form-control" name="category_id" required>
                      <option value="">Select Category</option>
                      @foreach($categories as $category)    
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Product Image</label>
                    <input type="file" class="form-control" id="" placeholder="Enter product Image" name="image" required />
                  </div>
                  
                  <input type="hidden" name="product_id" value="{{ $product->id}}">
                  <input type="hidden" name="category_slug" value="{{ $product->slug}}">
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" style=" background-color: #007bff;border: none" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
    </div>
          </div>
          <!-- /.modal-content -->
        </div>
      </div>

@endforeach
<!--add brand itaem popup-->

      <div class="modal fade" id="modal-addclient">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <div class="" style="margin: 0px;min-height: 0;">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="h1_admin">
            <h1>Add New Product</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card card-primary main_002">
              <div class="card-header">
                <h3 class="card-title"> Enter Product Information</h3>
              </div>
        <form action="{{ route('admin.addProduct') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" class="form-control" id="" placeholder="Enter product Name" 
                    name="name" required />
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">ProductPrice</label>
                    <input type="number" class="form-control" id="" placeholder="Enter product Price" 
                    name="price" required />
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Product Sale Price</label>
                    <input type="number" class="form-control" id="" placeholder="Enter product Price" 
                    name="sale_price" required />
                  </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Add Stock</label>
                    <input type="number" class="form-control" id="" placeholder="Enter product Stock" 
                    name="stock" required />
                  </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Product Description</label>
                    <textarea class="form-control" id="" placeholder="Enter product Description" name="description" required></textarea>     
                  </div>
              
    
                      <div class="form-group">
                    <label for="exampleInputEmail1">Product Category</label>
                    <select class="form-control" name="category_id" required>
                      <option value="">Select Category</option>
                      @foreach($categories as $category)    
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  

                   <div class="form-group">
                    <label for="exampleInputEmail1">Product Image</label>
                    <input type="file" class="form-control" id="" placeholder="Enter product Image" name="image" required />
                  </div>
                  
                </div>
              
                </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
    </div>
          </div>
          <!-- /.modal-content -->
        </div>
      </div>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


<script>
setTimeout(function() {
    let alert = document.getElementById('success-alert');

    if(alert) {
        alert.style.transition = "opacity 0.5s";
        alert.style.opacity = "0";

        setTimeout(function() {
            alert.remove();
        }, 500);
    }
}, 3000);
</script>
@endsection
