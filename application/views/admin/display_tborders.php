<!--=== Success msg ===-->
<?php 
    if($this->session->flashdata('success'))
    {
        print '<div class= "success-msg">'.$this->session->flashdata('success').'</div>';
    }
?>
<br>
<div class="container-fluid">
	<div id="table-header">all 3b sharing orders</div>
  <div class="table-responsive-sm">
	<table class="table table-hover">
  <thead class="thead-light">
    <tr>
      <th scope="col">3B ID</th>
      <th scope="col">Buyer 1</th>
      <th scope="col">Buyer 1 contact</th>
      <th scope="col">Buyer 1 address</th>
      <th scope="col">Buyer 2</th>
      <th scope="col">Buyer 2 contact</th>
      <th scope="col">Buyer 2 address</th>
      <th scope="col">Buyer 3</th>
      <th scope="col">Buyer 3 contact</th>
      <th scope="col">Buyer 3 address</th>
      <th scope="col">Paid per person</th>
      <th scope="col">Shipping city</th>
      <th scope="col">Order Date</th>
      <th scope="col">Orders Status</th>
    </tr>
  </thead>


  <tbody>
  	<?php foreach($tborders as $tborder): ?>
    <tr>
      <?php print '<td>'.$tborder->tborderId.'</td>'; ?>

      <?php print '<td><span>'.substr(strip_tags($tborder->namefirst), 0, 100).'</span></td>'; ?>
      <?php print '<td><span>'.strip_tags($tborder->contactfirst).'</span></td>'; ?>
      <?php print '<td><span>'.strip_tags($tborder->addressfirst).'</span></td>'; ?>

      <?php print '<td><span>'.substr(strip_tags($tborder->namesecond), 0, 100).'</span></td>'; ?>
      <?php print '<td><span>'.strip_tags($tborder->contactsecond).'</span></td>'; ?>
      <?php print '<td><span>'.strip_tags($tborder->addresssecond).'</span></td>'; ?>

      <?php print '<td><span>'.substr(strip_tags($tborder->namethird), 0, 100).'</span></td>'; ?>
      <?php print '<td><span>'.strip_tags($tborder->contactthird).'</span></td>'; ?>
      <?php print '<td><span>'.strip_tags($tborder->addressthird).'</span></td>'; ?>

      <?php print '<td><span>'.strip_tags($tborder->tbpricewithshp).'.TK</span></td>'; ?>
      <?php print '<td><span>'.strip_tags($tborder->city).'</span></td>'; ?>
      
      <?php print '<td>'.date('h:i a, d-M y', strtotime($tborder->dateTime)).'</td>'; ?>

      <?php 
      if($tborder->usercount == 3)
      { 
        $status = '<span class = "text-success">Ready to Deliver</span>';
      }
      else
      {
        $status = '<span class = "text-danger">Buyer required</span>';
      }
      print '<td>'.$status.'</td>';
       
      ?>

    </tr>
	<?php endforeach; ?>
  </tbody>
</table>
<div class="section-padding"><h6><a href="<?= base_url('admin/ready_to_deliver')?>" class="text-primary"><i class="fas fa-truck"></i> Orders ready to deliver</a></h6></div>
</div>
</div>
