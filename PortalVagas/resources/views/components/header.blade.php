@if(Auth::check())
@if (
request() //captura os dados da requisição
    ->user() //captura o usuario que fez a requisição
        ->where('tipo','empresa') // a partir de model binding ele procura se o tipo é empresa
            ->first() //transforma o resultado da consulta em um valor boolean, retornando true or false
)
    <div>
        Olá empresa
    </div>
@else
    <div>
        Olá Usuário
    </div>
@endif
@endif




