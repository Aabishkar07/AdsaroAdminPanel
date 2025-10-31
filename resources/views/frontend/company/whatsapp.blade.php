@php
    use App\Models\Setting;
    $setting = Setting::find(1);
@endphp

<div class="position-fixed" style="bottom: 9px; right: 10px; z-index: 1050;" title="Click to chat on WhatsApp">
    <a href="https://wa.me/{{ $setting->contact_number }}" target="_blank">
        <img src="{{ asset('img/whatsapplogo.png') }}" class="img-fluid" style="height: 56px; width: 56px;" alt="WhatsApp" />
    </a>
</div>
