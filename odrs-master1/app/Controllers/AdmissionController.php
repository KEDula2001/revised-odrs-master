<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StudentsModel;
use App\Models\CourseModel;
use App\Models\StudentadmissionModel;
use App\Models\ChecklistModel;
use App\Models\RefremarksModel;

class AdmissionController extends BaseController
{
	public function index()
	{
		$getstudent = new StudentsModel;
		$getchecklist = new ChecklistModel;
		$getstudentadmissioncomplete = new StudentadmissionModel;
		$getstudentadmissionincomplete = new StudentadmissionModel;

		$this->data['count_incomplete'] = $getstudentadmissionincomplete->__getIncompleteDocs();
		$this->data['count_complete'] = $getstudentadmissioncomplete->__getCompleteDocs();
		$this->data['students'] = $getstudent->__getStudentDetails();
		$this->data['checklists'] = $getchecklist->__getChecklistDetails();
		// var_dump($this->data['students'])
		if ($this->isAjax()) {
				return view('admissionoffice/admissiondashboard', $this->data);
			}
		echo view('admissionoffice/header', $this->data);
		echo view('admissionoffice/admissiondashboard', $this->data);
		return view('admissionoffice/footer', $this->data);
	}
	public function showStudentForm()
	{
		$getcourses = new CourseModel;
		$this->data['courses'] = $getcourses->__getStudentCourse();

		if ($this->isAjax()) {
				return view('admissionoffice/components/addstudents', $this->data);
			}
		echo view('admissionoffice/header', $this->data);
		echo view('admissionoffice/components/addstudents', $this->data);
		return view('admissionoffice/footer', $this->data);
	}
	public function insertstudent()
	{
		if (! $this->validate([
            'student_number' => 'required|alpha_numeric_punct',
			'firstname' => 'required',
			'lastname' => 'required',
			'middlename' => 'required',
			'email' => 'required|valid_email|is_unique[users.email,id]',
			'course_id' => 'required'
        ])) {

			$getcourses = new CourseModel;

        	echo view('admissionoffice/header');
            return view('admissionoffice/components/addstudents', [
                'errors' => $this->validator->getErrors(),
                'courses' => $getcourses->__getStudentCourse()
            ]);
        	echo view('admissionoffice/footer');
        }
	
			$data = [
						'student_number' => $_POST['student_number'],
						'firstname'  => $_POST['firstname'],
						'lastname'  => $_POST['lastname'],
						'middlename'  => $_POST['middlename'],
						'email' => $_POST['email'],
						'course_id' => $_POST['course_id']
					];

			$res = $this->studentModel->insertStudent($data);

			if ($res) {
				$this->session->setFlashData('success_message', 'Successfully Added Student');
            	return redirect()->to(base_url('admission'));
			}else{
				$this->session->setFlashData('error_message', 'Error');
            	return redirect()->to(base_url('admission/add-student-form'));
			}
	}
	public function showStudentCompleteAdmission()
	{
		$getstudent = new StudentsModel;
		$getstudentadmissioncomplete = new StudentadmissionModel;

		$this->data['count_complete'] = $getstudentadmissioncomplete->__getCompleteDocs();
		$this->data['students'] = $getstudent->__getStudentDetails();

		if ($this->isAjax()) {
				return view('admissionoffice/components/completedstudentdocuments', $this->data);
			}
		echo view('admissionoffice/header', $this->data);
		echo view('admissionoffice/components/completedstudentdocuments', $this->data);
		return view('admissionoffice/footer', $this->data);
	}
	public function insertStudentAdmissionForwarded($id)
	{
		$userID = $id;
		
		if (!empty($_POST['sar_pupcct_resultID'])) {
			$sar_pupcct_resultID = $_POST['sar_pupcct_resultID'];}else{$sar_pupcct_resultID = 0;}	
		if (!empty($_POST['f137ID'])) {
			$f137ID = $_POST['f137ID'];}else{$f137ID = 0;}
		if (!empty($_POST['f138ID'])) {
			$f138ID = $_POST['f138ID'];}else{$f138ID = 0;}	
		if (!empty($_POST['psa_nsoID'])) {
			$psa_nsoID = $_POST['psa_nsoID'];}else{$psa_nsoID = 0;}
		if (!empty($_POST['good_moralID'])) {
			$good_moralID = $_POST['good_moralID'];}else{$good_moralID = 0;}
		if (!empty($_POST['medical_certID'])) {
			$medical_certID = $_POST['medical_certID'];}else{$medical_certID = 0;}
		if (!empty($_POST['picture_two_by_twoID'])) {
			$picture_two_by_twoID = $_POST['picture_two_by_twoID'];}else{$picture_two_by_twoID = 0;}
		if (!empty($_POST['nc_non_enrollmentID'])) {
			$nc_non_enrollmentID = $_POST['nc_non_enrollmentID'];}else{$nc_non_enrollmentID = 0;}
		if (!empty($_POST['coc_hs_shsID'])) {
			$coc_hs_shsID = $_POST['coc_hs_shsID'];}else{$coc_hs_shsID = 0;}
		if (!empty($_POST['ac_pept_alsID'])) {
			$ac_pept_alsID = $_POST['ac_pept_alsID'];}else{$ac_pept_alsID = 0;}
		if (!empty($_POST['cert_dry_sealID'])) {
			$cert_dry_sealID = $_POST['cert_dry_sealID'];}else{$cert_dry_sealID = 0;}
		if (!empty($_POST['admission_status'])) {
			$admission_status = $_POST['admission_status'];}else{$admission_status = 0;}

		$insertstudentadmission = new StudentadmissionModel;

		$is_result = $insertstudentadmission->__getSAMDetails($id);

		if (!empty($is_result)) {
			$res = $insertstudentadmission->updateAdmissionStudents($userID, $sar_pupcct_resultID, $f137ID, $f138ID, $psa_nsoID, $good_moralID, $medical_certID, $picture_two_by_twoID, $nc_non_enrollmentID, $coc_hs_shsID, $ac_pept_alsID, $cert_dry_sealID, $admission_status);
		}else{
			$res = $insertstudentadmission->insertAdmissionStudents($userID, $sar_pupcct_resultID, $f137ID, $f138ID, $psa_nsoID, $good_moralID, $medical_certID, $picture_two_by_twoID, $nc_non_enrollmentID, $coc_hs_shsID, $ac_pept_alsID, $cert_dry_sealID, $admission_status);
		}

 			if ($res) {
				$this->session->setFlashData('success_message', 'Successfully Added Student');
            	if ($res['admission_status'] == 'complete') {
            		return redirect()->to(base_url('admission/complete'));
            	}elseif ($res['admission_status'] == 'incomplete') {
            		return redirect()->to(base_url('admission/notify/'.$res['userID']));
            	}
			}else{
				$this->session->setFlashData('error_message', 'Error');
            	return redirect()->to(base_url('admission'));
			}
	}
	public function showNotifier($id){
		
		$getstudentadmission = new StudentadmissionModel;
		$getchecklist = new ChecklistModel;
		
		$this->data['studentadmission_details'] = $getstudentadmission->__getSAMDetails($id);
		$this->data['checklists'] = $getchecklist->__getChecklistDetails();
		// var_dump($this->data['studentadmission_details']);
		if ($this->isAjax()) {
				return view('admissionoffice/components/notify', $this->data);
			}
		echo view('admissionoffice/header', $this->data);
		echo view('admissionoffice/components/notify', $this->data);
		return view('admissionoffice/footer', $this->data);
	}
	public function sendLackingDocumentstoMail($id)
	{
		$userID = $id;
		if (!empty($_POST['no_dry_seal'])) {
			$no_dry_seal = $_POST['no_dry_seal'];}else{$no_dry_seal = NUll;}	
		if (!empty($_POST['sc_true_copy'])) {
			$sc_true_copy = $_POST['sc_true_copy'];}else{$sc_true_copy = NUll;}
		if (!empty($_POST['sc_pup_remarks'])) {
			$sc_pup_remarks = $_POST['sc_pup_remarks'];}else{$sc_pup_remarks = NUll;}	
		if (!empty($_POST['s_one_photocopy'])) {
			$s_one_photocopy = $_POST['s_one_photocopy'];}else{$s_one_photocopy = NUll;}
		if (!empty($_POST['submit_original'])) {
			$submit_original = $_POST['submit_original'];}else{$submit_original = NUll;}
		if (!empty($_POST['remarks'])) {
			$remarks = $_POST['remarks'];}else{$remarks = NUll;}

		$getrefmodel = new RefremarksModel;

		$res = $getrefmodel->insertSendLackingDocuments($userID, $no_dry_seal, $sc_true_copy, $sc_pup_remarks, $s_one_photocopy, $submit_original, $remarks);

 			if ($res) {
				$this->session->setFlashData('success_message', 'Successfully Added Student');
            	return redirect()->to(base_url('admission'));
			}else{
				$this->session->setFlashData('error_message', 'Error');
            	return redirect()->to(base_url('admission'));
			}
	}
	public function showstudentIncompleteAdmission()
	{
		$getstudent = new StudentsModel;
		$getstudentadmissionincomplete = new StudentadmissionModel;

		$this->data['count_incomplete'] = $getstudentadmissionincomplete->__getIncompleteDocs();
		$this->data['students'] = $getstudent->__getStudentDetails();

		if ($this->isAjax()) {
				return view('admissionoffice/components/incompletestudentdocuments', $this->data);
			}
		echo view('admissionoffice/header', $this->data);
		echo view('admissionoffice/components/incompletestudentdocuments', $this->data);
		return view('admissionoffice/footer', $this->data);
	}
}