<?php
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

Route::get('/', function () {
    return view('index');
});

Route::get('/produtos', function(){
    return view('produtos');
});

Route::get('/contatos', function(){
    return view('contatos');
});




;
