{{-- Main Proposal Form --}}
<div class="bg-[rgba(120,186,192,0.7)] p-6 rounded-xl shadow-md w-full max-w-2xl mx-auto space-y-6">

    {{-- Bid Amount --}}
    <div>
        <label class="block text-white font-semibold mb-1" for="bid_amount">Bid Amount ($)</label>
        <input type="number" name="bid_amount" id="bid_amount"
               value="{{ old('bid_amount', $proposal->bid_amount ?? '') }}"
               class="w-full px-4 py-2 rounded-lg border border-white bg-white focus:outline-none focus:ring-2 focus:ring-white"
               required>
    </div>

    {{-- Delivery Time --}}
    <div>
        <label class="block text-white font-semibold mb-1" for="delivery_time">Delivery Time</label>
        <input type="text" name="delivery_time" id="delivery_time"
               value="{{ old('delivery_time', $proposal->delivery_time ?? '') }}"
               class="w-full px-4 py-2 rounded-lg border border-white bg-white focus:outline-none focus:ring-2 focus:ring-white"
               required>
    </div>

    {{-- Description --}}
    <div>
        <label class="block text-white font-semibold mb-1" for="description">Description</label>
        <textarea name="description" id="description" rows="5"
                  class="w-full px-4 py-2 rounded-lg border border-white bg-white focus:outline-none focus:ring-2 focus:ring-white resize-y"
                  required>{{ old('description', $proposal->description ?? '') }}</textarea>
    </div>

    {{-- Hidden job ID --}}
    <input type="hidden" name="clientjob_id" value="{{ request('clientjob_id') ?? $proposal->clientjob_id ?? '' }}">
</div>
