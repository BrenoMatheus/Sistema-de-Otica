<?php

use Illuminate\Support\Facades\Route;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// use App\Http\Controllers\eventcontroller;
use App\Http\Controllers\PacientController;
use App\Http\Controllers\ExameController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\DespesaController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FinancaController;
use App\Http\Controllers\LocalController;


// Pacients
// Route::get('/home', [PacientController::class, 'home']);
Route::get('/', [PacientController::class, 'index']);
Route::get('/pesquisa-paciente',[PacientController::class, 'pesquisar']);
Route::get('/pacients/create-pacient', [PacientController::class, 'create'])->middleware('auth');
Route::post('/pacients', [PacientController::class, 'store']);
Route::get('/pacients/{id}', [PacientController::class, 'show']);
Route::delete('/pacients/{id}', [PacientController::class, 'destroy'])->middleware('auth');
Route::get('/pacients/edit/{id}', [PacientController::class, 'edit'])->middleware('auth');
Route::put('/pacients/update/{id}', [PacientController::class, 'update'])->middleware('auth');
Route::get('/pacientes', [PacientController::class, 'dashboard'])->middleware('auth');


// vendas
Route::get('/venda/create-venda/{id}', [VendaController::class, 'create'])->middleware('auth');
Route::get('/pesquisa-venda',[VendaController::class, 'pesquisar']);
Route::post('/venda', [VendaController::class, 'store']);
Route::get('/venda/{id}', [VendaController::class, 'show']);
Route::delete('/venda/{id}', [VendaController::class, 'destroy'])->middleware('auth');
Route::get('/venda/edit/{id}', [VendaController::class, 'edit'])->middleware('auth');
Route::put('/venda/update/{id}', [VendaController::class, 'update'])->middleware('auth');
Route::get('/vendas', [VendaController::class, 'dashboard'])->middleware('auth');

// Exames
Route::get('/exame/create-exame/{id}', [ExameController::class, 'create'])->middleware('auth');
Route::get('/pesquisa-exame',[ExameController::class, 'pesquisar']);
Route::post('/exame', [ExameController::class, 'store'])->middleware('auth');
Route::get('/exame/{id}', [ExameController::class, 'show']);
Route::delete('/exame/{id}', [ExameController::class, 'destroy'])->middleware('auth');
Route::get('/exame/edit/{id}', [ExameController::class, 'edit'])->middleware('auth');
Route::put('/exame/update/{id}', [ExameController::class, 'update'])->middleware('auth');
Route::get('/exames', [ExameController::class, 'dashboard'])->middleware('auth');

// produtos
Route::get('/produto/create-produto', [ProdutoController::class, 'create'])->middleware('auth');
Route::post('/produto', [ProdutoController::class, 'store'])->middleware('auth');
Route::get('/produto/{id}', [ProdutoController::class, 'show']);
Route::delete('/produto/{id}', [ProdutoController::class, 'destroy'])->middleware('auth');
Route::get('/produto/edit/{id}', [ProdutoController::class, 'edit'])->middleware('auth');
Route::put('/produto/update/{id}', [ProdutoController::class, 'update'])->middleware('auth');
Route::get('/produtos', [ProdutoController::class, 'dashboard'])->middleware('auth');


// Despesas
Route::get('/despesa/create-despesa', [DespesaController::class, 'create'])->middleware('auth');
Route::get('/pesquisa-despesa',[DespesaController::class, 'pesquisar'])->middleware('auth');
Route::post('/despesa', [DespesaController::class, 'store'])->middleware('auth');
Route::get('/despesa/{id}', [DespesaController::class, 'show']);
Route::delete('/despesa/{id}', [DespesaController::class, 'destroy'])->middleware('auth');
Route::get('/despesa/edit/{id}', [DespesaController::class, 'edit'])->middleware('auth');
Route::put('/despesa/update/{id}', [DespesaController::class, 'update'])->middleware('auth');
Route::get('/despesas', [DespesaController::class, 'dashboard'])->middleware('auth');

// Finanças
Route::get('/financas', [FinancaController::class, 'dashboard'])->middleware('auth');
Route::get('/pesquisa-financa',[FinancaController::class, 'pesquisar'])->middleware('auth');
Route::get('/pesq_local',[FinancaController::class, 'p_local'])->middleware('auth');

// Locals
Route::get('/local/create-local', [LocalController::class, 'create'])->middleware('auth');
Route::get('/pesquisa-local',[LocalController::class, 'pesquisar'])->middleware('auth');
Route::post('/local', [LocalController::class, 'store'])->middleware('auth');
Route::get('/local/{id}', [LocalController::class, 'show']);
Route::delete('/local/{id}', [LocalController::class, 'destroy'])->middleware('auth');
Route::get('/local/edit/{id}', [LocalController::class, 'edit'])->middleware('auth');
Route::put('/local/update/{id}', [LocalController::class, 'update'])->middleware('auth');
Route::get('/locals', [LocalController::class, 'dashboard'])->middleware('auth');

