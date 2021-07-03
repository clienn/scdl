<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-md-3">
            <input type="text" name="me_blood_pressure" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Blood Pressure" value="{{ count($doctor_form) ? $doctor_form[0]->me_blood_pressure : '' }}">
        </div>
        <div class="col-md-2">
            <input type="text" name="me_weight" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Weight" value="{{ count($doctor_form) ? $doctor_form[0]->me_weight : '' }}">
        </div>
        <div class="col-md-2">
            <input type="text" name="me_height" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Height" value="{{ count($doctor_form) ? $doctor_form[0]->me_height : '' }}">
        </div>
        <div class="col-md-2">
            <input type="text" name="me_bmi" class="form-control-1 form-rounded form-input-1 font-16" placeholder="BMI" value="{{ count($doctor_form) ? $doctor_form[0]->me_bmi : '' }}">
        </div>
        <div class="col-md-2">
            <input type="text" name="me_blood_type" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Blood Type" value="{{ count($doctor_form) ? $doctor_form[0]->me_blood_type : '' }}">
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <input type="text" name="me_complete_blood_count" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Complete Blood Count" value="{{ count($doctor_form) ? $doctor_form[0]->me_complete_blood_count : '' }}">
        </div>
        <div class="col-md-4">
            <input type="text" name="me_urinalysis" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Urinalysis" value="{{ count($doctor_form) ? $doctor_form[0]->me_urinalysis : '' }}">
        </div>
        <div class="col-md-3">
            <input type="text" name="me_fecalysis" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Fecalysis" value="{{ count($doctor_form) ? $doctor_form[0]->me_fecalysis : '' }}">
        </div>
    </div>

    <div class="row mt-4">
        
        <div class="col-md-4">
            <input type="text" name="me_chest_xray" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Chest X-ray" value="{{ count($doctor_form) ? $doctor_form[0]->me_chest_xray : '' }}">
        </div>
        <div class="col-md-4">
            <input type="text" name="me_drug_test" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Drug Test" value="{{ count($doctor_form) ? $doctor_form[0]->me_drug_test : '' }}">
        </div>
        <div class="col-md-3">
            <input type="text" name="me_other_tests" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Other Tests" value="{{ count($doctor_form) ? $doctor_form[0]->me_other_tests : '' }}">
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

    <div class="col-md-12 flex-column d-flex font-20 mt-5">
        <span>Classification</span>
    </div>
    <div class="row mt-4">
        <div class="col-md-11">
            <textarea class="form-control" name="impressions" rows="3">{{ count($doctor_form) ? $doctor_form[0]->classification : '' }}</textarea>
        </div>
    </div>
    
</div>