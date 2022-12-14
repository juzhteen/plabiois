<x-app-layout title="Employees">
  <div class="grid px-20 mx-auto pb-20">
      <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
          Attendance | {{ now()->day }} of {{ now()->format('F') }}, {{ now()->year }}
      </h2>

      @livewire('attendance-page')

  </div>
</x-app-layout>