<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\SuperController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\kelolaakun;
use App\Http\Controllers\kelolaakunController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LaporanPenginapanController;
use App\Http\Controllers\MapsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\PenginapanController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UlasanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

Auth::routes();
// Auth::routes(['verify' => true]);
Route::get('/',  [HomeController::class, 'index'])->name('home');
Route::get('/register-admin', [SuperController::class, 'add'])->name('register-admin');
Route::post('/register-store', [SuperController::class, 'store'])->name('register-store');
// Route::post('/')
Route::get('/pengunjung',  [PengunjungController::class, 'index'])->name('pengunjung');
Route::get('/kategori/{id}', [HomeController::class, 'kategori'])->name('kategori-search');
Route::get('/kategoripengunjung/{id}', [HomeController::class, 'kategoripengunjung'])->name('kategoripengunjung-search');
Route::get('/event',  [HomeController::class, 'event'])->name('event');
Route::get('/eventpengunjung',  [HomeController::class, 'eventpengunjung'])->name('eventpengunjung');
Route::get('/wisata-detail/{id}', [HomeController::class, 'detail'])->name('wisata-detail');
Route::get('/wisata-detailpengunjung/{id}', [HomeController::class, 'detailpengunjung'])->name('wisata-detailpengunjung');
//DATA WISATA//
Route::get('adm/manajemen-wisata',  [WisataController::class, 'index'])->name('manajemen-wisata');
Route::get('superadm/manajemen-wisata',  [SuperController::class, 'index'])->name('wisatasuper');
Route::get('adm/add-wisata', [SuperController::class, 'add'])->name('add-wisata');
Route::get('adm/edit-wisata/{id}', [WisataController::class, 'edit'])->name('edit-wisata');
Route::get('adm/detail-wisata/{id}', [WisataController::class, 'detail'])->name('detail-wisata');
Route::post('adm/wisata-store', [WisataController::class, 'store'])->name('wisata-store');
Route::post('adm/wisata-update/{id}', [WisataController::class, 'update'])->name('wisata-update');
Route::get('adm/delete-wisata/{id}', [SuperController::class, 'delete'])->name('delete-wisata');
Route::get('adm/foto-upload/{id}', [WisataController::class, 'foto_upload'])->name('foto-upload');
Route::post('adm/foto-save/{id}', [WisataController::class, 'foto_save'])->name('foto-save');
Route::get('adm/foto-edit/{id}', [WisataController::class, 'foto_edit'])->name('foto-edit');
Route::post('adm/foto-update/{id}', [WisataController::class, 'foto_update'])->name('foto-update');
Route::get('adm/foto-hapus/{id}', [WisataController::class, 'foto_hapus'])->name('foto-hapus');
//KATEGORI WISATA//
Route::get('/search', [WisataController::class, 'search'])->name('search-wisata');
Route::get('adm/manajemen-kategori-wisata',  [KategoriController::class, 'index'])->name('manajemen-kategori-wisata');
Route::get('adm/add-kategori-wisata', [KategoriController::class, 'add'])->name('add-kategori-wisata');
Route::get('adm/delete-kategori-wisata/{id}', [KategoriController::class, 'delete'])->name('del-kategori-wisata');
Route::get('adm/edit-kategori-wisata/{id}', [KategoriController::class, 'edit'])->name('edit-kategori-wisata');
Route::post('adm/kategori-store', [KategoriController::class, 'store'])->name('kategori-store');
Route::post('adm/kategori-update/{id}', [KategoriController::class, 'update'])->name('kategori-update');
//FASILITAS WISATA
Route::get('adm/manajemen-fasilitas-wisata',  [FasilitasController::class, 'index'])->name('manajemen-fasilitas-wisata');
Route::get('adm/add-fasilitas-wisata', [FasilitasController::class, 'add'])->name('add-fasilitas-wisata');
Route::post('adm/fasilitas-store', [FasilitasController::class, 'store'])->name('fasilitas-store');
Route::get('adm/delete-fasilitas-wisata/{id}', [FasilitasController::class, 'delete'])->name('del-fasilitas-wisata');
Route::get('adm/edit-fasilitas-wisata/{id}', [FasilitasController::class, 'edit'])->name('edit-fasilitas-wisata');
Route::post('adm/fasilitas-update/{id}', [FasilitasController::class, 'update'])->name('fasilitas-update');
//ABOUT US
Route::get('adm/manajemen-Aboutus-wisata',  [AboutusController::class, 'index'])->name('manajemen-aboutus-wisata');
Route::get('adm/add-Aboutus-wisata', [AboutusController::class, 'add'])->name('add-aboutus-wisata');
Route::get('adm/edit-Aboutus-wisata/{id}', [AboutusController::class, 'edit'])->name('edit-aboutus-wisata');
Route::get('adm/hapus-Aboutus-wisata', [AboutusController::class, 'edit'])->name('hapus-aboutus-wisata');
Route::post('adm/Aboutus-update/{id}', [AboutusController::class, 'update'])->name('aboutus-update');

