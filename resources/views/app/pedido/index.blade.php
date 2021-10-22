@extends('app.layouts.basico')
@section('titulo', 'Pedido')

@section('conteudo')
<br><br><br><br> Fornecedor

<div class="conteudo-pagina">

  <div class="titulo-pagina-2">
    <p>Listagem de Clientes</p>
  </div>

  <div class="menu">
    <ul>
      <li><a href="{{ route('pedido.create') }}">Novo</a></li>
      <li><a href="">Consulta</a></li>
    </ul>
  </div>

  <div class="informacao-pagina">
    @csrf
    <div style="width: 90%; margin-left: auto; margin-right: auto;">
      <table class="table table-dark table-striped" border="5%" ; width="100%">
        <thead>
          <tr>
            <th>ID Do pedido</th>
            <th>Cliente</th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          @foreach($pedidos as $pedido)
          <tr>
            <td>{{ $pedido->id }}</td>
            <td>{{ $pedido->cliente_id }}</td>
            <th><a href="{{ route('pedido.show', ['pedido' => $pedido->id]) }}">Visualizar</a></th>
            <td>
              <form id="form_{{$pedido->id}}" method="post" action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}">
                @method('DELETE')
                @csrf
                <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>
              </form>
            </td>
            <a class="btn btn-warning" href="{{route('pedido.edit', ['pedido' => $pedido->id])}}">Editar</i></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>

      {{ $pedidos->appends($request)->links() }}

      {{-- //appends -> MANTEM OS DADOS DO REQUEST NA FILTRAGEM DO METODO LINKS
      <br>
      {{ $fornecedores->count()}} - Total de registro por pagina.
      <br>
      {{ $fornecedores->total()}} - Total de registro localizados.
      <br> --}}
      Exibindo {{ $pedidos->count()}} pedidos de {{ $pedidos->total()}} (de {{$pedidos->firstItem()}} a {{$pedidos->lastItem()}})
    </div>
  </div>
</div>
@endsection
