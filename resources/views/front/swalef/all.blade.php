@extends('layouts.front.hawdaj_master')
@section('content')

<section class="filter-grid-section filter-grid-section--height">
    <div class="container">
    <h2 class="page-title mb-4">Obcaecati modi et nu</h2>
        <div class="section-boxes container">

            <!-- anim-project a1 -->
            <div class="section-boxes-wrap">
                <a href="{{ url(app()->getLocale() . '/swalefsonepage') }}">
                <div class="section-title">
                    <div class="section-projects-overflow">
                        <div class="section-box ">
                            <div class="swiper-container swiper3">
                                <div class="swiper-wrapper">
                                    <div class="swiper-zooms swiper-slide">
                                        <div class="swiper-zoom-container">
                                            <img src="{{asset('front_assets/imgs/our-services.jpg')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="title-area">
                            <div class="project-type">Design and Development</div>
                            <div class="project-title">consectetur adipisicing.</div>
                            <span class="type-project">lecture</span>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <!-- anim-project a1 -->
 

        </div>
    </div>
</section>

@endsection