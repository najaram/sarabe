@extends('layouts.admin')

@section('content')
    <v-layout row wrap class="my-1">
        <v-flex xs8 py-0>
            <dashboard-news />
        </v-flex>
        <v-flex xs4 py-0>
            <dashboard-count/>
        </v-flex>
    </v-layout>
@endsection
