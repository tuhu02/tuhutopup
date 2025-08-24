<?php $__env->startSection('custom_style'); ?>


<style>
    .btn:disabled{background:#8ba4b1;border-color:#8ba4b1}
</style>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<?php if(Auth::check()): ?>
    <?php if(Auth()->user()->role == 'Member' || Auth()->user()->role == 'Platinum' || Auth()->user()->role == 'Gold'): ?>
<nav class="navbar navbar-expand-lg d-flex fixed-top shadow">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
        <img src="<?php echo e(url('')); ?><?php echo e(!$config ? '' : $config->logo_header); ?>" alt="" width="100" onclick="window.location='<?php echo e(url('')); ?>'">
    </a>
    <div class="search-item">
                    <div class="">
                        <div class="nav-item dropdown">
                            <div class="input-group search-bar" aria-haspopup="true" id="dropsearchdown" aria-expanded="false">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
                                    <input type="text" name="q" placeholder="Cari..." id="searchProds" class="form-control input-box" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
            
            <div class="hasil-cari">
                <ul class="position-absolute resultsearch shadow dropdown-menu" aria-labelledby="dropsearchdown"></ul>
            </div>
    
            <button class="navbar-toggler border-0 d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
              <span><i class="fa fa-bars-staggered text-light"></i></span>
            </button>
            <div class="offcanvas offcanvas-end w-75" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
                    <img src="<?php echo e(url('')); ?><?php echo e(!$config ? '' : $config->logo_header); ?>" alt="" width="100" onclick="window.location='<?php echo e(url('')); ?>'">
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
		      <div class="offcanvas-body d-lg-none">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('')); ?>"><i class="fa-solid fa-house"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/cari')); ?>"><i class="fa-solid fa-magnifying-glass"></i> Cek Pesanan</a>
          </li>
                    <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/riwayat-pembelian')); ?>"><i class="fa-solid fa-clock-rotate-left"></i> Riwayat Pembelian</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/deposit')); ?>"><i class="fa-solid fa-wallet"></i> Top Up Saldo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/user/edit/profile')); ?>"><i class="fa-solid fa-user-pen"></i> Edit Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/membership')); ?>"><i class="fa-solid fa-circle-up"></i> Upgrade Membership</a>
          </li>
          <div class="card bg-card mt-2 mb-2">
            <div class="card-body">
                <span class="py-1 px-2 float-end rounded bg-warning text-dark" style="font-size: 12px;"><?php echo e(Str::title(Auth()->user()->role)); ?></span>
                <h5 class="card-title"><?php echo e(Str::title(Auth()->user()->name)); ?></h5>
                <p class="card-text">Rp <?php echo e(number_format(Auth::user()->balance, 0, ',', '.')); ?></p>
             </div>
          </div>
                    
          <div class"mt-2">
                                                          </div>
                        <button onclick="logout();" class="btn bg-white border-0 text-danger mt-2">Logout</button>
                    </ul>
    </div>
  </div>
    <div class="collapse navbar-collapse text-right d-none d-md-none d-lg-block">
      <div class="navbar-nav ms-auto nav-stacked">
        <a class="nav-link" href="<?php echo e(url('')); ?>"><i class="fa-solid fa-house"></i> Home</a>
        <a class="nav-link" href="<?php echo e(url('/cari')); ?>"><i class="fa-solid fa-magnifying-glass""></i> Cek Pesanan</a>
        <a class="nav-link text-primary" href="<?php echo e(url('/dashboard')); ?>"><i class="fa-solid fa-arrow-right-to-bracket""></i> Dashboard</a>
</div>
  </div>
