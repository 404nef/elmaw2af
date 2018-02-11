<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Links-->
    @include('layouts.links')



</head>
<body>




@foreach($children  as $child)
    <h1 class="display-3">{{$child}}</h1>
@endforeach


<!--Contact Us Footer-->
@include('layouts.footer')











<!--Top button section -->
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-angle-up"></i></button>



<!--To top buttopn scrtip-->
<script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>

<!--FadeinFunctionFroTrnasports-->


</body>
</html>
