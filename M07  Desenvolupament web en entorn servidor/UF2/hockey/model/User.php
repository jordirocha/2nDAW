<?php

class User
{
	private $id;
	private $email;
	private $password;
	private  $role;
	private $address;
	private  $dni;


	public function __construct($email = "", $password = "", $role = "", $address = "", $dni = "")
	{
		$this->email = $email;
		$this->password = $password;
		$this->role = $role;
		$this->address = $address;
		$this->dni = $dni;
	}

	/**
	 * Get the value of email
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Get the value of password
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Get the value of role
	 */
	public function getRole()
	{
		return $this->role;
	}

	/**
	 * Get the value of address
	 */
	public function getAddress()
	{
		return $this->address;
	}

	/**
	 * Get the value of dni
	 */
	public function getDni()
	{
		return $this->dni;
	}
}
