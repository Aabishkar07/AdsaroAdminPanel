@extends('admin.layouts.app')
@section('body')
    <form method="POST" action="
    {{ route('admin.newsletter.email') }}
     ">
        @csrf
        <input type="hidden" value="subscriber" name='type'>

        <div class="bg-white px-6 py-6">
            <div class="flex-1 py-3">
                <span class="w-full text-2xl font-bold text-secondary ">
                    <a href=" {{ route('admin.csvs.index') }}">
                        CSVs
                    </a>
                    /
                    <span class="">
                        Sendmail
                    </span>
                    /
                    <span class="text-[#201baf] font-bold">
                        Mails
                    </span>
                </span>
            </div>

            <label for="to" class="block mt-4 text-sm font-semibold">To:</label>
            <div class="pt-2">
                @foreach ($emails as $email)
                    <input class="bg-gray-300 w-auto rounded-lg px-2 text-xs py-1 mb-2 inline-block"
                        value="{{ $email }}" disabled>
                    <input type="hidden" name="email[]" value="{{ $email }}">
                @endforeach
            </div>
            <div class="flex flex-col my-2 ">
                <label class="text-sm font-semibold">Subject</label>
                <input class="border py-1 px-2 mt-2 rounded-md focus:border-[#7065d4]" name="subject" placeholder="subject">
            </div>
            <div class="flex flex-col my-2">
                <label class="text-sm font-semibold">Content</label>
                <div class="mt-2">
                    <textarea class="tinymce border block w-full  rounded-md focus:border-[#7065d4] hover:border-[#7065d4]" name="content"
                        rows="6">{{ old('content') }}</textarea>
                </div>
            </div>
            <div class="flex justify-between my-9">
                <button class="bg-red-500 text-white px-2 py-1 rounded-md">Back</button>
                <button class="bg-sky-500 text-white px-2 py-1 rounded-md">Send Email</button>
            </div>
        </div>
    </form>
@endsection
