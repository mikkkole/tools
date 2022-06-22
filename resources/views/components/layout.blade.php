<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                font-size: 13px;
            }

            .title {
                font-size: 44px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;                
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            table, th, td {
                border-collapse: collapse;
                border: 1px solid grey;
                margin:0 auto 0 auto;
            }

            table {
                width: 80%;
            }

            tr:hover td {
                background: #e8edff;
                color: black;
            }

            tr:first-of-type {
                background: #808990;
                color: #fff;
            }
            .first {
                background: #808990;
                color: #fff;
                }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                {{ $slot }}
                </div>

                <table>
                {{ $table }}
                </table>

                <div class="links">
                    {!! $title == 'Assets' ? '' : '<a href="/">Активы</a>' !!}
                    {!! $title == 'Locations' ? '' : '<a href="/locations">Локации</a>' !!}
                    {!! $title == 'Workers' ? '' : '<a href="/workers">Сотрудники</a>' !!}
                    {!! $title == 'Movements' ? '' : '<a href="/movements">Перемещения</a>' !!}
                    {!! $title == 'Administration' ? '' : '<a href="/administration">Администрирование</a>' !!}
                                   
                </div>
            </div>
        </div>
    </body>
</html>