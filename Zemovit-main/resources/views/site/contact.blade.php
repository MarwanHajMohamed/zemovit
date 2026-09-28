@extends('site.layouts.master')
@section('title')
    {{ 'Contact Page'  }}
@endsection
@section('content')
<!-- ===================================
 ==================start page content========================
 ============================================================ -->
@php($contact = home_setting(\App\Enums\SectionNamesEnum::Contact))
<main>
    <!-- Contact us  -->
    <!-- Contact Us -->
    <section class="Contact" id="Contact">
        <div class="mainHeading center">
            <span class="subTitle fadeIn">
           {{$contact->title ?? __('site.contact_us')}}
            </span>
            <h2 class="split-text">
                {{$contact->subtitle ?? __('site.lets_talk') }}

             <span class="MainColor">
             {{$contact->subtitle2 ?? __('site.lets_talk') }}

             </span>
            </h2>
        </div>
        <div class="container h-full d-grid lg:grid-col-2 grid-col-1 gap-8 items-center">
            <!-- Form -->
            <form id="contactForm" class="d-flex flex-col gap-10 @if(app()->getLocale() === 'ar') text-end @endif">
                @csrf
                <!-- Name Field -->
                <div class="formGroup fadeIn">
                    <label for="name" class="capitalize d-inline-block pb-4">{{ __('site.form.name') }}</label>
                    <input type="text" class="p-8 w-full max-w-full round-8 h-30" id="name" name="name"
                           placeholder="{{ __('site.form.name_placeholder') }}" required>
                    <div class="invalid-feedback" id="nameError" style="display: none;">
                        {{ __('site.form.validation.name_required') }}
                    </div>
                </div>
                <!-- Email Field -->
                <div class="formGroup fadeIn">
                    <label for="email" class="capitalize d-inline-block pb-4">{{ __('site.form.email') }}</label>
                    <input type="email" class="p-8 w-full max-w-full round-8 h-30" id="email" name="email"
                           placeholder="{{ __('site.form.email_placeholder') }}" required>
                    <div class="invalid-feedback" id="emailError" style="display: none;">
                        {{ __('site.form.validation.email_required') }}
                    </div>
                </div>
                <!-- Phone Field -->
                <div class="formGroup fadeIn">
                    <label for="phone" class="capitalize d-inline-block pb-4">{{ __('site.form.phone') }}</label>
                    <input type="tel" class="p-8 w-full max-w-full round-8 h-30" id="phone" name="phone"
                           placeholder="{{ __('site.form.phone_placeholder') }}">
                    <div class="invalid-feedback" id="phoneError" style="display: none;">
                        {{ __('site.form.validation.phone_required') }}
                    </div>
                </div>
                <!-- Message Field -->
                <div class="formGroup fadeIn">
                    <label for="message" class="capitalize d-inline-block pb-4">{{ __('site.form.message') }}</label>
                    <textarea class="p-8 w-full max-w-full round-8 h-100" id="message" name="message"
                              placeholder="{{ __('site.form.message_placeholder') }}" required></textarea>
                    <div class="invalid-feedback" id="messageError" style="display: none;">
                        {{ __('site.form.validation.message_required') }}
                    </div>
                </div>
                <!-- reCAPTCHA Field -->
                <div class="formGroup">
                    {!! NoCaptcha::renderJs(app()->getLocale()) !!}
                    {!! NoCaptcha::display() !!}
                    <div class="invalid-feedback" id="recaptchaError" style="display: none;">
                        {{ __('site.form.validation.recaptcha_required') }}
                    </div>
                </div>
                <!-- Submit Button -->
                <button type="submit" class="btn btn-rounded w-1/4 mx-auto text-white" id="submitBtn">
                    <span>{{ __('site.form.send_button') }}</span>
                </button>
            </form>
            <!-- Contact Info / Map -->
            <div class="location w-full h-full fadeIn">
                <iframe
                    @if(setting('map_link') == null)

                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7073.204161807379!2d-0.031935668845769545!3d51.5693321119324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2z2YTZhtiv2YbYjCDYp9mE2YXZhdmE2YPYqSDYp9mE2YXYqtit2K_YqQ!5e0!3m2!1sar!2seg!4v1751370425361!5m2!1sar!2seg"
                    @else
                   src = "{{setting('map_link')}}"
                    @endif
                    style="border: 0"
                    allowfullscreen="true"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
            </div>
        </div>
    </section>
    <!-- Success Modal -->
    <div class="modal" id="successModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <div class="mb-4">
                        <i class="fa-solid fa-check-circle text-success" style="font-size: 5rem;"></i>
                    </div>
                    <h4 class="mb-3">{{ __('site.modal.thank_you') }}</h4>
                    <p class="mb-4">{{ __('site.modal.success_message') }}</p>
                    <button type="button" class="btn btn-rounded text-white" data-bs-dismiss="modal">
                        {{ __('site.modal.close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- faq -->

</main>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"
></script>
<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"
></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- SplitText -->
<script src="{{asset('site')}}/js/SplitText.min.js"></script>
<!-- lenis -->
<script src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@latest/dist/lenis.min.js"></script>
<!-- custom -->
<script src="{{asset('site')}}/js/main.js?=v3"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Swper JS -->
<script>
    $(document).ready(function() {
        // Form submission handler
        $('#contactForm').on('submit', function(e) {
            e.preventDefault();

            // Reset error messages
            $('.invalid-feedback').hide();
            $('.formGroup').removeClass('has-error');

            // Validate form fields
            let isValid = true;

            // Name validation
            if ($('#name').val().trim() === '') {
                $('#nameError').show();
                $('#name').parent().addClass('has-error');
                isValid = false;
            }

            // Email validation
            const email = $('#email').val().trim();
            if (email === '') {
                $('#emailError').show();
                $('#email').parent().addClass('has-error');
                isValid = false;
            } else if (!isValidEmail(email)) {
                $('#emailError').text('{{ __("site.form.validation.email_invalid") }}').show();
                $('#email').parent().addClass('has-error');
                isValid = false;
            }

            // Message validation
            if ($('#message').val().trim() === '') {
                $('#messageError').show();
                $('#message').parent().addClass('has-error');
                isValid = false;
            }

            // reCAPTCHA validation
            const recaptchaResponse = grecaptcha.getResponse();
            if (recaptchaResponse.length === 0) {
                $('#recaptchaError').show();
                $('.g-recaptcha').parent().addClass('has-error');
                isValid = false;
            }

            if (isValid) {
                submitForm();
            }
        });

        // Email validation function
        function isValidEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        // AJAX form submission
        function submitForm() {
            const form = $('#contactForm');
            const submitBtn = $('#submitBtn');
            const originalBtnText = submitBtn.html();
            // Get form data
            const formData = new FormData(form[0]);

            // Add reCAPTCHA response
            formData.append('g-recaptcha-response', grecaptcha.getResponse());

            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if(response.message) {
                        const successModal = new bootstrap.Modal(document.getElementById('successModal'), {
                            backdrop: false,
                            keyboard: true
                        });
                        successModal.show();
                        setTimeout(() => successModal.hide(), 3000); // closes after 3 seconds
                    }
                    form.trigger('reset');
                    grecaptcha.reset();
                },
                error: function(xhr) {
                    // Handle errors
                    let errorMessage = '{{ __("site.form.error_message") }}';
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        const errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            const errorId = key + 'Error';
                            $('#' + errorId).text(value[0]).show();
                            $('#' + key).parent().addClass('has-error');
                        });
                        errorMessage = value[0];
                    }
                    alert(errorMessage);
                },
                complete: function() {
                    // Reset button state
                    submitBtn.prop('disabled', false);
                    submitBtn.html(originalBtnText);
                }
            });
        }

        // Optional: Add real-time validation as users type
        $('#name, #email, #phone, #message').on('input', function() {
            const field = $(this);
            const errorId = '#' + field.attr('id') + 'Error';

            if (field.val().trim() !== '') {
                field.parent().removeClass('has-error');
                $(errorId).hide();
            }

            // Special case for email validation
            if (field.attr('id') === 'email' && field.val().trim() !== '' && !isValidEmail(field.val().trim())) {
                $(errorId).text('{{ __("site.form.validation.email_required") }}').show();
                field.parent().addClass('has-error');
            }
        });
    });


</script>

@endsection
