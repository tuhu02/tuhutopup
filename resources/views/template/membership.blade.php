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
<div class="content-body">
		<div class="col-lg-6 mx-auto px-3 pt-3 mb-3">
				
		   <h5 class="text-center mb-4">Upgrade Membership</h5>

<div class="p-3 px-5">
							    <span class="d-inline-block py-1 px-2 mb-2 rounded bg-secondary text-white w-100" style="font-size: 14px;">Platinum Rp.100.000,-</span>
							    <span class="d-inline-block py-1 px-2 mb-2 rounded bg-warning text-dark w-100" style="font-size: 14px;">Gold Rp.200.000,-</span>
							    <a href="https://wa.me/6281390898046" type="button" class="btn btn-primary mt-2 w-100" type="button"><i class="fa fa-whatsapp"></i> Beli Membership</a>
							</div>			
						
                        
                 </div>
</div>








@push('custom_script')

<script>
			var modal_logout = new bootstrap.Modal(document.getElementById('modal-logout'));

			function logout() {
				modal_logout.show();
			}
		</script>
		

@endpush




@endsection