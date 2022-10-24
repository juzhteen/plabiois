<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}" />

    <script src="{{ asset('js/alpine.min.js') }}" defer></script>
    <script src="{{ asset('js/init-alpine.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body>
   
    <div class="flex bg-gray-50 dark:bg-gray-900">

      <div class="container max-w-2xl mx-auto px-0 py-8">

        <div class="flex justify-between items-center px-5">
          <div class="logo">
            <img src="{{ asset('img/plabio-logo.png') }}" alt="PLabio logo" width="100px">
          </div>
          <div class="heading text-center">
            <p>Republic of the Philippines</p>
            <p>BARMM</p>
            <p>Province of Maguindanao</p>
            <p>Municipality of Northern Kabuntalan</p>
            <p>Barangay Paulino Labio</p>
            <p>OFFICE OF THE BARANGAY CHAIRMAN</p>
          </div>
          <div class="logo">
            <img src="{{ asset('img/kabuntalan-logo.png') }}" alt="Kabuntalan logo" width="95px">
          </div>
        </div>

        @if( $request->form->form_name == 'Barangay Certification' )
          @include('livewire.requests.barangay-certification')
        @endif

        @if( $request->form->form_name == 'Certificate of Low Income' )
          @include('livewire.requests.certificate-of-low-income')
        @endif

        @if( $request->form->form_name == 'Certificate of Indigency' )
          @include('livewire.requests.certificate-of-indigency')
        @endif

        @if( $request->form->form_name == 'Barangay Clearance' )
          @include('livewire.requests.barangay-clearance')
        @endif

        @if( $request->form->form_name == 'Case Invitation' )
          @include('livewire.requests.case-invitation')
        @endif

      </div>
        
    </div>

</body>

</html>
