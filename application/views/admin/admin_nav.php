<div class="admin-nav">
    <div class="user-name"><i class="fas fa-user"></i> <?php print $this->session->userdata('name') ?></div>
    <div class="admin-search">
        <?= form_open('users/search', ['id'=>'user-search'])?>
        <input type="text" name="search_book" class="form-control" placeholder="Search any book">
        <button type="submit"><i class="fas fa-search"></i></button>
        <?= form_close()?>
    </div>
    <div class="admin-menu">
        <ul>
           <li><a href="<?= base_url()?>admin"><i class="fas fa-home"></i> Dashboard</a></li>
           <li><a href="<?= base_url()?>admin/category"><i class="far fa-list-alt"></i> Category</a></li>
           <li><a href="<?= base_url()?>admin/books"><i class="fas fa-book"></i> Books</a></li>
           <li><a href="<?= base_url()?>admin/usedbooks"><i class="fas fa-book"></i> Used Books</a></li>
           <li><a href="<?= base_url()?>admin/allusers"><i class="fas fa-users"></i> Users</a></li>
           <li><a href="<?= base_url()?>admin/orders"><i class="fas fa-cart-arrow-down"></i> Orders</a></li>
           <li><a href="<?= base_url()?>admin/tborders"><i class="fas fa-cart-arrow-down"></i> 3B Sharing Orders</a></li>
           <li><a href="<?= base_url('admin/edit-profile/'.$this->session->userdata('id').'')?>"><i class="fas fa-user"></i> Edit profile</a></li>
           <li><a href="<?= base_url()?>users/logout"><i class="fas fa-power-off"></i> Logout</a></li>
       </ul>
   </div>
</div>
