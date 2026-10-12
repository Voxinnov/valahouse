<?php 	 
//error_reporting(E_ALL ^ E_DEPRECATED);
	class MySql
	{
		private $dbUser;
		private $dbPass;
		private $dbName;
		private $dbHost;
		private $dbConnection;
		private $errorString;
		private $filter;		
		private $util;
		public static $instance;
		public $query;
		public $newCon;
		public static $connection;
		
		function __construct()
		{
		
			$this->dbConnection	=	null;
			$this->filter		=	true;	
			$this->newCon		=	false;
		}
		
		function setNew()
		{
			$this->newCon	=	true;
		}

		function noFilter()
		{
			$this->filter	=	false;
		}

		/*
		 * Setting Error Message on Db Operation
		 * Input String Message
		 * Called upon db operation
		*/
		
		function setError($string)
		{
			$this->errorString	=	$string;
		}
		
		/*
		 * get Error Message after a db operation
		 * Retrieves the current error Status
		*/
		
		function getError()
		{
			return $this->errorString;
		}

		/*
		 * Internal helper: returns a shared DB connection loaded from config.php
		 * PHP 8.4 compatible – credentials are never hardcoded.
		*/
		private function getConn()
		{
			if (!$this->dbConnection) {
				require_once(CONST_BASEDIR.'/config.php');
				$this->dbHost = $config["databaseHost"];
				$this->dbUser = $config["databaseUser"];
				$this->dbPass = $config["databasePass"];
				$this->dbName = $config["databaseName"];
				$this->dbConnection = mysqli_connect(
					$this->dbHost,
					$this->dbUser,
					$this->dbPass,
					$this->dbName
				);
				if (!$this->dbConnection) {
					$this->setError(mysqli_connect_error());
				} else {
					mysqli_set_charset($this->dbConnection, 'utf8mb4');
				}
			}
			return $this->dbConnection;
		}
		
		/*
		 * Connect to mysqli Database using set up data
		 * Set up data being hold on Constructor
		 * Modify the construct params for connection change
		*/
		
		function connect()
		{
			return $this->getConn() ? true : false;
		}
		
		function getInstance(){
			return $this->getConn();
		}
		
		
		/*  * Close the mysqli Connection		 
		 */
		
		function close()
		{
			if($this->dbConnection)
			{
				mysqli_close($this->dbConnection);
				$this->dbConnection	=	null;
			}
			else
			{
				$this->dbConnection	=	null;
			}
		}	
		
		/*
		 * get All results for an SQL Select Statement
		 * Retrieves the result set values in 2 dimensional array
		 * Parms : query String
		 * Returns Array
		*/
		
		function fetchAll($query)
		{
			$this->query = $query;
			$fields		=	array();
			$resultSet	=	array();
			$row = array();
			
			$conn = $this->getConn();
			$result = mysqli_query($conn, $query);

			if($result)
			{
				$fieldsLength	=	mysqli_num_fields($result);
				$i=0;
				while ($property = mysqli_fetch_field($result)) {
					$fields[$i] = $property->name;
					$i++;
				}
				
				if(mysqli_num_rows($result) > 0)
				{
					$start	=	0;
					while($row = mysqli_fetch_row($result))
					{	
						for($j=0; $j<$fieldsLength; $j++)
						{		
							if($this->filter)
							{
								$resultSet[$start][$fields[$j]]	=	$this->removeFilter($row[$j]);	
							}
							else
							{
								$resultSet[$start][$fields[$j]]	=	$row[$j];				
							}
						}
						$start++;
					}
				}
				mysqli_free_result($result);
			}
			return $resultSet;
		}
		
		/*
		 * mysqli Insert operations
		 * Params $field->value pair , table name
		*/
		
		function insert($options,$table)
		{
			$queryString	=	"";
			$p				=	count($options);
			$start			=	0;
			$fieldString	=	null;
			$valueString	=	null;
			foreach($options as $key=>$val)
			{
				$fieldString.=" `{$key}`";
				$valueString.=" '{$val}' ";
				if($start<$p-1)
				{
					$fieldString.=",";
					$valueString.=",";
				}
				$start++;
			}			
			$queryString	=	"INSERT INTO `{$table}` ({$fieldString}) VALUES ({$valueString}) ";

			$conn	=	$this->getConn();
			$result	=	mysqli_query($conn, $queryString) or $this->setError("Insert".mysqli_error($conn));
		}
		
		
		function insertMulti($fields,$values,$table)
		{
			$queryString	=	"";
			$p				=	count($fields);
			$start			=	0;
			$fieldString	=	null;
			$valueString	=	null;

			foreach($fields as $key=>$val){
				$fieldString.=" `{$val}`";				
				if($start<$p-1){
					$fieldString.=",";					
				}
				$start++;
			}
			
			for($i=0;$i<count($values);$i++){
				$p		=	count($values[$i]);
				$start	=	0;
				$valueString.="(";
				foreach($values[$i] as $key=>$val){
					$valueString.="'{$val}'";				
					if($start<$p-1){
						$valueString.=",";					
					}
					$start++;
				}
				$valueString.=")";
				if($i<count($values)-1){
					$valueString.=",";
				}
			}
			unset($fields);
			unset($values);
			$queryString	=	"INSERT INTO `{$table}` ({$fieldString}) VALUES {$valueString} ";

			$conn	=	$this->getConn();
			$result	=	mysqli_query($conn, $queryString);
		}
		
		
		/*
		 * mysqli Update
		 * Params - field->value pair, table name, update condition
		*/
		
		function update($options,$table,$condition)
		{
			$queryString	=	"";
			$fieldString	=	"";			
			$p				=	count($options);
			$start			=	0;
			foreach($options as $key=>$val){
				$fieldString.=" `{$key}`='{$val}'";
				if($start<$p-1){
					$fieldString.=",";
				}
				$start++;
			}			
			$queryString	=	"UPDATE `{$table}` SET {$fieldString} ";
	
			if(!empty($condition)){
		  		$queryString.=" WHERE {$condition} ";
			}
			$this->query	=	$queryString;
				
			$conn	=	$this->getConn();
			$result	=	mysqli_query($conn, $queryString) or $this->setError(mysqli_error($conn));
		}
		
		/*
		 * mysqli Delete Operation
		 * Params - table name , condition
		*/
		
		function delete($table,$condition)
		{
			$queryString	=	"DELETE FROM `{$table}` ";
			if(!empty($condition))
			{
				$queryString.=" WHERE {$condition} ";
			}
			$conn	=	$this->getConn();
			$result	=	mysqli_query($conn, $queryString) or $this->setError(mysqli_error($conn));
		}
		
		function execute($query){
			$conn	=	$this->getConn();
			$result	=	mysqli_query($conn, $query) or $this->setError(mysqli_error($conn));
		}

		/*
		 * Returns last insert ID		 
		*/
		
		function lastInsertId()
		{
			return mysqli_insert_id($this->getConn());
		}
		
		function affectedRows($instance){
			return mysqli_affected_rows($instance);
		}
		
		/*
		 * Filter with Slash on special chars
		*/
		
		function addFilter($string){
			return addslashes($string);	
		}
		
		/*
		 * Remove added special chars on String 
		*/
		
		function removeFilter($string){			
				return stripslashes($string);			
		}	
		
		
		function escapeHtml($text){
			return strip_tags($text);
		}
		
		
	}


?>