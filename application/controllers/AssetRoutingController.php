<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AssetRoutingController extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("ManagementModel");
        $this->load->model("HomeModel");
        $this->load->model("DashBoardModel");
    }

    /* this controller is using for display dashboard details */

    public function index() {

       // $this->userPermissionCheck(1, 1);

        $data['customer_name'] = $this->ManagementModel->getCustomerType();
        $data['branch_name'] = $this->ManagementModel->getBranchype();

        $data['newTaskCount'] = $this->DashBoardModel->newTaskCount();
        $data['pendingTaskCount'] = $this->DashBoardModel->pendingTaskCount();
        $data['progressTaskCount'] = $this->DashBoardModel->progressTaskCount();
        $data['completedTaskCount'] = $this->DashBoardModel->completedTaskCount();
        $data['failedTaskCount'] = $this->DashBoardModel->failedTaskCount();
        $data['cancelledTaskCount'] = $this->DashBoardModel->cancelledTaskCount();

        $data['newIncidentCount'] = $this->DashBoardModel->newIncidentCount();
        $data['pendingIncidentCount'] = $this->DashBoardModel->pendingIncidentCount();
        $data['progressIncidentCount'] = $this->DashBoardModel->progressIncidentCount();
        $data['completedIncidentCount'] = $this->DashBoardModel->completedIncidentCount();
        $data['failedIncidentCount'] = $this->DashBoardModel->failedIncidentCount();
        $data['cancelledIncidentCount'] = $this->DashBoardModel->cancelledIncidentCount();

        $data['newProjectCount'] = $this->DashBoardModel->newProjectCount();
        $data['pendingProjectCount'] = $this->DashBoardModel->pendingProjectCount();
        $data['progressProjectCount'] = $this->DashBoardModel->progressProjectCount();
        $data['completedProjectCount'] = $this->DashBoardModel->completedProjectCount();
        $data['failedProjectCount'] = $this->DashBoardModel->failedProjectCount();
        $data['cancelledProjectCount'] = $this->DashBoardModel->cancelledProjectCount();
        
        $data['fseTaskComplete'] = $this->HomeModel->fseTaskComplete();
        
        $data['menu'] = '';
        $data['title'] = 'DashBoard';
        $data['page'] = 'DashboardView';
        
        
        //$this->userPermissionCheck(1, 1);
        $this->load->view("common/CommonView", $data);
    }
    
    public function assetrouting() {
        $limit=3; 
//        $data['ProjectCount'] =   $this->HomeModel->ProjectCount();   
//        $data['IncidentCount'] =   $this->HomeModel->IncidentCount();  
//        $data['TaskCount'] =   $this->HomeModel->TaskCount();  
//        $data['fseTaskComplete'] =   $this->HomeModel->fseTaskComplete();
//        $data['totalwebuser'] = $this->HomeModel->totalwebuser();
//        $data['totalfse'] = $this->HomeModel->totalfse();
//        $data['totalentity'] = $this->HomeModel->totalentity();
//        $data['totalbranch'] = $this->HomeModel->totalbranch();
//        $data['totalprojectincident'] = $this->HomeModel->totalprojectincident();
        
       // $total=  $data['alluserdetail']=$this->HomeModel->user_list();
        $data['priority']=$this->HomeModel->get_priority_set(); 
        $data['status']=$this->HomeModel->get_status_set(); 
        $data['skillset']=$this->HomeModel->get_skill_set(); 
        //print_r($data['priority']); exit(); 
        $data['totaltask'] = $this->HomeModel->totaltask();
        $data['userdetail']=$this->HomeModel->user_list(); 
      
        $data['menu'] = '';
        $data['title'] = 'DashBoard';
        $data['page'] = 'AssetRoutingView';
        $this->load->view("common/CommonView", $data);
    }
    
    public function filter_ueser()
    {
      
      $data['filters']=$this->input->post();
      $data['priority']=$this->HomeModel->get_priority_set(); 
      $data['status']=$this->HomeModel->get_status_set(); 
      $data['skillset']=$this->HomeModel->get_skill_set();  
      $data['userdetail']= $this->HomeModel->filterdata1();
     // print_r($data['userdetail']);      exit();
      $data['menu'] = '';
      $data['title'] = 'DashBoard';
      $data['page'] = 'AssetRoutingView';
      $this->load->view("common/CommonView", $data);
    }
    public  function shawtask()
    {
     $data["detail"]= $this->HomeModel->getuserdetail();
    $this->load->view('usertasklist',$data);      
    }
    
}
