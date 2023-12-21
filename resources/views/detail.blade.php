@extends('layout.app')
@section('content')
    <!-- end header inner -->
    <!-- end header -->
    {{-- <div class="back_re">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>About Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- about -->
    <div class="about">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="titlepage">

                        <p class="margin_0">The passage experienced a surge in popularity during the 1960s when Letraset
                            used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the
                            text with their software. Today it's seen all around the web; on templates, websites, and stock
                            designs. Use our generator to get your own, or read on for the authoritative history of lorem
                            ipsum. </p>
                        <button class="book_btn">Book Now</button>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="about_img">
                        <figure><img src="{{ asset('storage/room-images/' . $room->image_1) }}" alt="#" /></figure>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-top: 5px;">
                        <img src="{{ asset('storage/room-images/' . $room->image_2) }}" alt=""
                            style="width: 180px;height:150px;object-fit:cover;">

                        <img src="{{ asset('storage/room-images/' . $room->image_3) }}" alt=""
                            style="width: 180px;height:150px;object-fit:cover;">

                        <img src="{{ asset('storage/room-images/' . $room->image_4) }}" alt=""
                            style="width: 180px;height:150px;object-fit:cover;">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end about -->
@endsection
