<?php

/**
 * @Author: ND01
 * @Date:   2018-05-12 11:48:27
 * @Last Modified by:   ND01
 * @Last Modified time: 2018-05-12 16:17:01
 */
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller{
	public function index(){
		$this -> display();
	}
	public function home(){
		$this -> display();
	}
}