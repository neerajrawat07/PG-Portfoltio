@extends('layouts.app')

@section('content')
    @include('components.hero')

    @include('components.approach', ['approach' => \App\Data\Portfolio::approach()])

    @include('components.metrics')

    @include('components.experience')

    @include('components.skills')

    @include('components.services')

    @include('components.portfolio')

    @include('components.results')

    @include('components.tools')

    @include('components.testimonials')

    @include('components.brands')

    @include('components.contact')
@endsection