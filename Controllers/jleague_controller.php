<?php 

require_once(ROOT_PATH.'/models/Confirm.php');
require_once(ROOT_PATH.'/models/Validation.php');
require_once(ROOT_PATH.'/models/Complete.php');
require_once(ROOT_PATH.'/models/Complete_register.php');
require_once(ROOT_PATH.'/models/Confirm_register.php');
require_once(ROOT_PATH.'/models/Login.php');
require_once(ROOT_PATH.'/models/Login_admin.php');
require_once(ROOT_PATH.'/models/Post_register.php');
require_once(ROOT_PATH.'/models/Delete_master.php');
require_once(ROOT_PATH.'/models/Edit.php');
require_once(ROOT_PATH.'/models/User_master.php');
require_once(ROOT_PATH.'/models/Edit_master_user.php');
require_once(ROOT_PATH.'/models/Delete_master_user.php');
require_once(ROOT_PATH.'/models/Comment_register.php');
require_once(ROOT_PATH.'/models/Edit_mypage.php');
require_once(ROOT_PATH.'/models/Comment_edit.php');
require_once(ROOT_PATH.'/models/Delete_comment.php');
require_once(ROOT_PATH.'/models/Search.php');
require_once(ROOT_PATH.'/models/Password_reset.php');
require_once(ROOT_PATH.'/models/Ajax.php');


class jleague_controller{

	public function __construct(){
		
		$this->request['get']=$_GET;
		$this->request['post']=$_POST;

		$this->Confirm=new Confirm();
		$this->Confirm_register=new Confirm_register();
		$this->Validation=new Validation();
		$this->Complete=new Complete();
		$this->Complete_register=new Complete_register();
		$this->Login=new Login();
		$this->Login_ad=new Login_ad();
		$this->Post_comp=new Post_comp();
		$this->Delete=new Delete();
		$this->Edit=new Edit();
		$this->User_master=new User_master();
		$this->Edit_user_master=new Edit_master_user();
		$this->Delete_user_master=new Delete_user_master();
		$this->Comment_register=new Comment_register();
		$this->Mypage_editupdate=new Edit_mypage();
		$this->Comment_edit=new Comment_edit();
		$this->Comment_delete=new Delete_comment();
		$this->Search=new Search();
		$this->Password_reset=new Password_reset();
		$this->Ajax_email=new Ajax_email();
		

	}
	
	public function conf(){
		$conf_f=$this->Confirm->conf_form();//???????????????????????????	
	}
	
	public function vali(){
		$validate=$this->Validation->validate();//?????????????????????
	}
	
	public function send(){
		$comp=$this->Complete->send_form();//??????????????????????????????
	}

	public function conf_regi(){
		$conf_regi=$this->Confirm_register->conf_register();//????????????????????????
	}

	public function send_regi(){
		$comp_regi=$this->Complete_register->send_register();//????????????????????????
	}
	
	public function login(){
		$login=$this->Login->login();//??????????????????
	}
	
	public function login_ad(){
		$login_ad=$this->Login_ad->login_admin();//???????????????????????????
	}
	
	public function post_comp(){
		$post_comp=$this->Post_comp->post_comp();//??????????????????
	}
	
	public function post_display(){
		$post_display=$this->Post_comp->findall();//????????????????????????????????????
		$params=array('post_display'=>$post_display);
		return $params;	
	}
	
	public function del_id(){	
		$del_id=$this->Delete->delete();//???????????????
	}
	
	public function view(){
		$view=$this->Post_comp->findById($this->request['get']['p_id']);
		$params=array('view'=>$view);//????????????????????????
		return $params;	
	}

	public function view_e(){
		$view_e=$this->Post_comp->findById($this->request['get']['edit_id']);
		$params=array('view_e'=>$view_e);//????????????????????????
		return $params;	
	}

	
	public function view_p(){
		$view=$this->Post_comp->findById($this->request['get']['p_id']);
		$params=array('view'=>$view);//????????????????????????
		return $params;	
	}

	
	public function edit_id(){
		$edit=$this->Edit->editUpdate();//???????????????
	}
	
	public function user_master(){
		$user_master=$this->User_master->userall();//??????????????????????????????????????????	
		$params=array('user_master'=>$user_master);
		return $params;
	}
	
	public function view_master_user(){
		$view=$this->User_master->findline($this->request['get']['u_id']);//??????????????????
		$params=array('view'=>$view);
		return $params;	
	}
	
	public function u_m_edit(){
		$u_m_edit=$this->Edit_user_master->editUpdate_master_user();//???????????????????????????????????????
	}
	
	public function u_m_delete(){
		$d_user=$this->Delete_user_master->delete();//???????????????????????????????????????	
	}
	
	public function comment(){
		$comment=$this->Comment_register->comment_reg();//?????????????????????????????????????????????
	}
	
	public function findcomment(){
		$comment=$this->Post_comp->findcomment();
		$params=array('comment'=>$comment);//????????????????????????
		return $params;	
	}
	
	public function findBycomment(){
		$comment=$this->Comment_edit->findBycomment($this->request['get']['edit_id']);
		$params=array('comment'=>$comment);//??????????????????????????????
		return $params;
	}

	public function mypage_edit(){
		$view=$this->User_master->findline($this->request['get']['edit_id']);//????????????????????????????????????????????????????????????
		$params=array('view'=>$view);
		return $params;	
	}

	public function mypage_editupdate(){
		$mypage_up_edit=$this->Mypage_editupdate->editUpdate_mypage();//???????????????????????????????????????????????????
	}

	public function comment_editupdate(){
		$comment_up_edit=$this->Comment_edit->comment_edit_comp();//?????????????????????????????????
	}
	
	public function comment_delete(){	
		$comment_delete=$this->Comment_delete->delete_comment();//???????????????
	}
	
	public function search(){
		$search=$this->Search->search();//????????????????????????????????????
		$params=array('search'=>$search);
		return $params;	
	}
	
	public function password_reset(){
		$pass_reset=$this->Password_reset->password_reset();//?????????????????????????????????	
	}
	
	/*public function ajax_email(){
		$ajax_email=$this->Ajax_email->userall();//????????????????????????????????????????????????????????????	
	}*/







}

?>