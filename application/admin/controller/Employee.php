<?php

namespace app\admin\controller;

use think\Controller;
use think\Config;
use think\Db;

class Employee extends Common {
	public $prefix;
	public function __construct() {
		parent::__construct ();
		$config = Config::get ( 'database' );
		$this->prefix = $config ['prefix'];
	}
	
	/**
	 * 员工管理模块的初始页面, 和在列表页面中点击查询按钮
	 * @return 根据查询条件返回到列表页面
	 */
	public function index() {
		$name = trim ( input ( 'name' ) );
		$gender = input ( 'gender' );
		$status = input ( 'status' );
		$education = input ( 'education' );

		if ($name) {
			$map['name'] = $name;
		}
		if($gender){
			$map['gender'] = $gender;
		}
		if($status !=""){
			$map['status']=$status;
		}
		if($education !=""){
			$map['education']=$education;
		}
		if (empty ( $map )) {
			$map = 1;
		}
		$employee_list = db ( 'employee' )->where ( $map )->order ( ' id desc' )->paginate ( 10 );
		$page = $employee_list->render ();
		$this->assign('name', $name);
		$this->assign('gender', $gender);
		$this->assign('status', $status);
		$this->assign('education', $education);
		$this->assign ( 'employee_list', $employee_list );
		$this->assign ( 'page', $page );
		
		return $this->fetch ();
	}
	
	/**
	 * 这是个方法用来添加新员工, 和在列表中点击"添加员工"连接使用.
	 * @author Penny
	 * @return 根据用户的选择,返回到列表页面,或者继续添加新员工.
	 */
	public function add() {
		// 如果是保存用户
		if (request()->isPost()) {
			$data = input('post.');
			$this->add_content($data);
			if (isset($data['dosubmit'])) {
				$this->success('添加成功', 'Employee/index');
			} else {
				$this->success('添加成功');
			}
		} else {
			// 否则是点击"添加员工"连接
			return $this->fetch();
		}
	}
	
	/**
	 * 删除员工
	 * 从前台页面传入 ID
	 * 执行删除
	 */
	public function delete(){
		$data = input('param.');
		if (!isset($data['id']) || empty($data['id'])) {
			$this->error('参数错误');
		}
		
		$id = intval($data['id']);
		if (!$id) {
			$this->error('非法参数');
		}
		
		db('employee')->where('id', $id)->delete();
		$this->success('删除成功');
	}
	
	private function add_content($data)
	{
		if (empty($data['name'])) {
			$this->error('姓名必须填写');
		}
		if (empty($data['age'])) {
			$this->error('年龄必须填写');
		}
		$data['create_id'] = session('fivecms_admin_id');
		db('employee')->insert($data);
		return true;
	}
	
	public function edit(){
		if (request()->isPost()) {
			$data = input('post.');
			$this->edit_content($data);
			$this->success('修改成功', 'Employee/index');
		}else{
			$id = intval($_GET['id']);
			if (!$id) {
				$this->error('非法参数');
			}
			$result= db('employee')->where('id', $id)->find();
			if (!$result) {
				$this->error('员工不存在');
			}
			$this->assign('result', $result);
			return $this->fetch();
		}
		
	}
	
	private function edit_content($data){
		if (empty($data['name'])) {
			$this->error('姓名必须填写');
		}
		if (empty($data['age'])) {
			$this->error('年龄必须填写');
		}
		
		$id = intval($data['id']);
		if (!$id) {
			return false;
		}
		$data['update_id'] = session('fivecms_admin_id');
		$data['update_time'] = date('Y-m-d h:i:s');
		
		db('employee')->where('id', $id)->update($data);
	}
	
}