<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="admin-field">
        <label>Full Name</label>
        <input type="text" name="name" required>
    </div>
    <div class="admin-field">
        <label>Country</label>
        <input type="text" name="country">
    </div>
    <div class="admin-field">
        <label>Rating</label>
        <select name="rating" required>
            @for($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}" {{ $i === 5 ? 'selected' : '' }}>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
            @endfor
        </select>
    </div>
    <div class="admin-field">
        <label>Status</label>
        <select name="status" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>
    <div class="admin-field md:col-span-2">
        <label>Quote</label>
        <textarea name="content" rows="4" required></textarea>
    </div>
    <div class="admin-field md:col-span-2">
        <label>Photo {{ !empty($editing) ? '(optional)' : '' }}</label>
        <input type="file" name="image" accept="image/*">
        <div class="admin-field-hint">Max 2MB.{{ !empty($editing) ? ' Leave empty to keep current photo.' : '' }}</div>
    </div>
</div>
