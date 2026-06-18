@extends('admin.layouts.master')
@section('category_section')
        <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Categories</h1>
            <td>
    <a class="btn btn-info btn-sm"
   data-bs-toggle="modal"
   data-bs-target="#modal-addclient">
    Add Category
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
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr No#</th>
                    <th>Category Name</th>
                    <th>Category Description</th>
                    <th>Category Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>View Details</th>
                  </tr>
                  </thead>
                  <tbody>
             
                @foreach($categories as $category)
                  <tr>
                     <td>{{ $loop->iteration }}</td>
                  <td><a href="{{ route('admin.viewCategory', $category) }}">{{ $category->name }}</a></td>
                             <td>{{ $category->description }}</td>
                              <td><img style='width:200px ' src="{{  asset('storage/'.$category->image) }}"></td>
                            
                            <td><a class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modal-default{{ $category->id }}" title="Edit client">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a></td>
                            <td><a class="btn btn-danger btn-sm" href="{{ route('admin.deleteCategory', $category) }}" onclick="return confirm('Are you sure you want to delete this category?')">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a></td>
                            <td><a class="btn bg-teal btn-sm" href="{{ route('admin.viewCategory', $category) }}" title="View client details" >
                              <i class="fas fa-eye">
                              </i>
                               View Details
                          </a></td>
                           <!-- <td>
        @forelse($category->products as $product)
            <span class="badge bg-success">
                {{ $product->name }}
            </span><br>
        @empty
            <span class="text-danger">No Products</span>
        @endforelse
    </td> -->
                          </tr>
                          @endforeach

                
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Sr No#</th>
                    <th>Category Name</th>
                    <th>Category Description</th>
                    <th>Category Image</th>
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
       @foreach($categories as $category)

      <div class="modal fade" id="modal-default{{ $category->id }}">
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
            <h1>Update Category</h1>
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
                <h3 class="card-title"> Update {{ $category->name }} </h3>
              </div>
           <form role="form" action="{{ route('admin.updateCategory') }}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                 <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" id="" placeholder="Enter category Name" 
                    name="name" value="{{ $category->name }}" required />
                  </div>

                    <div class="card-body">
                 <div class="form-group">
                    <label for="exampleInputEmail1">Category Description</label>
                    <textarea class="form-control" id="" placeholder="Enter category Description" name="description" required>{{ $category->description }}</textarea>
                             
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Category Image</label>
                    <input type="file" class="form-control" id="" placeholder="Enter category Image" name="image"/>
                  </div>
                  
                  <input type="hidden" name="category_id" value="{{ $category->id}}">
                  <input type="hidden" name="category_slug" value="{{ $category->slug}}">
                
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
            <h1>Add New Category</h1>
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
                <h3 class="card-title"> Enter Category Information</h3>
              </div>
        <form action="{{ route('admin.addCategory') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" id="" placeholder="Enter category Name" 
                    name="name" required />
                  </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Category Description</label>
                    <textarea class="form-control" id="" placeholder="Enter category Description" name="description" required></textarea>
                             
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Category Image</label>
                    <input type="file" class="form-control" id="" placeholder="Enter category Image" name="image" required />
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
