@extends('layouts.page')
@section('content')
<div>
<section class="bg-gray-50 py-16">
  <div class="max-w-6xl mx-auto px-6 lg:px-8">
    <!-- Title -->
    <div class="text-center">
      <h2 class="text-4xl font-bold text-gray-800 mb-4">About Us</h2>
      <p class="text-lg text-gray-600 max-w-2xl mx-auto">
        We are dedicated to delivering innovative solutions and exceptional services 
        that help businesses and individuals achieve their goals.
      </p>
    </div>

    <!-- Content -->
    <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
      <!-- Image -->
      <div>
        <img src="{{ asset('storage/images/banner-homepage.jpg') }}" 
             alt="Our Team" 
             class="rounded-2xl shadow-lg">
      </div>

      <!-- Text -->
      <div>
        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Who We Are</h3>
        <p class="text-gray-600 mb-4">
          Our team consists of passionate professionals with expertise in 
          technology, design, and business strategy. We believe in building 
          meaningful partnerships and creating solutions that truly make 
          an impact.
        </p>
        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Our Mission</h3>
        <p class="text-gray-600 mb-4">
          To empower organizations through innovation, collaboration, 
          and a commitment to excellence, ensuring that our clients 
          thrive in a rapidly evolving digital world.
        </p>
        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Our Values</h3>
        <ul class="list-disc list-inside text-gray-600 space-y-2">
          <li>Integrity & Transparency</li>
          <li>Innovation & Creativity</li>
          <li>Customer-Centric Approach</li>
          <li>Collaboration & Teamwork</li>
        </ul>
      </div>
    </div>
  </div>
</section>

</div>

@endsection