<br>
<?php $this->load->model('user_model'); ?>
<?php if($this->user_model->my_tborders()): ?>

	<div id="table-header">My 3B sharing orders</div>
  <div class="table-responsive-sm table-responsive-md">
	<table class="table">
  <thead class="">
    <tr>
      <th scope="col">3B ID</th>
      <th scope="col">Book ID</th>
      <th scope="col">Buyer 1</th>
      <th scope="col">Buyer 1 contact</th>
      <th scope="col">Buyer 2</th>
      <th scope="col">Buyer 2 contact</th>
      <th scope="col">Buyer 3</th>
      <th scope="col">Buyer 3 contact</th>
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
      <?php print '<td><span>'.strip_tags($tborder->bookId).'</span></td>'; ?>

      <?php print '<td><span>'.substr(strip_tags($tborder->namefirst), 0, 100).'</span></td>'; ?>
      <?php print '<td><span>'.strip_tags($tborder->contactfirst).'</span></td>'; ?>

      <?php print '<td><span>'.substr(strip_tags($tborder->namesecond), 0, 100).'</span></td>'; ?>
      <?php print '<td><span>'.strip_tags($tborder->contactsecond).'</span></td>'; ?>

      <?php print '<td><span>'.substr(strip_tags($tborder->namethird), 0, 100).'</span></td>'; ?>
      <?php print '<td><span>'.strip_tags($tborder->contactthird).'</span></td>'; ?>

      <?php print '<td><span>'.strip_tags($tborder->tbpricewithshp).'.TK</span></td>'; ?>
      <?php print '<td><span>'.strip_tags($tborder->city).'</span></td>'; ?>
      
      <?php print '<td>'.date('h:i a, d-M y', strtotime($tborder->dateTime)).'</td>'; ?>

      <?php 
      if($tborder->usercount == 3 && $tborder->del_status == 0)
      { 
        $status = '<span class = "text-success">Ready to Deliver</span>';
      }
      elseif ($tborder->usercount == 3 && $tborder->del_status == 1) {
        $status = '<span class = "text-success">Delivered</span>';
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
</div>

<?php else: ?>
  <div class="error-msg"><?php print "You did not order any book yet. You can order books from here. "?>
  <a href="<?= base_url()?>users/all_books" class="text-primary"><b>Order your books</b></a> now.</div><br>
<?php endif; ?>