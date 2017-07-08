<?php 
	
	abstract class ApiLogin
	{
		public function login()
		{
			return $this
				->getEmail()
				->getPassword()
				->getUrl()
				->getToken();
		}

		protected function getEmail()
		{
			var_dump("example@gmail.com");
			return $this;
		}

		protected function getPassword()
		{
			var_dump("secret");
			return $this;
		}

		abstract protected function getUrl();

		protected function getToken()
		{
			var_dump("user token");
		}
	}

	class GithubLogin extends ApiLogin
	{

		protected function getUrl()
		{
			var_dump("http://github.com/kawsardiu");
			return $this;
		}
	}

	class TwitterLogin extends ApiLogin
	{

		public function getUrl()
		{
			var_dump("http://twitter.com/kawsardiu");
			return $this;
		}
	}

	(new GithubLogin())->login();

 ?>