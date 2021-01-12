<!--=== Success msg ===-->
<?php 
    if($this->session->flashdata('success'))
    {
        print '<div class= "success-msg">'.$this->session->flashdata('success').'</div>';
    }
?>

<div class="container-fluid">
    <div class="books-menu">
      <ul>
        <li><a href="<?= base_url()?>admin/usedbooks"><i class="fas fa-book"></i> All Used Books</a></li>
        <li><a href="<?= base_url()?>admin/add_usedbooks"><i class="fas fa-plus-circle"></i> Add a Used Book</a></li>
        
      </ul>
  </div>
</div>

<br>
<div class="container-fluid">
	<div id="table-header">Used Books list</div>
	<table class="table table-hover">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Book Name</th>
      <th scope="col">Description</th>
      <th scope="col">Author</th>
      <th scope="col">Publisher</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Category</th>
      <th scope="col">User</th>
      <th scope="col">Book Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>


  <tbody>
  	<?php foreach($usedbooks as $usedbook): ?>
    <tr>
      <?php print '<td>'.$usedbook->id.'</td>'; ?>
      <?php print '<td><a href = "'.base_url().'admin/usedbook_view/'.$usedbook->id.'" title="More Description" class= "text-info">'.strip_tags(ucwords($usedbook->book_name)).'</a></td>'; ?>

      <?php print '<td><span>'.substr(strip_tags($usedbook->description), 0, 100).'</span></td>'; ?>
      <?php print '<td><b>'.strip_tags($usedbook->author).'</b></td>'; ?>
      <?php print '<td>'.strip_tags($usedbook->publisher).'</td>'; ?>
      <?php print '<td>'.strip_tags($usedbook->price).'.TK</td>'; ?>
      <?php print '<td>'.strip_tags($usedbook->quantity).'</td>'; ?>
      <?php print '<td>'.ucwords(strip_tags($usedbook->category)).'</td>'; ?>
      <?php print '<td>'.ucwords(strip_tags($usedbook->name)).'</td>'; ?>

      <?php print '<td><img src = "'.strip_tags($usedbook->book_image).'" alt = "" width="50" hieght="80" </td>';?>


      <?php print '<td>';
        print '<a href= "'.base_url().'admin/usedbook_view/'.$usedbook->id.'" title= "View More" class="btn btn-primary btn-sm">View</a>&nbsp';

        print '</td>'; 
      ?>
    </tr>
	<?php endforeach; ?>
  </tbody>
</table>

<div class="paginataion section-padding">
<?= $this->pagination->create_links() ?>
</div>
</div>
