@extends('template.template')

@section('custom_style')


<style>
    .accordion-button{box-shadow:none!important}
    .btn:disabled{background:#8ba4b1;border-color:#8ba4b1}
    
    .box-profile{margin-top:-300px}
    .box-profile .body{border-radius:24px;box-shadow:0 10px 15px -3px rgba(0,0,0,.1) , 0 4px 6px -2px rgba(0,0,0,.05)}
    .my-form div small{color:#718096}
</style>


@endsection


@section('content')
<x-navbar/>
<div class="content-body mt-5">
			<div class="col-lg-6 mx-auto px-3 pt-3 mb-3">
				<div class="">
					<form action="{{url('/deposit')}}" method="POST" class="my-form px-3 mt-3">
					    @csrf
						<h5 class="text-center mb-4">Top Up Saldo</h5>
						
						 @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        @if(session('success'))
			    
        			    <div class="alert alert-success">
        			       <ul>
        			           <li>{{session('success')}}</li>
        			       </ul>
        			    </div>
        			    
        			    @endif
						
						<p>Pilih Metode Pembayaran</p>
						
						<div class="mb-3">
							<select class="form-control" name="metode" required>
                                            <option value="BCA">BCA(MANUAL)</option>
                                            <option value="OVO">OVO(MANUAL)</option>
                                            <option value="GOPAY">GOPAY(MANUAL)</option>
                                            <option value="DANA">DANA(MANUAL)</option>
                                            <option value="SHOPEPAY">SHOPEPAY(MANUAL)</option>
                                            <option value="BRI">BRI(MANUAL)</option>
                            </select>
						</div>
						
						<p>Masukan nominal Top Up</p>
						
						<div class="mb-2">
							<input type="number" class="form-control" autocomplete="off" name="jumlah" placeholder="Nominal Top Up" required>
						</div>
						 <button class="btn btn-primary w-100 mb-3" type="submit" name="tombol" value="submit">Top Up</button>
						<span class="d-block mb-3">
				            <a class="btn btn-success btn-sm" href="{{ !$config ? '' : $config->url_wa }}">KONFIRMASI ADMIN</a>
				        </span>
					</form>
					
					
					 <div class="table-responsive">
                            <table class="table m-o table-bordered text-nowrap text-white">
                                <thead class="bg-none">
                                    <tr>
                                        <th>ID</th>
                                        <th>Jumlah</th>
                                        <th>Metode</th>
                                        <th>No Pembayaran</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                        		@forelse($data as $pesanan)
                                @php
                                    $zone = $pesanan->zone != null ? "-".$pesanan->zone : "";
                                    $label_pesanan = '';
                                    
                                    if($pesanan->status == "Pending" || $pesanan->status == "Batal"){
                                        $label_pesanan = 'warning';
                                    }else if($pesanan->status == "Processing"){
                                        $label_pesanan = 'info';
                                    }else if($pesanan->status == "Success"){
                                        $label_pesanan = 'success';
                                    }else{
                                        $label_pesanan = 'danger';
                                    }
                                @endphp                        		
                        		<tr>
                        			<td>{{ $pesanan->id }}</td>
                        			<td>Rp {{ number_format($pesanan->jumlah,0,',','.') }}</td>
                        			<td>{{ $pesanan->metode }}</td>
                        			<td>{!! $pesanan->metode != "QRIS" ? $pesanan->no_pembayaran : '<a class="btn btn-primary" href="/assets/qrisdepo.png" target="_blank">Lihat QR</a>'!!}</td>
                        			<td><span class="badge bg-{{ $label_pesanan }}">{{ $pesanan->status }}</span></td>
                        			<td>{{ $pesanan->created_at }}</td>
                        		</tr>
                        		@empty
                        		<tr>
                        			<td align="center" colspan="6">Tidak ada riwayat</td>
                        		</tr>
                        		@endforelse
                        	</table>
                        </div>
				</div>
			</div>
		</div>
		
        

        






@push('custom_script')



@endpush




@endsection