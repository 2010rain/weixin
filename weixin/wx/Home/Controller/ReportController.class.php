<?php
	namespace Home\Controller;
	use Think\Controller;
	class ReportController extends Controller{
		function Basketball(){
			$this->display();
		}
		function soccer(){
			$this->display();
		}
		function tennis(){
			$this->display();
		}
	}