@extends('admin.layouts.app')

@section('title', 'Dashboard — Admin')
@section('page_title', 'Dashboard')
@section('page_subtitle', 'Academy overview and what needs attention')

@php
    $pending = (int) ($stats['pending_registrations'] ?? 0);
    $upcomingCount = ($upcomingCourses ?? collect())->count();
    $contentTotal = (int) ($stats['total_news'] ?? 0) + (int) ($stats['total_gallery_items'] ?? 0) + (int) ($stats['total_testimonials'] ?? 0);
    $chartLabels = [];
    $chartCounts = [];
    $sortedMonths = ($monthlyRegistrations ?? collect())->sortBy(function ($row) {
        return sprintf('%04d-%02d', $row->year, $row->month);
    })->values();
    foreach ($sortedMonths as $row) {
        $chartLabels[] = \Illuminate\Support\Carbon::createFromDate($row->year, $row->month, 1)->format('M Y');
        $chartCounts[] = (int) $row->count;
    }
@endphp

@section('content')
<div class="dash-welcome">
    <div>
        <h1>Welcome back{{ auth()->user()?->first_name ? ', ' . auth()->user()->first_name : '' }}</h1>
        <p>Monitor registrations, courses, and website content from one place.</p>
    </div>
    <a href="{{ route('home') }}" target="_blank" class="admin-btn admin-btn--primary">
        <i class="fas fa-globe"></i> Open Website
    </a>
</div>

<div class="dash-attention">
    @if($pending > 0)
        <a href="{{ route('admin.students') }}" class="dash-attention__item is-warn">
            <span class="dash-attention__dot"></span>
            {{ $pending }} pending registration{{ $pending === 1 ? '' : 's' }}
        </a>
    @endif
    @if($upcomingCount > 0)
        <a href="{{ route('admin.courses.index') }}" class="dash-attention__item">
            <span class="dash-attention__dot"></span>
            {{ $upcomingCount }} upcoming course{{ $upcomingCount === 1 ? '' : 's' }}
        </a>
    @endif
    <a href="{{ route('admin.courses.index') }}?create=1" class="dash-attention__item">
        <span class="dash-attention__dot"></span>
        Add a new course
    </a>
    <a href="{{ route('admin.hero.index') }}" class="dash-attention__item">
        <span class="dash-attention__dot"></span>
        Update hero banner
    </a>
</div>

<div class="dash-stats">
    <div class="dash-stat">
        <div class="dash-stat__icon"><i class="fas fa-book-open"></i></div>
        <div>
            <p class="dash-stat__label">Courses</p>
            <div class="dash-stat__value">{{ $stats['total_courses'] ?? 0 }}</div>
            <div class="dash-stat__meta">{{ $stats['active_courses'] ?? 0 }} active</div>
        </div>
    </div>
    <div class="dash-stat">
        <div class="dash-stat__icon"><i class="fas fa-user-graduate"></i></div>
        <div>
            <p class="dash-stat__label">Students</p>
            <div class="dash-stat__value">{{ $stats['total_students'] ?? 0 }}</div>
            <div class="dash-stat__meta">registered accounts</div>
        </div>
    </div>
    <div class="dash-stat dash-stat--warn">
        <div class="dash-stat__icon"><i class="fas fa-clipboard-list"></i></div>
        <div>
            <p class="dash-stat__label">Registrations</p>
            <div class="dash-stat__value">{{ $stats['total_registrations'] ?? 0 }}</div>
            <div class="dash-stat__meta">{{ $pending }} pending</div>
        </div>
    </div>
    <div class="dash-stat dash-stat--accent">
        <div class="dash-stat__icon"><i class="fas fa-coins"></i></div>
        <div>
            <p class="dash-stat__label">Revenue</p>
            <div class="dash-stat__value">{{ number_format((float) ($stats['total_revenue'] ?? 0), 0) }}</div>
            <div class="dash-stat__meta">OMR paid</div>
        </div>
    </div>
    <div class="dash-stat">
        <div class="dash-stat__icon"><i class="fas fa-microphone-lines"></i></div>
        <div>
            <p class="dash-stat__label">Speakers</p>
            <div class="dash-stat__value">{{ $stats['total_speakers'] ?? 0 }}</div>
            <div class="dash-stat__meta">{{ $stats['active_speakers'] ?? 0 }} active</div>
        </div>
    </div>
    <div class="dash-stat">
        <div class="dash-stat__icon"><i class="fas fa-layer-group"></i></div>
        <div>
            <p class="dash-stat__label">Content</p>
            <div class="dash-stat__value">{{ $contentTotal }}</div>
            <div class="dash-stat__meta">news · gallery · reviews</div>
        </div>
    </div>
</div>

<div class="dash-panel mb-6">
    <div class="dash-panel__head">
        <h2>Quick Actions</h2>
    </div>
    <div class="dash-panel__body">
        <div class="dash-actions">
            <a href="{{ route('admin.hero.index') }}" class="dash-action">
                <i class="fas fa-panorama"></i>
                <span>Update Hero</span>
            </a>
            <a href="{{ route('admin.courses.index') }}?create=1" class="dash-action">
                <i class="fas fa-plus"></i>
                <span>Add Course</span>
            </a>
            <a href="{{ route('admin.speakers.index') }}" class="dash-action">
                <i class="fas fa-microphone-lines"></i>
                <span>Manage Speakers</span>
            </a>
            <a href="{{ route('admin.students') }}" class="dash-action">
                <i class="fas fa-user-graduate"></i>
                <span>View Students</span>
            </a>
            <a href="{{ route('admin.gallery.index') }}" class="dash-action">
                <i class="fas fa-images"></i>
                <span>Gallery</span>
            </a>
            <a href="{{ route('admin.news.index') }}" class="dash-action">
                <i class="fas fa-newspaper"></i>
                <span>News</span>
            </a>
            <a href="{{ route('admin.testimonials.index') }}" class="dash-action">
                <i class="fas fa-quote-left"></i>
                <span>Testimonials</span>
            </a>
            <a href="{{ route('admin.settings.index') }}" class="dash-action">
                <i class="fas fa-gear"></i>
                <span>Settings</span>
            </a>
        </div>
    </div>
