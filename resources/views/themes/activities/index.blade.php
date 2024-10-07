@extends('themes.layout.index')
@section('content')
    <section class="page">
        @include('themes.navigation.index')
        <div class="facility">

            <div class="container">
                @include('themes.slider.activitiesSlider.index')

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">

                    @foreach($activities as $activity)
                        <!-- === facility-info === -->

                        <div class="facility-info">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2>{{$activity->leftTitle}}</h2>
                                    <p>
                                        {{$activity->leftContent}}
                                    </p>
                                    <!-- <p>
                                        Avşa Adası'na bakarken dünyanın en kaliteli şaraplarının, şampanyalarının, havyarının ve diğer lezzetlerin tadını çıkarın.
                                    </p> -->
                                </div>
                                <div class="col-md-6">
                                    <h2>{{$activity->rightTitle}}</h2>
                                    <p>
                                    {{$activity->rightContent}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <!-- === facility-addons === -->

                        <div class="facility-addons">

                            <!-- === nav-tabs === -->

                            @include('themes.activities.titles.index')

                            <!-- === tab-panes === -->

                            <div class="tab-content">

                                <!-- ============ tab #1 ============ -->

                                @include('themes.activities.menus.index')

                                <!-- ============ tab #2 ============ -->

                                @include('themes.activities.chefs.index')

                                <!-- ============ tab #3 ============ -->

                                @include('themes.activities.events.index')

                            </div> <!--/tab-content-->

                        </div> <!--/facility-addons-->
                    </div> <!--/col-md-10-->
                </div> <!--/row-->

            </div> <!--/container-->
        </div>
    </section>
    
@endsection
