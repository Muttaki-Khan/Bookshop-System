<?php 

class admin_model extends CI_Model
{
	#...Create category
	public function create_category()
	{
		$data = array(

			'category' => $this->input->post('category'),
			'description' => $this->input->post('description'),
			'tag' => $this->input->post('tag')

		);

		$insert_ctg = $this->db->insert('category', $data);
		return $insert_ctg;
	}

	#...Display all category
	public function get_category()
	{
		$query = $this->db->get('category');
		return $query->result();
	}

	#...Display category details
	public function get_ctg_detail($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('category');
		return $query->row();
	}

	#...Edit category
	public function edit_category($id, $data)
	{
		$data = array(

			'category' => $this->input->post('category'),
			'description' => $this->input->post('description'),
			'tag' => $this->input->post('tag')

		);

		return $query = $this->db->where('id', $id)->update('category', $data);
	}

	#...Delete category
	public function delete_category($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('category');
		
	}

	#...Display all user
	public function get_users()
	{
		$query = $this->db->get('users');
		return $query->result();
	}

	#...Add user
	public function add_user()
	{

		$options = ['cost'=> 12];
		$encripted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);

		$data = array(

			'name'	=> $this->input->post('name'),
			'contact'	=> $this->input->post('contact'),
			'email'	=> $this->input->post('email'),
			'address'	=> $this->input->post('address'),
			'city'	=> $this->input->post('city'),
			'password' => $encripted_pass,
			'type' => $this->input->post('type')

		);

