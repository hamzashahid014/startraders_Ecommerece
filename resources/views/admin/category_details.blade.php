@extends('admin.layouts.master')
@section('category_section_details')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category Details</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
           
            <div class="col-12 col-sm-6">
              <h3 class="my-3"> {{ $category->name }}</h3>
              <img src="{{  asset('storage/'.$category->image) }}" alt="Category Image" class="img-fluid">

             <hr>
             @foreach($category->products as $product)
             <span class="badge bg-success">
                 {{ $product->name }}
             </span><br>  
              @endforeach
              </div>

            </div>
          </div>
       
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->




@endsection