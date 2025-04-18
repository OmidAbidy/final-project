@extends('backend.admin.master')

@section('content')


<div class="min-h-screen flex items-center justify-center  p-4">
    
    <div class="w-full max-w-xl bg-white/30 backdrop-blur-md rounded-3xl shadow-xl p-8 space-y-6 text-cyan-700">
        <h1 class="text-cyan-700 text-5xl font-bold text-center my-6">Wallet</h1>
        <!-- Top Navigation Buttons -->
        <div class="flex justify-between items-center">
            <button class="bg-cyan-700 text-white font-medium py-2 px-4 rounded-xl shadow hover:bg-cyan-800 transition">
                Amount
            </button>

            <div class="flex items-center text-white bg-cyan-700 rounded-xl shadow px-4 py-2 w-2/3">
                <span class="flex-grow font-medium text-lg truncate">Wallet Address</span>
                <button class="ml-2" title="Copy Wallet">
                    <svg class="w-6 h-6 text-white hover:text-slate-400 transition" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2M16 8h2a2 2 0 012 2v8a2 2 0 01-2 2h-8a2 2 0 01-2-2v-2" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Info Text -->
        <p class="text-sm text-red-600 text-center -mt-4">
            This wallet address is for the TRC20 network
        </p>

        <!-- Title -->
        <h2 class="text-3xl font-bold text-center mt-4">Withdraw</h2>

        <!-- Form -->
        <form method="POST" action="#" class="space-y-5">
            @csrf

            <!-- Amount -->
            <div class="relative">
                <input type="text" name="amount" id="amount" placeholder=" " 
                       class="peer w-full px-4 py-3 bg-white/50 rounded-xl placeholder-transparent focus:outline-none focus:ring-2 focus:ring-white">
                <label for="amount" class="absolute left-4 top-2 text-cyan-700 text-sm transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:tecyan-400 peer-focus:top-2 peer-focus:text-sm peer-focus:tecyan-700">
                    Enter Amount
                </label>
            </div>

            <!-- Wallet Address -->
            <div class="relative">
                <input type="text" name="wallet_address" id="wallet_address" placeholder=" " 
                       class="peer w-full px-4 py-3 bg-white/50 rounded-xl placeholder-transparent focus:outline-none focus:ring-2 focus:ring-white">
                <label for="wallet_address" class="absolute left-4 top-2 text-gray-700 text-sm transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-cyan-800 peer-focus:top-2 peer-focus:text-sm peer-focus:text-cyan-700">
                    Wallet Address for withdraw (TRC20)
                </label>
                <p class="text-sm text-red-600 mt-1 ml-1">Enter your wallet address (TRC20 only)</p>
            </div>

            <!-- Password -->
            <div class="relative">
                <input type="password" name="password" id="password" placeholder=" " 
                       class="peer w-full px-4 py-3 bg-white/50 rounded-xl placeholder-transparent focus:outline-none focus:ring-2 focus:ring-white">
                <label for="password" class="absolute left-4 top-2 text-gray-700 text-sm transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-cyan-800 peer-focus:top-2 peer-focus:text-sm peer-focus:text-cyan-700">
                    Password
                </label>
            </div>

            <!-- Submit -->
            <button type="submit"
                class="w-full py-3 text-white bg-cyan-700 font-semibold rounded-xl shadow hover:bg-cyan-800 hover:shadow-md transition">
                Withdraw
            </button>
        </form>
    </div>
</div>
@endsection