		$insert_user = $this->db->insert('users', $data);
		return $insert_user;

	}

	#...Delete User
	public function delete_user($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('users');
		
	}

	#...Add books
	public function add_books()
	{
		$data = $this->upload->data();
		$image_path = base_url("uploads/image/".$data['raw_name'].$data['file_ext']);
		
		$data = array(
			'book_name' => $this->input->post('book_name'),
			'description' => $this->input->post('description'),
			'author' => $this->input->post('author'),
			'publisher' => $this->input->post('publisher'),
			'price' => $this->input->post('price'),
			'quantity' => $this->input->post('quantity'),
			'categoryId' => $this->input->post('categoryId'),
			'book_image' => $image_path,
			'userId' => $this->session->userdata('id'),
			'status' => $this->input->post('status'),
			'bookstatus' => $this->input->post('bookstatus')
		);

		$insert_book = $this->db->insert('books', $data);
		echo $this->db->last_query();
		return $insert_book;
	}


    
	#...Display all books
	public function get_books($limit, $offset)
	{	
		/*=== SQL join ===*/
		$this->db->select('books.id, books.book_name, books.description, books.author, books.publisher, books.quantity, books.price, books.book_image, category.category, users.name');

		$this->db->from('books');
		$this->db->join('category', 'books.categoryId = category.id');
		$this->db->join('users', 'books.userId = users.id'); // Join 3rd table

		$this->db->order_by('books.id', 'DESC');
		$this->db->where('books.status', '1');
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}
	#...For pagination
	public function num_rows_admin_books()
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->join('books', 'books.categoryId = category.id');

		$this->db->order_by('books.id', 'DESC');
		$this->db->where('books.status', '1');
		$query = $this->db->get();
		return $query->num_rows();
	}



	public function num_rows_admin_usedbooks()
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->join('usedbooks', 'usedbooks.categoryId = category.id');

		$this->db->order_by('usedbooks.id', 'DESC');
		$this->db->where('usedbooks.status', '1');
		$query = $this->db->get();
		return $query->num_rows();
	}



		#...Display best books
	public function get_bestbooks($limit, $offset)
	{	
		/*=== SQL join ===*/
		$this->db->select('books.id, books.book_name, books.description, books.author, books.publisher, books.quantity, books.price, books.book_image, category.category, books.sales_counter');

		$this->db->from('books');
		$this->db->join('category', 'books.categoryId = category.id');
		$this->db->join('users', 'books.userId = users.id'); // Join 3rd table

		$this->db->order_by('books.sales_counter', 'DESC');
		$this->db->where('books.status', '1');
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}
	#...pagination for best seller books table
	public function num_rows_best_books()
	{
		$this->db->select('*');
		$this->db->from('books');

		$this->db->order_by('books.sales_counter', 'DESC');

		$query = $this->db->get();
		return $query->num_rows();
	}
	#...For count total books
	public function count_total_books()
	{
		$this->db->where('status', '1');
		$query = $this->db->get('books');
		return $query->result();
	}
    #...For count total used books
	public function count_total_usedbooks()
	{
		$this->db->where(['book_name']);
		$query = $this->db->get('books');
		return $query->result();
	}

	#...Display book details
	public function get_book_detail($id)
	{
		/*=== SQL join ===*/
		$this->db->select('books.*, users.name, category.category');
		$this->db->from('books');
		$this->db->join('category', 'books.categoryId = category.id');
		$this->db->join('users', 'books.userId = users.id'); // Join 3rd table

		$this->db->where('books.id', $id);
		$query = $this->db->get();
		return $query->row();		
	}

	#...Edit book info
	public function edit_book($id, $data)
	{
		$data = $this->upload->data();
		$image_path = base_url("uploads/image/".$data['raw_name'].$data['file_ext']);
		
		$data = array(
			'book_name' => $this->input->post('book_name'),
			'description' => $this->input->post('description'),
			'author' => $this->input->post('author'),
			'publisher' => $this->input->post('publisher'),
			'price' => $this->input->post('price'),
			'quantity' => $this->input->post('quantity'),
			'categoryId' => $this->input->post('categoryId'),
			'book_image' => $image_path,
			'userId' => $this->session->userdata('id'),
			'status' => $this->input->post('status'),
			'bookstatus' => $this->input->post('bookstatus')
		);

		return $query = $this->db->where('id', $id)->update('books', $data);
	}
    #...Edit book info
	public function edit_usedbook($id, $data)
	{
		$data = $this->upload->data();
		$image_path = base_url("uploads/image/".$data['raw_name'].$data['file_ext']);
		
		$data = array(
			'book_name' => $this->input->post('book_name'),
			'description' => $this->input->post('description'),
			'author' => $this->input->post('author'),
			'publisher' => $this->input->post('publisher'),
			'price' => $this->input->post('price'),
			'quantity' => $this->input->post('quantity'),
			'categoryId' => $this->input->post('categoryId'),
			'book_image' => $image_path,
			'userId' => $this->session->userdata('id'),
			'status' => 1
		);
		return $query = $this->db->where('id', $id)->update('usedbooks', $data);
	}

	#...Delete book
	public function delete_book($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('books');
	}

	public function delete_usedbook($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('usedbooks');
	}

	#...Get pending books
	public function pending_books()
	{	
		/*=== SQL join ===*/
		$this->db->select('books.*, users.name, category.category');
		$this->db->from('books');
		$this->db->join('category', 'books.categoryId = category.id');
		$this->db->join('users', 'books.userId = users.id'); //Join 3rd table

		$this->db->order_by('books.id', 'DESC');
		$this->db->where('books.status', '0');
		$query = $this->db->get();
		return $query->result();
	}

	#...Published books
	public function published_books($id, $data)
	{
		
		$data = array(
			'status' => 1
		);

		return $query = $this->db->where('id', $id)->update('books', $data);
	}

	#...Get all orders
	public function get_orders()
	{
		$this->db->order_by('orderId', 'DESC');
		$query = $this->db->get('orders');
		return $query->result();
	}

	public function get_tborders()
	{
		$this->db->order_by('tborderId', 'DESC');
		$query = $this->db->get('tborders');
		return $query->result();
	}

	#...Get order details
	public function get_order_detail($orderId)
	{
		$this->db->select('orders.*, users.name');
		$this->db->from('orders');
		$this->db->join('users', 'orders.userId = users.id');
		$this->db->where('orders.orderId', $orderId);
		$query = $this->db->get();
		return $query->row();
	}

	#...Accept orders
	public function accept_order($orderId, $data)
	{
		
		$data = array(
			'status' => 1
		);

		return $query = $this->db->where('orderId', $orderId)->update('orders', $data);
	}

	#...Delete order
	public function delete_order($orderId)
	{
		$this->db->where('orderId', $orderId);
		$this->db->delete('orders');
	}

	

	#...Get all orders ready to deliver
	public function get_orders_to_deliver()
	{
		$this->db->order_by('orderId', 'DESC');
		$this->db->where('status', '1');
		$query = $this->db->get('orders');
		return $query->result();
	}

	#...Get all 3B orders ready to deliver
	public function get_tborders_to_deliver()
	{
		$this->db->order_by('tborderId', 'DESC');
		$this->db->where('usercount', '3');
		$query = $this->db->get('tborders');
		return $query->result();
	}
	#...Confirm order delivery
	public function confirm_delivery($orderId, $data)
	{
		
		$data = array(
			'del_status' => 1
		);

		return $query = $this->db->where('orderId', $orderId)->update('orders', $data);
	}

	#...cancel order delivery
	public function cancle_delivery($orderId, $data)
	{
		
		$data = array(
			'del_status' => 0
		);

		return $query = $this->db->where('orderId', $orderId)->update('orders', $data);
	}

	#...Confirm tborder delivery
	public function tbconfirm_delivery($tborderId, $data)
	{
		
		$data = array(
			'del_status' => 1
		);

		return $query = $this->db->where('tborderId', $tborderId)->update('tborders', $data);
	}

	#...cancel tborder delivery
	public function tbcancel_delivery($tborderId, $data)
	{
		
		$data = array(
			'del_status' => 0
		);

		return $query = $this->db->where('tborderId', $tborderId)->update('tborders', $data);
	}

	#admin details
	public function get_user_details($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		return $query->row();
	}

	public function edit_profile($id, $data)
	{
		$options = ['cost'=> 12];
		$encripted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);

		$data = array(
			'name'	=> $this->input->post('name'),
			'contact'	=> $this->input->post('contact'),
			'address'	=> $this->input->post('address'),
			'city'	=> $this->input->post('city'),
			'password' => $encripted_pass,

		);

		return $query = $this->db->where('id', $id)->update('users', $data);
	}


}

?>

