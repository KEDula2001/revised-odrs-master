<section class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0">Dashboard\Completed Student Documents</h1>
          <a href="<?php echo base_url('admission'); ?>" class="btn btn-primary">
            Back
          </a>
  </div>

  <div class="row">
    <div class="col-4"></div>
    <div class="col-4">
      <div class="card pending shadow h-100 py-2">
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
    </div>
    <div class="col-4"></div>
  </div>

  <table class="table table-responsive table-striped table-bordered mt-3 dataTable" style="width:100%">
    <thead class="table-dark">
      <tr>
        <th>Student No.</th>
        <th>Student Name</th>
        <th>Course</th>
        <th>Year Level</th>
        <th>Batch</th>
        <th>Status</th>
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
            <?php if (!empty($res)): ?>
              <?php if ($res['admission_status'] == 'incomplete'): ?>
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
                </tr>
              <?php endif ?>
            <?php endif ?>
        <?php endforeach ?>
      <?php endif ?>
    </tbody>
  </table>
</section>