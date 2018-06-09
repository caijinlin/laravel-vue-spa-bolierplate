<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>后台管理系统</title>
    <style media="screen">
        .my-alert {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 9999;
        }
    </style>
    <style>
        body {
            font-family: "Helvetica Neue",Helvetica,"PingFang SC","Hiragino Sans GB","Microsoft YaHei","微软雅黑",Arial,sans-serif;
        }
        .ad-page {
            padding-right: 140px;
            position: fixed;
            top: 0;
            left: 0;
            width: 50%;
            height: 100%;
            background-color: #F3F6FB;
            text-align: right;
        }
        .ad-page .bg-icon {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            z-index: -1;
        }
        .ad-page .icon {
            margin-top: -15%;
            width: 300px;
            vertical-align: middle;
        }
        .ad-page span {
            display: inline-block;
            height: 100%;
            vertical-align: middle;
        }
        .form-page {
            padding-left: 140px;
            position: fixed;
            top: 0;
            right: 0;
            width: 50%;
            height: 100%;
            background-color: #fff;
            display: flex;
            /* justify-content: center; */
            align-items: center;
        }
        .panel-body {
            padding: 0 15px;
            margin-top: -12%;
            width: 320px;
            /* background-color: #e7e7e7; */
        }
        .form-header {
            margin-left: -15px;
            margin-bottom: 24px;
        }
        .form-header h1 {
            margin: 0;
            font-size: 26px;
            color: #333;
        }
        .form-group {
            margin-bottom: 12px;
        }
        .input-group .form-control {
            font-size: 14px;
        }
        .input-group-addon {
            padding: 6px 16px;
            background-color: #fff;
        }
        .input-group-addon .glyphicon {
            color: #ccc;
        }
        .login-button {
            margin-top: 8px;
            height: 38px;
            background-color: #5085C5;
            font-size: 15px;
            font-weight: normal;
            line-height: 1;
            border: 0;
            border-radius: 4px;
            -webkit-transition: .2s;
            -moz-transition: .2s;
            transition: .2s;
        }
        .login-button:hover {
            background-color: #4575B0;
        }
        .help-block {
            margin: 8px 0 0 0;
        }
        .copyright {
            position: absolute;
            bottom: 3%;
            width: 320px;
            text-align: center;
        }
        .copyright a {
            font-size: 14px;
            color: #666;
        }
        .copyright a:focus,
        .copyright a:hover {
            text-decoration: none;
        }
        .copyright .logo {
            margin: -4px 6px 0;
            height: 14px;
        }
        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0px 1000px white inset !important;
        }

        @media screen and (min-width: 1600px) {
            .ad-page {
                padding-right: 200px;
            }
            .ad-page .icon {
                width: 340px;
            }
            .form-page {
                padding-left: 180px;
            }
            .panel-body, .copyright {
                width: 360px;
            }
            .form-header h1 {
                font-size: 30px;
            }
            .input-group .form-control {
                font-size: 16px;
                height: 44px;
            }
            .login-button {
                height: 46px;
            }
            .copyright span {
                font-size: 16px;
            }
            .copyright .logo {
                margin: -4px 8px 0;
                height: 15px;
            }
        }
    </style>
</head>

<body>
    @if ($loginMessage = session('login-message'))
        <div class="my-alert alert alert-danger text-center">{{ $loginMessage }}</div>
    @endif

    <div class="ad-page">
        <img class="bg-icon" src="/icon-x.png" alt="">
        <img class="icon" src="/icon-login.png" alt=""><span></span>
    </div>
    <div class="form-page">
        <div class="panel-body">
            <div class="form-header">
                <h1>后台管理</h1>
            </div>
            <form class="form-horizontal" method="POST" action="{{ route('auth.login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('credential') ? ' has-error' : '' }}">
                    <div class="input-group">
                        <span class="input-group-addon" id="user-addon">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        </span>
                        <input id="credential" class="form-control" name="credential" aria-describedby="user-addon" value="{{ old('credential') }}" placeholder="请输入邮箱" required autofocus>
                    </div>
                    @if ($errors->has('credential'))
                        <span class="help-block">{{ $errors->first('credential') }}</span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="input-group">
                        <span class="input-group-addon" id="password-addon">
                            <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                        </span>
                        <input id="password" type="password" class="form-control" name="password" aria-describedby="password-addon" placeholder="请输入密码" required>
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                {{-- <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                    </div>
                </div> --}}

                <div class="form-group">
                    <button type="submit" id="loginButton" class="btn btn-primary btn-lg btn-block login-button" data-loading-text="登录中...">登录</button>
                </div>
            </form>
        </div>
        <div class="copyright">
            <a href="http://www.lingxi360.com/?source=funding" target="_blank">
                caspar 提供技术支持
            </a>
        </div>
    </div>

    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $('#loginButton').on('click', function () {
           var $btn = $(this).button('loading')
           $btn.button('reset')
         })
    </script>
</body>
</html>
