<?php
	session_start();
	function add($task){
		$num =count($_SESSION['todo'])+1;
		$task = array(
			"id"=>$num,
			"name"=> $task,
			"check"=>"f",
		);
		array_push($_SESSION['todo'], $task);
	}

	function display(){
		$list ="";
		foreach($_SESSION['todo'] as $k=>$arr)
		{
			if($arr['check']=='f'){
				$list.="<form action ='' method=GET><li><h4> <input type=hidden name=id value=".$k.">><input type=checkbox name=action value=check onChange=this.form.submit()><label><h3 style=width:60px%>".$arr['name']."</h3><a  &nbsp&nbsp href=todo.php?id=" .$k. "&action=edit&val=". $arr['name']. ">edit&nbsp&nbsp</a><a href=todo.php?id=" .$k. "&action=delete>delete</a></h4></li></form>";
			}
			echo $list;
			}
		}
	function display2(){
			$list ="";
			foreach($_SESSION['todo'] as $k=>$arr){
				if($arr['check']=="t"){
					$list.="<li><input type=checkbox checked><label>" .$arr['name']. "</label><input type=text><button class=edit>Edit</button><button class=delete>Delete</button></li>";
				}
			}
			echo $list;

		}

		function delete($id)
		{
			foreach($_SESSION['todo'] as $k=>$arr){
				if($k==$id){
					unset($_SESSION['todo'][$k]);
						}
					}
				}	
	function gettsk($id)
	{
		foreach($_SESSION['todo'] as $k=>$arr){
			if($k==$id){
				echo $arr['name'];
					}
				}
			}
	function complete($id){
		foreach($_SESSION['todo'] as $k=>$arr){
			if($k==$id){
				$_SESSION['todo'][$k]['check']= "t";
			}
		}
	}
	function update($id){
		foreach($_SESSION['todo'] as $k=>$arr){
			if($k==$id){
				delete($id);
				add($arr['id']);
				}
			}
		}
?>