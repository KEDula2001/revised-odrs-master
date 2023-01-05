<section class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0">Admission Dashboard</h1>
        <!-- Button trigger modal -->
          <a href="<?php echo base_url('admission/add-student-form'); ?>" class="btn btn-primary">
            Add Student
          </a>
  </div>
  <div class="row">
        <!--Complete Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card pending shadow h-100 py-2">
              <div class="card-body">
                  <a href="<?php echo base_url('/admission/complete'); ?>" style="text-decoration: none;">  
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="fw-bold text-success text-uppercase mb-1">
                            Completed
                          </div>
                          <div class="h5 mb-0 fw-bold"><?php echo count($count_complete); ?></div>
                      </div>
                      <div class="col-auto">
                          <i style="color:green;" class="fas fa-check-circle fa-2x"></i>
                      </div>
                    </div>
                  </a>
              </div>
          </div>
      </div>

      <!--Incomplete Card -->
      <div class="col-xl-3 col-md-6 mb-4">
        <a href="<?php echo base_url('/admission/incomplete'); ?>" style="text-decoration: none;">
          <div class="card process shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="fw-bold text-danger text-uppercase mb-1">
                            Incomplete
                          </div>
                          <div class="h5 mb-0 fw-bold text-gray-800"><?php echo count($count_incomplete); ?></div>
                      </div>
                      <div class="col-auto">
                          <i style="color:red;" class="fas fa-times fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
        </a>
      </div>

      <!-- For Re-Checking -->
      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card printed shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="fw-bold text-warning text-uppercase mb-1">
                            For Re-checking  
                          </div>
                          <div class="h5 mb-0 fw-bold"></div>
                      </div>
                      <div class="col-auto">
                          <i style="color:#ffc107!important;" class="fas fa-pause-circle fa-2x"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Retreive Documents -->
      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card complete shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="fw-bold text-info text-uppercase mb-1">
                            Retreived
                          </div>
                          <div class="row no-gutters align-items-center">
                              <div class="col-auto">
                                  <div class="h5 mb-0 mr-3 fw-bold"></div>
                              </div>
                          </div>
                      </div>
                      <div class="col-auto">
                          <i style="color: #0dcaf0! important;" class="fas fa-file-download fa-2x"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

      <?php if (isset($errors['error_message'])): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?=$errors['success_message']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
      <?php endif; ?>

      <div class="table-responsive">
        <table class="table table-striped table-bordered mt-3 dataTable" style="width:100%">
          <thead class="table-dark">
            <tr>
              <th>Student No.</th>
              <th>Student Name</th>
              <th>Course</th>
              <th>Year Level</th>
              <th>Batch</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($students)): ?>
              <?php foreach ($students as $student): ?>
                <?php
                  $id = $student['user_id'];
                                  
                  $getstudentadmission = new App\Models\StudentadmissionModel; 
                                                
                  $res = $getstudentadmission->__getSAMDetails($id);
                ?>
                  <tr>
                    <td><?=esc($student['student_number'])?></td>
                    <td>
                      <?php if (!empty($student['middlename'])): ?>
                        <?=esc(ucwords($student['firstname'].' '.$student['middlename'][0].'. '.$student['lastname']))?>
                      <?php else: ?>
                        <?=esc(ucwords($student['firstname'].' '.$student['lastname']))?>
                      <?php endif ?>
                    </td>
                    <td><?=esc($student['course'])?></td>
                    <td><?=esc($student['year_graduated'])?></td>
                    <td></td>
                    <td>
                        <?php if ($res != NUll): ?>
                          <?php if ($res['admission_status'] == 'complete'): ?>
                            <div class="badge bg-success text-wrap" style="width: 6rem;">
                              <?php echo $res['admission_status']; ?>
                            </div>
                          <?php elseif($res['admission_status'] == 'incomplete'): ?>
                            <div class="badge bg-danger text-wrap" style="width: 6rem;">
                              <?php echo $res['admission_status']; ?>
                            </div>
                          <?php endif ?>
                        <?php else: ?>
                          <div class="badge bg-default text-wrap" style="width: 6rem;color:black;">
                            No Files
                          </div>
                        <?php endif ?>
                    </td>
                    <td class="text-center">
                      <a href="" class="btn btn-edit text-dark btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $student['student_number']; ?>"><i class="fas fa-eye"></i> View </a>                                
                    </td>
                  </tr>

                  <!-- Modal -->
                  <div class="modal fade" id="staticBackdrop<?php echo $student['student_number']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <div class="modal-title" id="staticBackdropLabel"></div>
                            <h5>
                              <?php if (!empty($student['middlename'])): ?>
                              <?=esc(ucwords($student['firstname'].' '.$student['middlename'][0].'. '.$student['lastname']))?>
                              <?php else: ?>
                                <?=esc(ucwords($student['firstname'].' '.$student['lastname']))?>
                              <?php endif ?>
                              <br>
                              <?=esc(ucwords($student['student_number']))?>
                              <br>
                              <?=esc(ucwords($student['abbreviation'].' '.$student['year_graduated']))?>
                            </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          <div class="modal-body">
                            <form action="<?php echo base_url('admission/insert-admission/'.$student['user_id']); ?>" method="post" autocomplete="off">
                              <?php
                                $id = $student['user_id'];
                                                
                                $getstudentadmission = new App\Models\StudentadmissionModel; 
                                                              
                                $res = $getstudentadmission->__getSAMDetails($id);
                              ?>  

                                <input type="checkbox" value="1" name="sar_pupcct_resultID" <?php if(!empty($res['sar_pupcct_resultID'])){echo 'checked';} ?>>SAR Form/PUPCCT Results<br>
                                 <input type="checkbox" value="2" name="f137ID" <?php if(!empty($res['f137ID'])){echo 'checked';} ?>>F137<br>
                                 <input type="checkbox" value="3" name="f138ID" <?php if(!empty($res['f138ID'])){echo 'checked';} ?>>F138<br>
                                 <input type="checkbox" value="4" name="psa_nsoID" <?php if(!empty($res['psa_nsoID'])){echo 'checked';} ?>>PSA/NSO<br>
                                 <input type="checkbox" value="5" name="good_moralID" <?php if(!empty($res['good_moralID'])){echo 'checked';} ?>>Certification of Good Moral<br>
                                 <input type="checkbox" value="6" name="medical_certID" <?php if(!empty($res['medical_certID'])){echo 'checked';} ?>>Medical Clearance<br>
                                 <input type="checkbox" value="7" name="picture_two_by_twoID" <?php if(!empty($res['picture_two_by_twoID'])){echo 'checked';} ?>>2x2 Picture<br>
                                <hr>
                                <label>Other Documents:</label><br>
                                 <input type="checkbox" value="8" name="nc_non_enrollmentID" <?php if(!empty($res['nc_non_enrollmentID'])){echo 'checked';} ?>>Notarized Cert of Non-enrollment<br>
                                  <input type="checkbox" value="9" name="coc_hs_shsID" <?php if(!empty($res['coc_hs_shsID'])){echo 'checked';} ?>>COC (HS/SHS)<br>
                                  <input type="checkbox" value="10" name="ac_pept_alsID" <?php if(!empty($res['ac_pept_alsID'])){echo 'checked';} ?>>Authenticated Copy PEPT/ALS<br>
                                  <input type="checkbox" value="11" name="cert_dry_sealID" <?php if(!empty($res['cert_dry_sealID'])){echo 'checked';} ?>>Certificate with dry seal
                              <br>
                              <br>
                                  
                                <?php if (!empty($res)): ?>
                                  <select class="form-select" name="admission_status" required>
                                      <?php if ($res['admission_status'] == 'complete'): ?>
                                        <option value="complete" active>Complete</option>
                                      <?php else: ?>
                                        <option value="complete">Complete</option>
                                      <?php endif ?>
                                      <?php if ($res['admission_status'] == 'incomplete'): ?>
                                        <option value="incomplete" active>Incomplete</option>
                                      <?php else: ?>
                                          <option value="incomplete">Incomplete</option>
                                      <?php endif ?>
                                  </select>
                                <?php else: ?>
                                  <select class="form-select" name="admission_status" required>
                                    <option >Select Status</option>
                                    <option value="complete">Complete</option>
                                    <option value="incomplete">Incomplete</option>
                                  </select>
                                <?php endif ?>  
                              <br>
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                          </div>
                      </div>
                    </div>
                  </div>

              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
</section>
