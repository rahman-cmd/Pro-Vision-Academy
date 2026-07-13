@extends('admin.layouts.app')

@section('title', 'Dashboard — Admin')
@section('page_title', 'Dashboard')
@section('page_subtitle', 'Academy overview and quick management')

@section('content')
<div class="dash-welcome">
    <div>
        <h1>Welcome back{{ auth()->user()?->first_name ? ', ' . auth()->user()->first_name : '' }}</h1>
        <p>Monitor courses, students, and website content from one place.</p>
    </div>
    <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-full bg-[var(--admin-brand)] text-white text-sm font-semibold hover:bg-[var(--admin-brand-deep)] transition">
        <i class="fas fa-globe"></i> Open Website
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
            <div class="dash-stat__meta">{{ $stats['total_registrations'] ?? 0 }} registrations</div>
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
        <div class="dash-stat__icon"><i class="fas fa-images"></i></div>
        <div>
            <p class="dash-stat__label">Gallery</p>
            <div class="dash-stat__value">{{ $stats['total_gallery_items'] ?? 0 }}</div>
            <div class="dash-stat__meta">{{ $stats['active_testimonials'] ?? 0 }} testimonials</div>
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
            <a href="{{ route('admin.courses.create') }}" class="dash-action">
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
            <a href="{{ route('admin.students') }}" class="text-sm font-semibold text-[var(--admin-brand)]">View all</a>
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
                                <td>
                                    {{ optional($registration->user)->first_name }}
                                    {{ optional($registration->user)->last_name }}
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
                <p class="dash-empty">No registrations yet.</p>
            @endif
        </div>
    </section>

    <section class="dash-panel">
        <div class="dash-panel__head">
            <h2>Upcoming Courses</h2>
            <a href="{{ route('admin.courses.index') }}" class="text-sm font-semibold text-[var(--admin-brand)]">Manage</a>
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
</div>

<div class="dash-grid">
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

    <section class="dash-panel">
        <div class="dash-panel__head">
            <h2>Recent News</h2>
            <a href="{{ route('admin.news.index') }}" class="text-sm font-semibold text-[var(--admin-brand)]">Manage</a>
        </div>
        <div class="dash-panel__body">
            @forelse(($recentNews ?? collect()) as $item)
                <div class="py-3 border-b border-[var(--admin-line)] last:border-0">
                    <div class="font-semibold">{{ $item->title }}</div>
                    <div class="text-sm text-[var(--admin-muted)] mt-0.5">
                        {{ optional($item->published_date)->format('d M Y') ?? optional($item->created_at)->format('d M Y') }}
                    </div>
                </div>
            @empty
                <p class="dash-empty">No published news yet.</p>
            @endforelse
        </div>
    </section>
</div>
@endsection
