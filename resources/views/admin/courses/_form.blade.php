<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="admin-field">
        <label>Title</label>
        <input type="text" name="title" required>
    </div>
    <div class="admin-field">
        <label>Category</label>
        <input type="text" name="category" placeholder="e.g. Implantology">
    </div>
    <div class="admin-field">
        <label>Level</label>
        <select name="level" required>
            @foreach(['beginner','intermediate','advanced'] as $level)
                <option value="{{ $level }}">{{ ucfirst($level) }}</option>
            @endforeach
        </select>
    </div>
    <div class="admin-field">
        <label>Location</label>
        <input type="text" name="location">
    </div>
    <div class="admin-field md:col-span-2">
        <label>Description</label>
        <textarea name="description" rows="3" required></textarea>
    </div>
    <div class="admin-field">
        <label>Price (OMR)</label>
        <input type="number" name="price" step="0.01" min="0" required>
    </div>
    <div class="admin-field">
        <label>Early Bird Price</label>
        <input type="number" name="early_bird_price" step="0.01" min="0">
    </div>
    <div class="admin-field">
        <label>Early Bird Deadline</label>
        <input type="date" name="early_bird_deadline">
    </div>
    <div class="admin-field">
        <label>Start Date</label>
        <input type="date" name="start_date" required>
    </div>
    <div class="admin-field">
        <label>End Date</label>
        <input type="date" name="end_date">
    </div>
    <div class="admin-field">
        <label>Duration</label>
        <input type="text" name="duration" placeholder="e.g. 3 days">
    </div>
    <div class="admin-field">
        <label>Max Participants</label>
        <input type="number" name="max_participants" min="1">
    </div>
    <div class="admin-field">
        <label>Status</label>
        <select name="status" required>
            @foreach(['active','inactive','completed','cancelled'] as $status)
                <option value="{{ $status }}">{{ ucfirst($status) }}</option>
            @endforeach
        </select>
    </div>
    <div class="admin-field flex items-end">
        <label class="inline-flex items-center gap-2 font-medium">
            <input type="checkbox" name="is_featured" value="1" class="rounded">
            Feature this course
        </label>
    </div>
    <div class="admin-field">
        <label>Objectives</label>
        <textarea name="objectives" rows="3"></textarea>
    </div>
    <div class="admin-field">
        <label>Requirements</label>
        <textarea name="requirements" rows="3"></textarea>
    </div>
    <div class="admin-field md:col-span-2">
        <label>Course Image {{ !empty($editing) ? '(optional)' : '' }}</label>
        <input type="file" name="image" accept="image/*">
        <div class="admin-field-hint">JPG/PNG/GIF. Max 2MB.{{ !empty($editing) ? ' Leave empty to keep current image.' : '' }}</div>
    </div>
</div>
