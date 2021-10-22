@extends('app.layouts.basico')
@section('titulo', 'Produto')

@section('conteudo')
<br><br><br><br> Fornecedor

<div class="conteudo-pagina">

  <div class="tituo-pagina-2">
    <p>Listagem de produtos/p>
  </div>

  <div class="menu">
    <ul>
      <li><a href="{{ route('produto.create') }}">Novo</a></li>
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
            <th>Descrição</th>
            <th>Fornecedor</th>
            <th>Peso</th>
            <th>Unidade ID</th>
            <th>Comprimento</th>
            <th>Altura</th>
            <th>Largura</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          @foreach($produtos as $produto)
          <tr>
            <td>{{ $produto->nome }}</td>
            <td>{{ $produto->descricao }}</td>
            <td>{{ $produto->fornecedor->nome }}</td>
            <td>{{ $produto->peso }}</td>
            <td>{{ $produto->unidade_id }}</td>
            <td>{{ $produto->itemDetalhe->comprimento ?? '' }}</td>
            <td>{{ $produto->itemDetalhe->altura ?? '' }}</td>
            <td>{{ $produto->itemDetalhe->largura ?? '' }}</td>
            <th><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</a></th>
            <td>
              <form id="form_{{$produto->id}}" method="post" action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                @method('DELETE')
                @csrf
                <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
              </form>
            </td>
            <a class="btn btn-warning" href="{{route('produto.edit', ['produto' => $produto->id])}}">Editar</i></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>

      {{ $produtos->appends($request)->links() }}

      {{-- //appends -> MANTEM OS DADOS DO REQUEST NA FILTRAGEM DO METODO LINKS
      <br>
      {{ $fornecedores->count()}} - Total de registro por pagina.
      <br>
      {{ $fornecedores->total()}} - Total de registro localizados.
      <br> --}}
      Exibindo {{ $produtos->count()}} fornecedores de {{ $produtos->total()}} (de {{$produtos->firstItem()}} a {{$produtos->lastItem()}})
    </div>
  </div>
</div>
@endsection
