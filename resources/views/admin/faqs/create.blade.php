@extends('admin/layouts/app')
@section('page_title', 'Create FAQ')
@section('faq_select', 'bg-black text-white')
@section('body')
    <div class="w-full">
        @include('admin.include.toastmessage')

        <div class="px-4 flex justify-between w-full">
            <div class="text-xl font-bold">Create New FAQ</div>
            <div class="flex">
                <a href="{{ route('admin.faqs.index') }}"
                    class="bg-gray-500 rounded-lg text-white px-3 py-1 text-sm flex gap-2 items-center hover:bg-gray-600 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 12H5"></path>
                        <path d="M12 19l-7-7 7-7"></path>
                    </svg>
                    <span>Back to FAQs</span>
                </a>
            </div>
        </div>

        <div class="py-1">
            <div class="bg-white rounded-lg shadow-md p-6 mt-4">
                <form action="{{ route('admin.faqs.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Main Content -->
                        <div class="lg:col-span-2">
                            <div class="space-y-6">
                                <!-- Question Field -->
                                <div>
                                    <label for="question" class="block text-sm font-medium text-gray-700 mb-2">
                                        Question <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <input type="text"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('question') border-red-500 @enderror"
                                               id="question"
                                               name="question"
                                               value="{{ old('question') }}"
                                               placeholder="Enter the question here..."
                                               maxlength="500"
                                               required>
                                        <div class="absolute right-3 top-3 text-xs text-gray-400" id="question-counter">
                                            500 characters remaining
                                        </div>
                                    </div>
                                    @error('question')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Answer Field -->
                                <div>
                                    <label for="answer" class="block text-sm font-medium text-gray-700 mb-2">
                                        Answer <span class="text-red-500">*</span>
                                    </label>
                                    <textarea class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('answer') border-red-500 @enderror"
                                              id="answer"
                                              name="answer"
                                              rows="8"
                                              placeholder="Enter the answer here..."
                                              required>{{ old('answer') }}</textarea>
                                    @error('answer')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Sidebar Settings -->
                        <div class="lg:col-span-1">
                            <div class="bg-gray-50 rounded-lg p-6 space-y-6">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Settings</h3>

                                <!-- Display Order -->
                                <div>
                                    <label for="order" class="block text-sm font-medium text-gray-700 mb-2">
                                        Display Order
                                    </label>
                                    <input type="number"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('order') border-red-500 @enderror"
                                           id="order"
                                           name="order"
                                           value="{{ old('order', App\Models\Faq::max('order') + 1) }}"
                                           min="0"
                                           placeholder="0">
                                    @error('order')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-1 text-xs text-gray-500">Lower numbers appear first</p>
                                </div>

                                <!-- Status Toggle -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Status
                                    </label>
                                    <div class="flex items-center">
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox"
                                                   class="sr-only peer"
                                                   id="is_active"
                                                   name="is_active"
                                                   {{ old('is_active', true) ? 'checked' : '' }}>
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                            <span class="ml-3 text-sm font-medium text-gray-900" id="status-label">
                                                Active
                                            </span>
                                        </label>
                                    </div>
                                    <p class="mt-1 text-xs text-gray-500">Inactive FAQs won't be displayed on the frontend</p>
                                </div>

                                <!-- Preview Card -->
                                <div class="bg-white rounded-lg p-4 border border-gray-200">
                                    <h4 class="text-sm font-medium text-gray-900 mb-2">Preview</h4>
                                    <div class="text-xs text-gray-600 space-y-1">
                                        <p><strong>Question:</strong> <span id="preview-question">Enter question to see preview...</span></p>
                                        <p><strong>Answer:</strong> <span id="preview-answer">Enter answer to see preview...</span></p>
                                        <p><strong>Order:</strong> <span id="preview-order">{{ App\Models\Faq::max('order') + 1 }}</span></p>
                                        <p><strong>Status:</strong> <span id="preview-status" class="text-green-600">Active</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.faqs.index') }}"
                           class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                            Cancel
                        </a>
                        <button type="submit"
                                class="px-6 py-2 bg-[#04033b] text-white rounded-lg hover:bg-[#020123] transition-colors flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                <polyline points="17,21 17,13 7,13 7,21"></polyline>
                                <polyline points="7,3 7,8 15,8"></polyline>
                            </svg>
                            Create FAQ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const questionInput = document.getElementById('question');
    const answerInput = document.getElementById('answer');
    const orderInput = document.getElementById('order');
    const statusToggle = document.getElementById('is_active');
    const questionCounter = document.getElementById('question-counter');
    const statusLabel = document.getElementById('status-label');

    // Preview elements
    const previewQuestion = document.getElementById('preview-question');
    const previewAnswer = document.getElementById('preview-answer');
    const previewOrder = document.getElementById('preview-order');
    const previewStatus = document.getElementById('preview-status');

    // Character counter for question
    function updateQuestionCounter() {
        const remaining = 500 - questionInput.value.length;
        questionCounter.textContent = `${remaining} characters remaining`;
        questionCounter.className = `absolute right-3 top-3 text-xs ${remaining < 50 ? 'text-red-500' : 'text-gray-400'}`;
    }

    // Update preview
    function updatePreview() {
        previewQuestion.textContent = questionInput.value || 'Enter question to see preview...';
        previewAnswer.textContent = answerInput.value || 'Enter answer to see preview...';
        previewOrder.textContent = orderInput.value || '0';

        const isActive = statusToggle.checked;
        statusLabel.textContent = isActive ? 'Active' : 'Inactive';
        previewStatus.textContent = isActive ? 'Active' : 'Inactive';
        previewStatus.className = isActive ? 'text-green-600' : 'text-red-600';
    }

    // Event listeners
    questionInput.addEventListener('input', function() {
        updateQuestionCounter();
        updatePreview();
    });

    answerInput.addEventListener('input', updatePreview);
    orderInput.addEventListener('input', updatePreview);
    statusToggle.addEventListener('change', updatePreview);

    // Initialize
    updateQuestionCounter();
    updatePreview();
});
</script>
@endsection
