<h1 class="text-center font-bold mt-10 text-xl mb-10">CASE INVITATION</h1>
<p class="text-right">{{ now()->format('F') }} {{ now()->day }}, {{ now()->year }}</p>
<p class="mb-4">
    <span class="underline">
        {{ $form_fields->request_name }}
        @if ($form_fields->request_complainants)
            , {{ $form_fields->request_complainants }}
        @endif
    </span><br>
    {{-- @php
    $other_complainants = explode(",", $form_fields->request_complainants);
    foreach ($other_complainants as $key => $value) {
      echo $value."<br>";
    }
  @endphp --}}
    <b>Complainant/s</b>
</p>
<p>Against...</p><br>
{{-- @php
$respondents = explode(",", $form_fields->request_respondents);
foreach ($respondents as $key => $value) {
  echo $value."<br>";
}
@endphp --}}
<span class="underline">{{ $form_fields->request_respondents }}</span><br>
<b>Respondent/s</b><br>
<p class="mt-4">To the respondent/s;</p>
<p class="mt-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You are
    hereby invited to appear me in person on {{ date('F jS, Y', strtotime($form_fields->request_date)) }} at 9:00 am in
    the morning to shed light of complainant filed in this office against you.</p>
<p class="mt-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Failure to
    attend on this invitation, the complainant will be entitled to proceed at the higher authority.</p>
<p class="text-right mt-40 underline">
    @php
        $bc = App\Models\Employee::join('employee_types', 'employees.employee_type_employee_type_id', '=', 'employee_types.employee_type_id')
            ->where('employee_types.position', 'Barangay Chairman')
            ->first();
        echo $bc->resident->name;
    @endphp
</p>
<p class="text-right">Punong Barangay</p>
