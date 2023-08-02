<html>
    <head>
        <title>Trang đăng nhập</title>
        <link rel="icon" href="{!! asset('images/iSmart.png') !!}"/>
{{--        <meta name="csrf-token" content="{{ custom_csrf_token() }}">--}}
        <link rel="stylesheet" type="text/css" href="{{ url('admin/css/import/login.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/css/import/login_new.css') }}">
        <link href="{{ url('admin/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ url('admin/css/bootstrap/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <script src="{{ url('admin/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('admin/js/bootstrap/bootstrap.min.js') }}" type="text/javascript"></script>
        <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{!! url('admin/js/sweetalert/sweetalert2.min.css') !!}">

    <script src="{!! url('admin/js/sweetalert/sweetalert2.all.min.js') !!}"></script>
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login100-pic js-tilt" data-tilt>
                        <img src="{{ asset('images/admin-team.jpg') }}" alt="img">
                    </div>
                    <form class="login100-form validate-form" id="login_admin_form">
                        @csrf
                        <span class="login100-form-title">
                            <b>ĐĂNG NHẬP ISMART</b>
                        </span>
                        <form action="">
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="text" placeholder="Tên đăng nhập" name="username"
                                    id="username">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class='bx bx-user'></i>
                                </span>
                            </div>
                            <span class="error username_error" style="display: none"></span>
                            <div class="wrap-input100 validate-input">
                                <input autocomplete="off" class="input100" type="password" placeholder="Mật khẩu"
                                    name="password" id="password">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class='bx bx-key'></i>
                                </span>
                            </div>
                            <span class="error password_error" style="display: none"></span>
    
                            <div class="container-login100-form-btn">
                                <input type="submit" name="btn_login" id="btn_login" value="Đăng nhập">
                            </div>
                            <br>
                            <p class="error errorAll" style="color: red;display: none"></p>
                        </form>
                    </form>
                </div>
                <div class="cms1-table">
                    <!-- start modal confirm success !-->
                    <div class="modal fade center-dialog-ie" id="confirm-success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Đăng nhập</h3>
                                </div>
                                <div class="modal-body">
                                    <p>Đăng nhập admin thành công</p>
                                </div>
                                <div class="modal-footer">
                                    <button id="success" class="btn btn-success button-add-publisher" type="button" data-dismiss="modal">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal confirm delete !-->
                </div>
            </div>
            
        </div>
    </body>
</html>
<script>
    $(document).ready(function () {
        $('#login_admin_form').submit(function (e) {
            e.preventDefault();
            // alert('oke');
            $.ajax({
                url:'{{ route('post.admin.login') }}',
                type:'post',
                typeData:'json',
                data:$(this).serialize(),
                success:function(data){
                    console.log(data);
                    if(data.error === true){
                        $('.error').hide();
                        if(data.message.username != undefined){
                            $('.username_error').show().html(data.message.username);
                        }
                        if(data.message.password != undefined){
                            $('.password_error').show().html(data.message.password);
                        }
                        if(data.message.errorAll != undefined){
                            $('.errorAll').show().html(data.message.errorAll);
                        }
                    }else if (data.error === false){
                        swal({
                            title: "Thành công",
                            text: data.message,
                            type: "success",
                            timer: 2000
                        }).then(function () {
                            window.location.href = "{{ route('get.admin') }}";
                        });
                    }
                },
            });
        });
    });
</script>