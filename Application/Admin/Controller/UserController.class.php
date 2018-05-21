<?php

/**
 * @Author: ND01
 * @Date:   2018-05-12 08:50:39
 * @Last Modified by:   ND01
 * @Last Modified time: 2018-05-13 22:14:31
 */
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller{
	public function login(){
		//展示模板
		$this -> display();
	}
	//生成验证码
	public function captcha(){
		$cfg = array(
				'fontSize'   =>    12,
				'imageW'     =>    80,
				'imageH'     =>    38,
				'userCurve'  =>    false,
				'userNoise'  =>    false,
				'length'     =>    4,
				'fontttf'    =>    '4.ttf',
			);
		$verify = new \Think\Verify($cfg);
		$verify -> entry();
	}
	public function checkLogin(){
		$post = I('post.');
		$verify = new \Think\Verify();
		$result = $verify -> check($post['captcha']);
		if($result){
			$model = M('Teacher');
			unset($post['chatcha']);
			$data = $model -> where($post) -> find();
			$tname = $model -> where($post['tid']) ->select(tname);
			//dump($tname);die;
			if($data){
				session('tid',$data['tid']);
				session('tname',$data['tname']);
				$this -> success('登录成功 @ ~ @',U('Index/index'),3);
			}else{
				$this -> error('用户名或密码错误..');
			}
		}else{
			$this -> error('验证码错误..');
		}
	}
}