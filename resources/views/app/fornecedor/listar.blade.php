@extends('app.layouts.basico')
@section('titulo', 'Cliente')

@section('conteudo')
<br><br><br><br> Fornecedor

<div class="conteudo-pagina">

  <div class="tituo-pagina-2">
    <p>Fornecedor - Listar</p>
  </div>

  <div class="menu">
    <ul>
      <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
      <li><a href="{{ route('app.fornecedor')}}">Consulta</a></li>
    </ul>
  </div>

  <div class="informacao-pagina">

    @isset($msg)
    {{ $msg }}
    @endisset

    <div style="width: 90%; margin-left: auto; margin-right: auto;">
      <table class="table table-dark table-striped" border="5%" ; width="100%">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Site</th>
            <th>UF</th>
            <th>Email</th>
            <th></th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          @foreach($fornecedores as $fornecedor)
          <tr>
            <td>{{ $fornecedor->nome }}</td>
            <td>{{ $fornecedor->site }}</td>
            <td>{{ $fornecedor->uf }}</td>
            <td>{{ $fornecedor->email }}</td>
            <td><a class="btn btn-danger" href="{{ route('app.fornecedor.excluir', $fornecedor->id)}}">Excluir</i></a>
              <a class="btn btn-warning" href="{{ route('app.fornecedor.editar', $fornecedor->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
          </tr>
          <tr>
            <td colspan="6">
              <p>Lista de produtos</p>
              <table border="1" style="margin:20px">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($fornecedor->produtos as $key => $produto)
                  <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      {{ $fornecedores->appends($request)->links() }}

      {{-- //appends -> MANTEM OS DADOS DO REQUEST NA FILTRAGEM DO METODO LINKS
      <br>
      {{ $fornecedores->count()}} - Total de registro por pagina.
      <br>
      {{ $fornecedores->total()}} - Total de registro localizados.
      <br> --}}
      Exibindo {{ $fornecedores->count()}} fornecedores de {{ $fornecedores->total()}} (de {{$fornecedores->firstItem()}} a {{$fornecedores->lastItem()}})






    </div>
  </div>

</div>

@endsection
