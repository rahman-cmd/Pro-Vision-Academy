@extends('admin.layouts.app')

@section('page_title', 'Tabs')
@section('page_subtitle', 'Additional homepage tab content (preview)')

@section('content')
<div class="admin-panel">
    <div class="admin-panel__head">
        <div>
            <h1>Tabs Section</h1>
            <p>UI preview only — changes are not saved yet</p>
        </div>
        <span class="admin-badge admin-badge--warn">Coming soon</span>
    </div>

    <div class="admin-panel__body">
        <div class="admin-section" style="background:#fff8ee;border-color:#f0d9a8;">
            <p class="m-0 text-sm" style="color:#8a5a00;">
                This screen is a design stub. Connect a Tabs model/controller later to persist content. Fields below are for layout preview.
            </p>
        </div>

        <div class="admin-section">
            <h3 class="admin-section__title"><i class="fas fa-heading"></i> Section Header</h3>
            <div class="admin-section__grid">
                <div class="admin-field">
                    <label>Section Title</label>
                    <input type="text" value="Additional Information" disabled>
                </div>
                <div class="admin-field">
                    <label>Description</label>
                    <textarea rows="3" disabled>Explore our partnerships, collaborations, and faculty development programs that enhance the learning experience.</textarea>
                </div>
            </div>
        </div>

        <div class="admin-section">
            <h3 class="admin-section__title"><i class="fas fa-folder-open"></i> Sample Tabs</h3>
            <div class="admin-section__grid admin-section__grid--2">
                <div class="admin-section" style="background:white;margin:0;">
                    <div class="flex items-center justify-between mb-3">
                        <h4 class="font-semibold m-0">Partners & Collaborations</h4>
                        <span class="admin-badge admin-badge--ok">Active</span>
                    </div>
                    <div class="admin-field mb-3">
                        <label>Tab Icon</label>
                        <input type="text" value="fas fa-handshake" disabled>
                    </div>
                    <div class="admin-field">
                        <label>Content Title</label>
                        <input type="text" value="Global Network of Excellence" disabled>
                    </div>
                </div>
                <div class="admin-section" style="background:white;margin:0;">
                    <div class="flex items-center justify-between mb-3">
                        <h4 class="font-semibold m-0">Faculty Development</h4>
                        <span class="admin-badge admin-badge--ok">Active</span>
                    </div>
                    <div class="admin-field mb-3">
                        <label>Tab Icon</label>
                        <input type="text" value="fas fa-chalkboard-teacher" disabled>
                    </div>
                    <div class="admin-field">
                        <label>Content Title</label>
                        <input type="text" value="Continuous Learning & Growth" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="admin-panel__foot">
        <a href="{{ route('admin.dashboard') }}" class="admin-btn admin-btn--ghost">Back to Dashboard</a>
        <button type="button" class="admin-btn admin-btn--primary" disabled title="Persistence not connected">
            <i class="fas fa-save"></i> Save (disabled)
        </button>
    </div>
</div>
@endsection
