<div class="container" id="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">
              <h3>Hello, <?=esc($_SESSION['name'])?>!</h3>
              <p style="font-style: italic; font-size: .9em;">Request for a copy of your academic related documents.</p>
            </div>
            <div class="col-md-4">
              <table class="table request">
                <tbody>
                  <tr>
                    <td>
                      <a href="<?php echo base_url('studentadmission/view-admission-history/'.$_SESSION['user_id']); ?>" class="btn <?=empty($requests) ? '': 'disabled'?>" disabled> Admission History</a>
                    </td>
                    <td>
                      <a href="requests/new" class="btn <?=empty($requests) ? '': 'disabled'?>" disabled><i class="fas fa-plus"></i> Request document here</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <hr>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h6>Submitted</h6>
                </div>
                <div class="card-body">
                    <?php if (!empty($studentadmission_details['sar_pupcct_resultID'])): ?>
                      <input type="checkbox" value="1" name="sar_pupcct_resultID" checked> SAR Form/PUPCCT Results<br>
                    <?php endif ?>
                    <?php if (!empty($studentadmission_details['f137ID'])): ?>
                      <input type="checkbox" value="1" name="f137ID" checked> F137<br>
                    <?php endif ?>
                    <?php if (!empty($studentadmission_details['f137ID'])): ?>
                      <input type="checkbox" value="1" name="f137ID" checked> F138<br>
                    <?php endif ?>
                    <?php if (!empty($studentadmission_details['psa_nsoID'])): ?>
                      <input type="checkbox" value="1" name="psa_nsoID" checked> PSA/NSO<br>
                    <?php endif ?>
                    <?php if (!empty($studentadmission_details['good_moralID'])): ?>
                      <input type="checkbox" value="1" name="good_moralID" checked> Certification of Good Moral<br>
                    <?php endif ?>
                    <?php if (!empty($studentadmission_details['medical_certID'])): ?>
                      <input type="checkbox" value="1" name="medical_certID" checked> Medical Clearance<br>
                    <?php endif ?>
                    <?php if (!empty($studentadmission_details['picture_two_by_twoID'])): ?>
                      <input type="checkbox" value="1" name="picture_two_by_twoID" checked> 2x2 Picture<br>
                    <?php endif ?>
                    <hr>
                    <label>Other Documents:</label><br>
                    <?php if (!empty($studentadmission_details['nc_non_enrollmentID'])): ?>
                      <input type="checkbox" value="1" name="nc_non_enrollmentID" checked> Notarized Cert of Non-enrollment<br>
                    <?php endif ?>
                    <?php if (!empty($studentadmission_details['coc_hs_shsID'])): ?>
                      <input type="checkbox" value="1" name="coc_hs_shsID" checked> COC (HS/SHS)<br>
                    <?php endif ?>
                    <?php if (!empty($studentadmission_details['ac_pept_alsID'])): ?>
                      <input type="checkbox" value="1" name="ac_pept_alsID" checked> Authenticated Copy PEPT/ALS<br>
                    <?php endif ?>
                    <?php if (!empty($studentadmission_details['cert_dry_sealID'])): ?>
                      <input type="checkbox" value="1" name="cert_dry_sealID" checked> Certificate with dry seal<br>
                    <?php endif ?>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h6>Not Submitted</h6>
                </div>
                <div class="card-body">
                    <?php if (empty($studentadmission_details['sar_pupcct_resultID'])): ?>
                      <i class="fas fa-times" style="color:red;"></i> SAR Form/PUPCCT Results<br>
                    <?php endif ?>
                    <?php if (empty($studentadmission_details['f137ID'])): ?>
                      <i class="fas fa-times" style="color:red;"></i> F137<br>
                    <?php endif ?>
                    <?php if (empty($studentadmission_details['f137ID'])): ?>
                      <i class="fas fa-times" style="color:red;"></i> F138<br>
                    <?php endif ?>
                    <?php if (empty($studentadmission_details['psa_nsoID'])): ?>
                      <i class="fas fa-times" style="color:red;"></i> PSA/NSO<br>
                    <?php endif ?>
                    <?php if (empty($studentadmission_details['good_moralID'])): ?>
                      <i class="fas fa-times" style="color:red;"></i> Certification of Good Moral<br>
                    <?php endif ?>
                    <?php if (empty($studentadmission_details['medical_certID'])): ?>
                      <i class="fas fa-times" style="color:red;"></i> Medical Clearance<br>
                    <?php endif ?>
                    <?php if (empty($studentadmission_details['picture_two_by_twoID'])): ?>
                      <i class="fas fa-times" style="color:red;"></i> 2x2 Picture<br>
                    <?php endif ?>
                    <hr>
                    <label>Other Documents:</label><br>
                    <?php if (empty($studentadmission_details['nc_non_enrollmentID'])): ?>
                      <i class="fas fa-times" style="color:red;"></i> Notarized Cert of Non-enrollment<br>
                    <?php endif ?>
                    <?php if (empty($studentadmission_details['coc_hs_shsID'])): ?>
                      <i class="fas fa-times" style="color:red;"></i> COC (HS/SHS)<br>
                    <?php endif ?>
                    <?php if (empty($studentadmission_details['ac_pept_alsID'])): ?>
                      <i class="fas fa-times" style="color:red;"></i> Authenticated Copy PEPT/ALS<br>
                    <?php endif ?>
                    <?php if (empty($studentadmission_details['cert_dry_sealID'])): ?>
                      <i class="fas fa-times" style="color:red;"></i> Certificate with dry seal<br>
                    <?php endif ?>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h6>Remarks</h6>
                </div>
                <div class="card-body">
                    <?php foreach ($studentadmission_remarks as $key => $value): ?>
                      <?php if(!empty($value['sc_true_copy'])): ?>
                        <i class="fas fa-info"></i> <?php echo $value['no_dry_seal']; ?><br>
                      <?php endif ?>
                      <?php if(!empty($value['sc_true_copy'])): ?>
                        <i class="fas fa-info"></i> <?php echo $value['sc_true_copy']; ?><br>
                      <?php endif ?>
                      <?php if(!empty($value['sc_pup_remarks'])): ?>
                        <i class="fas fa-info"></i> <?php echo $value['sc_pup_remarks']; ?><br>
                      <?php endif ?>
                      <?php if(!empty($value['s_one_photocopy'])): ?>
                        <i class="fas fa-info"></i> <?php echo $value['s_one_photocopy']; ?><br>
                      <?php endif ?>
                      <?php if(!empty($value['submit_original'])): ?>
                        <i class="fas fa-info"></i> <?php echo $value['submit_original']; ?><br>
                      <?php endif ?>
                      <hr>
                      <label>Other Remarks:</label><br>
                      <?php if(!empty($value['other_remarks'])): ?>
                        <i class="fas fa-info"></i> <?php echo $value['other_remarks']; ?><br>
                      <?php endif ?>
                    <?php endforeach ?>
                </div>
              </div>
            </div>
          </div>

          <div align="center">
            <button class="btn btn-danger" disabled>Re-check My Documents</button>
          </div>

        </div>
      </div>
      <div class="card-footer">
          <div class="row">
            <div class="col-md-12">
              <span class="text-muted">
                <strong>REMINDER:</strong>
                <p>
                  <ul class="fst-italic">
                    <li>Requesting of documents should be made during office hours. (Weekdays from 8:00 AM - 5:00 PM only)</li>
                    <li>Make sure that your information and requests are correct before submitting.</li>
                    <li>You may still cancel your requested document if your application is not been approved by the Registrar.</li>
                    <li>Once a request has been submitted, you will be unable to request another document until your requested document is complete.</li>
                  </ul>
                </p>
              </span>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
