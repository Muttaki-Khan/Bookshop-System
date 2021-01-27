<?php 
if($this->session->flashdata('success'))
    {
        print '<div class= "success-msg">'.$this->session->flashdata('success').'</div>';
    }
?>

<br>
<div class="row">
	<div class="col-lg-6">
		<div id="table-header">Shipping details for 3B sharing order.</div>
		<?= form_open(base_url('tborder/index/'.$data.'/'.$price))?>
			<div class="form-group">
				<?= form_input(['name'=>'name', 'placeholder'=>'Your Name', 'value'=>set_value('name'), 'class'=>'form-control']) ?>
				<div class="text-danger form-error"><?= form_error('name')?></div>
			</div>
			<div class="form-group">
				<?= form_input(['name'=>'contact', 'placeholder'=>'Phone number...', 'value'=>set_value('contact'), 'class'=>'form-control']) ?>
				<div class="text-danger form-error"><?= form_error('contact')?></div>
			</div>
			<div class="form-group">
				<?= form_textarea(['name'=>'address', 'placeholder'=>'Shipping address...',  'value'=>set_value('address'), 'class'=>'form-control', 'rows'=>'5'])?>
				<div class="text-danger form-error"><?= form_error('address')?></div>
			</div>
			<div class="form-group">
				<?= form_input(['name'=>'city', 'placeholder'=>'City...', 'value'=>set_value('city'), 'class'=>'form-control']) ?>
				<div class="text-danger form-error"><?= form_error('city')?></div>
			</div>

			<div id= "table-header">Payments methods </div>
			<p>Now we have only option cash on delivery. Later we will connect with bKash, Rocket and other banks facility.Thanks for your supports</p>
			
			<div class="form-check">
				<?= form_checkbox(['name'=>'paymentcheck', 'class'=>'form-check-input', 'value'=> TRUE]);?>
				<label class="form-check-label" for="payment">
					<b>Cash on delivery</b>
				</label>
				<div class="text-danger form-error"><?= form_error('paymentcheck')?></div>
			</div>
			
			<br><div><p>We will contact with you with in 24 hours. Please read our shipping policy at <a href="<?= base_url()?>users/terms" target ="_blank" class="text-primary">terms and condition</a> page. If you agree with our shipping policy then place your order now.</p></div>
			<div class="sub">
            <span><?= form_submit(['name'=> 'submit', 'value'=> 'Place Order', 'class'=>'btn btn-primary my-btn'])?></span>
    		</div>
		<?= form_close()?>
	</div>
	<div class="col-lg-6">
		<div id="table-header">order summary</div><br>
		<h5>Payments Details</h5>
		<?php
			print "<table class = 'table'>";

			print "<tr>";
			print "<th>Book Price (3B Sharing)</th>";
			print "<td colspan = '2'>".$price.".TK</td>";
			print "</tr>";

			print "<tr>";
			$shipping = 40;
			print "<th>Shipping cost</th>";
			print "<td colspan = '2'>".$shipping.".TK</td>";
			print "</tr>";

			print "<tr>";
			$payable_total = $price + $shipping;
			print "<th>Total cost</th>";
			print "<td colspan = '2'>".$payable_total.".TK</td>";
			print "</tr>";
			print "</table>";
		?>
	</div>
</div><br>