</nav>
<?php else: ?>
<nav class="navbar navbar-expand-lg d-flex fixed-top shadow">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
        <img src="<?php echo e(url('')); ?><?php echo e(!$config ? '' : $config->logo_header); ?>" alt="" width="100" onclick="window.location='<?php echo e(url('')); ?>'">
    </a>
    <div class="search-item">
                    <div class="">
                        <div class="nav-item dropdown">
                            <div class="input-group search-bar" aria-haspopup="true" id="dropsearchdown" aria-expanded="false">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
                                    <input type="text" name="q" placeholder="Cari..." id="searchProds" class="form-control input-box" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
            
            <div class="hasil-cari">
                <ul class="position-absolute resultsearch shadow dropdown-menu" aria-labelledby="dropsearchdown"></ul>
            </div>
    
            <button class="navbar-toggler border-0 d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
              <span><i class="fa fa-bars-staggered text-light"></i></span>
            </button>
            <div class="offcanvas offcanvas-end w-75" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
                    <img src="<?php echo e(url('')); ?><?php echo e(!$config ? '' : $config->logo_header); ?>" alt="" width="100" onclick="window.location='<?php echo e(url('')); ?>'">
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
		      <div class="offcanvas-body d-lg-none">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('')); ?>"><i class="fa-solid fa-house"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/cari')); ?>"><i class="fa-solid fa-magnifying-glass"></i> Cek Pesanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-primary" href="<?php echo e(url('/dashboard')); ?>"><i class="fa-solid fa-arrow-right-to-bracket"></i> Dashboard</a>
          </li>
                    </ul>
    </div>
  </div>
    <div class="collapse navbar-collapse text-right d-none d-md-none d-lg-block">
      <div class="navbar-nav ms-auto nav-stacked">
        <a class="nav-link" href="<?php echo e(url('')); ?>"><i class="fa-solid fa-house"></i> Home</a>
        <a class="nav-link" href="<?php echo e(url('/cari')); ?>"><i class="fa-solid fa-magnifying-glass""></i> Cek Pesanan</a>
        <a class="nav-link text-primary" href="<?php echo e(url('/dashboard')); ?>"><i class="fa-solid fa-arrow-right-to-bracket""></i> Dashboard</a>
</div>
  </div>
</nav>
<?php endif; ?>
<?php else: ?>

<nav class="navbar navbar-expand-lg d-flex fixed-top shadow">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
        <img src="<?php echo e(url('')); ?><?php echo e(!$config ? '' : $config->logo_header); ?>" alt="" width="100" onclick="window.location='<?php echo e(url('')); ?>'">
    </a>
    <div class="search-item">
                    <div class="">
                        <div class="nav-item dropdown">
                            <div class="input-group search-bar" aria-haspopup="true" id="dropsearchdown" aria-expanded="false">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
                                    <input type="text" name="q" placeholder="Cari..." id="searchProds" class="form-control input-box" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
            
            <div class="hasil-cari">
                <ul class="position-absolute resultsearch shadow dropdown-menu" aria-labelledby="dropsearchdown"></ul>
            </div>
    
            <button class="navbar-toggler border-0 d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
              <span><i class="fa fa-bars-staggered text-light"></i></span>
            </button>
            <div class="offcanvas offcanvas-end w-75" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
                    <img src="<?php echo e(url('')); ?><?php echo e(!$config ? '' : $config->logo_header); ?>" alt="" width="100" onclick="window.location='<?php echo e(url('')); ?>'">
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
		      <div class="offcanvas-body d-lg-none">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('')); ?>"><i class="fa-solid fa-house"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/cari')); ?>"><i class="fa-solid fa-magnifying-glass"></i> Cek Pesanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/login')); ?>"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
          </li>
                    </ul>
    </div>
  </div>
    <div class="collapse navbar-collapse text-right d-none d-md-none d-lg-block">
      <div class="navbar-nav ms-auto nav-stacked">
        <a class="nav-link" href="<?php echo e(url('')); ?>"><i class="fa-solid fa-house"></i> Home</a>
        <a class="nav-link" href="<?php echo e(url('/cari')); ?>"><i class="fa-solid fa-magnifying-glass""></i> Cek Pesanan</a>
         <a class="nav-link" href="<?php echo e(url('/login')); ?>"><i class="fa-solid fa-arrow-right-to-bracket""></i> Login</a>
