@extends('backend.admin.master')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col h-[80vh]">

        <!-- Header -->
        <div class="bg-cyan-700 text-white text-xl font-semibold px-6 py-4 flex justify-between items-center">
            <span>💬 This Section is Under Progress!</span>
            <span class="text-sm font-light">Online</span>
        </div>

        <!-- Messages Area -->
        <div class="flex-1 overflow-y-auto p-6 space-y-4 bg-gray-50" id="message-container">
            <!-- Received message -->
            <div class="flex items-start gap-3">
                <div class="bg-white p-3 rounded-lg shadow max-w-sm text-gray-800">
                    The backend for the message is Not yet Finished!
                </div>
            </div>

            <!-- Sent message -->
            <div class="flex justify-end">
                <div class="bg-cyan-700 text-white p-3 rounded-lg shadow max-w-sm">
                    Yes, I'm figuring out the payment section right now!
                </div>
            </div>

            <!-- More messages can be appended here -->
        </div>

        <!-- Input Area -->
        <form class="border-t border-gray-200 px-4 py-3 bg-white flex items-center gap-2">
            <input
                type="text"
                placeholder="Type your message..."
                class="flex-1 border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-600"
            >
            <button
                type="submit"
                class="bg-cyan-700 hover:bg-cyan-800 text-white px-5 py-2 rounded-full transition font-medium"
            >
                Send
            </button>
        </form>

    </div>
</div>
@endsection
