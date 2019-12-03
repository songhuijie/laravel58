<html>
<head>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(-10deg, #ff1493, #1e90ff);
            min-height: 100vh;
        }

        .loader {
            height: 60px;
            left: 50%;
            position: fixed;
            top: 50%;
            transform: translateX(-50%) translateY(-50%);
            width: 60px;
        }
        .loader span {
            animation: load 4s ease-in-out infinite;
            background: white;
            display: block;
            height: 12px;
            opacity: 0;
            position: absolute;
            width: 12px;
        }
        .loader span.block-1 {
            animation-delay: 0.92s;
            left: 0px;
            top: 0px;
        }
        .loader span.block-2 {
            animation-delay: 0.84s;
            left: 16px;
            top: 0px;
        }
        .loader span.block-3 {
            animation-delay: 0.76s;
            left: 32px;
            top: 0px;
        }
        .loader span.block-4 {
            animation-delay: 0.68s;
            left: 48px;
            top: 0px;
        }
        .loader span.block-5 {
            animation-delay: 0.6s;
            left: 0px;
            top: 16px;
        }
        .loader span.block-6 {
            animation-delay: 0.52s;
            left: 16px;
            top: 16px;
        }
        .loader span.block-7 {
            animation-delay: 0.44s;
            left: 32px;
            top: 16px;
        }
        .loader span.block-8 {
            animation-delay: 0.36s;
            left: 48px;
            top: 16px;
        }
        .loader span.block-9 {
            animation-delay: 0.28s;
            left: 0px;
            top: 32px;
        }
        .loader span.block-10 {
            animation-delay: 0.2s;
            left: 16px;
            top: 32px;
        }
        .loader span.block-11 {
            animation-delay: 0.12s;
            left: 32px;
            top: 32px;
        }
        .loader span.block-12 {
            animation-delay: 0.04s;
            left: 48px;
            top: 32px;
        }
        .loader span.block-13 {
            animation-delay: -0.04s;
            left: 0px;
            top: 48px;
        }
        .loader span.block-14 {
            animation-delay: -0.12s;
            left: 16px;
            top: 48px;
        }
        .loader span.block-15 {
            animation-delay: -0.2s;
            left: 32px;
            top: 48px;
        }
        .loader span.block-16 {
            animation-delay: -0.28s;
            left: 48px;
            top: 48px;
        }

        @keyframes load {
            0% {
                opacity: 0;
                transform: translateY(-100px);
            }
            15% {
                opacity: 0;
                transform: translateY(-100px);
            }
            30% {
                opacity: 1;
                transform: translateY(0);
            }
            70% {
                opacity: 1;
                transform: translateY(0);
            }
            85% {
                opacity: 0;
                transform: translateY(100px);
            }
            100% {
                opacity: 0;
                transform: translateY(100px);
            }
        }

    </style>
</head>
<body>

<div class="loader"></div>

</body>

<script src="https://www.jq22.com/jquery/jquery-2.1.1.js"></script>
<script>
    for (var i = 1; i <= 16; i++) {
        $('div.loader').append('<span class="block-' + i + '"></span>');
    }
</script>
</html>
