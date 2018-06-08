@include('layouts.new_app')

<style>
    #thankssection{
        padding: 50px;
        background-color:#F2F2F2;

    }
    #contentsection{
        border-radius: 5px;
    }

</style>

<section id="thankssection">
    <div class="container justify-content-center text-center" id="contentsection">
        <div class="mb-5"><h1 class="display-3">Thanks for submitting <br> a useful review</h1></div>
        <br>
        <br>
        <br>
        <div class="mb-5"><img src="{{asset('correct.png')}}" alt="" width="100px" height="100px" class="img-fluid"></div>
        <br>
        <br>
        <br>
        <div class="mb-5"><a href="/" class="btn btn-primary">Back to home</a></div>
    </div>
</section>
@include('layouts.new_footer')