</div>
  </div>
</nav>
<?php endif; ?>
<div class="content-body" style="height: auto;">
			<div class="px-3 pt-3 mb-2">
				<?php if(session('error')): ?>
			    
			    <div class="alert alert-danger">
			       <ul>
			           <li><?php echo e(session('error')); ?></li>
			       </ul>
			    </div>
			    
			    <?php endif; ?>
			    <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
						  <div class="alert alert-info">
		            <b>Harap Dibayar Sebelum <?php echo e($expired); ?></b><br> Segera lakukan pembayaran sesuai dengan kode bayar / nomor VA yang tercantum. Pastikan nominal pembayaran juga sesuai dengan total bayar.
		          </div>
                <?php if(Str::upper($data->metode_pembayaran) == "QRIS" || Str::upper($data->metode_pembayaran) == "QRISC" || Str::upper($data->metode_pembayaran) == "QRIS2" || Str::upper($data->metode_pembayaran) == "QRISOP" || Str::upper($data->metode_pembayaran) == "QRISCOP" ): ?>
                              <div id="qris-payment">
                                  <center><img src="<?php echo e($data->no_pembayaran); ?>" width="300"></center>
                                  <center><span class="badge bg-danger text-center mt-3">Scan QR Code diatas ini</span></center>
                              </div>
                            <?php endif; ?>
				
				<div class="row mt-3">
        			    <div class="col-12 col-md-4 col-lg-4">
            				<div class="card bg-card mb-3">
            				    <div class="card-body">
            				        <div>
						            	<span class="d-block">Tanggal Pembelian</span>
            				            <b class=""><?php echo e($data->created_at); ?></b>
            				        </div>
                                          <div class="mt-2">
            				            <span class="d-block">Batas Pembayaran</span>
            				            <b class=""><?php echo e($expired); ?></b>
            				        </div>
                                         <div class="mt-2">
            				            <span class="d-block">Nomor Pesanan</span>
            				            <b class=""><?php echo e($data->id_pembelian); ?></b>
            				        </div>
            				        <div class="mt-2">
            				            <span class="d-block">Metode Pembayaran</span>
            				            <b class="text-info"><?php echo e($data->metode_pembayaran); ?></b>
            				        </div>
                                         <div class="mt-2">
            				            <span class="d-block">Kode Bayar / Nomor VA</span>
                                        <?php if(Str::upper($data->metode_pembayaran) == "QRIS" || Str::upper($data->metode_pembayaran) == "QRISC" || Str::upper($data->metode_pembayaran) == "QRIS2" || Str::upper($data->metode_pembayaran) == "QRISOP" || Str::upper($data->metode_pembayaran) == "QRISCOP" ): ?>
							            <a class="btn btn-primary btn-sm" href="#qris-payment">Lihat QRIS</a>
							        <?php elseif(Str::upper($data->metode_pembayaran) == "SHOPEEPAY"): ?>
							            <a class="btn btn-primary btn-sm" href="<?php echo e($data->no_pembayaran); ?>">KLIK UNTUK BAYAR VIA SHOPEEPAY</a>
							        <?php else: ?>
							            <b class="text-danger"><?php echo e($data->no_pembayaran); ?></b>
							        <?php endif; ?>
							              </div>
							<div class="mt-2">
            				            <span class="d-block">Status Pembayaran</span>
								            <?php if($data->status_transaksi !== 'joki'): ?>
								<?php if($data->status_pembelian == "Pending"): ?>
								<b class="text-warning">Menunggu Pembayaran</b>
								<?php elseif($data->status_pembelian == "Processing"): ?>
								<b class="text-info">Sedang Diproses</b>
								<?php elseif($data->status_pembelian == "Batal"): ?>
								<b class="text-danger">Pembayaran Batal</b>
								<?php elseif($data->status_pembelian == "Sukses"): ?>
								<b class="text-success">Pembayaran Berhasil</b>
								<?php endif; ?>
								<?php else: ?>
								<?php if($data->status_pembayaran == "Belum Lunas"): ?>
								<b class="text-warning">Menunggu Pembayaran</b>
								<?php elseif($data->status_pembayaran == "Batal"): ?>
								<b class="text-danger">Pembayaran Batal</b>
								<?php elseif($data->status_pembayaran == "Lunas"): ?>
								<b class="text-success">Pembayaran Berhasil</b>
								<?php endif; ?>
								<?php endif; ?>
                        </div>
                        </div>
            				    <div class="card-footer">
            				        <table class="table table-clear text-white">
                                <tbody>
                                    <tr>
                                        <td class="left">
                                        <strong>Total Pembayaran :</strong>
                                        </td>
                                        <td class="right text-right">
                                        <strong style="color:lime;">
                                        Rp.
                                        <span>
                                        <?php echo e(number_format($data->harga_pembayaran, 0, ',','.')); ?>,-
                                        </span>
                                        </strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
            				    </div>
            				</div>
        				</div>
        <div class="col-12 col-md-6 col-lg-8">
            				<div class="card bg-card mb-3">
            				    <div class="card-body">
            				        
                                    <div class="">
            				            <b class="">Detail Pembelian</b>
            				        </div>
            				        <div class="mt-2">
            				            <span class="d-block">Item</span>
            				            <b class=""><?php echo e($data->layanan); ?></b>
            				        </div>
            				        <div class="mt-2">
            				            <span class="d-block">User ID</span>
            				            <b class=""><?php echo e($data->user_id); ?>  <?php echo e($data->zone != null ? "(".$data->zone.")" : ''); ?></b>
            				        </div>
            				        <div class="mt-2">
            				            <span class="d-block">Username</span>
            				            <b class=""><?php echo e($data->nickname); ?></b>
            				        </div>
            				        <div class="mt-2">
            				            <span class="d-block">Status Pembelian</span>
            			<?php if($data->status_transaksi !== 'joki'): ?>
								<?php if($data->status_pembelian == "Pending"): ?>
								<b class="text-warning">Pending</b>
								<?php elseif($data->status_pembelian == "Processing"): ?>
								<b class="text-info">Diproses</b>
								<?php elseif($data->status_pembelian == "Batal"): ?>
								<b class="text-danger">Batal</b>
								<?php elseif($data->status_pembelian == "Sukses"): ?>
								<b class="text-success">Sukses</b>
								<?php endif; ?>
								<?php else: ?>
								<?php if($data->status_pembayaran == "Belum Lunas"): ?>
								<b class="text-warning">Pending</b>
								<?php elseif($data->status_pembayaran == "Batal"): ?>
								<b class="text-danger">Batal</b>
								<?php elseif($data->status_pembayaran == "Lunas"): ?>
								<b class="text-success">Sukses</b>
								<?php endif; ?>
								<?php endif; ?>
                                                                                                				        </div>
            				        
                                </div>
            				</div>
        				</div>
        </div>
        <div class="card bg-card">
				          <div class="card-body">
				              <div class="card-title">
				                  <h4>Pesanan Belum Masuk ?</h4>
				                  <p>Hubungi customer service kami untuk melakukan konfirmasi pesanan</p>
				              </div>
				              <a class="btn btn-primary btn-sm w-100 rounded" href="<?php echo e(!$config ? '' : $config->url_wa); ?>">Hubungi Kami</a>
				          </div>
				      </div>  
				
			</div>
			
					</div>
        
        






<?php $__env->startPush('custom_script'); ?>



<?php $__env->stopPush(); ?>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bismillah sukses\SourceCode-topupaja-v1\topupaja\resources\views/template/invoice.blade.php ENDPATH**/ ?>