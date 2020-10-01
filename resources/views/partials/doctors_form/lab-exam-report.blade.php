<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-md-4">
            <input type="text" name="complete_blood_count" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Complete Blood Count" value="{{ count($doctor_form) ? $doctor_form[0]->complete_blood_count : '' }}">
        </div>
        <div class="col-md-4">
            <input type="text" name="urinalysis" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Urinalysis" value="{{ count($doctor_form) ? $doctor_form[0]->urinalysis : '' }}">
        </div>
        <div class="col-md-3">
            <input type="text" name="stool_exam" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Stool Exam" value="{{ count($doctor_form) ? $doctor_form[0]->stool_exam : '' }}">
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <input type="text" name="drug_test" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Drug Test" value="{{ count($doctor_form) ? $doctor_form[0]->drug_test : '' }}">
        </div>
        <div class="col-md-4">
            <input type="text" name="pregnancy_test" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Pregnancy Test" value="{{ count($doctor_form) ? $doctor_form[0]->pregnancy_test : '' }}">
        </div>
        <div class="col-md-3">
            <input type="text" name="hepatitis_test" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Hepatitis Test" value="{{ count($doctor_form) ? $doctor_form[0]->hepatitis_test : '' }}">
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <input type="text" name="blood_chem" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Blood Chem" value="{{ count($doctor_form) ? $doctor_form[0]->blood_chem : '' }}">
        </div>
        <div class="col-md-4">
            <input type="text" name="chest_xray" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Chest X-Ray" value="{{ count($doctor_form) ? $doctor_form[0]->chest_xray : '' }}">
        </div>
        <div class="col-md-3">
            <input type="text" name="ecg" class="form-control-1 form-rounded form-input-1 font-16" placeholder="ECG" value="{{ count($doctor_form) ? $doctor_form[0]->ecg : '' }}">
        </div>
    </div>

    <div class="col-md-12 flex-column d-flex font-20 mt-5">
        <span>Other Examinations</span>
    </div>
    <div class="row mt-4">
        <div class="col-md-11">
            <textarea class="form-control" name="other_examinations" rows="3">{{ count($doctor_form) ? $doctor_form[0]->other_examinations : '' }}</textarea>
        </div>
    </div>

    <div class="col-md-12 flex-column d-flex font-20 mt-5">
        <span>Impressions</span>
    </div>
    <div class="row mt-4">
        <div class="col-md-11">
            <textarea class="form-control" name="impressions" rows="3">{{ count($doctor_form) ? $doctor_form[0]->impressions : '' }}</textarea>
        </div>
    </div>
    
</div>