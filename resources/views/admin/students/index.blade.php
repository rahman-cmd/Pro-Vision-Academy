@extends('admin.layouts.app')

@section('title', 'Students — Admin')
@section('page_title', 'Students')
@section('page_subtitle', 'Registered academy students')

@section('content')
<div class="admin-kpi">
    <div class="admin-kpi__card">
        <p class="admin-kpi__label">Total Students</p>
        <p class="admin-kpi__value">{{ $stats['total'] ?? 0 }}</p>
    </div>
    <div class="admin-kpi__card">
        <p class="admin-kpi__label">Active</p>
        <p class="admin-kpi__value">{{ $stats['active'] ?? 0 }}</p>
        <p class="admin-kpi__meta">Ready to enroll</p>
    </div>
    <div class="admin-kpi__card">
        <p class="admin-kpi__label">Pending</p>
        <p class="admin-kpi__value">{{ $stats['pending'] ?? 0 }}</p>
        <p class="admin-kpi__meta">Needs review</p>
    </div>
    <div class="admin-kpi__card">
        <p class="admin-kpi__label">Inactive</p>
        <p class="admin-kpi__value">{{ $stats['inactive'] ?? 0 }}</p>
    </div>
</div>

<div class="admin-panel">
    <div class="admin-panel__head">
        <div>
            <h1>Students <span class="admin-count">{{ method_exists($students, 'total') ? $students->total() : $students->count() }}</span></h1>
            <p>Search and filter registered student accounts</p>
        </div>
    </div>

    <div class="admin-panel__body space-y-4">
        <form method="GET" action="{{ route('admin.students') }}" class="admin-toolbar">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name, email, phone...">
            <select name="status">
                <option value="">All Status</option>
                <option value="active" {{ request('status')==='active' ? 'selected' : '' }}>Active</option>
                <option value="pending" {{ request('status')==='pending' ? 'selected' : '' }}>Pending</option>
                <option value="inactive" {{ request('status')==='inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            <button type="submit" class="admin-btn admin-btn--ghost"><i class="fas fa-filter"></i> Apply</button>
            <a href="{{ route('admin.students') }}" class="admin-btn admin-btn--ghost">Reset</a>
        </form>

        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Joined</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                        @php($st = $student->status ?? 'pending')
                        <tr>
                            <td class="font-semibold">{{ $student->first_name }} {{ $student->last_name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->phone ?: '—' }}</td>
                            <td>
                                <span class="admin-badge {{ $st==='active' ? 'admin-badge--ok' : ($st==='inactive' ? 'admin-badge--danger' : 'admin-badge--warn') }}">
                                    {{ ucfirst($st) }}
                                </span>
                            </td>
                            <td>{{ $student->created_at ? $student->created_at->format('M d, Y') : '—' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="admin-empty">
                                    <div class="admin-empty__icon"><i class="fas fa-user-graduate"></i></div>
                                    <h3>No students found</h3>
                                    <p>Try a different search or status filter.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-2">{{ $students->withQueryString()->links() }}</div>
    </div>
</div>
@endsection
