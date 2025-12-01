<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CnpjController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrivacidadeController;
use App\Http\Controllers\RemocaoController;



// --- ROTAS DE CNPJ ---
Route::get('/', [HomeController::class, 'index'])->name('home');                                                // PÁGINA PRINCIPAL
Route::get('/politica-de-privacidade', [PrivacidadeController::class, 'index'])->name('privacidade');           // PÁGINA POLITICA DE PRIVACIDADE
//########################################################################################################################
//########################################################################################################################
// --- ROTAS DE CNPJ ---
Route::post('/consultar', [CnpjController::class, 'consultar'])->name('cnpj.consultar');                        // ROTA DO FORMULÁRIO DE CONSULTA
Route::get('/cnpj/{cnpj}', [CnpjController::class, 'show'])->name('cnpj.show');                                 // ROTA DA PÁGINA DO CNPJ
//########################################################################################################################
//########################################################################################################################
