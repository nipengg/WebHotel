@extends('layouts.layoutCustomer')

@section('content')
    <main>
        <article>
            <section class="hero-order" id="home">
                <div class="container">
                    <h2 class="h1 hero-title">Your Order</h2>
                </div>
            </section>

            <section class="package" id="package">
                <div class="container">

                    <p class="section-subtitle">Order</p>

                    <h2 class="h2 section-title">Your Booking Order</h2>

                    <br>

                    <ul class="package-list">
                        @foreach ($transactions as $item)
                            <li>
                                <div class="package-card">

                                    <figure class="card-banner">
                                        <img src="{{ URL::asset('/file/' . @$item->room->FotoKamar) }}"
                                            alt="Experience The Great Holiday" loading="lazy">
                                    </figure>

                                    <div class="card-content">

                                        <h3 class="h3 card-title">{{ $item->hotel->NamaHotel }} -
                                            {{ $item->room->NamaKamar }}</h3>

                                        <p class="card-text">
                                            {{ $item->hotel->AlamatHotel }}
                                        </p>

                                        <p class="card-text">
                                            Fasilitas: {{ $item->room->FasilitasKamar }}
                                        </p>

                                        <p class="card-text">
                                            Check In: {{ $item->TanggalCheckIn }} | Check Out: {{ $item->TanggalCheckOut }}
                                        </p>

                                        <ul class="card-meta-list">

                                            <li class="card-meta-item">
                                                <div class="meta-box">
                                                    <ion-icon name="card-outline"></ion-icon>

                                                    <p class="text">{{ $item->JenisPayment }}</p>
                                                </div>
                                            </li>

                                            <li class="card-meta-item">
                                                <div class="meta-box">
                                                    <ion-icon name="people"></ion-icon>

                                                    <p class="text">{{ $item->JumlahOrang }}</p>
                                                </div>
                                            </li>

                                            @if ($today < $item->TanggalCheckIn)
                                                <li class="card-meta-item">
                                                    <div class="meta-box">
                                                        <ion-icon name="alarm-outline"></ion-icon>

                                                        <p class="text">Upcoming</p>
                                                    </div>
                                                </li>
                                            @elseif ($today >= $item->TanggalCheckIn && $today <= $item->TanggalCheckOut)
                                                <li class="card-meta-item">
                                                    <div class="meta-box">
                                                        <ion-icon name="bed-outline"></ion-icon>

                                                        <p class="text">On Going</p>
                                                    </div>
                                                </li>
                                            @elseif ($today > $item->TanggalCheckOut)
                                                <li class="card-meta-item">
                                                    <div class="meta-box">
                                                        <ion-icon name="checkmark-circle-outline"></ion-icon>

                                                        <p class="text">Done</p>
                                                    </div>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>

                                    <div class="card-price">
                                        Total
                                        <p class="price">
                                            @currency($item->Harga)
                                            <span>{{ $item->Harga / $item->room->HargaKamar }} Night</span>
                                        </p>
                                    </div>

                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        </article>
    </main>
@endsection
