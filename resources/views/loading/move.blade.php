<style>
    html, body {
        width: 100%;
        height: 100%;
        margin: 0;
        background: #270F34;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/css-doodle/0.6.1/css-doodle.min.js"></script>
<style>
    css-doodle {
        --color: @p(#51eaea, #fffde1, #ff9d76, #FB3569);

    --rule: (
    :doodle {
    @grid: 30x1 / 18vmin;
        --deg: @p(-180deg, 180deg);
    }
    :container {
        perspective: 30vmin;
    }
    :after, :before {
        content: '';
        background: var(--color);
    @place-cell: @r(100%) @r(100%);
    @size: @r(6px);
    @shape: heart;
    }

    @place-cell: center;
    @size: 100%;

    box-shadow: @m(2, (0 0 50px var(--color)));
    background: @m(100, (
    radial-gradient(var(--color) 50%, transparent 0)
    @r(-20%, 120%) @r(-20%, 100%) / 1px 1px
    no-repeat
    ));

    will-change: transform, opacity;
    animation: scale-up 12s linear infinite;
    animation-delay: calc(-12s / @size() * @i());

    @keyframes scale-up {
        0%, 95.01%, 100% {
            transform: translateZ(0) rotate(0);
            opacity: 0;
        }
        10% {
            opacity: 1;
        }
        95% {
            transform:
                    translateZ(35vmin) rotateZ(@var(--deg));
        }
    }
    )
    }
</style>

<css-doodle use="var(--rule)"></css-doodle>
