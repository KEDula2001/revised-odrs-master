<div class="modal fade" id="credentialsForm" tabindex="-1" aria-labelledby="credentialsFormLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="credentialsFormLabel">Submission History</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row">
            <div class="col-12">
            
                <input type="checkbox" name="gender" value="SAR">SAR Form/PUPCET Results</input><br>
                <input type="checkbox" name="gender" value="F137">F137</input><br>
                <input type="checkbox" name="gender" value="F138">F138</input><br>
                <input type="checkbox" name="gender" value="BirthCert">PSA/NSO</input><br>
                <input type="checkbox" name="gender" value="GoodMoral">Certificate of Good Moral</input><br>
                <input type="checkbox" name="gender" value="MedClearance">Medical Clearance</input><br>
                <input type="checkbox" name="gender" value="Picture">2x2 Picture</input><br><br>
                Other Documents:<br>
                <input type="checkbox" name="gender" value="F137">Notarized Cert. of Non-enrollment</input><br>
                <input type="checkbox" name="gender" value="SAR">COC (HS/SHS)</input><br>
                <input type="checkbox" name="gender" value="F137">Authenticated Copy PEPT/ALS</input><br>
                <input type="checkbox" name="gender" value="SAR">Certificate with dry seal (No copy of F137A sent</input><br>
                
                
                </form>
                
            </div>
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" style="background-color: gray;" data-bs-dismiss="modal">Close</button>
        <button type="button" id="changePassword" onclick="changePassword()" class="btn" style="background-color: rgb(0, 80, 184);">Save changes</button>
      </div>
    </div>
    <?php
                if (isset($_POST['gender'])){
                echo $_POST['gender']; // Displays value of checked checkbox.
                }
                ?>
  </div>
</div>
