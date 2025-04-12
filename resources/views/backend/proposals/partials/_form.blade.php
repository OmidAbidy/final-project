<div class="mb-3">
    <label for="bid_amount">Bid Amount</label>
    <input type="number" name="bid_amount" class="form-control" value="{{ old('bid_amount', $proposal->bid_amount ?? '') }}" required>
  </div>
  <div class="mb-3">
    <label for="delivery_time">Delivery Time</label>
    <input type="text" name="delivery_time" class="form-control" value="{{ old('delivery_time', $proposal->delivery_time ?? '') }}" required>
  </div>
  <div class="mb-3">
    <label for="description">Description</label>
    <textarea name="description" class="form-control" rows="5" required>{{ old('description', $proposal->description ?? '') }}</textarea>
</div>
<input type="hidden" name="clientjob_id" value="{{ request('clientjob_id') ?? $proposal->clientjob_id ?? '' }}">