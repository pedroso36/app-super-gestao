@extends('app.layouts.basico')
@section('titulo', 'Cliente')

@section('conteudo')
<br><br><br><br> Fornecedor

<div class="conteudo-pagina">

  <div class="titulo-pagina-2">
    <p>Listagem de Clientes</p>
  </div>

  <div class="menu">
    <ul>
      <li><a href="{{ route('cliente.create') }}">Novo</a></li>
      <li><a href="">Consulta</a></li>
    </ul>
  </div>

  <div class="informacao-pagina">
    @csrf
    <div style="width: 90%; margin-left: auto; margin-right: auto;">
      <table class="table table-dark table-striped" border="5%" ; width="100%">
        <thead>
          <tr>
            <th>Nome</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          @foreach($clientes as $cliente)
          <tr>
            <td>{{ $cliente->nome }}</td>
            <th><a href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}">Visualizar</a></th>
            <td>
              <form id="form_{{$cliente->id}}" method="post" action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}">
                @method('DELETE')
                @csrf
                <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
              </form>
            </td>
            <a class="btn btn-warning" href="{{route('cliente.edit', ['cliente' => $cliente->id])}}">Editar</i></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>

      {{ $clientes->appends($request)->links() }}

      {{-- //appends -> MANTEM OS DADOS DO REQUEST NA FILTRAGEM DO METODO LINKS
      <br>
      {{ $fornecedores->count()}} - Total de registro por pagina.
      <br>
      {{ $fornecedores->total()}} - Total de registro localizados.
      <br> --}}
      Exibindo {{ $clientes->count()}} clientes de {{ $clientes->total()}} (de {{$clientes->firstItem()}} a {{$clientes->lastItem()}})
    </div>
  </div>
</div>
@endsection
