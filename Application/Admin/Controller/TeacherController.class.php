<?php

/**
 * @Author: ND01
 * @Date:   2018-05-12 16:37:01
 * @Last Modified by:   ND01
 * @Last Modified time: 2018-05-21 10:08:52
 */
namespace Admin\Controller;
use Think\Controller;
// use PHPExcel_IOFactory;
// use PHPExcel;
// use Behavior;
class TeacherController extends Controller{
	//学院添加
	public function school_add(){
		if(IS_POST){
			$post = I('post.sname');
			//dump($post);die;
			$model = M('School');
			//$data['sname'] = $post;
			$model -> sname = $post;
			$result = $model -> add();
			if($result){
				$this -> success('添加成功',U('school_showList'),3);
			}else{
				$this -> error('添加失败');
			}
		}else{
			$this -> display();
		}
	}
	//学院列表
	public function school_showList(){
		$model = M('School');
		$data = $model -> order('id asc') -> select();
		$this -> assign('data',$data);
		$this -> display();
	}
	//学院编辑
	public function school_edit(){
		if(IS_POST){
			$post = I('post.');
			$model = M('School');
			//$model -> id = $post.id; 
			//$model -> sname = $post.sname;
			$result = $model -> save($post);
			//dump($post);die;
			if($result !== false){
				$this -> success('修改成功',U('school_showList',3));
			}else{
				$this -> error('修改失败');
			}
		}else{
			$id = I('get.id');
			$model = M('School');
			$info = $model -> find($id);
			//dump($info);
			//$info = $data['sname'];
			//$this -> assign('data',$data);
			$this -> assign('info',$info);
			//dump($id);die;
			$this -> display();
		}	
	}
	//学院删除
	public function school_del(){
		$id = I('get.id');
		$model = M('School');
		$result = $model -> delete($id);
		if($result){
			$this -> success('删除成功..');
		}else{
			$this -> error('删除失败..');
		}
	}
	public function profession_add(){
		if(IS_POST){
			$name = I('post.sname');
			$pname = I('post.pname');
			//dump($post);
			$model = M('Profession');
			$model1 = M('School');
			//$where['sname'] = $data;
			//$map['sname'] = array('eq',$data);
			$id = $model1 -> field(id) -> where("sname = '$name'") -> find();
			$iid = $id['id'];
			//dump($iid);die;
			//echo $model1 -> _sql();
			$model -> pname = $pname;
			$model -> id = $iid;
			$result = $model -> add();
			//echo $model -> _sql();
			if($result){
				$this -> success('添加成功',U('profession_showList'),3);
			}else{
				$this -> error('添加失败');
			}
		}else{
			$model = M('School');
			$data = $model -> select();
			$this -> assign('data',$data);
			$this -> display();
		}
	}
	//专业列表
	public function profession_showList(){
		$model = M('Profession');
		$data = $model -> order('pid asc') -> select();
		$this -> assign('data',$data);
		$this -> display();
	}
	//专业编辑
	public function profession_edit(){
		if(IS_POST){
			$pid = I('post.pid');
			$pname = I('post.pname');
			$sname = I('post.sname');
			// dump($pid);
			// dump($pname);
			// dump($sname);die;
			//$pname = $post.sname;
			//dump($pname);
			//dump($post);
			$model = M('Profession');
			$model1 = M('School');
			//$where['sname'] = $data;
			//$map['sname'] = array('eq',$data);
			$id = $model1 -> field(id) -> where("sname = '$sname'") -> find();
			$iid = $id['id'];
			//$model = M('Profession');
			$model -> pid = $pid; 
			$model -> pname = $pname;
			$model -> id = $iid;
			$result = $model -> save();
			//dump($post);die;
			if($result !== false){
				$this -> success('修改成功',U('profession_showList',3));
			}else{
				$this -> error('修改失败');
			}
		}else{
			$id = I('get.id');
			$model = M('Profession');
			$model1 = M('School');
			$info = $model -> find($id);
			$data = $model1 -> select();
			$sid = $info['id'];
			$sname = $model1 -> field('sname') -> where("id = '$sid'") -> find();
			//echo $model1 -> _sql();
			$ssname = $sname['sname'];
			//dump($ssname);
			//$info = $data['sname'];
			$this -> assign('data',$data);
			$this -> assign('ssname',$ssname);
			$this -> assign('info',$info);
			//dump($id);die;
			$this -> display();
		}	
	}
	//专业删除
	public function profession_del(){
		$id = I('get.id');
		$model = M('Profession');
		$result = $model -> delete($id);
		if($result){
			$this -> success('删除成功..');
		}else{
			$this -> error('删除失败..');
		}
	}
	//班级添加
	public function class_add(){
		if(IS_POST){
			$name = I('post.cname');
			$pname = I('post.pname');
			//dump($post);
			$model = M('Class');
			$model1 = M('Profession');
			//$where['sname'] = $data;
			//$map['sname'] = array('eq',$data);
			$id = $model1 -> field(pid) -> where("pname = '$pname'") -> find();
			$iid = $id['pid'];
			//dump($iid);die;
			//echo $model1 -> _sql();
			$model -> cname = $name;
			$model -> pid = $iid;
			$result = $model -> add();
			//echo $model -> _sql();
			if($result){
				$this -> success('添加成功',U('class_showList'),3);
			}else{
				$this -> error('添加失败');
			}
		}else{
			$model = M('Profession');
			$data = $model -> select();
			$this -> assign('data',$data);
			$this -> display();
		}
	}
	//专业列表
	public function class_showList(){
		$model = M('Class');
		$data = $model -> order('pid asc') -> select();
		$this -> assign('data',$data);
		$this -> display();
	}
	//专业编辑
	public function class_edit(){
		if(IS_POST){
			$cid = I('post.cid');
			$cname = I('post.cname');
			$pname = I('post.pname');
			// dump($cid);
			// dump($cname);
			// dump($pname);
			//$pname = $post.sname;
			//dump($pname);
			//dump($post);
			$model = M('Class');
			$model1 = M('Profession');
			//$where['sname'] = $data;
			//$map['sname'] = array('eq',$data);
			$id = $model1 -> field(pid) -> where("pname = '$pname'") -> find();
			$iid = $id['pid'];
			//echo $model1 ->_sql();
			//dump($id);die;
			//$model = M('Profession');
			$model -> cid = $cid; 
			$model -> cname = $cname;
			$model -> pid = $iid;
			$result = $model -> save();
			//echo $model ->_sql();die;
			if($result !== false){
				$this -> success('修改成功',U('class_showList',3));
			}else{
				$this -> error('修改失败');
			}
		}else{
			$id = I('get.id');
			$model = M('Class');
			$model1 = M('Profession');
			$info = $model -> find($id);
			$data = $model1 -> select();
			$pid = $info['pid'];
			//dump($pid);
			$pname = $model1 -> field('pname') -> where("pid = '$pid'") -> find();
			//echo $model1 -> _sql();
			$ppname = $pname['pname'];
			//dump($ssname);
			//$info = $data['sname'];
			$this -> assign('data',$data);
			$this -> assign('ppname',$ppname);
			$this -> assign('info',$info);
			//dump($id);die;
			$this -> display();
		}	
	}
	//专业删除
	public function class_del(){
		$id = I('get.id');
		$model = M('Class');
		$result = $model -> delete($id);
		if($result){
			$this -> success('删除成功..');
		}else{
			$this -> error('删除失败..');
		}
	}
	public function student_test(){
		$this -> display();
	}
	public function upload() {
		ini_set('memory_limit','1024M');
		if (!empty($_FILES)) {
			$config = array(
				'exts' => array('xlsx','xls'),
				'maxSize' => 3145728000,
				'rootPath' =>"./Public/",
				'savePath' => 'Uploads/',
				'subName' => array('date','Ymd'),
			);
			$upload = new \Think\Upload($config);
			if (!$info = $upload->upload()) {
				$this->error($upload->getError());
			}
			vendor("PHPExcel.PHPExcel");
			$file_name=$upload->rootPath.$info['photo']['savepath'].$info['photo']['savename'];
			$extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
			//判断导入表格后缀格式
			if ($extension == 'xlsx') {
				$objReader =\PHPExcel_IOFactory::createReader('Excel2007');
				$objPHPExcel =$objReader->load($file_name, $encode = 'utf-8');
			} else if ($extension == 'xls'){
				$objReader =\PHPExcel_IOFactory::createReader('Excel5');
				$objPHPExcel =$objReader->load($file_name, $encode = 'utf-8');
			}
			$sheet =$objPHPExcel->getSheet(0);
			$highestRow = $sheet->getHighestRow();//取得总行数
			$highestColumn =$sheet->getHighestColumn(); //取得总列数
			D('student')->execute('truncate table jifen_student');
			for ($i = 2; $i <= $highestRow; $i++) {
				//看这里看这里,前面小写的a是表中的字段名，后面的大写A是excel中位置
				$data['stid'] =$objPHPExcel->getActiveSheet()->getCell("A" . $i)->getValue();
				$data['password'] =$objPHPExcel->getActiveSheet()->getCell("B" .$i)->getValue();
				$data['stname'] =$objPHPExcel->getActiveSheet()->getCell("C" .$i)->getValue()		;
				$data['cid'] = $objPHPExcel->getActiveSheet()->getCell("D". $i)->getValue(		);
				//看这里看这里,这个位置写数据库中的表名
				
				D('student')->add($data);
			}
			$this->success('导入成功!');
		} else {
			$this->error("请选择上传的文件");
		}
	}
	//学生增删改查
	public function student_add(){
		if(IS_POST){
			//$data = I('post.');
			$stid = I('post.stid');
			$password = I('post.password');
			$stname = I('post.stname');
			$cname = I('post.cname');
			//dump($data);
			$model = M('Student');
			$model1 = M('Class');
			//$where['sname'] = $data;
			//$map['sname'] = array('eq',$data);
			$id = $model1 -> field(cid) -> where("cname = '$cname'") -> find();
			$iid = $id['cid'];
			//dump($iid);die;
			//echo $model1 -> _sql();
			$model -> stid = $stid;
			$model -> password = $password;
			$model -> stname = $stname;
			$model -> cid = $iid;
			$result = $model -> add();
			//echo $model -> _sql();
			if($result){
				$this -> success('添加成功',U('student_showList'),3);
			}else{
				$this -> error('添加失败');
			}
		}else{
			$model = M('Class');
			$data = $model -> select();
			$this -> assign('data',$data);
			$this -> display();
		}
	}
	//学生列表
	public function student_showList(){
		$model = M('Student');
		$data = $model -> order('cid asc') -> select();
		//dump($data);
		$this -> assign('data',$data);
		$this -> display();
	}
	//学生信息编辑
	public function student_edit(){
		if(IS_POST){
			$id1 = I('post.id');
			$stid = I('post.stid');
			$password = I('post.password');
			$stname = I('post.stname');
			$cname = I('post.cname');
			// $post = I('post.');
			// dump($post);die;
			//dump($id);
			// dump($cname);
			// dump($pname);
			//$pname = $post.sname;
			//dump($pname);
			//dump($post);
			$model = M('Student');
			$model1 = M('Class');
			//$where['sname'] = $data;
			//$map['sname'] = array('eq',$data);
			$id = $model1 -> field(cid) -> where("cname = '$cname'") -> find();
			$iid = $id['cid'];
			//echo $model1 ->_sql();
			//dump($id);die;
			//$model = M('Profession');
			$model -> id = $id1;
			$model -> stid = $stid; 
			$model -> password = $password;
			$model -> stname = $stname;
			//$model -> password = $password;
			$model -> cid = $iid;
			$result = $model -> save();
			echo $model -> _sql();
			//dump($model);
			if($result !== false){
				$this -> success('修改成功',U('student_showList',3));
			}
			//else{
			// 	$this -> error('修改失败');
			// }
		}else{
			$id = I('get.id');
			$model = M('Student');
			$model1 = M('Class');
			$info = $model -> find($id);
			$data = $model1 -> select();
			$cid = $info['cid'];
			//dump($pid);
			$cname = $model1 -> field('cname') -> where("cid = '$cid'") -> find();
			//echo $model1 -> _sql();
			$ccname = $cname['cname'];
			//dump($ccname);
			//$info = $data['sname'];
			$this -> assign('data',$data);
			$this -> assign('ccname',$ccname);
			$this -> assign('info',$info);
			//dump($id);die;
			$this -> display();
		}	
	}
	//学生删除
	public function student_del(){
		$id = I('get.id');
		$model = M('Student');
		$result = $model -> delete($id);
		if($result){
			$this -> success('删除成功..');
		}else{
			$this -> error('删除失败..');
		}
	}	
	public function teacher_add(){
		if(IS_POST){
			//$data = I('post.');
			$tid = I('post.tid');
			$password = I('post.password');
			$tname = I('post.tname');
			$sname = I('post.sname');
			//dump($data);
			$model = M('Teacher');
			$model1 = M('School');
			//$where['sname'] = $data;
			//$map['sname'] = array('eq',$data);
			$id = $model1 -> field(id) -> where("sname = '$sname'") -> find();
			$iid = $id['id'];
			//dump($iid);die;
			//echo $model1 -> _sql();
			$model -> tid = $tid;
			$model -> password = $password;
			$model -> tname = $tname;
			$model -> id = $iid;
			$result = $model -> add();
			//echo $model -> _sql();
			if($result){
				$this -> success('添加成功',U('Teacher_showList'),3);
			}else{
				$this -> error('添加失败');
			}
		}else{
			$model = M('School');
			$data = $model -> select();
			$this -> assign('data',$data);
			$this -> display();
		}
	}
	//学生列表
	public function teacher_showList(){
		$model = M('Teacher');
		$data = $model ->  select();
		//dump($data);
		$this -> assign('data',$data);
		$this -> display();
	}
	//学生信息编辑
	public function teacher_edit(){
		if(IS_POST){
			$id1 = I('post.ttid');
			$tid = I('post.tid');
			$password = I('post.password');
			$tname = I('post.tname');
			$sname = I('post.sname');
			// $post = I('post.');
			// dump($post);die;
			//dump($id);
			// dump($cname);
			// dump($pname);
			//$pname = $post.sname;
			//dump($pname);
			//dump($post);
			$model = M('Teacher');
			$model1 = M('School');
			//$where['sname'] = $data;
			//$map['sname'] = array('eq',$data);
			$id = $model1 -> field(id) -> where("sname = '$sname'") -> find();
			$iid = $id['id'];
			//echo $model1 ->_sql();
			//dump($id);die;
			//$model = M('Profession');
			$model -> ttid = $id1;
			$model -> tid = $tid; 
			$model -> password = $password;
			$model -> tname = $tname;
			//$model -> password = $password;
			$model -> id = $iid;
			$result = $model -> save();
			//echo $model -> _sql();die;
			//dump($model);
			if($result !== false){
				$this -> success('修改成功',U('teacher_showList',3));
			}
			else{
				$this -> error('修改失败');
			}
		}else{
			$id = I('get.id');
			// dump($id);
			$model = M('Teacher');
			$model1 = M('School');
			$info = $model -> find($id);
			$data = $model1 -> select();
			$id = $info['id'];
			//dump($info);
			$sname = $model1 -> field('sname') -> where("id = '$id'") -> find();
			//echo $model1 -> _sql();
			$ssname = $sname['sname'];
			//dump($ssname);
			//$info = $data['sname'];
			$this -> assign('data',$data);
			$this -> assign('ssname',$ssname);
			$this -> assign('info',$info);
			//dump($id);die;
			$this -> display();
		}	
	}
	//学生删除
	public function teacher_del(){
		$id = I('get.id');
		$model = M('Teacher');
		$result = $model -> delete($id);
		if($result){
			$this -> success('删除成功..');
		}else{
			$this -> error('删除失败..');
		}
	}
	public function teacher_update(){
		if(IS_POST){
			$post = I('post.');
			$newpassword1 = I('post.newpassword1');
			$newpassword2 = I('post.newpassword2');
			unset($post['newpassword1']);
			unset($post['newpassword2']);
			$model = M('Teacher');
			$data = $model -> where($post) -> find();
			//echo $model ->_sql();
			//dump($data);die;
			if($data){
				if($newpassword1 == $newpassword2){
					$id = $data['id'];
					$model -> password = $newpassword1;
					$info = $model -> save();
					//echo $model -> _sql();die;
					$this -> success('修改密码成功..',U('teacher_showList'),3);
				}else{
					$this -> error('您输入的新密码不一致..',U('teacher_update'),3);
				}
			}else{
				$this -> error('您输入的职工号或者密码错误..',U('teacher_update'),3);
			}
		}else{
			$this -> display();
		}
	}	
	public function shenhe(){
		if(IS_POST){
			$post = I('post.');
			echo $post;
		}else{
			$this -> display();
		}
	}
	public function shenhe_student(){
		if(IS_POST){
			$post = I('post.stid');
			//echo $post;die;
			$model = M('Detail');
			$result = $model ->where($post) -> find();
			if($result){
				$this -> assign('result',$result);
				$this -> success('查找成功..','shenhe_showList1',3);
			}else{
				$this -> error('你输入的学号不存在或尚未提交记录..',U('shenhe_student'),3);
			}
		}else{
			$this -> display();
		}
	}
	public function shenhe_students(){

	}
}