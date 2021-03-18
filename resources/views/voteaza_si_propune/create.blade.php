<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mycss.css') }}" rel="stylesheet">
    <!-- Font Awesome links -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="shadow-lg" style="border-radius: 40px 40px 40px 40px;">

            @if ($piese->where('categorie', 'Top')->first()->artist->imagine)
                <div class="row">
                    <div class="col-lg-12">
                        <img src="{{ 
                                        env('APP_URL') . 
                                        $piese->where('categorie', 'Top')->first()->artist->imagine->imagine_cale . 
                                        $piese->where('categorie', 'Top')->first()->artist->imagine->imagine_nume 
                            }}" alt="" width="100%">
                    </div>
                </div>
            @endif

        <div class="row">
            <div class="col-lg-12 mb-4">
                <h3 class="text-white py-3 px-5" style="background-color:black">
                    Cea mai 9 muzică bună
                </h3>
            </div>
        </div>

        <div class="row px-4" id="app1">
            <div class="col-lg-6">
                {{-- <form class="needs-validation" novalidate method="POST" action="/voteaza-si-propune"> --}}
                @csrf

                    <div class="form-row">
                        <div class="col-lg-12 pb-2 justify-content-center">
                            <h3 class="text-center">Top</h3>
                        </div>
                        @foreach ($piese->where('categorie', 'Top') as $piesa)
                                <div class="col-lg-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="voteazaPiesa" id="voteazaPiesa{{ $piesa->id }}" value="{{ $piesa->id }}"
                                            v-on:click="
                                                trupa = '{{ addslashes($piesa->artist->nume) }}';
                                                titlu = '{{ addslashes($piesa->nume) }}';
                                                imagine = '{{ addslashes(env('APP_URL')) . 
                                                    addslashes($piesa->artist->imagine->imagine_cale) . 
                                                    addslashes($piesa->artist->imagine->imagine_nume) }}';
                                                descriere = '{{ addslashes($piesa->artist->descriere) }}';
                                                link_youtube = '{{ addslashes($piesa->link_youtube) }}';
                                                link_interviu = '{{ addslashes($piesa->link_interviu) }}'
                                            "
                                        >
                                        <label class="form-check-label" for="voteazaPiesa{{ $piesa->id }}">
                                            {{ $loop->index }}. {{ $piesa->artist->nume }} - {{ $piesa->nume }} - {{ $piesa->voturi }} 
                                        </label>
                                    </div>
                                </div>
                        @endforeach

                        @foreach ($piese->where('categorie', 'Propunere') as $piesa)
                            @if ($loop->first)
                                <div class="col-lg-12 py-4 justify-content-center">
                                    <p class="py-2"></p>
                                    <h3 class="text-center">Propuneri</h3>
                                </div>                                
                            @endif                            
                                <div class="col-lg-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="voteazaPiesa" id="voteazaPiesa{{ $piesa->id }}" value="{{ $piesa->id }}"
                                            v-on:click="
                                                trupa = '{{ addslashes($piesa->artist->nume) }}';
                                                titlu = '{{ addslashes($piesa->nume) }}';
                                                imagine = '{{ addslashes(env('APP_URL')) . 
                                                    addslashes($piesa->artist->imagine->imagine_cale) . 
                                                    addslashes($piesa->artist->imagine->imagine_nume) }}';
                                                descriere = '{{ addslashes($piesa->artist->descriere) }}';
                                                link_youtube = '{{ addslashes($piesa->link_youtube) }}';
                                                link_interviu = '{{ addslashes($piesa->link_interviu) }}'
                                            "
                                        >
                                        <label class="form-check-label" for="voteazaPiesa{{ $piesa->id }}">
                                            {{ $loop->index }}. {{ $piesa->artist->nume }} - {{ $piesa->nume }} - {{ $piesa->voturi }} 
                                        </label>
                                    </div>
                                </div>
                        @endforeach

                        <div class="col-lg-12 mb-3 py-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-danger border border-dark rounded-pill" name="action" value="Voteaza">
                                Votează
                            </button>
                        </div>
                    </div>
                {{-- </form> --}}

                {{-- <form class="needs-validation" novalidate method="POST" action="/voteaza-si-propune"> --}}
                @csrf
                    <div class="form-row">
                        <div class="col-lg-12 justify-content-center">
                            <label for="PropunereNoua" class="form-label">
                                Adauga o noua propunere. Propunerea va intra in lista de mai sus numai dupa acordul Directorului Muzical
                            </label>
                            <input type="text" class="form-control"  name="Propunere" id="Propunere" aria-describedby="propunere">
                        </div>
                        <div class="col-lg-12 mb-3 py-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-danger border border-dark rounded-pill"  name="action" value="Propunere">Propune</button>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12 mb-2">
                        <img :src="imagine" alt="" width="100%">
                    </div>
                    <div v-cloak class="col-lg-12 mb-2">
                            @{{ descriere }}
                    </div>
                    <div v-cloak v-if="link_youtube !== ''" class="col-lg-6">
                        <a :href="link_youtube" target="_blank">
                            <h3>
                                <i class="fab fa-youtube mr-1"></i>Youtube
                            </h3>
                        </a>
                    </div>
                    <div v-cloak v-if="link_interviu !== ''"  class="col-lg-6">
                        <a :href="link_interviu" target="_blank">
                            <h3>
                                <i class="fas fa-microphone-alt mr-1"></i>Interviu
                            </h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        {{-- <script>
        new Vue({
            el: "#app",
            data: {
                piesa: '',
                trupa: '',
                titlu: ''
            },
            methods: {
                // trupa_func: function (trupa) {
                //     this.trupa = trupa;
                // },
                // titlu_func: function (titlu) {
                //     this.titlu = titlu;
                // }
            }
        });
        </script> --}}



            </div>
        </div>
    </div>
</div>