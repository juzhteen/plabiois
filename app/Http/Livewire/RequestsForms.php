<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Resident;
use App\Models\Form;
use App\Models\Request;

class RequestsForms extends Component
{

    public $form_name = "Barangay Certification";
    public $form_id;

    public $no_empty_fields = false;
    public $request_sent_successfully = false;

    public $full_name;
    public $years_of_residency;
    public $occupation;
    public $purpose;
    public $date_of_birth;
    public $mother_name;
    public $income;
    public $complainants;
    public $respondents;
    public $invitation_date;
    public $contact_number;

    public $residentQuery, $residentQueryResult;
    public $resident_id;
    public $request_id;

    public function mount()
    {
        $this->residentQuery = "";
        $this->residentQueryResult = [];
    }

    public function render()
    {
        if($this->residentQuery == ""){
            $this->residentQueryResult = [];
        }

        if($this->form_name){
            $form = Form::where("form_name", $this->form_name)->first();
            $this->form_id = $form->form_id;
        }

        return view('livewire.requests.requests-forms');
    }

    public function updatedResidentQuery()
    {
        $this->residentQueryResult = Resident::where("name", "like", "%". $this->residentQuery ."%")->get();
    }

    public function setResidentProfile($resident)
    {
        $this->residentQuery = $resident["name"];
        $this->resident_id = $resident["resident_id"];
        $this->residentQueryResult = [];
        $this->full_name = $resident["name"];
    }

    public function send_request()
    {

        $this->check_fields_if_empty();
        if($this->no_empty_fields){
            Request::updateOrCreate(
                ["request_id" => $this->request_id],
                [
                    "request_id" => $this->request_id,
                    "resident_resident_id" => $this->resident_id,
                    "form_form_id" => $this->form_id,
                    "request_date" => now()->toDateTimeString(),
                    "form_fields" => json_encode($this->generate_fields_in_json())
                ]);
                $this->request_sent_successfully = true;
        }else{
            $this->dispatchBrowserEvent("barangay_certification_empty_fields");
        }
    }

    public function generate_fields_in_json()
    {

        if($this->form_name == "Barangay Certification"){
            $request_name = $this->full_name;
            $request_years = $this->years_of_residency;
            $request_occupation = $this->occupation;
            $request_purpose = $this->purpose;
            $contact_number = $this->contact_number;
            return compact("request_name", "request_years", "request_occupation", "request_purpose", "contact_number");
        }

        if($this->form_name == "Barangay Clearance"){
            $request_name = $this->full_name;
            $request_date_of_birth = $this->date_of_birth;
            $request_purpose = $this->purpose;
            $contact_number = $this->contact_number;
            return compact("request_name", "request_date_of_birth", "request_purpose", "contact_number");
        }

        if($this->form_name == "Certificate of Low Income"){
            $request_name = $this->full_name;
            $request_date_of_birth = $this->date_of_birth;
            $request_mother_name = $this->mother_name;
            $request_income = $this->income;
            $contact_number = $this->contact_number;
            return compact("request_name", "request_date_of_birth", "request_mother_name", "request_income", "contact_number");
        }

        if($this->form_name == "Certificate of Indigency"){
            $request_name = $this->full_name;
            $request_date_of_birth = $this->date_of_birth;
            $contact_number = $this->contact_number;
            return compact("request_name", "request_date_of_birth", "contact_number");
        }

        if($this->form_name == "Case Invitation"){
            $request_name = $this->full_name;
            $request_complainants = $this->complainants;
            $request_respondents = $this->respondents;
            $request_date = $this->invitation_date;
            $contact_number = $this->contact_number;
            return compact("request_name", "request_complainants", "request_respondents", "request_date", "contact_number");
        }

    }

    public function check_fields_if_empty()
    {
        if($this->form_name == "Barangay Certification"){
            if($this->resident_id == null || $this->years_of_residency == null || $this->occupation == "" || $this->purpose == "" ){
                $this->no_empty_fields = false;
            }else{
                $this->no_empty_fields = true;
            }
        }

        if($this->form_name == "Barangay Clearance"){
            if($this->resident_id == null || $this->date_of_birth == null || $this->purpose == "" ){
                $this->no_empty_fields = false;
            }else{
                $this->no_empty_fields = true;
            }
        }

        if($this->form_name == "Certificate of Low Income"){
            if($this->resident_id == null || $this->mother_name == "" || $this->date_of_birth == "" || $this->income == "" ){
                $this->no_empty_fields = false;
            }else{
                $this->no_empty_fields = true;
            }
        }

        if($this->form_name == "Certificate of Indigency"){
            if($this->resident_id == null || $this->date_of_birth == ""){
                $this->no_empty_fields = false;
            }else{
                $this->no_empty_fields = true;
            }
        }

        if($this->form_name == "Case Invitation"){
            if($this->resident_id == null || $this->complainants == "" || $this->respondents == "" || $this->invitation_date == ""){
                $this->no_empty_fields = false;
            }else{
                $this->no_empty_fields = true;
            }
        }
    }
}
