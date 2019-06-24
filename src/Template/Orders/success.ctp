<div class="alert alert-success" role="alert">
	<h1>Comanda dumneavoastra a fost plasata !</h1>
</div>
<br />
<br />

<h2>Veti fi contactat in scurt timp de catre un reprezentant eIarna</h2>
<h2>Detaliile comenzii au fost trimise pe adresa de email</h2>

<br/>
<?php if($shop['Order']['payment_method'] == 'payment_order') {?>
	<div class="card">
      <div class="card-body">
     	 <div class="row">
            <div class="col-md-4">Cont Bancar</div>
            <div class="col-md-4">RO52BACX00009999786523</div>
         </div>
         <div class="row">
            <div class="col-md-4">Beneficiar</div>
            <div class="col-md-4">eIarna S.R.L.</div>
         </div>
         <div class="row">
            <div class="col-md-4">Detalii de plata</div>
            <div class="col-md-4">Comanda #<?php echo $shop['Order']['id']?></div>
         </div>
      </div>
    </div>
<?php }?>
<br />
<br />

