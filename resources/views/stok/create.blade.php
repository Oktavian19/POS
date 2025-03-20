@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('stok') }}" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Nama Barang</label>
                    <div class="col-11">
                        <select class="form-control" id="barang_id" name="barang_id" required>
                            <option value="">- Pilih Barang -</option>
                            @foreach($barang as $item)
                                <option value="{{ $item->barang_id }}">{{ $item->barang_nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Nama User</label>
                    <div class="col-11">
                        <select class="form-control" id="user_id" name="user_id" required>
                            <option value="">- Pilih User -</option>
                            @foreach($user as $item)
                                <option value="{{ $item->user_id }}">{{ $item->username }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Tanggal Stok</label>
                    <div class="col-11">
                        <input type="datetime-local" class="form-control" id="stok_tanggal" name="stok_tanggal"
                            value="{{ old('stok_tanggal') }}" required>
                        @error('stok_tanggal')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Jumlah Stok</label>
                    <div class="col-11">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ old('stok_jumlah') }}"
                                required oninput="formatNumber(this, 'stok_jumlah')">
                            <input type="hidden" name="stok_jumlah" id="stok_jumlah" value="{{ old('stok_jumlah') }}">
                        </div>
                        @error('stok_jumlah')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label"></label>
                    <div class="col-11">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('stok') }}">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function formatNumber(input, hiddenInputId) {
            // Hapus semua karakter non-digit
            let value = input.value.replace(/\D/g, '');

            // Simpan nilai integer asli ke hidden input
            document.getElementById(hiddenInputId).value = value;
        }
    </script>
@endsection

@push('css')
@endpush

@push('js')
@endpush