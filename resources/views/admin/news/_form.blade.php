<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="admin-field">
        <label>Title</label>
        <input type="text" name="title" required>
    </div>
    <div class="admin-field">
        <label>Category</label>
        <input type="text" name="category">
    </div>
    <div class="admin-field">
        <label>Author</label>
        <input type="text" name="author">
    </div>
    <div class="admin-field">
        <label>Published Date</label>
        <input type="date" name="published_date">
    </div>
    <div class="admin-field">
        <label>Status</label>
        <select name="status" required>
            <option value="published">Published</option>
            <option value="draft">Draft</option>
            <option value="scheduled">Scheduled</option>
        </select>
    </div>
    <div class="admin-field flex items-end">
        <label class="inline-flex items-center gap-2 font-medium">
            <input type="checkbox" name="is_featured" value="1" class="rounded">
            Featured
        </label>
    </div>
    <div class="admin-field md:col-span-2">
        <label>Image {{ !empty($editing) ? '(optional)' : '' }}</label>
        <input type="file" name="image" accept="image/*">
    </div>
    <div class="admin-field md:col-span-2">
        <label>Excerpt</label>
        <textarea name="excerpt" rows="2"></textarea>
    </div>
    <div class="admin-field md:col-span-2">
        <label>Content</label>
        <textarea name="content" rows="6" required></textarea>
    </div>
    <div class="admin-field md:col-span-2">
        <label>Meta Description</label>
        <input type="text" name="meta_description">
    </div>
</div>
