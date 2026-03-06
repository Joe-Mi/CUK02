<x-layout>
  @push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/registration.css') }}">
  @endpush
  <!-- Landing Page -->
  <div class="header">
    <div class="overlay">
      <h1 class="header-title">2025 Registration</h1>
      <p class="header-subtitle">Register Today, Unlock Tomorrow’s Opportunities.</p>
    </div>
  </div>

  <!-- Main body -->
  <div class="container">
    @forelse($ticketTypes as $ticketType)
    <div class="card">
      <h2><i class="fas fa-user-tie"></i>{{$ticketType->type}}</h2>
      <div class="price">KES {{$ticketType->price}} (VAT inclusive)</div>
      <p><strong>Price per delegate</strong></p>
      <a href="{{ url('/ticket/create') }}?type={{$ticketType->id}}">
        <button>Register Now</button>
      </a>
    </div>
    @empty
    <!-- ticket unavailable Card -->
    <div class="card">
      <h2><i class=""></i> Thanks for Checking out !!! </h2>
      <p>Active Conferences are currently unavailable. please contact us for more information.
      </p>
      
    </div>
    @endforelse
  </div>

  <!-- Payment details -->
  <div class="payment">
    <h1>Payment Details</h1>

    <h2>Bank Transfer</h2>
    <div class="details">
      <strong>Account Name:</strong> The Co-operative University of Kenya<br>
      <strong>Bank:</strong> The Co-operative Bank of Kenya<br>
      <strong>Account Number:</strong> 01129062663601<br>
      <strong>Branch:</strong> Karen<br>
      <strong>Bank Code:</strong> 11<br>
      <strong>Branch Code:</strong> 135<br>
      <strong>SWIFT Code:</strong> KCOOKENA
    </div>

    <h2>M-PESA Payment</h2>
    <div class="details">
      <strong>Paybill Number:</strong> 400200<br>
      <strong>Account:</strong> 01129062663601<br>
      <strong>Amount:</strong> 69,600<br>
      <strong>Mpesa PIN:</strong> xxxx
    </div>

    <div class="price-box">
      <strong>Joint Co-operative Conference 2025 Fee (Inclusive of VAT):</strong><br>
      <span>Participant: <strong>KSH 69,600</strong></span>
      <p>That above fee covers meals, conference materials, conference proceedings publication. (Delegates will cater
        for their travels, accommodation and any other incidentals)</p>

    </div>
  </div>

  <!--MAIL HOVERING BUTTON-->
  <a href="mailto:coopconference@cuk.ac.ke" class="floating-button">
    <i class="fas fa-envelope"></i>
    <span class="button-label">Need help? Send us an email</span>
  </a>
</x-layout>