//EVENT ROUTE//
Route::get('adm/manajemen-event',  [EventController::class, 'index'])->name('manajemen-event');
Route::get('adm/add-event-wisata', [EventController::class, 'add'])->name('add-event-wisata');
Route::post('adm/event-store', [EventController::class, 'store'])->name('event-store');
Route::get('adm/delete-event-wisata/{id}', [EventController::class, 'delete'])->name('del-event-wisata');
Route::get('adm/edit-event-wisata/{id}', [EventController::class, 'edit'])->name('edit-event-wisata');
Route::post('adm/event-update/{id}', [EventController::class, 'update'])->name('event-update');

//TIKET
Route::get('adm/manajemen-tiket', [TiketController::class, 'index'])->name('manajemen-tiket');
Route::get('adm/add-tiket-wisata', [TiketController::class, 'add'])->name('add-tiket-wisata');
Route::get('adm/edit-tiket-wisata/{id}', [TiketController::class, 'edit'])->name('edit-tiket-wisata');
Route::post('adm/tiket-update/{id}', [TiketController::class, 'update'])->name('tiket-update');
Route::post('adm/tiket-store', [TiketController::class, 'store'])->name('tiket-store');
Route::get('adm/delete-tiket-wisata/{id}', [TiketController::class, 'delete'])->name('del-tiket-wisata');

//crudpenginapan
Route::get('adm/manajemen-penginapan', [PenginapanController::class, 'index'])->name('manajemen-penginapan');
Route::get('adm/add-penginapan-wisata', [PenginapanController::class, 'add'])->name('add-penginapan-wisata');
Route::get('adm/edit-penginapan-wisata/{id}', [PenginapanController::class, 'edit'])->name('edit-penginapan-wisata');
Route::post('adm/penginapan-update/{id}', [PenginapanController::class, 'update'])->name('penginapan-update');
Route::post('adm/penginapan-store', [PenginapanController::class, 'store'])->name('penginapan-store');
Route::get('adm/delete-penginapan-wisata/{id}', [PenginapanController::class, 'delete'])->name('del-penginapan-wisata');

// Route::get('/order', [TiketController::class, 'showOrderForm'])->name('order');
// Route::post('/order', [TiketController::class, 'processOrder'])->name('order');

//paymentgateway
Route::get('/payment/{id}', [OrderController::class, 'payment'])->name('payment');
Route::post('/checkout', [OrderController::class, 'checkout']);
Route::post('/midtrans-callback', [OrderController::class. 'callback']);
Route::get('/invoice/{id}', [OrderController::class, 'invoice']);
Route::get('/penginapan/{id}', [ReservasiController::class, 'penginapan'])->name('penginapan');
Route::get('/check-access', [WisataController::class, 'checkAccess'])->name('checkAccess');
Route::get('/no-access', function () {
    return view('errors.no_access');
})->name('noAccess');

//penginapan
Route::get('/penginapan/{id}', [ReservasiController::class, 'penginapan'])->name('penginapan');
Route::post('/checkoutpeng', [ReservasiController::class, 'checkoutpeng']);
Route::post('/midtrans-callback2', [ReservasiController::class. 'callback2']);
Route::get('/invoicepeng/{id}', [ReservasiController::class, 'invoicepeng']);

//laporan
Route::get('adm/manajemen-laporan', [LaporanController::class, 'index'])->name('manajemen-laporan');
Route::get('/cetaktiket', [LaporanController::class, 'cetaktiket'])->name('cetak-tiket');
Route::get('adm/manajemen-laporanpenginapan', [LaporanPenginapanController::class, 'index'])->name('manajemen-laporanpenginapan');
Route::get('/cetakpenginapan', [LaporanPenginapanController::class, 'cetakpenginapan'])->name('cetak-penginapan');

//kelolaakun
Route::get('adm/manajemen-akun', [kelolaakunController::class, 'index'])->name('manajemen-akun');
Route::post('/setujui/{id}/accept', [kelolaakunController::class, 'accept']);
// Route::get('/kunjungan/{id_kunjungan}', [C_Kunjungan::class, 'detail'])->name('kunjungan.detail');
// Route::get('/cetak_individu', [C_Kunjungan::class, 'cetakIndividu'])->name('cetakIndividu');
// Route::get('/cetak_kelompok', [C_Kunjungan::class, 'cetakKelompok'])->name('cetakKelompok');

//ulasan
// Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store')->middleware('auth');
// Route::post('/ratings', [RatingController::class, 'store'])->name('ratings.store')->middleware('auth');
// Route::post('/review/store', 'ReviewController@store')->name('review.store');
// Route::post('/review/store', 'App\Http\Controllers\ReviewController@store')->name('review.store');

// Route::post('/ulasan/store', 'UlasanController@store')->name('ulasan.store');
Route::get('/ulasan/tambah', [UlasanController::class, 'create'])->name('review.create');
Route::post('/ulasan/{id}', [UlasanController::class, 'store'])->name('review.store');




Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');

Route::get('/kategori', 'KategoriController@index');
Route::get('/kategori/cari', [KategoriController::class, 'cari'])->name('kategori.cari');

// Route::get('/',[SesiController::class, 'sesi']);

//Maps
Route::resource('maps', MapsController::class);