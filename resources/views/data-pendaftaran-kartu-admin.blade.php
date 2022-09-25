@extends('master.master-admin')

@section('title')
    PPDB UA
@endsection

@section('header')
@endsection

@section('navbar')
    @parent
@endsection

@section('menunya')
    Kartu Pendaftaran
@endsection

@section('menu')
@auth
<ul class="metismenu" id="menu">
    <li><a href="../../index">
            <i class="fas fa-home"></i>
            <span class="nav-text">Beranda</span>
        </a>
    </li>
    @if (auth()->user()->role == 'Administrator')
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="fa fa-book"></i>
                <span class="nav-text">Data Master </span>
            </a>
            <ul aria-expanded="false">
                <li><a href="../../data-user">Pengguna</a></li>
                <li><a href="../../data-school">Sekolah</a></li>
                <li><a href="../../data-studyProgram">Program Studi</a></li>
                <li><a href="data-jadwal">Jadwal PPDB</a></li>
            </ul>
        </li>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="fa fa-database"></i>
                <span class="nav-text">Data Transaksi</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="../../data-registration">Pendaftaran</a></li>
                <li><a href="../../data-payment">Pembayaran</a></li>
            </ul>
        </li>
        
    <li><a href="../../data-announcement" aria-expanded="false">
        <i class="fa fa-file"></i>
        <span class="nav-text">Pengumuman</span>
    </a>
</li>
    @else
        @php
            $no = 1;
        @endphp
        @foreach ($viewDataUser as $x)
            @if ($no == 1)
                    <li><a href="../../data-registration" aria-expanded="false">
                            <i class="fa fa-database"></i>
                            <span class="nav-text">Pendaftaran</span>
                        </a>
                    </li>
            @endif
            @php
                $no++;
            @endphp
        @endforeach
    @endif
</ul>
@endauth
@endsection

@section('content')
    <div class="row">
        <form action="/update-registration/{{ $viewData->id_pendaftaran }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-xl-12">
                <div class="card card-body" id="cetak" style="margin-bottom: -1rem">
                    <div class="p-4">
                        <div class="d-flex">
                            <div class="col-lg-3" style="text-align: center; margin-right:25px; margin-left:25px;">
                                <img width="110px" src="{{ asset('ppdbua/images/kop.png') }}" alt="">
                            </div>
                            <div class="col-lg-6">
                                <center>
                                    <label class="form-label" style="margin-top: -0.5rem"><strong class="d-block"> </strong></label>
                                    <h3 style="margin-top: -0.5rem"> <strong class="d-block">PENERIMAAN PESERTA DIDIK BARU</strong></h3>
                                        <h3 style="margin-top: -0.5rem"><strong class="d-block">PESANTREN TERPADU DARU ULIL ALBAB</strong></h3>
                                            <p style="margin-top: -0.5rem"><strong class="d-block">Jln. Sungai Brantas No. 25 Ds. Kelutan Kec. ngronggot
                                                Kab. Nganjuk <br> Kode Pos 64395 Hp/Wa 0852-4209-9179 / 0852-5990-5490</strong></p>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="margin-bottom: -4rem;">
                        <div class="p-4" style="border-top: 2px solid black!important; margin-top:-2.5rem;">
                            <div class="d-flex">
                                <div class="col-lg-4" style="text-align: center; margin-right:25px;">
                                    <img src="{{ asset($viewData->pas_foto) }}" width="250px" height="300" alt="">
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 mb-4">
                                        <h4><strong>DATA PESERTA</strong></h4><br>
                                        <strong>NOMOR PESERTA</strong><br>
                                        <h5 style="text-indent: 0 in"><strong>{{ $viewData->id_pendaftaran }}</strong>
                                        </h5>
                                        <strong>NAMA PESERTA</strong><br>
                                        <h5 style="text-indent: 0 in"><strong>{{ $viewData->nama_siswa }}</strong></h5>
                                        <strong>TANGGAL LAHIR</strong><br>
                                        <h5 style="text-indent: 0 in"><strong>{{ $viewData->tanggal_lahir }}</strong>
                                        </h5>
                                        <strong>NISN</strong><br>
                                        <h5 style="text-indent: 0 in"><strong>{{ $viewData->nisn }}</strong></h5>
                                        <strong>ASAL SEKOLAH</strong><br>
                                        <h5 style="text-indent: 0 in"><strong>
                                            @foreach ($viewSekolah as $z)
                                                    @if ($z->NPSN == $viewData->id_Sekolah)
                                                        {{ $z->nama_sekolah }}
                                                    @endif
                                        @endforeach
                                        </strong></h5>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <div class="d-flex">
                                <div class="col-lg-6" style="width: 50%">
                                    <div class="mb-3 mb-4">
                                        <strong>PILIHAN 1</strong><br>
                                        <h5><strong>
                                                @foreach ($viewProdi as $z)
                                                    @if ($z->id_prodi == $viewData->pil1)
                                                        {{ $z->nama_prodi }}
                                                    @endif
                                                @endforeach
                                            </strong></h5>
                                    </div>
                                </div>
                                <div class="col-lg-6" style="width: 50%">
                                    <div class="mb-3 mb-4">
                                        <strong>PILIHAN 2</strong><br>
                                        <h5><strong>
                                                @foreach ($viewProdi as $z)
                                                    @if ($z->id_prodi == $viewData->pil2)
                                                        {{ $z->nama_prodi }}
                                                    @endif
                                                @endforeach
                                            </strong></h5>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="mb-4">
                                <h4><strong>PERNYATAAN</strong></h4>
                                <h5 style="text-indent: 0.5in;text-align: justify;">Saya yang menyatakan bahwa data yang
                                    saya isikan dalam formulir pendaftaran peserta didik baru (PPDB) Pesantren Terpadu Daru Ulil Albab
                                    Tahun Ajaran 2023/2024 adalah benar dan saya bersedia menerima ketentuan yang berlaku. Saya
                                    bersedia menerima sanksi pembatalan penerimaan apabila melanggar pernyataan ini.</h5>
                            </div>
                            <div class="d-flex">
                                <div class="col-lg-6" style="width:50%; text-align: right; margin:15px;">
                                </div>
                                <div class="col-lg-6" style="width:50%;">
                                    <br>
                                    <center>
                                        <h5><label class="form-label"><strong
                                                   class="d-block"><?php ; ?></strong></label>
                                        <?php
                                        function tgl_indo($tanggal){
                                            $bulan = array (
                                                1 =>   'Januari',
                                                'Februari',
                                                'Maret',
                                                'April',
                                                'Mei',
                                                'Juni',
                                                'Juli',
                                                'Agustus',
                                                'September',
                                                'Oktober',
                                                'November',
                                                'Desember'
                                            );
                                            $pecahkan = explode('-', $tanggal);
                                            return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
                                        }
                                        ?>
                                        <strong class="d-block"> Nganjuk, <?php echo tgl_indo(date('Y-m-d')); ?></strong></label>

                                        </h5>
                                        <br>
                                        <p style="color: rgb(156, 156, 156)">ttd</p>
                                        <br>
                                        <h5><strong class="d-block">{{ $viewData->nama_siswa }}</strong></h5>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col">
                    <div class="text-end mt-2 mt-sm-0">
                        <button class="btn btn-success waves-effect waves-light me-1" onclick="printDiv('cetak')"><i
                                class="fa fa-print"> </i></button>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row-->
        </form>
    </div>
    <!-- end row -->
@endsection

@section('footer')
@endsection
