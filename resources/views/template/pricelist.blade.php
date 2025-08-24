@extends('template.template')

@section('custom_style')


<style>
    .accordion-button {
            box-shadow: none !important;
        }
        
        .product .box {
            margin-bottom: 40px;
        }
</style>


@endsection


@section('content')
<x-navbar/>

<div class="content-body">
        <div class="row mt-1">
            <div class="col-12">
                <div class="card mt-1 bg-card shadow-lg mt-1 text-white">
                    <div class="card-body">
                        <h5 class="page-title text-white">Daftar Harga</h5>
                        <div class="table-responsive">
                            <table class="table m-o table-bordered text-white">
                                <thead class="table-primary">
                                    <tr>
                                         <th>No</th>
                                        <th>Layanan</th>
                                        <th>Harga</th>
                                           <th>Harga Member</th>
                                           <th>Harga Platinum</th>
                                            <th>Harga Gold</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1;?>
                                    @foreach($datas as $d)
                                    @php
                                        if($d->status == "available"){
                                            $label_pesanan = "success";
                                        }else{
                                            $label_pesanan = "danger";
                                        }
                                    @endphp
                                    <tr>
                                        <th scope="row">{{ $no }}</th>
                                        <td>
                                            {{ $d->nama_kategori }} - {{ $d->layanan }}<br>
                                        </td>
                                        <td>Rp. {{ number_format($d->harga,0,',','.') }}</td>
                                        <td>Rp. {{ number_format($d->harga_member, 0, ',', '.') }}</td>
                                         <td>Rp. {{ number_format($d->harga_platinum, 0, ',', '.') }}</td>
                                          <td>Rp. {{ number_format($d->harga_gold, 0, ',', '.') }}</td>
                                        <td><span class="badge bg-{{ $label_pesanan }}"><i class="mdi mdi-reload mdi-spin"></i> {{ $d->status }}</span></td>
                                    </tr>
                                    <?php $no++ ;?>
                                    @endforeach
                                    </tbody>
                                </table>                               
                        </div>
                    </div>
                </div>
            </div>
          </div>
</div>
          
@push('custom_script')

<script>
    $(document).ready(function(){
        $('.table').DataTable();
    });
</script>

@endpush



@endsection