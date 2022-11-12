<h1 class="text-center font-bold mt-10 text-xl mb-10">BARANGAY CERTIFICATION</h1>
<p class="mb-4">TO WHOM IT MAY CONCERN:</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that
    <u>{{ $request->resident->name }}</u>, <u>{{ $request->resident->age }}</u> years old, <u
        class="lowercase">{{ $request->resident->civil_status }}</u> a bonafide resident of Barangay Paulino Labio,
    Northern Kabuntalan, Maguindanao. He resides at the said address for <u>{{ $form_fields->request_years }}</u> years.
</p>
<p class="mt-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Further
    certify that the above mentioned named is a/an <u>{{ $form_fields->request_occupation }}</u>.</p>
<p class="mt-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This
    certification is being issued to <u>{{ $request->resident->name }}</u> <u
        class="lowercase">{{ $form_fields->request_purpose }}</u>.</p>
<p class="mt-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issued this
    {{ now()->day }} of {{ now()->format('F') }}, {{ now()->year }} at the Office of the Barangay Chairman,
    Barangay Paulino Labio, Northern Kabuntalan, Maguindanao.</p>
<p class="text-right mt-40 underline">
    @php
        $bc = App\Models\Employee::join('employee_types', 'employees.employee_type_employee_type_id', '=', 'employee_types.employee_type_id')
          ->where('employee_types.position', 'Barangay Chairman')->first();
        echo $bc->resident->name;
    @endphp
</p>
<p class="text-right">Punong Barangay</p>
