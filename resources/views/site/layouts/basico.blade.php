<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>@yield('titulo')</title>
  <meta charset="utf-8">
  <link rel="Stylesheet" href="{{ asset('/css/style.css') }}" </head>

<body>
  @include('.site.layouts._partials.topo')

  @yield('conteudo')
</body>

</html>
