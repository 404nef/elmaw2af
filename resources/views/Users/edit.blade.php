<head>
    @include('layouts.links')
    <title>Edit your profile</title>
    <style type="text/css">
        #greetings{
            background-image: url("{{asset('greenbg.jpg')}}");
        }
        #profile{
            background: linear-gradient(0deg,rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url("{{asset('editprofilebgd.jpg')}}");
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>
<body>


<section id="greetings">
    <div class="container text-center text-white">
        <h1 class="display-3">Hello,Username !</h1>
    </div>
</section>

<section id="profile">

    <div class="container" id="infosection"><!--Containerstart-->
        <div class="row"><!--rowstart-->

            <div class="col-md-9"><!--col1start-->

            <form action="" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="card mt-5">
                    <div class="card-header">
                        Infro
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="example@example.com">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                        </div>

                    </div>
                </div>
                
            </div><!--col1end-->

            <div class="col-md-3 verticalLine"><!--col2start-->


            <div class="d-flex flex-row justify-content-center form-group"><img src="{{asset('avatar.jpg')}}" class="img-fluid rounded-circle" style="width: 200px;height: 200px;" alt=""></div>
            <div class="d-flex flex-row justify-content-center form-group text-white"><label class="btn btn-warning btn-block btn-file">
                    <i class="far fa-file-image  mr-1"></i>  Edit avatar <input type="file" style="display: none;">
                </label>
            </div>
             <div class="d-flex flex-row justify-content-center form-group"><button class="btn btn-primary btn-block" type="submit"><i class="far fa-save mr-2"></i>Save changes</button></div>
             </form>
            <div class="d-flex flex-row justify-content-center form-group" data-toggle="modal" data-target="#changepasswordmodal"><button class="btn btn-danger btn-block" type="submit"><i class="fas fa-unlock mr-1"></i>Change password</button></div>



            </div><!--col2end-->


        </div><!--rowend-->
    </div><!--Containerend-->

</section>








<!--ChangePasswordModal-->
<div class="modal fade" id="changepasswordmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-center text-white">
                <h5 class="modal-title" id="exampleModalLabel">Change password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action=""  enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="oldpassword">Old</label>
                        <input type="password" class="form-control" name="oldpassword" id="oldpassword">
                    </div>
                    <div class="form-group">
                        <label for="newpassword">New Password</label>
                        <input type="password" class="form-control" name="newpassword" id="newpassword">
                    </div>
                    <div class="form-group">
                        <label for="confirmnewpassword">Confirm new password</label>
                        <input type="password" class="form-control" name="confirmnewpassword" id="confirmnewpassword">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Save changes</button>
            </div>
        </div>
    </div>
</div>











<!--Contact Us From-->
@include('layouts.footer')
</body>