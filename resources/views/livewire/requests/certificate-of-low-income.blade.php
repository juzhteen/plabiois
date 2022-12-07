<h1 class="text-center font-bold mt-10 text-xl mb-10">CERTIFICATE OF LOW INCOME</h1>
<p class="mb-4">TO WHOM IT MAY CONCERN:</p>

<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that
    <u>{{ $form_fields->request_mother_name }}</u>, <u>{{ \Carbon\Carbon::parse($form_fields->request_date_of_birth)->diff(\Carbon\Carbon::now())->format('%y years of age') }}</u>, was born on
    {{ date('F jS, Y', strtotime($form_fields->request_date_of_birth)) }}, Filipino and a bonafide resident of Barangay
    Paulino Labio, Northern Kabuntalan, Maguindanao.
</p>
<p class="mt-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to
    certify further that above-named person is the parent/guardian of <u>{{ $request->resident->name }}</u>.</p>
<p class="mt-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to
    certify further that his/her has an income of <u>{{ $form_fields->request_income }}</u> pesos monthly.</p>
<p class="mt-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This
    certification is being issued for whatever legal purpose may serve her best.</p>
<p class="mt-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issued this
    {{ now()->day }} of {{ now()->format('F') }}, {{ now()->year }} at the Office of the Barangay Chairman,
    Barangay Paulino Labio, Northern Kabuntalan, Maguindanao.</p>

<p class="text-right mt-40 underline">
    @php
        $bc = App\Models\Employee::join('employee_types', 'employees.employee_type_employee_type_id', '=', 'employee_types.employee_type_id')
            ->where('employee_types.position', 'Barangay Chairman')
            ->first();
        if($bc){
            echo $bc->resident->name;
        }
    @endphp
</p>
<p class="text-right">Punong Barangay</p>
