@extends('backend.master')
@section('body_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">User</a></li>
                    <li class="active">Profile</li>
                </ol>
            </div>
        </section>
                <section class="content">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Profile Image -->
                            <div class="box box-primary">
                                <div class="box-body box-profile">

                                    <div class="image-upload">
                                        <label for="upload">
                                            <img src="{{asset('uploads/avatars/'.$admins->avatar)}}"
                                                 alt="User profile picture">
                                        </label>
                                        <input type="file" data-id="{{$data}}" id="upload" data-target="#myModal"
                                               data-toggle="modal">
                                        <div id="upload-demo-i" data-id="{{$data}}" style="cursor: pointer"
                                             onclick="editImage()"></div>
                                        <label for="upload">
                                            <div class="uploadsmomo" data-id="{{$data}}" title="change avatar"><i
                                                        class="fa fa-cloud-upload" aria-hidden="true"></i></div>
                                        </label>
                                    </div>
                                    <h3 class="profile-username text-center">{{$admins->username}}</h3>

                                    <p class="text-muted text-center">
                                        <i>{{$admins->level ==1 ? 'Administrator' : 'Member' }}</i></p>

                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                            <b>Số bài viết</b> <a class="pull-right">1,322</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                            <div id="myModal" class="modal fade " role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" style=" " class="close" data-dismiss="modal">&times;
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="upload-demo" style="width:350px"></div>
                                            <button class="btn btn-success upload-result float-right"
                                                    data-dismiss="modal">Upload
                                                Image
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!---End xử lý---->
                            <!---Modal anh dai dien--->
                            <div class="modal fade in uploadavatar" id="changeavatar">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Avatar</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>One fine body…</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left"
                                                    data-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!----END MODAL------>
                            <!-- About Me Box -->
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Thông tin chi tiết</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <strong><i class="fa fa-book margin-r-5"></i>Ngày sinh</strong>

                                    <p class="text-muted">
                                        27/11/1995
                                    </p>
                                    <hr>

                                    <strong><i class="fa fa-envelope" aria-hidden="true"></i> Email</strong>

                                    <p class="text-muted">{{$admins->email}}</p>

                                    <hr>

                                    <strong><i class="fa fa-pencil margin-r-5"></i>Chức Vụ</strong>

                                    <p>
                                        <span class="label label-danger">UI Design</span>
                                        <span class="label label-success">Coding</span>
                                        <span class="label label-info">Javascript</span>
                                        <span class="label label-warning">PHP</span>
                                        <span class="label label-primary">Node.js</span>
                                    </p>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#activity" data-toggle="tab">Hoạt Động</a></li>
                                    <li><a href="#timeline" data-toggle="tab">Nhật Ký Hoạt Động</a></li>
                                    <li><a href="#settings" data-toggle="tab">Cài Đặt</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <!-- Post -->
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm"
                                                     src="{{asset('images/boruto.jpg')}}"
                                                     alt="user image">
                                                <span class="username">
                                              <a href="#">Jonathan Burke Jr.</a>
                                              <a href="#" class="pull-right btn-box-tool"><i
                                                          class="fa fa-times"></i></a>
                                            </span>
                                                <span class="description">Shared publicly - 7:30 PM today</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                Lorem ipsum represents a long-held tradition for designers, typographers
                                                and
                                                the like. Some people hate it and argue for its demise, but others
                                                ignore
                                                the hate as they create awesome tools to help create filler text for
                                                everyone from bacon lovers to Charlie Sheen fans.
                                            </p>
                                            <ul class="list-inline">
                                                <li><a href="#" class="link-black text-sm"><i
                                                                class="fa fa-share margin-r-5"></i> Share</a></li>
                                                <li><a href="#" class="link-black text-sm"><i
                                                                class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                                </li>
                                                <li class="pull-right">
                                                    <a href="#" class="link-black text-sm"><i
                                                                class="fa fa-comments-o margin-r-5"></i> Comments
                                                        (5)</a></li>
                                            </ul>

                                            <input class="form-control input-sm" type="text"
                                                   placeholder="Type a comment">
                                        </div>
                                        <!-- /.post -->

                                        <!-- Post -->
                                        <div class="post clearfix">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm"
                                                     src="{{asset('images/boruto.jpg')}}"
                                                     alt="User Image">
                                                <span class="username">
                                              <a href="#">Sarah Ross</a>
                                              <a href="#" class="pull-right btn-box-tool"><i
                                                          class="fa fa-times"></i></a>
                                            </span>
                                                <span class="description">Sent you a message - 3 days ago</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                Lorem ipsum represents a long-held tradition for designers, typographers
                                                and
                                                the like. Some people hate it and argue for its demise, but others
                                                ignore
                                                the hate as they create awesome tools to help create filler text for
                                                everyone from bacon lovers to Charlie Sheen fans.
                                            </p>

                                            <form class="form-horizontal">
                                                <div class="form-group margin-bottom-none">
                                                    <div class="col-sm-9">
                                                        <input class="form-control input-sm" placeholder="Response">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <button type="submit"
                                                                class="btn btn-danger pull-right btn-block btn-sm">Send
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.post -->

                                        <!-- Post -->
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm"
                                                     src="{{asset('images/boruto.jpg')}}"
                                                     alt="User Image">
                                                <span class="username">
                                              <a href="#">Adam Jones</a>
                                              <a href="#" class="pull-right btn-box-tool"><i
                                                          class="fa fa-times"></i></a>
                                            </span>
                                                <span class="description">Posted 5 photos - 5 days ago</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <div class="row margin-bottom">
                                                <div class="col-sm-6">
                                                    <img class="img-responsive" src="{{asset('images/boruto.jpg')}}"
                                                         alt="Photo">
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-6">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <img class="img-responsive"
                                                                 src="{{asset('images/boruto.jpg')}}"
                                                                 alt="Photo">
                                                            <br>
                                                            <img class="img-responsive"
                                                                 src="{{asset('images/boruto.jpg')}}"
                                                                 alt="Photo">
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col-sm-6">
                                                            <img class="img-responsive"
                                                                 src="{{asset('images/boruto.jpg')}}"
                                                                 alt="Photo">
                                                            <br>
                                                            <img class="img-responsive"
                                                                 src="{{asset('images/boruto.jpg')}}"
                                                                 alt="Photo">
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.row -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->

                                            <ul class="list-inline">
                                                <li><a href="#" class="link-black text-sm"><i
                                                                class="fa fa-share margin-r-5"></i> Share</a></li>
                                                <li><a href="#" class="link-black text-sm"><i
                                                                class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                                </li>
                                                <li class="pull-right">
                                                    <a href="#" class="link-black text-sm"><i
                                                                class="fa fa-comments-o margin-r-5"></i> Comments
                                                        (5)</a></li>
                                            </ul>

                                            <input class="form-control input-sm" type="text"
                                                   placeholder="Type a comment">
                                        </div>
                                        <!-- /.post -->
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="timeline">
                                        <!-- The timeline -->
                                        <ul class="timeline timeline-inverse">
                                            <!-- timeline time label -->
                                            <li class="time-label">
                                        <span class="bg-red">
                                          10 Feb. 2014
                                        </span>
                                            </li>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <li>
                                                <i class="fa fa-envelope bg-blue"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an
                                                        email</h3>

                                                    <div class="timeline-body">
                                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                        jajah
                                                        plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                        quora
                                                        plaxo ideeli hulu weebly balihoo...
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <a class="btn btn-primary btn-xs">Read more</a>
                                                        <a class="btn btn-danger btn-xs">Delete</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <li>
                                                <i class="fa fa-user bg-aqua"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                                                    <h3 class="timeline-header no-border"><a href="#">Sarah Young</a>
                                                        accepted your friend request
                                                    </h3>
                                                </div>
                                            </li>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <li>
                                                <i class="fa fa-comments bg-yellow"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                                                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on
                                                        your
                                                        post</h3>

                                                    <div class="timeline-body">
                                                        Take me to your leader! Switzerland is small and neutral! We are
                                                        more like Germany, ambitious and misunderstood!
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <!-- END timeline item -->
                                            <!-- timeline time label -->
                                            <li class="time-label">
                                        <span class="bg-green">
                                          3 Jan. 2014
                                        </span>
                                            </li>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <li>
                                                <i class="fa fa-camera bg-purple"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                                                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new
                                                        photos
                                                    </h3>

                                                    <div class="timeline-body">
                                                        {{--<img src="http://placehold.it/150x100" alt="..." class="margin">--}} {{--
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">--}} {{--
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">--}} {{--
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">--}}
                                                    </div>
                                                </div>
                                            </li>
                                            <!-- END timeline item -->
                                            <li>
                                                <i class="fa fa-clock-o bg-gray"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="settings">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Name</label>

                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="inputName"
                                                           placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="inputEmail"
                                                           placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Name</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName"
                                                           placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputExperience"
                                                       class="col-sm-2 control-label">Experience</label>

                                                <div class="col-sm-10">
                                                <textarea class="form-control" id="inputExperience"
                                                          placeholder="Experience"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputSkills"
                                                           placeholder="Skills">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> I agree to the <a href="#">terms and
                                                                conditions</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
    </div>
@endsection
@section('script') {{--
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>--}}
<script>

    jQuery(document).ready(function ($) {

        $('.image-upload').hover(
            function () {
                $(this).addClass('uploadshienra');
            },
            function () {
                $(this).removeClass("uploadshienra");
            }
        );
    });
</script>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/croppie.js')}}"></script>
<script type="text/javascript">
    //cho ra khung crop
    $uploadCrop = $('#upload-demo').croppie({
        enableExif: true,
        viewport: {
            width: 300,
            height: 225,
            type: 'rectangle'
        },
        boundary: {
            width: 300,
            height: 300
        }
    });
    $('#upload').on('change', function () {
        var reader = new FileReader();
        reader.onload = function (e) {
            $uploadCrop.croppie('bind', {
                url: e.target.result
            }).then(function () {
                console.log('jQuery bind complete');

            });

        }
        reader.readAsDataURL(this.files[0]);
    });
    $('.upload-result').on('click', function (ev) {
        var id = $("#upload").attr('data-id');
        var APP_URL = {!! json_encode(url('/')) !!}
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (resp) {

            $.ajax({
                url: APP_URL + "/admin/update-avatar/" + id,
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id,
                    "image": resp
                },
                success: function (data) { //alert(data);
//                    console.log(data);
                    html = '<img src="' + resp + '" />';
                    $("#upload-demo-i").html(html);
//                    console.log(data);
                }
            });
        });
    });

    /*This function is added for Image Reupload Facility: Start*/
    function editImage() {
        //alert("hiiiiiii");
        location.reload(true);
        editImage2();
    }

    function editImage() {
        $("#upload").click();
    }

    /*This function is added for Image Reupload Facility: End*/
</script>

@endsection
@section('style')
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="{{asset('css/1.css')}}">
    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
        .uploadimg {
            position: absolute;
            top: 0;
        }

        #upload-demo {
            position: relative;
        }

        .image-upload > input {
            visibility: hidden;
            width: 0;
            height: 0;
            background: transparent;
        }

        #upload-demo-i {
            position: absolute;
            top: 3px;
            left: 0px;
        }
    </style>

@endsection