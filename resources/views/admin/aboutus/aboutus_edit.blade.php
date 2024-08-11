@extends('template.backend.mainsuper')

@section('main')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h3 class="mb-0 text-white">Edit Data Aboutus</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12">
                <!-- Form Card -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Form Edit Aboutus</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('aboutus-update', $data_aboutus->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="pl-lg-5">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-no-telpon">No Telpon</label>
                                            <input type="tel" class="form-control" id="input-no-telpon" name="no_telpon" value="{{ $data_aboutus->no_telpon }}" pattern="[0-9]{1,12}" maxlength="12" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-nama">Judul</label>
                                            <input type="text" class="form-control" id="input-nama" name="nama" value="{{ $data_aboutus->nama }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-sub-judul">Sub Judul</label>
                                            <input type="text" class="form-control" id="input-sub-judul" name="sub_judul" value="{{ $data_aboutus->sub_judul }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-keterangan">Keterangan</label>
                                            <textarea id="input-keterangan" name="keterangan" rows="3" class="form-control" placeholder="Masukan Keterangan Lengkap">{{ $data_aboutus->keterangan }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-visi">Visi</label>
                                            <textarea type="text" class="form-control" id="input-visi" name="visi" required>{{ $data_aboutus->visi }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-misi">Misi</label>
                                            <textarea type="text" class="form-control" id="input-misi" name="misi" required>{{ $data_aboutus->misi }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-peta">Peta</label>
                                            <input type="file" class="form-control-file" id="input-peta" name="peta">
                                            @if ($data_aboutus->peta)
                                                <img src="{{ asset('storage/' . $data_aboutus->peta) }}" alt="Peta" class="img-fluid mt-2" style="max-height: 150px;">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-keterangan-peta">Keterangan Peta</label>
                                            <textarea id="input-keterangan-peta" name="ket_wilayah" rows="3" class="form-control" placeholder="Masukan Keterangan Peta">{{ $data_aboutus->ket_wilayah }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-monografi">Monografi</label>
                                            <textarea id="input-monografi" name="monografi" rows="3" class="form-control" placeholder="Masukan Monografi">{{ $data_aboutus->monografi }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-gambar-monografi">Gambar Monografi</label>
                                            <input type="file" class="form-control-file" id="input-gambar-monografi" name="gambar_monografi">
                                            @if ($data_aboutus->gambar_monografi)
                                                <img src="{{ asset('storage/' . $data_aboutus->gambar_monografi) }}" alt="Gambar Monografi" class="img-fluid mt-2" style="max-height: 150px;">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-gambar-struktur">Gambar Struktur</label>
                                            <input type="file" class="form-control-file" id="input-gambar-struktur" name="gambar_struktur">
                                            @if ($data_aboutus->gambar_struktur)
                                                <img src="{{ asset('storage/' . $data_aboutus->gambar_struktur) }}" alt="Gambar Struktur" class="img-fluid mt-2" style="max-height: 150px;">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-link-wa">Link WhatsApp</label>
                                            <input type="url" class="form-control" id="input-link-wa" name="link_wa" value="{{ $data_aboutus->link_wa }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-link-ig">Link Instagram</label>
                                            <input type="url" class="form-control" id="input-link-ig" name="link_ig" value="{{ $data_aboutus->link_ig }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-link-fb">Link Facebook</label>
                                            <input type="url" class="form-control" id="input-link-fb" name="link_fb" value="{{ $data_aboutus->link_fb }}" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary">Simpan Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