</div>

<div class="dash-grid">
    <section class="dash-panel">
        <div class="dash-panel__head">
            <h2>Recent Registrations</h2>
            <a href="{{ route('admin.students') }}" class="admin-link">View all</a>
        </div>
        <div class="dash-panel__body overflow-x-auto">
            @if(($recentRegistrations ?? collect())->count())
                <table class="dash-table">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Course</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentRegistrations->take(6) as $registration)
                            <tr>
                                <td class="font-semibold">
                                    {{ trim((optional($registration->user)->first_name ?? '') . ' ' . (optional($registration->user)->last_name ?? '')) ?: '—' }}
                                </td>
                                <td>{{ optional($registration->course)->title ?? '—' }}</td>
                                <td>
                                    <span class="dash-badge {{ in_array($registration->status, ['confirmed', 'active']) ? 'is-confirmed' : 'is-pending' }}">
                                        {{ ucfirst($registration->status) }}
                                    </span>
                                </td>
                                <td>{{ optional($registration->created_at)->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="admin-empty">
                    <div class="admin-empty__icon"><i class="fas fa-clipboard-list"></i></div>
                    <h3>No registrations yet</h3>
                    <p>New course sign-ups will appear here.</p>
                </div>
            @endif
        </div>
    </section>

    <section class="dash-panel">
        <div class="dash-panel__head">
            <h2>Registrations Trend</h2>
            <span class="text-sm text-[var(--admin-muted)]">Last 12 months</span>
        </div>
        <div class="dash-panel__body">
            @if(count($chartLabels))
                <div class="dash-chart-wrap">
                    <canvas id="registrationsChart" aria-label="Monthly registrations chart"></canvas>
                </div>
            @else
                <div class="admin-empty">
                    <div class="admin-empty__icon"><i class="fas fa-chart-column"></i></div>
                    <h3>No trend data</h3>
                    <p>Registration activity will chart here over time.</p>
                </div>
            @endif
        </div>
    </section>
</div>

<div class="dash-grid">
    <section class="dash-panel">
        <div class="dash-panel__head">
            <h2>Upcoming Courses</h2>
            <a href="{{ route('admin.courses.index') }}" class="admin-link">Manage</a>
        </div>
        <div class="dash-panel__body">
            @forelse(($upcomingCourses ?? collect()) as $course)
                <div class="flex items-start justify-between gap-3 py-3 border-b border-[var(--admin-line)] last:border-0">
                    <div>
                        <div class="font-semibold text-[var(--admin-ink)]">{{ $course->title }}</div>
                        <div class="text-sm text-[var(--admin-muted)] mt-0.5">
                            Starts {{ optional($course->start_date)->format('d M Y') }}
                        </div>
                    </div>
                    <span class="dash-badge">{{ ucfirst($course->level) }}</span>
                </div>
            @empty
                <p class="dash-empty">No upcoming courses scheduled.</p>
            @endforelse
        </div>
    </section>

    <section class="dash-panel">
        <div class="dash-panel__head">
            <h2>Popular Courses</h2>
        </div>
        <div class="dash-panel__body">
            @forelse(($popularCourses ?? collect()) as $course)
                <div class="flex items-center justify-between gap-3 py-3 border-b border-[var(--admin-line)] last:border-0">
                    <div class="min-w-0">
                        <div class="font-semibold truncate">{{ $course->title }}</div>
                        <div class="text-sm text-[var(--admin-muted)]">{{ ucfirst($course->status) }}</div>
                    </div>
                    <div class="text-sm font-semibold text-[var(--admin-brand)] whitespace-nowrap">
                        {{ $course->registrations_count }} enrolled
                    </div>
                </div>
            @empty
                <p class="dash-empty">No course data available.</p>
            @endforelse
        </div>
    </section>
</div>
@endsection

@push('scripts')
@if(count($chartLabels))
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var canvas = document.getElementById('registrationsChart');
    if (!canvas || typeof Chart === 'undefined') return;
    new Chart(canvas, {
        type: 'bar',
        data: {
            labels: @json($chartLabels),
            datasets: [{
                label: 'Registrations',
                data: @json($chartCounts),
                backgroundColor: 'rgba(42, 122, 155, 0.55)',
                borderColor: '#19506b',
                borderWidth: 1,
                borderRadius: 8,
                maxBarThickness: 42
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#122633',
                    padding: 10,
                    cornerRadius: 8
                }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: { color: '#5d7383', font: { family: 'Outfit', size: 11 } }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0,
                        color: '#5d7383',
                        font: { family: 'Outfit', size: 11 }
                    },
                    grid: { color: 'rgba(215, 228, 238, 0.7)' }
                }
            }
        }
    });
});
</script>
@endif
@endpush
