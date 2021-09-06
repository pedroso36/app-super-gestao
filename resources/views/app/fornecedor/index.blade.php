<h3>Fornecedor</h3>

@php
/*
if( !Condição ) {} Se usa o if quando a condição for verdadeira
*/
@endphp

@isset($fornecedor)
      @foreach($fornecedor as $indice => $fornecedor)

         fornecedor: {{ $fornecedor[$i] ['nome'] }}
         <br>
         Status: {{ $fornecedor[$i] ['status'] }}
         <br>
         CNPJ: {{ $fornecedor[$i] ['cnpj'] ?? 'Não informado.' }}
         <br>
         telefone: ({{ $fornecedor[$i] ['ddd'] ?? 'Não informado' }}) {{ $fornecedor[0] ['telefone'] ?? 'Não informado' }}
         @endforeach

@endisset

<br>
