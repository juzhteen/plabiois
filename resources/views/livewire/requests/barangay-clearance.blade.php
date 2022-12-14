<h1 class="text-center font-bold mt-5 text-xl mb-5">BARANGAY CLEARANCE</h1>
<div class="mt-8 flex">
    <div class="w-2/6 bg-green-300 p-1 m-1 flex justify-center flex-col items-center">
        <b>Sangguniang Barangay</b>
        <b>Barangay Chairman</b>
        @php
            $bc = App\Models\Employee::join('employee_types', 'employees.employee_type_employee_type_id', '=', 'employee_types.employee_type_id')
                ->where('employee_types.position', 'Barangay Chairman')
                ->first();
            if ($bc) {
                echo $bc->resident->name;
            }
        @endphp

        <b>Barangay Kagawad</b>

        @php
            $bks = App\Models\Employee::join('employee_types', 'employees.employee_type_employee_type_id', '=', 'employee_types.employee_type_id')
                ->where('employee_types.position', 'Barangay Kagawad')
                ->get();
        @endphp

        @if ($bks)
            @foreach ($bks as $bk)
                @if ($bk->resident)
                    <span>{{ $bk->resident->name }}</span>
                @endif
            @endforeach
        @endif

        <b>Sk Chairman</b>

        @php
            $skc = App\Models\Employee::join('employee_types', 'employees.employee_type_employee_type_id', '=', 'employee_types.employee_type_id')
                ->where('employee_types.position', 'SK Chairman')
                ->first();
            if ($skc) {
                echo $skc->resident->name;
            }
        @endphp

        <b>Barangay Secretary</b>

        @php
            $bs = App\Models\Employee::join('employee_types', 'employees.employee_type_employee_type_id', '=', 'employee_types.employee_type_id')
                ->where('employee_types.position', 'Barangay Secretary')
                ->first();
            if ($bs) {
                echo $bs->resident->name;
            }
        @endphp
        <b>Barangay Treasurer</b>

        @php
            $bt = App\Models\Employee::join('employee_types', 'employees.employee_type_employee_type_id', '=', 'employee_types.employee_type_id')
                ->where('employee_types.position', 'Barangay Treasurer')
                ->first();
            if ($bt) {
                echo $bt->resident->name;
            }
        @endphp
    </div>
    <div class="w-4/6 p-1 m-1 text-justify relative">
        <img src="{{ asset('img/plabio-logo.png') }}" alt="PLabio logo" class="absolute opacity-25 top-12" width="100%">
        <p>TO WHOM IT MAY CONCERN;</p>
        <p class="mt-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This
            is to certify that <u>{{ $request->resident->name }}</u>, <u>{{ $request->resident->age }}</u> years old,
            was born on {{ date('F jS, Y', strtotime($form_fields->request_date_of_birth)) }}, Filipino and a bonafide
            resident and with postal address at Barangay Paulino Labio Northern Kabuntalan, Maguindanao, is a person
            whose integrity and reputation is beyond reproach.</p>
        <p class="mt-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This
            is to further certify that the above mentioned applicant is a law abiding citizen and with good moral
            character nor has been involved in any crime against moral turpitude nor has pending case of this barangay.
        </p>
        <p class="mt-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This
            certification is being issued upon the request of the above named person
            <u>{{ $form_fields->request_purpose }}</u> that may serve her/him best.
        <p x-data="enter_date()" class="mt-4 relative">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issued this
            <a @click.prevent @dblclick="toggleEditingState" x-show="!isEditing" x-text="text"
                class="select-none cursor-pointer underline text-black"></a>
            <input type="text" x-model="text" x-show="isEditing" @click.away="toggleEditingState"
                @keydown.enter="disableEditing" @keydown.window.escape="disableEditing"
                class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-l px-4 appearance-none leading-normal w-128"
                x-ref="input"> at the Office of the Barangay Chairman,
            Barangay Paulino Labio, Northern Kabuntalan, Maguindanao.
        </p>

    </div>
</div>
<br>
<div class="flex justify-between items-center">
    <div class="flex flex-col justify-center items-center">
        <p class="text-right mt-8 underline uppercase">
            <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
        </p>
        <p class="text-right">Applicant's signature</p>
    </div>
    <div class="flex flex-col justify-center items-center">
        <p x-data="data()" class="mt-8">
            <a @click.prevent @dblclick="toggleEditingState" x-show="!isEditing" x-text="text"
                class="select-none cursor-pointer underline text-black"></a>
            <input type="text" x-model="text" x-show="isEditing" @click.away="toggleEditingState"
                @keydown.enter="disableEditing" @keydown.window.escape="disableEditing"
                class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-l px-4 appearance-none leading-normal w-128"
                x-ref="input">
        </p>
        <p class="text-right">Officer-on-duty</p>
    </div>

    <div class="flex flex-col justify-center items-center">
        <p class="text-right underline mt-8">
            @php
                $bc = App\Models\Employee::join('employee_types', 'employees.employee_type_employee_type_id', '=', 'employee_types.employee_type_id')
                    ->where('employee_types.position', 'Barangay Chairman')
                    ->first();
                if ($bc) {
                    echo $bc->resident->name;
                }
            @endphp
        </p>
        <p class="text-right">Punong Barangay</p>
    </div>
</div>

<div class="mt-4 flex justify-center items-center">
    <img src="{{ asset('img/barangay-clearance-thumbmark.png') }}" alt="PLabio logo" width="60%">
</div>

<script>
    function data() {
        return {
            text: "Double click to enter name",
            isEditing: false,
            toggleEditingState() {
                this.isEditing = !this.isEditing;

                if (this.isEditing) {
                    this.$nextTick(() => {
                        this.$refs.input.focus();
                    });
                }
            },
            disableEditing() {
                this.isEditing = false;
            }
        };
    }

    function enter_date() {
        return {
            text: "Double click to enter date",
            isEditing: false,
            toggleEditingState() {
                this.isEditing = !this.isEditing;

                if (this.isEditing) {
                    this.$nextTick(() => {
                        this.$refs.input.focus();
                    });
                }
            },
            disableEditing() {
                this.isEditing = false;
            }
        };
    }
</script>
