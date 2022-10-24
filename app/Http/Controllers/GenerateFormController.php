<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Request as GenerateRequest;

class GenerateFormController extends Controller
{
    public function index($request_id)
    {
        $request = GenerateRequest::findOrFail($request_id);
        $form_fields = json_decode($request->form_fields);

        return view('livewire.requests.request-preview', [
            'request' => $request,
            'form_fields' => $form_fields
        ]);
    }
}
