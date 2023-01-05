@extends('layouts.front.hawdaj_master')
@section('content')

<section class="filter-grid-section filter-grid-section--height">
    <div class="container">
        <h2 class="page-title mb-4">Obcaecati modi et nu</h2>
        <div class="section-boxes container">

            <!-- anim-project a1 -->
            <div class="section-boxes-wrap">

                <div class="section-title">
                    <div class="section-projects-overflow">
                        <div class="card-row">
                            <div class="card-seation">
                                <a href="{{ url(app()->getLocale() . '/swalefsonepage') }}">
                                    <div class="swiper-zoom-container">
                                        <!-- <span class="wishlist"><i class="fa-regular fa-heart"></i></span> -->
                                        <img src="{{asset('front_assets/imgs/our-services.jpg')}}">
                                        <span class="date-card"> <i class="fa-solid fa-calendar-days"></i>
                                            12-1-2023</span>
                                    </div>
                                    <div class="title-area">
                                        <div class="project-type"><span>Design and Development</span></div>
                                        <div class="project-title"><span>consectetur adipisicing.</span></div>
                                        <div class="arte-type d-flex justify-content-between">
                                            <span class="type-project"><span>lecture</span></span>
                                            <span class="rate-project">
                                                <em class="rating-">
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>

                                                </em>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="see-more-n">
                                        <span class="see-m-nd">
                                            see more
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <!-- <div class="card-seation">
                                <a href="{{ url(app()->getLocale() . '/swalefsonepage') }}">
                                    <div class="swiper-zoom-container">
                                        <img src="{{asset('front_assets/imgs/our-services.jpg')}}">
                                    </div>
                                    <div class="title-area">
                                        <div class="project-type">Design and Development</div>
                                        <div class="project-title">consectetur adipisicing.</div>
                                        <span class="type-project">lecture</span>
                                    </div>
                                </a>
                            </div>
                            <div class="card-seation">
                                <a href="{{ url(app()->getLocale() . '/swalefsonepage') }}">
                                    <div class="swiper-zoom-container">
                                        <img src="{{asset('front_assets/imgs/our-services.jpg')}}">
                                    </div>
                                    <div class="title-area">
                                        <div class="project-type">Design and Development</div>
                                        <div class="project-title">consectetur adipisicing.</div>
                                        <span class="type-project">lecture</span>
                                    </div>
                                </a>
                            </div>
                            <div class="card-seation">
                                <a href="{{ url(app()->getLocale() . '/swalefsonepage') }}">
                                    <div class="swiper-zoom-container">
                                        <img src="{{asset('front_assets/imgs/our-services.jpg')}}">
                                    </div>
                                    <div class="title-area">
                                        <div class="project-type">Design and Development</div>
                                        <div class="project-title">consectetur adipisicing.</div>
                                        <span class="type-project">lecture</span>
                                    </div>
                                </a>
                            </div>
                            <div class="card-seation">
                                <a href="{{ url(app()->getLocale() . '/swalefsonepage') }}">
                                    <div class="swiper-zoom-container">
                                        <img src="{{asset('front_assets/imgs/our-services.jpg')}}">
                                    </div>
                                    <div class="title-area">
                                        <div class="project-type">Design and Development</div>
                                        <div class="project-title">consectetur adipisicing.</div>
                                        <span class="type-project">lecture</span>
                                    </div>
                                </a>
                            </div>
                            <div class="card-seation">
                                <a href="{{ url(app()->getLocale() . '/swalefsonepage') }}">
                                    <div class="swiper-zoom-container">
                                        <img src="{{asset('front_assets/imgs/our-services.jpg')}}">
                                    </div>
                                    <div class="title-area">
                                        <div class="project-type">Design and Development</div>
                                        <div class="project-title">consectetur adipisicing.</div>
                                        <span class="type-project">lecture</span>
                                    </div>
                                </a>
                            </div>
                            <div class="card-seation">
                                <a href="{{ url(app()->getLocale() . '/swalefsonepage') }}">
                                    <div class="swiper-zoom-container">
                                        <img src="{{asset('front_assets/imgs/our-services.jpg')}}">
                                    </div>
                                    <div class="title-area">
                                        <div class="project-type">Design and Development</div>
                                        <div class="project-title">consectetur adipisicing.</div>
                                        <span class="type-project">lecture</span>
                                    </div>
                                </a>
                            </div>
                            <div class="card-seation">
                                <a href="{{ url(app()->getLocale() . '/swalefsonepage') }}">
                                    <div class="swiper-zoom-container">
                                        <img src="{{asset('front_assets/imgs/our-services.jpg')}}">
                                    </div>
                                    <div class="title-area">
                                        <div class="project-type">Design and Development</div>
                                        <div class="project-title">consectetur adipisicing.</div>
                                        <span class="type-project">lecture</span>
                                    </div>
                                </a>
                            </div>
                            <div class="card-seation">
                                <a href="{{ url(app()->getLocale() . '/swalefsonepage') }}">
                                    <div class="swiper-zoom-container">
                                        <img src="{{asset('front_assets/imgs/our-services.jpg')}}">
                                    </div>
                                    <div class="title-area">
                                        <div class="project-type">Design and Development</div>
                                        <div class="project-title">consectetur adipisicing.</div>
                                        <span class="type-project">lecture</span>
                                    </div>
                                </a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- anim-project a1 -->


        </div>
    </div>
</section>

@endsection