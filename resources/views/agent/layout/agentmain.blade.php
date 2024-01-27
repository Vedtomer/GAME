<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title> @yield('title', 'Agent Dashboard')</title>

    <link rel="stylesheet" href="{{ asset('main.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            overflow-x: auto;
            padding: 10px;
        }

        .info-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            border: 2px solid;
            padding: 5px;
        }

        .label {
            margin-bottom: 5px;
        }

        .value {
            display: inline-block;
            font-weight: 900;
            font-size: 16px;
        }

        /* Equal height for inner boxes */
        .info-box {
            flex: 1;
        }

        /* Smaller text on mobile */
        @media (max-width: 768px) {
            .value {
                font-size: 12px;
                /* Adjust as needed */
            }

            .label {
                font-size: 10px;
                font-weight: bolder
            }

            .info-box {

                padding: 0px;
            }

        }
    </style>

</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        {{-- topbar start --}}
        @include('agent.layout.agenttopbar')
        <div class="app-main">
            {{-- sidebar start --}}
            @include('agent.layout.agentsidebar')

            {{-- sidebar end --}}
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div>@yield('title', 'Agent Dashboard')
                                </div>
                            </div>
                      
                        </div>
                    </div>

                    @yield('section')
                  
                       
                </div>

            </div>

        </div>
    </div>
    @include('agent.layout.agentfooter')
</body>

</html>
