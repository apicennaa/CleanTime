@extends('layouts.app', ['hideNavbar' => true, 'hideFooter' => true])

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-8 text-center">Edit Your Service Details</h1>
    <form class="service-form" action="{{ route('cleaner.services.update', $service->service_name) }}" method="POST" enctype="multipart/form-data" style="background: white; padding: 2rem; border-radius: 10px; box-shadow: 0 0 20px rgba(0,0,0,0.1);">
        @csrf
        @method('PUT')
        <div class="form-group mb-4">
            <label for="service_name" class="block text-gray-700 font-medium">Service Name*</label>
            <input type="text" id="service_name" name="service_name" value="{{ $service->service_name }}" placeholder="Enter service name" required class="w-full p-3 border rounded-lg">
        </div>

        <div class="form-group mb-4">
            <label for="service_description" class="block text-gray-700 font-medium">Service Description*</label>
            <textarea id="service_description" name="service_description" rows="4" placeholder="Describe the service details" required class="w-full p-3 border rounded-lg">{{ $service->service_description }}</textarea>
        </div>

        <div class="form-group mb-4">
            <label for="service_price" class="block text-gray-700 font-medium">Price *</label>
            <input type="number" id="service_price" name="service_price" value="{{ $service->service_price }}" step="0.01" placeholder="Enter service price" required class="w-full p-3 border rounded-lg">
        </div>

        <div class="form-group mb-4">
            <label for="service_image" class="block text-gray-700 font-medium">Service Image *</label>
            <input type="file" id="service_image" name="service_image" accept="image/*" class="w-full p-3 border rounded-lg">
            @if ($service->service_image)
                <div class="mt-4">
                    <img src="{{ asset('storage/' . $service->service_image) }}" alt="Service Image" class="max-w-full h-auto rounded-lg">
                </div>
            @endif
        </div>

        <button type="submit" class="submit-btn bg-teal-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-teal-600 flex items-center gap-2">
            <span>📤</span>
            Update Service
        </button>
    </form>
</div>
@endsection