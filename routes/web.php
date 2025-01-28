<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemoryController;

// Página inicial
Route::get('/', [EventController::class, 'index']);

// Rota para criar evento (somente para usuários autenticados)
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');

// Exibe evento
Route::get('/events/{id}', [EventController::class, 'show']);

// Rota para confirmar presença (somente para usuários autenticados)
Route::post('/events/{id}/join', [EventController::class, 'joinEvent'])->name('events.join');

// Rota para remover presença (somente para usuários autenticados)
Route::delete('/events/leave/{id}', [EventController::class, 'leaveEvent'])->name('events.leave');

// Rota de edição do evento (somente para usuários autenticados)
Route::get('/events/{id}/edit', [EventController::class, 'edit'])->middleware('auth');

// Rota para atualizar o evento (somente para usuários autenticados)
Route::put('/events/{id}', [EventController::class, 'update'])->middleware('auth')->name('events.update');

// Rota para deletar evento (somente para usuários autenticados)
Route::delete('/events/{id}', [EventController::class, 'destroy'])->middleware('auth');

// Dashboard do usuário (somente para usuários autenticados)
Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');

// Painel de administração (somente para administradores)
Route::get('/admin-dashboard', [AdminController::class, 'index'])->middleware('admin');
// Rota para criar evento (POST)
Route::post('/events', [EventController::class, 'store'])->name('events.store');

// Rota para "Memórias"
Route::get('/memories', [MemoryController::class, 'index']);

// Rota para criar memória (somente para usuários autenticados)
//Route::get('/memories/create', [MemoryController::class, 'create'])->middleware('auth');

// Rota para criar memória (POST)
//Route::post('/memories', [MemoryController::class, 'store'])->name('memory.store');

// Rota para exibir memória
Route::get('/memories/{id}', [MemoryController::class, 'show']);
