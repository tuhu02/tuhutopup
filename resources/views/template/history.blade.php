@extends('template.template')

@section('custom_style')


<style>
    .btn:disabled{background:#8ba4b1;border-color:#8ba4b1}
</style>


@endsection


@section('content')
<x-navbar/>

<div class="content-body">
									<div class="px-3 pt-3 mb-3">
				<h2 class="mb-4">Cek Pesanan anda</h2>
				@if(session('error'))
			    
			    <div class="alert alert-danger">
			       <ul>
			           <li>{{session('error')}}</li>
			       </ul>
			    </div>
			    
			    @endif
			    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
				<form action="{{url('/cari')}}" method="POST" class="my-form">
				    @csrf
					<div class="mb-3">
						<label>No Invoice</label>
						<input type="text" class="form-control" placeholder="INVxxxxxxRM" name="id" autocomplete="off" required>
					</div>
					<div class="mt-3">
						<button class="btn btn-primary w-100" type="submit"><i class="mdi mdi-shopping mr-1"></i> Check Pesanan</button>
					</div>
				</form>
				
				
			</div>
			
					</div>
		
        
        
        






@push('custom_script')



@endpush




@endsection