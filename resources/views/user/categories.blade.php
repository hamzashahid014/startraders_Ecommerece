@extends('user.layouts.app')
@section('categories_section')
    <div class="text-center mb-5 aos-init aos-animate" data-aos="fade-up">
               <span class="slbl">What We Offer</span>
               <h2 class="stitle">Browse by <span>Category</span></h2>
               <div class="sline"></div>
               </div>
<div class="row g-4">
        @foreach($categories as $category)
               <div class="col-sm-6 col-lg-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
                  <div class="chcard">
                     <div class="chimg">
                         <img src="{{asset('storage/'.$category->image)}}" alt="">

                     </div>
                     <div class="chbody">
                        <div class="chnm">{{$category->name}}</div>
                        <div class="chrole">Products</div>
                        <div class="chexp">{{$category->products->count()}}</div>
                     </div>
                  </div>
                  <div class="text-center mt-5"><a href="{{route('user.categoryProducts',$category)}}" class="btn-red"><i class="fas fa-th-large"></i>View Products</a></div>
               </div>
                @endforeach
            </div>
           
@endsection