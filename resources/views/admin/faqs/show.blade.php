@extends('admin/layouts/app')
@section('page_title', 'FAQ Details')
@section('faq_select', 'bg-black text-white')
@section('body')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">FAQ Details</h4>
                    <div class="btn-group" role="group">
                        <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to FAQs
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h5 class="text-primary">Question</h5>
                                <p class="lead">{{ $faq->question }}</p>
                            </div>

                            <div class="mb-4">
                                <h5 class="text-primary">Answer</h5>
                                <div class="border rounded p-3 bg-light">
                                    {!! nl2br(e($faq->answer)) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="mb-0">FAQ Information</h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <strong>Display Order:</strong>
                                        <span class="badge bg-info">{{ $faq->order }}</span>
                                    </div>

                                    <div class="mb-3">
                                        <strong>Status:</strong>
                                        @if($faq->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <strong>Created:</strong>
                                        <p class="mb-1">{{ $faq->created_at->format('F d, Y \a\t g:i A') }}</p>
                                    </div>

                                    <div class="mb-3">
                                        <strong>Last Updated:</strong>
                                        <p class="mb-1">{{ $faq->updated_at->format('F d, Y \a\t g:i A') }}</p>
                                    </div>

                                    <div class="mb-3">
                                        <strong>FAQ ID:</strong>
                                        <p class="mb-1">{{ $faq->id }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3">
                                <div class="card-header">
                                    <h6 class="mb-0">Actions</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-grid gap-2">
                                        <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-primary">
                                            <i class="fas fa-edit"></i> Edit FAQ
                                        </a>

                                        <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this FAQ? This action cannot be undone.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger w-100">
                                                <i class="fas fa-trash"></i> Delete FAQ
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
