<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="admin">
    <template>
        <v-app id="inspire">
            <v-navigation-drawer
                    v-model="drawer"
                    fixed
                    app
            >
                <v-list dense>
                    @include('layouts.sidebar')
                </v-list>
            </v-navigation-drawer>
                @include('layouts.header')
            <v-content>
                <v-container fluid fill-height>
                    <v-layout
                            justify-center
                            align-center
                    >
                        <v-flex text-xs-center>
                            <v-tooltip left>
                                <v-btn slot="activator" :href="source" icon large target="_blank">
                                    <v-icon large>code</v-icon>
                                </v-btn>
                                <span>Source</span>
                            </v-tooltip>
                            <v-tooltip right>
                                <v-btn slot="activator" icon large href="https://codepen.io/johnjleider/pen/rJdVMq" target="_blank">
                                    <v-icon large>mdi-codepen</v-icon>
                                </v-btn>
                                <span>Codepen</span>
                            </v-tooltip>
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-content>
                @include('layouts.footer')
        </v-app>
    </template>
</div>
</body>
</html>
