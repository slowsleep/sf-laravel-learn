<div @style([
    'background-color: white' => $color == 'primary',
    'color: black' => $color == 'primary',
    'background-color: black' => $color == 'secondary',
    'color: white' => $color == 'secondary',
    'font-size: 26px' => $color == 'primary',
    'font-size: 16px' => $color == 'secondary',
])>
    <a href="/">главная</a>
    <a href="/home">домой</a>
</div>