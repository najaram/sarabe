@extends('layouts.admin')

@section('content')
    <v-layout row wrap class="my-1">
        <v-flex xs8 py-0>
            <dashboard-news />
        </v-flex>
        <v-flex xs4 py-0>
            <dashboard-count activities="{{ $activities }}" members="{{ $members }}" services="{{ $services }}"/>
        </v-flex>
    </v-layout>
    <v-layout row wrap class="my-1">
        <v-flex xs12 py-0>
            <dashboard-user-list></dashboard-user-list>
        </v-flex>
    </v-layout>
@endsection
