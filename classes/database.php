<?php

Class Database
{
	
	private $con;

	function __construct()
	{
		$this->con = $this->connect();
	}

	private function connect()
	{	

		$string = "mysql:host=localhost;dbname=social_network"; 
		try
		{
			$connection = new PDO($string,DBUSER,DBPASS);
			return $connection;

		}catch(PDOException $e)
		{
			echo "Erro com banco de dados: ".$e->getMessage();
			die;
		}catch(Exception $e)
		{
			echo "ERRO generico!";
		}

		return false;
	}

	//escrever na base de dados
	public function write($query, $data_array = [])
	{
		
		$con = $this->connect();
		
		$statement = $con->prepare($query);
		$check = $statement->execute($data_array);

		if ($check) 
		{	
			return true;
		}

		return false;
	}

	public function read($query, $data_array = [])
	{
		
		$con = $this->connect();
		
		$statement = $con->prepare($query);
		$check = $statement->execute($data_array);

		if ($check) 
		{
			$result = $statement->fetchAll(PDO::FETCH_OBJ);

			if(is_array($result) && count($result) > 0)
			{	
				
				return $result;
			}

			//else return false
			return false;
		}

		return false;
	}

	public function generate_id()
	{
		$rand = "";
		$rand_count = rand(4, 10);

		for ($i=0; $i < $rand_count; $i++) 
		{ 
			$r = rand(0,5);
			$rand .= $r;
		}

		return $rand;
	}



	public function search_user()
	{

		//echo "<script>alert('ola mundo')</script>";
		
		$con = $this->connect();


		if (isset($_GET['search_btn'])) 
		{
			
			$search_query = htmlentities("%".trim($_GET['search_query'])."%");
			$get_user = "SELECT * FROM admin where username like '%$search_query%' or email like '%$search_query%'";	
		}else{
			$get_user = "SELECT * FROM admin order by username DESC limit 50";
		}

		$run_user = $con->query($get_user);
		$run_user->execute();
		
		while ($row_user = $run_user->fetch(PDO::FETCH_BOTH))
		{
			$mydata = "";
			$username = $row_user['username'];
			$email = $row_user['email'];
			$image = $row_user['image'];
			$gender = $row_user['gender'];

				$image = ($gender == "Male") ? 'assets/images/user_gender_male.jpg' : 'assets/images/user_gender_female.jpg';

				if (file_exists($row_user['image'])) 
				{
					$image = $row_user['image'];
				}

				//displaying all at omce

				echo" 
				

				<div style='text-align:center;'>
			
					<table class='table table-bordered table-hover'>
		                                                              
						<tr>
							<tr>
								<td><style='font-weight: bold;'><img src='$image' style='width: 60px; border:solid thin white; border-radius: 50%; margin-top:-10px;'>
								</td>
								<td>
								<input class='form-control' type='email' name='u_name' required value='$username' readonly>
								</td>
								<td>
								<input class='form-control' type='email' name='u_email' required value='$email' readonly>
								</td>

							</tr> 
						</tr>
					</table>
                   
                </div>
                "; 

		}

	}


	public function search_pensioner()
	{

		//echo "<script>alert('ola mundo')</script>";

		$con = $this->connect();
		if (isset($_GET['search_btn'])) 
		{
			echo "<script>console.log('ola mundo')</script>";
			$search_query = htmlentities("%".trim($_GET['search_query'])."%");

			$get_user = "SELECT * FROM users where f_name like '%$search_query%' or email like '%$search_query%'";	
		}else{
			$get_user = "SELECT * FROM users order by user_name DESC limit 50";
		}

		$run_user = $con->query($get_user);
		$run_user->execute();
		
		while ($row_user = $run_user->fetch(PDO::FETCH_BOTH))
		{

			$f_name = $row_user['f_name'];
			$l_name = $row_user['l_name'];
			$email = $row_user['user_email'];
			//$image = $row_user['image'];
			$gender = $row_user['user_gender'];
			$id = $row_user['user_id'];
			$country = $row_user['user_country'];
			$date = date("jS M, Y", strtotime($row_user['user_reg_date']));


				$image = ($gender == "Male") ? 'assets/images/user_gender_male.jpg' : 'assets/images/user_gender_female.jpg';

				/*if (file_exists($row_user['image'])) 
				{
					$image = $row_user['image'];
				}*/

				//displaying all at omce

				$mydata = " 
				

				<div style='text-align:center;'>
			
					<table class='table table-bordered table-hover'>
		                                                            
							<tr>
								<tr>
								<td><style='font-weight: bold;'><img src='$image' style='width: 60px; border:solid thin white; border-radius: 50%; margin-top:-10px;'>
								</td>
								<td>
								<input class='form-control' type='email' name='u_name' required value='$f_name $l_name' readonly>
								</td>
								<td>
								<input class='form-control' type='email' name='u_email' required value='$email' readonly>
								</td>
								<td>
									<input class='form-control' type='email' name='u_email' required value='$country' readonly>
								</td>
								<td>
									<input class='form-control' type='email' name='u_email' required value='$date' readonly>
								</td>
								</tr>
							</tr>
						
					</table>
                   
                </div>
                "; 

                echo $mydata;
               
		} 

		if($run_user->rowCount() <= 0)
		{
			echo "Nenhum pensionista encontrado...";
		}

	}

	public function excluirPessoa($id)
	{
		$con = $this->connect();

		$cmd = $con->prepare("DELETE FROM admin WHERE id = :id");
		$cmd->bindValue(":id",$id);
		$cmd->execute();
		
	}
	
	public function buscarDadosPessoa($id)
	{	
		$con = $this->connect();
		$res = array();
		$cmd = $con->prepare("SELECT * FROM admin WHERE id = :id");
		$cmd->bindValue(":id",$id);
		$cmd->execute();

		$res = $cmd->fetch(PDO::FETCH_ASSOC);
		return $res;
	}

}

