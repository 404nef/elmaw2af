@extends('Admin.Dashboard')

@section('content')


<section id="reviewcontent">
 <div class="text-center">
     <p><h1 class="display-5">{{$review->content}}</h1></p>
 </div>
</section>


@endsection