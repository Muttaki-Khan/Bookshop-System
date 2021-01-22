<div class="container">
	<div class="text-center" id="table-header">3B Sharing</div>
	<div class="text-center"><h3>To initiate 3B sharing, 3 buyers have to place their order</h3></div>
	<hr>
	<div class="row">
		<div class="col-lg-8 col-md-9 col-sm-12" id="book-detail">
			<div><h5>Details of <span class="text-info"><?= strip_tags($book_detail->book_name)?></span></h5></div>
			<br>
			<div class="row">
			<div class="col-lg-4 col-md-5 col-sm-6" id="book-img"><?php print '<img src = "'.strip_tags($book_detail->book_image).'" alt = "">';?></div>
			<div class="col-lg-8 col-md-7 col-sm-6">
				<div class="book-info">
					<div>Book Name: <?= strip_tags($book_detail->book_name)?></div>
					<div>Author: <i><?= strip_tags($book_detail->author)?></i></div>
					<div>Publisher: <?= strip_tags($book_detail->publisher)?></div>
					<div>Category: <?= strip_tags($book_detail->category)?></div>
					<div class="text-success"><i class="fas fa-check-circle"></i> Stock: Available</div>
					<div>3B Sharing Price: <?= round(strip_tags($book_detail->price/3),2)?> TK</div>
				</div>
				<br>
				<br>
			<!--=== Restricted user to buy their own book ===-->
			<?php if($this->session->userdata('id') != $book_detail->userId): ?>
				<div class="row">
					<div class="col">
						<?php
						if($this->session->userdata('logged_in'))
        				{
          					print '<a href = "'.base_url().'users/tb_buy/'.$book_detail->id.'" class="btn btn-outline-primary btn-sm">Place Order</a>';
        				}
        				else
        				{
          				print "<div class='text-danger'>*Please log in to place order</div>";
        				}

						?>
					</div>
					<div class="col">
						
					</div>
					<div class="col">
						
					</div>
				</div>
			<?php else: ?>
				<div><p class="text-danger">You can't buy your books. This book is uploaded by you.</p></div>
			<?php endif; ?>

			</div>
			</div>

			<hr>

		</div>
	</div>
</div>

