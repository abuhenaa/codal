@extends('layouts.master')
@section('content')
    <div class="container w-full px-5 py-5 mx-auto">
        <div class="items-start justify-between md:flex">
            <div class="max-w-lg">
                <h3 class="text-gray-800 text-xl font-bold sm:text-2xl">All FAQs from <i>{{ $group->title }}</i></h3>
                <p class="text-gray-600 mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
            <div id="add-faq" class="mt-3 md:mt-0">
                <a href="javascript:void(0)" class="add-faq inline-block px-4 py-2 text-white duration-150 font-medium bg-indigo-600 rounded-lg hover:bg-indigo-500 active:bg-indigo-700 md:text-sm"  onclick="createfaq()">Add faq</a>
            </div>
            <div id="all-FAQs" class="mt-3 md:mt-0 hidden">
                <a href="javascript:void(0)" class="add-faq inline-block px-4 py-2 text-white duration-150 font-medium bg-indigo-600 rounded-lg hover:bg-indigo-500 active:bg-indigo-700 md:text-sm"  onclick="showFAQs()">All faq</a>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="w-full px-10 mt-4 create-faq hidden">
                <form method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('faqs.store')}}">
                    @sessionToken
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Title
                        </label>
                        <input  type="text" name="question" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                            Description
                        </label>
                        <textarea name="answer" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description"></textarea>
                    </div>
                    <div class="mb-6">
                        <input type="hidden" name="group_id" value="{{ $group_id }}">
                    </div>
                    <div class="flex items-center justify-between">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Create
                        </button>
                    </div>
                </form>
            </div>
            <div class="w-full px-10 pt-6 all-FAQs">
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    
                    <div class="mt-12 relative h-max overflow-auto">
                        <table class="w-full table-auto text-sm text-left">
                            <thead class="text-gray-600 font-medium border-b">
                                <tr>
                                    <th class="py-3 pr-6">ID</th>
                                    <th class="py-3 pr-6">Title</th>
                                    <th class="py-3 pr-6">Description</th>
                                    <th class="py-3 pr-6">status</th>
                                    <th class="py-3 pr-6">Manage</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 divide-y">
                                @if($faqs->count() > 0)
                                    @foreach ($faqs as $key => $faq) 
                                    <tr>
                                        <td class="pr-6 py-4 whitespace-nowrap">{{ $faq->id }}</td>
                                        <td class="pr-6 py-4 whitespace-nowrap" >{{ $faq->question }}</td>
                                        <td class="pr-6 py-4 whitespace-nowrap">{{ $faq->answer }}</td>                                        
                                        <td class="pr-6 py-4 whitespace-nowrap">{{ $faq->status }}</td>
                                        <td class="text-right whitespace-nowrap">
                                            <a href="javascript:void(0)" class="py-1.5 px-3 text-gray-600 hover:text-gray-500 duration-150 hover:bg-gray-50 border rounded-lg">Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td class="pr-6 py-4 whitespace-nowrap">No FAQs</td>
                                    </tr>
                                    @endif
                            </tbody>
                        </table>
                    </div>
                </div>

        </div>
    </div>

@endsection

@push('scripts')
<script>
    function createfaq() {
        document.querySelector('.create-faq').classList.remove('hidden')
        document.querySelector('.all-FAQs').classList.add('hidden')
        document.getElementById('all-FAQs').classList.remove('hidden')
        document.getElementById('add-faq').classList.add('hidden')

    }
    function showFAQs() {
        document.querySelector('.create-faq').classList.add('hidden')
        document.querySelector('.all-FAQs').classList.remove('hidden')
        document.getElementById('all-FAQs').classList.add('hidden')
        document.getElementById('add-faq').classList.remove('hidden')

    }
</script>
@endpush