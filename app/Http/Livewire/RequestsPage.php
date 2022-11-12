<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Request;
use Carbon\Carbon;

class RequestsPage extends Component
{
    public $openDelete, $openAccept, $openComplete = false;
    public $request_id;

    public $orderBy = "residents.name";
    public $orderByOrder = "asc";
    public $search = "";
    public $searchBy;
    public $request_date;

    public function mount()
    {
        $this->searchBy = "all";
        $this->request_date = Carbon::today();
    }

    public function render()
    {
        $requests = $this->search
            ? Request::where("residents.name", "like", "%" . $this->search . "%")
                ->orWhere("forms.form_name", "like", "%" . $this->search . "%")
                ->orWhere("request_date", "like", "%" . $this->search . "%")
                ->orWhere("expiration_date", "like", "%" . $this->search . "%")
                ->join(
                    "residents",
                    "requests.resident_resident_id",
                    "=",
                    "residents.resident_id"
                )
                ->join(
                    "forms",
                    "requests.form_form_id",
                    "=",
                    "forms.form_id"
                )
                ->orderBy($this->orderBy, $this->orderByOrder)
                ->whereDate("request_date", $this->request_date)
                ->paginate(10)
            : Request::join(
                "residents",
                "requests.resident_resident_id",
                "=",
                "residents.resident_id"
                )
                ->join(
                    "forms",
                    "requests.form_form_id",
                    "=",
                    "forms.form_id"
                )
                ->whereDate("request_date", $this->request_date)
                ->orderBy($this->orderBy, $this->orderByOrder)
                ->paginate(10);

        return view('livewire.requests.requests-page', ["requests" => $requests]);
    }

    public function accept_request()
    {
        $request = Request::findOrFail($this->request_id);
        $request->accepted = true;
        $request->save();
        $this->dispatchBrowserEvent("request_accepted");
        $this->closeAcceptModal();
    }

    public function complete_request()
    {
        $request = Request::findOrFail($this->request_id);
        $request->completed = true;
        $request->save();
        $this->dispatchBrowserEvent("request_completed");
        $this->closeCompleteModal();
    }

    public function openDeleteModal()
    {
        $this->openDelete = true;
    }

    public function openAcceptModal()
    {
        $this->openAccept = true;
    }

    public function openCompleteModal()
    {
        $this->openComplete = true;
    }

    public function openDelete($request_id)
    {
        $request = Request::findOrFail($request_id);
        $this->request_id = $request->request_id;
        $this->openDeleteModal();
    }

    public function openAccept($request_id)
    {
        $request = Request::findOrFail($request_id);
        $this->request_id = $request->request_id;
        $this->openAcceptModal();
    }

    public function openComplete($request_id)
    {
        $request = Request::findOrFail($request_id);
        $this->request_id = $request->request_id;
        $this->openCompleteModal();
    }

    public function closeDeleteModal()
    {
        $this->clear();
        $this->openDelete = false;
    }

    public function closeAcceptModal()
    {
        $this->clear();
        $this->openAccept = false;
    }

    public function closeCompleteModal()
    {
        $this->clear();
        $this->openComplete = false;
    }

    public function delete()
    {
        Request::findOrFail($this->request_id)->delete();
        $this->dispatchBrowserEvent("request_deleted");
        $this->closeDeleteModal();
    }

    public function clear()
    {
        $this->request_id = null;
    }

    public function orderby($orderBy, $orderByOrder)
    {
        $this->orderBy = $orderBy;
        $this->orderByOrder = $orderByOrder;
    }

    public function reset_date()
    {
      $this->request_date = Carbon::today();
    }

}
