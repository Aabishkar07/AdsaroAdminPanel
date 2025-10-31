@php
    $faqs = App\Models\Faq::active()->ordered()->get();

@endphp


<section class="ezy__faq4 light">
    <div class="container">
        <div class="row justify-content-center mb-md-4">
            <div class="col-lg-8 col-xl-7 text-center">
                <h2 class="ezy__faq4-heading mb-3">Frequently Asked Questions</h2>
                <p class="ezy__faq4-sub-heading mb-0">
                    Find answers to common questions about our services and solutions. Can't find what you're looking
                    for?
                    <a href="{{ route('contact') }}" class="text-primary fw-bold">Contact us</a> for personalized
                    assistance.
                </p>
            </div>
        </div>

        @if ($faqs->count() > 0)
            <div class="row">
                @foreach ($faqs as $index => $faq)
                    <div class="col-md-6">
                        <div class="ezy__faq4-item mt-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            <button class="btn p-3 w-100 text-start d-flex justify-content-between align-items-center ezy__faq4-btn-collapse"
                                data-bs-toggle="collapse" data-bs-target="#faq{{ $faq->id }}"
                                aria-expanded="false" aria-controls="faq{{ $faq->id }}" type="button">
                                <span class="fw-semibold">{{ $faq->question }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="faq-icon">
                                    <path d="M6 9l6 6l6 -6" />
                                </svg>
                            </button>
                            <div class="collapse" id="faq{{ $faq->id }}">
                                <div class="ezy__faq4-content p-4">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <h6 class="mb-0 text-primary fw-semibold">Answer:</h6>
                                        <button class="btn btn-sm btn-outline-secondary faq-close-btn"
                                                onclick="closeFaq({{ $faq->id }})"
                                                title="Close this FAQ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="faq-answer">
                                        {!! nl2br(e($faq->answer)) !!}
                                    </div>
                                    <div class="mt-3 pt-3 border-top border-light">
                                        <small class="text-muted">
                                            <i class="fas fa-clock me-1"></i>
                                            Last updated: {{ $faq->updated_at->diffForHumans() }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        @else
            <div class="row">
                <div class="col-12">
                    <div class="text-center py-5">
                        <div class="empty-faq">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                stroke-linejoin="round" class="mb-3">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                                <path d="M12 17h.01"></path>
                            </svg>
                            <h5 class="text-muted mb-2">No FAQs Available</h5>
                            <p class="text-muted mb-4">We're working on adding frequently asked questions. Check back
                                soon!</p>
                            <a href="{{ route('contact') }}" class="btn btn-primary">
                                <i class="fas fa-envelope me-2"></i>
                                Ask a Question
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<style>
    .ezy__faq4 {
        --bs-body-color: #28303b;
        --bs-body-bg: #ffffff;
        --ezy-theme-color: #0d6efd;
        --ezy-item-bg: #ffffff;
        --ezy-item-shadow: 0 4px 24px rgba(159, 190, 218, 0.3);

        background-color: var(--bs-body-bg);
        padding: 60px 0;
    }

    @media (min-width: 768px) {
        .ezy__faq4 {
            padding: 100px 0;
        }
    }

    .ezy__faq4-heading {
        font-size: 32px;
        font-weight: 700;
        color: #6a68af;
    }

    .ezy__faq4-sub-heading {
        font-size: 16px;
        color: var(--bs-body-color);
        opacity: 0.8;
        line-height: 1.6;
    }

    .ezy__faq4-item {
        background: var(--ezy-item-bg);
        border-radius: 12px;
        box-shadow: 0 4px 24px rgba(218, 224, 230, 0.3);
        transition: all 0.3s ease;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .ezy__faq4-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 32px rgba(218, 224, 230, 0.4);
    }

    .ezy__faq4-btn-collapse {
        background-color: transparent;
        font-weight: 600;
        font-size: 16px;
        color: var(--bs-body-color);
        transition: all 0.3s ease;
        border: none;
        text-decoration: none;
        width: 100%;
        text-align: left;
    }

    .ezy__faq4-btn-collapse:hover {
        background-color: rgba(13, 110, 253, 0.05);
        color: var(--ezy-theme-color);
    }

    .ezy__faq4-btn-collapse:focus {
        box-shadow: none;
        outline: none;
    }

    .faq-icon {
        transition: transform 0.3s ease;
        color: #6c757d;
        flex-shrink: 0;
    }

    .ezy__faq4-btn-collapse[aria-expanded="true"] .faq-icon {
        transform: rotate(-180deg);
        color: var(--ezy-theme-color);
    }

    .ezy__faq4-content {
        background: var(--ezy-item-bg);
        border-top: 1px solid #e9ecef;
        border-radius: 0 0 12px 12px;
    }

    .faq-answer {
        line-height: 1.6;
        color: #495057;
    }

    .faq-answer p {
        margin-bottom: 0.5rem;
    }

    .faq-answer p:last-child {
        margin-bottom: 0;
    }

    .faq-close-btn {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        border-radius: 0.375rem;
        transition: all 0.2s ease;
    }

    .faq-close-btn:hover {
        background-color: #dc3545;
        border-color: #dc3545;
        color: white;
    }

    /* FAQ Stats */
    .faq-stats {
        margin-top: 3rem;
    }

    .stat-item {
        text-align: center;
        padding: 1rem;
        background: rgba(13, 110, 253, 0.05);
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .stat-item:hover {
        background: rgba(13, 110, 253, 0.1);
        transform: translateY(-2px);
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        color: var(--ezy-theme-color);
        line-height: 1;
    }

    .stat-label {
        font-size: 0.875rem;
        color: #6c757d;
        margin-top: 0.25rem;
    }

    /* Empty State */
    .empty-faq {
        padding: 3rem 1rem;
    }

    .empty-faq svg {
        color: #6c757d;
        opacity: 0.5;
    }

    /* Responsive */
    @media (max-width: 767px) {
        .ezy__faq4-heading {
            font-size: 24px;
        }

        .ezy__faq4-sub-heading {
            font-size: 14px;
        }

        .stat-number {
            font-size: 1.5rem;
        }

        .stat-label {
            font-size: 0.75rem;
        }
    }

    /* Animation for FAQ items */
    .ezy__faq4-item {
        animation: fadeInUp 0.6s ease-out;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Smooth collapse animation */
    .collapse {
        transition: all 0.3s ease;
    }

    .collapsing {
        transition: height 0.3s ease;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Bootstrap collapse functionality
    const faqButtons = document.querySelectorAll('.ezy__faq4-btn-collapse');

    faqButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            const targetId = this.getAttribute('data-bs-target');
            const targetElement = document.querySelector(targetId);
            const isExpanded = this.getAttribute('aria-expanded') === 'true';

            // Toggle the collapse
            if (isExpanded) {
                // Close the FAQ
                closeFaq(targetId.replace('#faq', ''));
            } else {
                // Close all other FAQs first
                faqButtons.forEach(otherButton => {
                    if (otherButton !== this) {
                        const otherTargetId = otherButton.getAttribute('data-bs-target');
                        const otherTargetElement = document.querySelector(otherTargetId);
                        otherTargetElement.classList.remove('show');
                        otherButton.setAttribute('aria-expanded', 'false');
                    }
                });

                // Open this FAQ
                targetElement.classList.add('show');
                this.setAttribute('aria-expanded', 'true');
            }

            // Smooth scroll to the FAQ
            setTimeout(() => {
                if (!isExpanded) {
                    this.scrollIntoView({
                        behavior: 'smooth',
                        block: 'nearest'
                    });
                }
            }, 300);

            // Analytics tracking
            const question = this.querySelector('span').textContent;
            console.log(`FAQ ${isExpanded ? 'closed' : 'opened'}: ${question}`);
        });
    });

    // Add keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
            const activeElement = document.activeElement;
            if (activeElement.classList.contains('ezy__faq4-btn-collapse')) {
                e.preventDefault();
                activeElement.click();
            }
        }
    });

    // Add escape key to close all FAQs
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeAllFaqs();
        }
    });
});

// Function to close a specific FAQ
function closeFaq(faqId) {
    const targetElement = document.querySelector(`#faq${faqId}`);
    const button = document.querySelector(`[data-bs-target="#faq${faqId}"]`);

    if (targetElement && button) {
        targetElement.classList.remove('show');
        button.setAttribute('aria-expanded', 'false');

        // Analytics tracking
        const question = button.querySelector('span').textContent;
        console.log(`FAQ closed via close button: ${question}`);
    }
}

// Function to close all FAQs
function closeAllFaqs() {
    const faqButtons = document.querySelectorAll('.ezy__faq4-btn-collapse');

    faqButtons.forEach(button => {
        const targetId = button.getAttribute('data-bs-target');
        const targetElement = document.querySelector(targetId);
        targetElement.classList.remove('show');
        button.setAttribute('aria-expanded', 'false');
    });

    console.log('All FAQs closed via Escape key');
}
</script>

