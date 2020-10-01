<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-2">
            <input type="text" name="height" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Height" value="{{ count($doctor_form) ? $doctor_form[0]->height : '' }}">
        </div>
        <div class="col-md-2">
            <input type="text" name="weight" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Weight" value="{{ count($doctor_form) ? $doctor_form[0]->weight : '' }}">
        </div>
        <div class="col-md-3">
            <input type="text" name="bmi" class="form-control-1 form-rounded form-input-1 font-16" placeholder="BMI" value="{{ count($doctor_form) ? $doctor_form[0]->bmi : '' }}">
        </div>
        <div class="col-md-4">
            <input type="text" name="body_built" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Body Built" value="{{ count($doctor_form) ? $doctor_form[0]->body_built : '' }}">
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-2">
            <input type="text" name="blood_pressure" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Blood Pressure" value="{{ count($doctor_form) ? $doctor_form[0]->blood_pressure : '' }}">
        </div>
        <div class="col-md-2">
            <input type="text" name="pulse_rate" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Pulse Rate" value="{{ count($doctor_form) ? $doctor_form[0]->pulse_rate : '' }}">
        </div>
        <div class="col-md-4">
            <input type="text" name="respiration" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Respiration" value="{{ count($doctor_form) ? $doctor_form[0]->respiration : '' }}">
        </div>
        <div class="col-md-3">
            <input type="text" name="temperature" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Temperature" value="{{ count($doctor_form) ? $doctor_form[0]->temperature : '' }}">
        </div>
    </div>

    <div class="col-md-12 flex-column d-flex font-20 mt-5">
        <span>Visual Acuity</span>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12 ml-3">
                    <span>Left Eye</span>
                    <div class="row mt-4">
                        <div class="col-md-2 flex-column d-flex form-check ml-3">
                            <input type="radio" name="left_eye_corrected" class="form-check-input" value="0" {{ count($doctor_form) && $doctor_form[0]->left_eye_corrected == 0 ? 'checked' : '' }}>
                            <label class="form-check-label">Corrected</label>
                        </div>
                        <div class="col-md-2 flex-column d-flex form-check ml-5">
                            <input type="radio" name="left_eye_corrected" class="form-check-input" value="1" {{ count($doctor_form) && $doctor_form[0]->left_eye_corrected ? 'checked' : '' }}>
                            <label class="form-check-label">Uncorrected</label>
                        </div>
                        <div class="col-md-5 flex-column d-flex form-check ml-5">
                            <input type="text" name="left_eye_fov" class="form-check-input input-bottom-border adjt-5 ml-1" placeholder="Horizontal FoV" value="{{ count($doctor_form) ? $doctor_form[0]->left_eye_fov : '' }}">
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12 ml-3">
                    <span>Right Eye</span>
                    <div class="row mt-4">
                        <div class="col-md-2 flex-column d-flex form-check ml-3">
                            <input type="radio" name="right_eye_corrected" class="form-check-input" value="0" {{ count($doctor_form) && $doctor_form[0]->right_eye_corrected == 0 ? 'checked' : '' }}>
                            <label class="form-check-label">Corrected</label>
                        </div>
                        <div class="col-md-2 flex-column d-flex form-check">
                            <input type="radio" name="right_eye_corrected" class="form-check-input" value="1" {{ count($doctor_form) && $doctor_form[0]->right_eye_corrected == 0 ? 'checked' : '' }}>
                            <label class="form-check-label">Uncorrected</label>
                        </div>
                        <div class="col-md-3 flex-column d-flex form-check ml-4">
                            <input type="text" name="right_eye_fov" class="form-check-input input-bottom-border adjt-5" placeholder="Horizontal FoV" value="{{ count($doctor_form) ? $doctor_form[0]->right_eye_fov : '' }}">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="ishihara" class="form-control-1 form-rounded form-input-1 font-16 adjt-5" placeholder="Ishihara" value="{{ count($doctor_form) ? $doctor_form[0]->ishihara : '' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 flex-column d-flex font-20 mt-4">
        <span>Hearing</span>
    </div>

    <div class="row mt-4">
        <div class="col-md-3">
            <input type="text" name="left_ear" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Left Ear" value="{{ count($doctor_form) ? $doctor_form[0]->left_ear : '' }}">
        </div>
        <div class="col-md-3">
            <input type="text" name="right_ear" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Right Ear" value="{{ count($doctor_form) ? $doctor_form[0]->right_ear : '' }}">
        </div>
        <div class="col-md-5">
            <input type="text" name="clarity_of_speech" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Clarity of Speech" value="{{ count($doctor_form) ? $doctor_form[0]->clarity_of_speech : '' }}">
        </div>
    </div>

    <div class="col-md-12 flex-column d-flex font-20 mt-4">
        <span>Body System</span>
    </div>

    @foreach($bs as $item)
    <div class="row mt-4 justify-content-between border-bottom-1 font-bold font-10">
        <div class="col-md-6 ml-2">
            <span>{{ $item->name }}</span>
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-3 flex-column d-flex form-check ml-3">
                    <input type="radio" name="body_system-{{ $item->id }}" class="body_system form-check-input adjust-radio-1" value="0">
                    <label class="form-check-label">Normal</label>
                </div>
                <div class="col-md-4 flex-column d-flex form-check">
                    <input type="radio" name="body_system-{{ $item->id }}" class="body_system form-check-input adjust-radio-1" value="1">
                    <label class="form-check-label">Findings</label>
                </div>
            </div>
        </div>
    </div>
    @endforeach


    <div class="col-md-12 flex-column d-flex font-20 mt-4">
        <span>Dental</span>
    </div>

    @foreach($dental as $item)
    <div class="row mt-4 justify-content-between border-bottom-1 font-bold font-10">
        <div class="col-md-6 ml-2">
            <span>{{ $item->name }}</span>
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-3 flex-column d-flex form-check ml-3">
                    <input type="checkbox" name="dental-{{ $item->id }}" class="dental form-check-input adjust-radio-1" value="0">
                    <label class="form-check-label">Upper</label>
                </div>
                <div class="col-md-4 flex-column d-flex form-check">
                    <input type="checkbox" name="dental-{{ $item->id }}" class="dental form-check-input adjust-radio-1" value="1">
                    <label class="form-check-label">Lower</label>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>