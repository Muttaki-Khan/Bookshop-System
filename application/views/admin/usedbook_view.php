<br>
<div class="container">
	<div class="row">
		<div class="col-sm-8 col-xs-12" id="book-detail">
			<div id="table-header">Book Detail</div><br>
			<div><h5>Details of <span class="text-info"><?= strip_tags($usedbook_detail->book_name)?></span></h5></div>
			<div class="row">
			<div class="col-sm-4" id="book-img"><?php print '<img src = "'.strip_tags($usedbook_detail->book_image).'" alt = "">';?></div>
			<div class="col-sm-8">
				<div class="book-info">
				<div>Book Name: <?= strip_tags($usedbook_detail->book_name)?></div>
				<div>Author: <?= strip_tags($usedbook_detail->author)?></div>
				<div>Publisher: <?= strip_tags($usedbook_detail->publisher)?></div>
				<div>Category: <?= strip_tags($usedbook_detail->category)?></div>
				<div>Uploaded By: <i class="text-info"><?= strip_tags($usedbook_detail->name)?></i></div>   
				<div class="text-success"><i class="fas fa-check-circle"></i> In stock: <?= strip_tags($usedbook_detail->quantity)?></div>
				<div>Price: <?= strip_tags($usedbook_detail->price)?>.TK</div>
				</div>
			</div>
			</div>

			<br>
			<div class="book-description"><h5>Book description</h5><hr>
				<p><?= nl2br(strip_tags($usedbook_detail->description)) ?></p>
			</div>
			<hr>
		  <div><h5>Action</h5></div>
	      <?php print '<td>';
	        print '<a href= "'.base_url().'admin/book_edit/'.$usedbook_detail->id.'" title= "Edit" class="btn btn-success btn-sm"> <i class= "fas fa-wrench"></i> Update</a>&nbsp';
	        print '<a href= "'.base_url().'admin/usedbook_delete/'.$usedbook_detail->id.'" title= "Delete" class="btn btn-danger btn-sm delete" data-confirm = "Are you sure to delete this used book?"> <i class= "fas fa-trash"></i> Delete</a>&nbsp';

	        print '</td>'; 
	      ?>
		</div>
		<div class="col-sm-4">
			
		</div>
	</div>
</div>
<br>