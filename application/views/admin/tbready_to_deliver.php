<!--=== Success msg ===-->
<?php 
    if($this->session->flashdata('success'))
    {
        print '<div class= "success-msg">'.$this->session->flashdata('success').'</div>';
    }
?>
<br>
<div class="container-fluid" style="min-height: 500px">
	<div id="table-header">orders ready to deliver</div>
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
      <th scope="col">Set Delivery Status</th>
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
      if($tborder->del_status == 1)
      { 
        $tborder->del_status = '<span class = "text-success">Delivered</span>';
      }
      else
      {
        $tborder->del_status = '<span class = "text-danger">Ready to deliver</span>';
      }
      print '<td>'.$tborder->del_status.'</td>';
       
      ?>
  
      <?php print '<td>';
        print '<a href= "'.base_url().'admin/tbconfirm_delivery/'.$tborder->tborderId.'" title= "Delivered" class="btn btn-success btn-sm confirm-alert" data-confirm = "Are you sure to confirm this order delivery.?">Delivered</a>&nbsp';
        print '</td>'; 
      ?>
    </tr>
	<?php endforeach; ?>
  </tbody>
</table>
</div>
</div>