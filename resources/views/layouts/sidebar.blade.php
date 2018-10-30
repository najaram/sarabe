@foreach ($menus as $menu)
    <a>
        <v-list-tile>
            <v-list-tile-action>
                <v-icon>{{ $menu['icon'] }}</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
                <v-list-tile-title>{{ $menu['label'] }}</v-list-tile-title>
            </v-list-tile-content>
        </v-list-tile>
    </a>
@endforeach
<v-list-tile @click="logout('{{route('logout')}}','{{url('/')}}')">
    <v-list-tile-action>
        <v-icon>exit_to_app</v-icon>
    </v-list-tile-action>
    <v-list-tile-content>
        <v-list-tile-title>Logout</v-list-tile-title>
    </v-list-tile-content>
</v-list-tile>
