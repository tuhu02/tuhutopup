@extends('template.template')

@section('custom_style')


<style>
    .accordion-button{box-shadow:none!important}
    .btn:disabled{background:#8ba4b1;border-color:#8ba4b1}
    
    .box-profile{margin-top:-270px}
    .box-profile .body{border-radius:24px;height:425px;box-shadow:0 10px 15px -3px rgba(0,0,0,.1) , 0 4px 6px -2px rgba(0,0,0,.05)}
    .box-profile .body .img{width:100px;height:100px;border-radius:50%;text-align:center;line-height:100px;border:2px solid #fff;margin:-50px auto;font-size:22px}
    .my-form div small{color:#718096}
</style>


@endsection


@section('content')

<x-navbar/>
<div class="content-body">

			<div class="col-lg-8 mx-auto px-3 py-3 mt-4">
						<h5 class="text-center mb-3">Riwayat Pembelian</h5>
					 <div class="table-responsive">
                            <table class="table m-o table-bordered text-nowrap text-white">
                                <thead class="table-primary">
                                    <tr>
                                        <th>ID</th>
                                        <th>Layanan</th>
                                        <th>Target</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                        		@foreach($data as $pesanan)
                        		@if($pesanan->tipe_transaksi !== 'joki')
                        		@php
                                    $zone = $pesanan->zone != null ? "-".$pesanan->zone : "";
                                    $label_pesanan = '';
                                    if($pesanan->status == "Pending" || $pesanan->status == "Menunggu Pembayaran" || $pesanan->status == "Waiting"){
                                    $label_pesanan = 'warning';
                                    }else if($pesanan->status == "Processing" || $pesanan->status == 'Proses'){
                                    $label_pesanan = 'info';
                                    }else if($pesanan->status == "Success" || $pesanan->status == 'Sukses'){
                                    $label_pesanan = 'success';
                                    }else{
                                    $label_pesanan = 'danger';
                                    }
                                    @endphp                   		
                        		<tr>
                        			<td>{{ $pesanan->order_id }}</td>
                        			<td>{{ $pesanan->layanan }}</td>
                        			<td>{{ $pesanan->user_id.$zone }}</td>
                        			<td>Rp. {{ number_format($pesanan->harga, 0, ',', '.') }}</td>
                        			<td><span class="badge bg-{{ $label_pesanan }}">{{ $pesanan->status }}</span></td>
                        			<td>{{ $pesanan->created_at }}</td>
                        		</tr>
                        		@else
                        		@foreach($joki as $jokis)
                        		@if($jokis->order_id == $pesanan->order_id)
                                @php
                                    $zone = $pesanan->zone != null ? "-".$pesanan->zone : "";
                                    $label_pesanan = '';
                                    if($jokis->status_joki == "Sukses"){
                                    $label_pesanan = 'success';
                                    }else{
                                    $label_pesanan = 'danger';
                                    }
                                    @endphp                   		
                        		<tr>
                        			<td>{{ $pesanan->order_id }}</td>
                        			<td>{{ $pesanan->layanan }}</td>
                        			<td>{{ $pesanan->user_id.$zone }}</td>
                        			<td>Rp. {{ number_format($pesanan->harga, 0, ',', '.') }}</td>
                        			<td><span class="badge bg-{{ $label_pesanan }}">{{ $jokis->status_joki }}</span></td>
                        			<td>{{ $pesanan->created_at }}</td>
                        		</tr>
                        		@endif
                        		@endforeach
                        		@endif
                        		@endforeach
                        	</table>
                        </div>
				</div>
			</div>
		</div>
		
        

        






@push('custom_script')



@endpush




@endsection