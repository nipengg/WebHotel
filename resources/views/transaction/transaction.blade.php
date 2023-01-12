@extends('layouts.layoutCustomer')

@section('content')
    <main>
        <article>
            <section class="hero" id="home"
                style="background-image: url({{ URL::asset('/file/' . @$room->FotoKamar) }})">
                <div class="container">
                    <h2 class="h1 hero-title">{{ $room->NamaKamar }}</h2>

                    <p class="hero-text">
                        {{ $room->TipeKamar }} - Fasilitas Kamar: {{ $room->FasilitasKamar }}
                    </p>
                </div>
            </section>

            <section class="tour-search">
                <div class="container">

                    <h2 class="h2 section-title">Book {{ $room->hotel->NamaHotel }} - {{ $room->NamaKamar }}</h2>

                    <br>

                    <form action="" class="tour-search-form tour-search-form-grid">
                        <div class="input-wrapper">
                            <label for="destination" class="input-label">Search Hotel</label>

                            <input type="text" name="destination" id="destination" required placeholder="Enter Hotel"
                                class="input-field">
                        </div>
                        
                        <div class="input-wrapper">
                            <label for="destination" class="input-label">Search Hotel</label>

                            <input type="text" name="destination" id="destination" required placeholder="Enter Hotel"
                                class="input-field">
                        </div>
                        <div class="input-wrapper">
                            <label for="destination" class="input-label">Search Hotel</label>

                            <input type="text" name="destination" id="destination" required placeholder="Enter Hotel"
                                class="input-field">
                        </div>
                        <div class="input-wrapper">
                            <label for="destination" class="input-label">Search Hotel</label>

                            <input type="text" name="destination" id="destination" required placeholder="Enter Hotel"
                                class="input-field">
                        </div>

                        <button type="submit" class="btn btn-secondary">Book</button>
                    </form>
                </div>
            </section>

        </article>
    </main>
@endsection
