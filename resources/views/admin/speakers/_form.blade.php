<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="admin-field">
        <label>Full Name</label>
        <input type="text" name="full_name" required>
    </div>
    <div class="admin-field">
        <label>Title</label>
        <input type="text" name="title" placeholder="Dr., Prof., etc.">
    </div>
    <div class="admin-field">
        <label>Country</label>
        <input type="text" name="country" required>
    </div>
    <div class="admin-field">
        <label>Specialization</label>
        <input type="text" name="specialization" required>
    </div>
    <div class="admin-field">
        <label>Institution</label>
        <input type="text" name="institution">
    </div>
    <div class="admin-field">
        <label>Sort Order</label>
        <input type="number" name="sort_order" value="0" min="0">
    </div>
    <div class="admin-field md:col-span-2">
        <label>Bio</label>
        <textarea name="bio" rows="3"></textarea>
    </div>
    <div class="admin-field md:col-span-2">
        <label>Achievements</label>
        <textarea name="achievements" rows="3"></textarea>
    </div>
    <div class="admin-field">
        <label>Type</label>
        <select name="type" required>
            <option value="international">International</option>
            <option value="local">Local</option>
        </select>
    </div>
    <div class="admin-field">
        <label>Status</label>
        <select name="status" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>
    <div class="admin-field">
        <label>LinkedIn URL</label>
        <input type="url" name="linkedin" placeholder="https://linkedin.com/in/...">
    </div>
    <div class="admin-field">
        <label>Website</label>
        <input type="url" name="website" placeholder="https://example.com">
    </div>
    <div class="admin-field md:col-span-2">
        <label>Photo {{ !empty($editing) ? '(optional)' : '' }}</label>
        <input type="file" name="image" accept="image/*">
        <div class="admin-field-hint">JPG, PNG, WEBP. Max 4MB.{{ !empty($editing) ? ' Leave empty to keep current photo.' : '' }}</div>
    </div>
</div>
