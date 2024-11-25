<h1> Bienvenido </h1>
<p>
    @if($message = @session ::get('mensaje'))
        {{ $message }}

    @endif
</p>