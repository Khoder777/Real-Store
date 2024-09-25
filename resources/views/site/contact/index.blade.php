@extends('site.layout.master')
@section('content')
        <!-- Hero Start -->
     
        <!-- Contact Start -->
        <div class="container-fluid contact py-5 mt-5">
            <div class="container py-5">
                <div class="p-5 bg-light rounded">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="text-center mx-auto" style="max-width: 700px;">
                                <h1 class="text-primary">Get in touch</h1>
                              
                                <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
                            </div>
                        </div>
                          @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                        <div class="col-lg-12">
                            <div class="h-100 rounded">
                                <iframe class="rounded w-100"  style="height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3273.168251512003!2d35.8851958564148!3d34.87712111034022!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15217e77890fb9a3%3A0xa072a491096e24b!2z2LfYsdi32YjYs9iMINiz2YjYsdmK2Kc!5e0!3m2!1sar!2s!4v1726387989275!5m2!1sar!2s" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <form action="{{ route('site.contact') }}" method="post">
                                @csrf
                                <input name='full_name' type="text" class="w-100 form-control border-0 py-3 mb-4 @error('full_name') is-invalid @enderror" placeholder="Your Name">
                                @error('full_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                                <input name='email' type="email" class="w-100 form-control border-0 py-3 mb-4  @error('email') is-invalid @enderror" placeholder="Enter Your Email">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                                <textarea name='message' class="w-100 form-control border-0 mb-4  @error('full_name') is-invalid @enderror" rows="5" cols="10" placeholder="Your Message"></textarea>
                                @error('message')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                                <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary " type="submit">Submit</button>
                            </form>
                        </div>
                        <div class="col-lg-5">
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Address</h4>
                                    <p class="mb-2">حديقة الطلائع,الباب الجنوبي,مقابل الحلاق فؤاد,منزل م.خضر سليمان المحترم</p>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Mail Us</h4>
                                    <p class="mb-2">koderslman790@gmail</p>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded bg-white">
                                <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Telephone</h4>
                                    <p class="mb-2">(+963) 962007275</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

        @endsection