@extends('template')

@section('content')
    <div class="container mt-3">
        <div class="row align-items-start">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">Rekomendasi Jamu</div>
                    <div class="card-body">
                        <form action="{{ route('rekomen.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Keluhan</label>
                                <select class="form-control" name="keluhan">
                                    <option selected value="" disabled>Pilih Keluhan</option>
                                    <option value="keseleo">Keseleo</option>
                                    <option value="kurang nafsu makan">Kurang Nafsu Makan</option>
                                    <option value="pegal-pegal">Pegal-pegal</option>
                                    <option value="darah tinggi">Darah Tinggi</option>
                                    <option value="gula darah">Gula Darah</option>
                                    <option value="kram perut">Kram Perut</option>
                                    <option value="masuk angin">Masuk Angin</option>
                                </select>


                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tahun Lahir</label>
                                <select name="tahun" class="form-select" id="">
                                    <option selected>Pilih Tahun Lahir...</option>
                                    @for ($i = 1945; $i <= date("Y"); $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">Isi Data</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Isi Data</th>
                                    <th scope="col">Hasil Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($data)
                                <tr>
                                    <th>Nama Jamu</th>
                                    <td>{{ $data['nama_jamu'] }}</td>
                                </tr>
                                <tr>
                                    <th>Khasiat</th>
                                    <td>{{ $data['khasiat'] }}</td>
                                </tr>
                                <tr>
                                    <th>Keluhan</th>
                                    <td>{{ $data['keluhan'] }}</td>
                                </tr>
                                <tr>
                                    <th>Umur</th>
                                    <td>{{ $data['umur'] }}</td>
                                </tr>
                                <tr>
                                    <th>Saran Penggunaan</th>
                                    <td>{{ $data['saran_guna'] }}</td>
                                </tr>
                                <tr>
                                    <th>Saran Konsumsi</th>
                                    <td>{{ $data['saran_konsum'] }}</td>
                                </tr>
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
