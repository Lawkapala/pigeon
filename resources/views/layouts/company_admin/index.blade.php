<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Online bus ticket system</title>
    <meta name="description" content="description">
    <meta name="author" content="DevOOPS">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href={{asset('plugins/bootstrap/bootstrap.css')}} rel="stylesheet">
    <link href={{asset('plugins/jquery-ui/jquery-ui.min.css')}} rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
    <link href={{asset('plugins/fancybox/jquery.fancybox.css')}} rel="stylesheet">
    <link href={{asset('plugins/fullcalendar/fullcalendar.css')}} rel="stylesheet">
    <link href={{asset('plugins/xcharts/xcharts.min.css')}} rel="stylesheet">
    <link href={{asset('plugins/select2/select2.css')}} rel="stylesheet">
    <link href={{asset('plugins/justified-gallery/justifiedGallery.css')}} rel="stylesheet">
    <link href={{asset('css/style_v1.css')}} rel="stylesheet">
    <link href={{asset('plugins/chartist/chartist.min.css')}} rel="stylesheet">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
    <script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!--Start Header-->
<div id="screensaver">
    <canvas id="canvas"></canvas>
    <i class="fa fa-lock" id="screen_unlock"></i>
</div>
<div id="modalbox">
    <div class="devoops-modal">
        <div class="devoops-modal-header">
            <div class="modal-header-name">
                <span>Basic table</span>
            </div>
            <div class="box-icons">
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="devoops-modal-inner">
        </div>
        <div class="devoops-modal-bottom">
        </div>
    </div>
</div>
<header class="navbar">
    <div class="container-fluid expanded-panel">
        <div class="row">
            <div id="logo" class="col-xs-12 col-sm-2">
                <a href="index_v1.html">Online bus ticket</a>
            </div>
            <div id="top-panel" class="col-xs-12 col-sm-10">
                <div class="row">
                    <div class="col-xs-8 col-sm-4">
                        
                    </div>
                    <div class="col-xs-4 col-sm-8 top-panel-right">
                        
                        <ul class="nav navbar-nav pull-right panel-menu">

                            @if(Auth::user())
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->fullname }} <span class="caret"></span>
                                </a>
                                
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/changePassword') }}"><i class="fa fa-btn fa-sign-out"></i>Change Password</a></li>
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>

                                </ul>
                            </li>
                            
                            @else
                            
                            <li class="hidden-xs">
                                <a href="/adminlogin" class="modal-link">
                                    <span class="badge">Admin</span>
                                </a>
                            </li>
                            <li class="hidden-xs">
                                <a class="modal-link" href="/login">

                                    <span class="badge">User</span>
                                </a>
                            </li>
                            <li class="hidden-xs">
                                <a href="ajax/page_messages.html" class="ajax-link">
                                    
                                    <span class="badge">Cancel tickets</span>
                                </a>
                            </li>

                                                        
                            @endif
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
    <div class="row">
        <div id="sidebar-left" class="col-xs-2 col-sm-2">
            <ul class="nav main-menu">
                <li class="dropdown">
                    <a href="/users" class="dropdown-toggle">
                        <i class="fa fa-table"></i>
                        <span class="hidden-xs">Users</span>
                    </a>
                    
                </li>
                <li>
                    <a href="/counters" class="ajax-link">
                        <i class="fa fa-dashboard"></i>
                        <span class="hidden-xs">Counter</span>
                    </a>
                </li>
                <li>
                    <a href="/counters/create" class="ajax-link">
                        <i class="fa fa-dashboard"></i>
                        <span class="hidden-xs">Create Counter</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="/buses" >
                        <i class="fa fa-bar-chart-o"></i>
                        <span class="hidden-xs">Bus</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="/buses/create/" >
                        <i class="fa fa-bar-chart-o"></i>
                        <span class="hidden-xs">Create Bus</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="/seat_types" >
                        <i class="fa fa-bar-chart-o"></i>
                        <span class="hidden-xs">Seat Type</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="/seat_types/create" >
                        <i class="fa fa-bar-chart-o"></i>
                        <span class="hidden-xs">Create Seat Type</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="/coach_types" >
                        <i class="fa fa-bar-chart-o"></i>
                        <span class="hidden-xs"> Coach Type</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="/coach_types/create" >
                        <i class="fa fa-bar-chart-o"></i>
                        <span class="hidden-xs">Create Coach Type</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <i class="fa fa-list"></i>
                         <span class="hidden-xs">Route</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="ajax-link"  href="/routes">List</a></li>
                        <li><a class="ajax-link" href="/routes/create">Create</a></li>
                        
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <i class="fa fa-list"></i>
                         <span class="hidden-xs">Seat</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="ajax-link"  href="/seats">List</a></li>
                        <li><a class="ajax-link" href="/seats/create">Create</a></li>
                        
                    </ul>
                </li>
                 <li><a class="ajax-link"  href="/routes">Route List</a></li>
                <li><a class="ajax-link" href="/routes/create">Route Create</a></li>
                <li><a class="ajax-link"  href="/seats">Seat List</a></li>
                <li><a class="ajax-link" href="/seats/create">Seat Create</a></li>
                                
            </ul>
        </div>
        <!--Start Content-->
        <div id="content" class="col-xs-12 col-sm-10">
            
            
            @yield('content')
        </div>
        <!--End Content-->
    </div>

</div>

<!--End Container-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<meta name="_token" content="{!! csrf_token() !!}" />
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
       });

</script>
<script src={{asset('js/company_admin/buslayout.js')}}></script>
<script src={{asset('plugins/jquery/jquery.min.js')}}></script>
<script src={{asset('plugins/jquery-ui/jquery-ui.min.js')}}></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src={{asset('plugins/bootstrap/bootstrap.min.js')}}></script>
<script src={{asset('plugins/justified-gallery/jquery.justifiedGallery.min.js')}}></script>
<script src={{asset('plugins/tinymce/tinymce.min.js')}}></script>
<script src={{asset('plugins/tinymce/jquery.tinymce.min.js')}}></script>
 <!-- All functions for this theme + document.ready processing -->
 <!-- <script src="js/devoops.js"></script> -->
</body>
</html>
