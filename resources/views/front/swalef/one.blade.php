@extends('layouts.front.hawdaj_master')
@section('content')


<section class="filter-grid-section filter-grid-section--height">
    <div class="container">
        <h2 class="page-title mb-4">Obcaecati modi et nu</h2>
        <div class="section-boxes container">
            <div class="inner-page">

                <div class="card-img">
                    <img src="{{asset('front_assets/imgs/our-services.jpg')}}">
                </div>
                <div style="width:30px;"></div>
                <div class="section-details">
                    <div class="section-shadow section-radius p-3 p-sm-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="date-type"> <span class=" mx-1"><strong>التاريخ</strong> <em> 15-1-2023</em></span></div>
                            <div class="date-type"> <span class="views mr-3"> <strong>الحالة</strong> <em>منشور</em></span></div>
                        </div>
                    </div>

                    <div class="section-shadow section-radius p-3 p-sm-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h2 class="place-details__title mb-0">محتوي اضافي</h2>

                            <div class="d-flex align-items-center">
                                <div class="views d-flex align-items-center">


                                </div>

                            </div>


                        </div>
                        <div class="d-flex align-items-center gap">
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="12" cy="11" r="3" />
                                    <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                                </svg>
                            </span>
                            <span>محتوي اضافي محتوي اضافي</span>
                        </div>

                        <p class="mb-0 mt-3">محتوي اضافي</p>

                    </div>
                    <!-- description -->
                    <div class="section-shadow section-radius p-3 p-sm-4 mb-4">
                        <h3 class="place-details__sub-title">الوصف</h3>
                        <p>محتوي اضافي</p>
                    </div>

                    <!-- reviews -->
                    <div class="section-shadow section-radius p-3 p-sm-4 mb-4">


                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h3 class="place-details__sub-title mb-0">التقييمات</h3>

                            <!-- <button data-toggle="modal" data-target="#rating" class="btn btn-primary btn-sm">
                                إضافة تقييم
                            </button> -->
                        </div>
                        <ul class="place-details__reviews py-2 rates" style="max-height: 400px;overflow-y: scroll;">

                            <li class="d-flex flex-column flex-sm-row justify-content-between">
                                <div class="d-flex flex-column flex-sm-row gap-lg">
                                    <div class="review-img">
                                        <img src="{{ asset('front_assets/imgs/empty.png') }}" alt="empty">
                                    </div>
                                    <div>
                                        <h4 class="review-author">محتوي اضافي</h4>
                                        <p class="review-text">محتوي اضافي</p>
                                    </div>
                                </div>

                            </li>

                        </ul>


                        <ul class="place-details__reviews py-2 rates">
                            <li id="empty" data-toggle="modal" data-target="#rating" style="margin-right: 240px;overflow-y:hidden;overflow-x:hidden" class="row justify-content-center">
                                <div class="review-img col-12" style="margin-right: 100px;">
                                    <img src="{{ asset('front_assets/imgs/empty.png') }}" alt="empty">
                                </div>
                                <div class=" col-12 d-flex">
                                    <div>
                                        <p class="review-text mr-3">لا يوجد اي تقييمات حتي الان</p>
                                        <h4 class="review-author btn btn-primary btn-sm" data-toggle="modal" data-target="#rating"> كن اول من يضيف تقييم </h4>
                                    </div>
                                </div>
                            </li>
                        </ul>


                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
