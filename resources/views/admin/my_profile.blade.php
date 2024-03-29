@extends('layouts.admin')

@section('title')     
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ trans('custom.profile') }}</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">{{ trans('custom.home') }}</a></li>
            <li class="breadcrumb-item active">{{ trans('custom.my_profile') }}</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('content')
<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{ Auth::user()->avatar == '' ? asset('images/defaultuser.jpeg') : asset('images/avatars/' . Auth::user()->avatar) }}" alt="User profile picture" data-toggle="modal" data-target="#pictureModal">
            </div>

            <h3 class="profile-username text-center">{{ ucwords(Auth::user()->name) }}</h3>

            <p class="text-muted text-center">{{ Auth::user()->email }}</p>

            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                <b>Followers</b> <a class="float-right">1,322</a>
                </li>
                <li class="list-group-item">
                <b>Following</b> <a class="float-right">543</a>
                </li>
                <li class="list-group-item">
                <b>Friends</b> <a class="float-right">13,287</a>
                </li>
            </ul>

            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">About Me</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <strong><i class="fas fa-book mr-1"></i> Education</strong>

            <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
            </p>

            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

            <p class="text-muted">Malibu, California</p>

            <hr>

            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

            <p class="text-muted">
                <span class="tag tag-danger">UI Design</span>
                <span class="tag tag-success">Coding</span>
                <span class="tag tag-info">Javascript</span>
                <span class="tag tag-warning">PHP</span>
                <span class="tag tag-primary">Node.js</span>
            </p>

            <hr>

            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_change_my_profile" data-toggle="tab">{{ trans('custom.change_my_profile') }}</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <!-- Post -->
                        <div class="post">
                            <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="{{ asset('lte/dist/img/user1-128x128.jpg') }}" alt="user image">
                            <span class="username">
                                <a href="#">Jonathan Burke Jr.</a>
                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                            </span>
                            <span class="description">Shared publicly - 7:30 PM today</span>
                            </div>
                            <!-- /.user-block -->
                            <p>
                            Lorem ipsum represents a long-held tradition for designers,
                            typographers and the like. Some people hate it and argue for
                            its demise, but others ignore the hate as they create awesome
                            tools to help create filler text for everyone from bacon lovers
                            to Charlie Sheen fans.
                            </p>

                            <p>
                            <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                            <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                            <span class="float-right">
                                <a href="#" class="link-black text-sm">
                                <i class="far fa-comments mr-1"></i> Comments (5)
                                </a>
                            </span>
                            </p>

                            <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                        </div>
                        <!-- /.post -->

                        <!-- Post -->
                        <div class="post clearfix">
                            <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="{{ asset('lte/dist/img/user7-128x128.jpg') }}" alt="User Image">
                            <span class="username">
                                <a href="#">Sarah Ross</a>
                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                            </span>
                            <span class="description">Sent you a message - 3 days ago</span>
                            </div>
                            <!-- /.user-block -->
                            <p>
                            Lorem ipsum represents a long-held tradition for designers,
                            typographers and the like. Some people hate it and argue for
                            its demise, but others ignore the hate as they create awesome
                            tools to help create filler text for everyone from bacon lovers
                            to Charlie Sheen fans.
                            </p>

                            <form class="form-horizontal">
                            <div class="input-group input-group-sm mb-0">
                                <input class="form-control form-control-sm" placeholder="Response">
                                <div class="input-group-append">
                                <button type="submit" class="btn btn-danger">Send</button>
                                </div>
                            </div>
                            </form>
                        </div>
                        <!-- /.post -->

                        <!-- Post -->
                        <div class="post">
                            <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="{{ asset('lte/dist/img/user6-128x128.jpg') }}" alt="User Image">
                            <span class="username">
                                <a href="#">Adam Jones</a>
                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                            </span>
                            <span class="description">Posted 5 photos - 5 days ago</span>
                            </div>
                            <!-- /.user-block -->
                            <div class="row mb-3">
                            <div class="col-sm-6">
                                <img class="img-fluid" src="{{ asset('lte/dist/img/photo1.png') }}" alt="Photo">
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                                <div class="row">
                                <div class="col-sm-6">
                                    <img class="img-fluid mb-3" src="{{ asset('lte/dist/img/photo2.png') }}" alt="Photo">
                                    <img class="img-fluid" src="{{ asset('lte/dist/img/photo3.jpg') }}" alt="Photo">
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-6">
                                    <img class="img-fluid mb-3" src="{{ asset('lte/dist/img/photo4.jpg') }}" alt="Photo">
                                    <img class="img-fluid" src="{{ asset('lte/dist/img/photo1.png') }}" alt="Photo">
                                </div>
                                <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <p>
                            <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                            <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                            <span class="float-right">
                                <a href="#" class="link-black text-sm">
                                <i class="far fa-comments mr-1"></i> Comments (5)
                                </a>
                            </span>
                            </p>

                            <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                        </div>
                        <!-- /.post -->
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="timeline">
                        <!-- The timeline -->
                        <ul class="timeline timeline-inverse">
                            <!-- timeline time label -->
                            <li class="time-label">
                            <span class="bg-danger">
                                10 Feb. 2014
                            </span>
                            </li>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <li>
                            <i class="fas fa-envelope bg-primary"></i>

                            <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                <div class="timeline-body">
                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                quora plaxo ideeli hulu weebly balihoo...
                                </div>
                                <div class="timeline-footer">
                                <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                </div>
                            </div>
                            </li>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <li>
                            <i class="fas fa-user bg-info"></i>

                            <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                                </h3>
                            </div>
                            </li>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <li>
                            <i class="fas fa-comments bg-warning"></i>

                            <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                <div class="timeline-body">
                                Take me to your leader!
                                Switzerland is small and neutral!
                                We are more like Germany, ambitious and misunderstood!
                                </div>
                                <div class="timeline-footer">
                                <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                </div>
                            </div>
                            </li>
                            <!-- END timeline item -->
                            <!-- timeline time label -->
                            <li class="time-label">
                            <span class="bg-success">
                                3 Jan. 2014
                            </span>
                            </li>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <li>
                            <i class="fas fa-camera bg-purple"></i>

                            <div class="timeline-item">
                                <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                <div class="timeline-body">
                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                </div>
                            </div>
                            </li>
                            <!-- END timeline item -->
                            <li>
                            <i class="far fa-clock bg-gray"></i>
                            </li>
                        </ul>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="tab_change_my_profile">
                        <form class="form-horizontal" id="editProfileForm" method="post" action="{{ route('admin.save_profile') }}" enctype="multipart/form-data" autocomplete="off">
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">{{ trans('custom.name') }}<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ trans('custom.name') }}" value="{{ Auth::user()->name }}" maxlength="50" />
                                    </div>
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="avatar" class="col-sm-2 control-label">{{ trans('custom.profile_picture') }}</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*" />
                                    </div>
                                    <span class="text-danger">{{ $errors->first('avatar') }}</span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">{{ trans('custom.save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>

<!-- The Modal -->
<div class="modal" id="pictureModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">{{ trans('custom.profile_picture') }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body text-center">
                <img src="{{ Auth::user()->avatar == '' ? asset('images/defaultuser.jpeg') : asset('images/avatars/' . Auth::user()->avatar) }}" class="img-thumbnail" alt="User profile picture"> 
                <p>&nbsp;</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('add-on')
<script>
    if ($("#editProfileForm").length > 0) {
        $("#editProfileForm").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 50
                },  
            },
            messages: {
                name: {
                    required: "Please enter {{ trans('custom.name') }}",
                    maxlength: "Your last {{ trans('custom.name') }} maxlength should be 50 characters long."
                },
            },
        });
    }

</script>
@endsection
        