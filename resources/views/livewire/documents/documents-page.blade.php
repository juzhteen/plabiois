<div>
    @include('livewire.documents.documents-edit-modal')
    @include('livewire.documents.documents-delete-modal')

    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">

        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                  </svg>
            </div>
            <div>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    @if ($total_documents == 1)
                        1 document
                    @else
                        {{ $total_documents }} documents
                    @endif
                </p>
            </div>
        </div>
    </div>

    @include('livewire.includes.search', [
        'fields' => [
            'title' => 'Title',
            'description' => 'Description',
            'file_name' => 'File name'
        ],
    ])

    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-md">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="bg-blue-100 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">
                            <span class="flex flex-col">
                                Title
                                <div class="flex flex-row">@include('livewire.includes.order-by', ['field' => 'title'])</div>
                            </span>
                        </th>
                        <th class="px-4 py-3">
                            <span class="flex flex-col">
                                Description
                                <div class="flex flex-row">@include('livewire.includes.order-by', ['field' => 'description'])</div>
                            </span>
                        </th>
                        <th class="px-4 py-3">
                            <span class="flex flex-col">
                                File name
                                <div class="flex flex-row">@include('livewire.includes.order-by', ['field' => 'file_name'])</div>
                            </span>
                        </th>
                        <th class="px-4 py-3">
                            <span class="flex flex-col">
                                Uploaded by
                            </span>
                        </th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @if ($documents->count())
                        @foreach ($documents as $document)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm font-bold">
                                    {{ $document->title }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $document->description }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $document->file_name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $document->uploader->name }}
                                </td>
                                <td class="px-4 py-2">
                                    <button wire:click="downloadFile('{{ $document->file_name }}')"
                                        class="mt-4 mb-4 px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-400 border border-transparent rounded-md active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                          </svg>                                          
                                    </button>
                                    <button wire:click.prevent="edit({{ $document->document_id }})"
                                        class="mt-4 mb-4 px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-400 border border-transparent rounded-md active:bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:shadow-outline-purple">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </button>
                                    <button wire:click.prevent="openDelete({{ $document->document_id }})"
                                        class="mt-4 mb-4 px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-400 border border-transparent rounded-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <br>
    {{ $documents->links() }}
</div>
</div>
