@if(isBackend())
    @include('backend')
@else
    @include('frontend')
@endif
