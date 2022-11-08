<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\ModelS\Document;

class DocumentsPage extends Component
{
    use WithFileUploads;

    public $document_id, $title, $description, $file, $file_update, $title_update;
    public $total_documents;
    public $openEdit, $openDelete = false;
    public $orderBy = "title";
    public $orderByOrder = "asc";
    public $search = "";
    public $searchBy;
    public $iteration;

    public function rules()
    {
        return [
            "title" => "required",
            "description" => "required",
        ];
    }

    public function render()
    {
        $documents = Document::paginate();
        $this->total_documents = Document::all()->count();

        return view('livewire.documents.documents-page', ['documents' => $documents]);
    }

    public function store()
    {
        $this->validate();

        // Check if title or file_name exists

        $existing_doc = Document::where('title', '=', $this->title)
            ->orWhere('file_name', '=', $this->file->getClientOriginalName())->count();

        // dd($existing_doc);

        if($existing_doc != 0){
            $this->dispatchBrowserEvent("existing_document");
        }else{
            $page = new Document();
            $page->title = $this->title;
            $page->description = $this->description;
            $page->file = $this->file->getClientOriginalName();
            $page->uploaded_by = Auth::user()->id;

            //Store file to file folder in storage
            $this->file->storeAs("documents", $this->file->getClientOriginalName());

            $page->save();
            $this->closeEditModal();

            $this->dispatchBrowserEvent("document_saved");
        }

        $this->iteration++;
    }

    public function edit($document_id)
    {
        $document = Document::where('document_id', '=', $document_id)->first();
        $this->document_id = $document->document_id;
        $this->title = $document->title;
        $this->file_update = $document->file_name;
        $this->description = $document->description;
        $this->openEdit = true;
    }

    public function update()
    {
        $this->validate();
        
        $doc = Document::where('document_id', $this->document_id)->first();

        $this->file = $this->file ? $this->file : $this->file_update;
        $doc->title = $this->title;
        $doc->description = $this->description;
        $this->title_update = $doc->title;
        $this->file_update = $doc->file_name;

        if($doc->title != $this->title_update || $doc->file != $this->file_update){
            $existing_doc = Document::where('title', '=', $this->title)
            ->orWhere('file_name', '=', $this->file)->first()->count();
        }

        if($existing_doc != 0 ){
            $this->dispatchBrowserEvent("existing_document");
        }else{
            if (!is_string($this->file)) {
                $doc->file_name = $this->file->getClientOriginalName();
                Storage::disk("documents")->delete($this->file_update);
                $this->file->storeAs(
                    "documents",
                    $this->file->getClientOriginalName()
                );
            }
    
            $doc->save();
            $this->dispatchBrowserEvent("document_saved");
        }

        $this->clear();
        $this->closeEditModal();
        $this->iteration++;
        
    }

    public function closeEditModal()
    {
        $this->clear();
        $this->openEdit = false;
    }

    public function clear()
    {
        $this->title = "";
        $this->description = "";
        $this->file_update = "";
        $this->file = "";
        $this->document_id = null;
    }

    public function downloadFile($file)
    {
        return Storage::disk("documents")->download($file);
    }

     //====================DELETE=================================

     public function openDeleteModal()
     {
         $this->openDelete = true;
     }
 
     public function openDelete($document_id)
     {
         $document = Document::findOrFail($document_id);
         $this->document_id = $document->document_id;
         $this->title = $document->title;
         $this->openDeleteModal();
     }
 
     public function closeDeleteModal()
     {
         $this->clear();
         $this->openDelete = false;
     }
 
     public function delete()
     {
         $document = Document::findOrFail($this->document_id);
         Storage::disk("documents")->delete($document->file_name);
         $document->delete();
         $this->dispatchBrowserEvent("document_deleted");
         $this->clear();
         $this->closeDeleteModal();
     }
 
     public function orderby($orderBy, $orderByOrder)
     {
         $this->orderBy = $orderBy;
         $this->orderByOrder = $orderByOrder;
     }
}
