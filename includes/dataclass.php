<?php 

class dataclass{
	public $db;

	public function __construct(){
		$this->db = new DATABASE();
	}


	public function getallcategory(){
		$query = "SELECT * FROM `categories`";
		$data = $this->db->run($query);
		return $data;
	}

	public function getsubcategorybyid($id){
		$query = "SELECT * FROM `sub_category` where cat_id='$id'";
		$data = $this->db->run($query);
		return $data;
	}

	public function getsubsubcategorybyid($id){
		$query = "SELECT * FROM `sub_sub_category` where sub_cat_id='$id'";
		$data = $this->db->run($query);
		return $data;
	}

	public function getinfo(){
		$query = "SELECT * FROM `info`";
		$data = $this->db->run($query);
		return $data;
	}

	public function getlogo(){
		$query = "SELECT * FROM `logo`";
		$data = $this->db->run($query);
		return $data;
	}

	public function getnotice(){
		$query = "SELECT * FROM `notice`";
		$data = $this->db->run($query);
		return $data;
	}

	public function getmainbanner(){
		$query = "SELECT * FROM `main_banner` ORDER by id desc";
		$data = $this->db->run($query);
		return $data;
	}

	public function getproductbycategory($id){
		$query = "SELECT * FROM products where product_cat='$id' limit 12";
		$data = $this->db->run($query);
		return $data;
	}

	public function getcategorybyslug($slug){
		$query = "SELECT * FROM `categories` where cat_slug = '$slug'";
		$data = $this->db->run($query);
		return $data;
	}
	public function getsub_categorybyslug($slug){
		$query = "SELECT * FROM `sub_category` where sub_slug = '$slug'";
		$data = $this->db->run($query);
		return $data;
	}

	public function getsub_sub_categorybyslug($slug){
		$query = "SELECT * FROM `sub_sub_category` where sub_sub_slug = '$slug'";
		$data = $this->db->run($query);
		return $data;
	}

	public function getslugproducts($query){
		$data = $this->db->run($query);
		return $data;
	}

	public function search_result($query){
		$data = $this->db->run($query);
		return $data;
	}

	public function getproductbyslug($slug){
		$query = "SELECT * FROM `products` where product_slug = '$slug'";
		$data = $this->db->run($query);
		return $data;
	}

	public function registration($query){
		$data = $this->db->run($query);
		$data = $this->db->get_last_insert_id();
		return $data;
	}

	public function checkuser($query){
		$data = $this->db->run($query);
		return $data;
	}

	public function login($email,$password){
		$query = "SELECT * from user_info where email = '$email' and password = '$password'";
		$data = $this->db->run($query);
		return $data;
	}

	public function getproductsforcarts($query){
		$data = $this->db->run($query);
		return $data;
	}

	public function getcustomerinfo($id){
		$query = "SELECT * from user_info where user_id='$id'";
		$data = $this->db->run($query);
		return $data;
	}

	public function getordersbyid($id){
		$query = "SELECT *, DATE_FORMAT(date,'%d-%M-%Y') as order_date from orders_info where user_id='$id'";
		$data = $this->db->run($query);
		return $data;
	}

	public function getstoreinfo(){
		$query = "SELECT * FROM `info`";
		$data = $this->db->run($query);
		return $data;
	}

	public function terms(){
		$query = "SELECT * FROM `terms_conditions`";
		$data = $this->db->run($query);
		return $data;
	}

	public function policy(){
		$query = "SELECT * FROM `privacy_policy`";
		$data = $this->db->run($query);
		return $data;
	}
	
	public function getapplink(){
		$query = "SELECT * FROM `app_link`";
		$data = $this->db->run($query);
		return $data;
	}


}
?>