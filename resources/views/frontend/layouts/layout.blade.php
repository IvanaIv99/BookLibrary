<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">


@include('frontend.partials.head')


<body>

<div id="wrapper" class="clearfix">

    @yield("content")

    @include('frontend.partials.footer')
    @include('frontend.partials.scripts')



</div>

</body>


</html>
