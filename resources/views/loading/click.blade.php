<html>

<head>
    <style>
        .scene {
            height: 100vh;
            width: 100%;
            overflow: hidden;
            perspective: 10vmin;
        }
        div {
            --unit: 1.5vmin;
            width: var(--unit);
            height: var(--unit);
            --rotate: rotateY(90deg);
            transform:
                    translateZ(-100vmin)
                    var(--rotate)
                    rotateX(var(--rx))
                    translateZ(var(--x))
                    scaleX(1);
            position: absolute;
            top: 0%;
            left: 0%;

            animation: none 900ms infinite ease-in;

            background: white;
        }

        @keyframes hyper {
            0% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                opacity: 0;
                transform:
                        translateZ(0vmin)
                        var(--rotate)
                        rotateX(var(--rx))
                        translateZ(var(--x))
                        scaleX(6);
            }
        }

        body {
            overflow: hidden;
            background: black;
            background-image:
                    radial-gradient(circle at 40% 40%, hsl(343,80%,7%) 0%, hsla(343,80%,10%,0) 40%),
                    radial-gradient(circle at 25% 52%, hsl(243,80%,9%) 0%, hsla(243,80%,10%,0) 50%),
                    radial-gradient(circle at 65% 56%, hsl(143,80%,8%) 0%, hsla(143,80%,10%,0) 60%);
            background-blend-mode: screen
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        form {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            display: flex;
            padding: .5rem;
        }
        button {
            margin: auto;
            background: transparent;
            border: .25rem solid currentColor;
            border-radius: 1rem;
            color: hsl(173, 100%, 50%);
            font-size: 1.2em;
            padding: .7rem 1.5rem
        }
        .hyper button {
            color: hsl(343, 100%, 50%);
        }
    </style>
</head>

<body>
    <main class="scene left">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </main>


    <form>
        <button id="hyper" type="button">Go Hyper</button>
    </form>

</body>
<script>
    const stars = document.querySelectorAll('div');
    const hyper = document.getElementById('hyper');

    stars.forEach((star,i) => {
        let x = `${Math.random() * 200}vmax`
        let y = `${Math.random() * 100}vh`
        let z = `${Math.random() * 200 - 100}vmin`
        let rx = `${Math.random() * 360}deg`
        star.style.setProperty('--x', x)
        star.style.setProperty('--y', y)
        star.style.setProperty('--z', z)
        star.style.setProperty('--rx', rx)
    });

    hyper.addEventListener('click', e => {
        if (document.documentElement.classList.contains('hyper')) {
            stars.forEach((star,i) => {
                star.style.animationName = null;
                //star.style.animationIterationCount = 1;
            });
            hyper.textContent = 'Go Hyper';
        } else {
            stars.forEach((star,i) => {
                let delay = `${Math.random() * 900}ms`;
                star.style.animationDelay = delay;
                star.style.animationName = 'hyper';
            });
            hyper.textContent = 'Stop Hyper';
        }
        document.documentElement.classList.toggle('hyper');
    })
</script>
</html>
