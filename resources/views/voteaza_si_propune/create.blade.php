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
<div class="container" id="app1">

    {{-- Topul International --}}
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="shadow-lg mb-2" style="border-radius: 40px 40px 40px 40px;">

                @if ($piese->where('categorie', 'Top International')->first()->artist->imagine ?? null)
                    <div class="row">
                        <div class="col-lg-12">
                            <img src="{{
                                            env('APP_URL') .
                                            $piese->where('categorie', 'Top International')->first()->artist->imagine->imagine_cale .
                                            $piese->where('categorie', 'Top International')->first()->artist->imagine->imagine_nume
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

                {{-- @include ('errors') --}}

                <div class="row px-4">
                    <div class="col-lg-6">
                        <form class="needs-validation" novalidate method="POST" action="/voteaza-si-propune">
                        @csrf

                            <div class="form-row">
                                <div class="col-lg-12 pb-2 justify-content-center">
                                    <h3 class="text-center">Top</h3>
                                </div>
                                @foreach ($piese->where('categorie', 'Top International') as $piesa)
                                        <div class="col-lg-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="top_international_piesa" id="top_international_piesa{{ $piesa->id }}" value="{{ $piesa->id }}"
                                                    v-on:click="
                                                        international_trupa = '{{ addslashes($piesa->artist->nume ?? "") }}';
                                                        international_titlu = '{{ addslashes($piesa->nume) }}';
                                                        international_imagine = '{{ addslashes(env('APP_URL')) .
                                                            addslashes($piesa->artist->imagine->imagine_cale ?? "") .
                                                            addslashes($piesa->artist->imagine->imagine_nume ?? "") }}';
                                                        international_descriere = '{{ addslashes($piesa->artist->descriere ?? "") }}';
                                                        international_link_youtube = '{{ addslashes($piesa->link_youtube) }}';
                                                        international_link_interviu = '{{ addslashes($piesa->link_interviu) }}';
                                                        international_magazin_virtual = '{{ addslashes($piesa->artist->magazin_virtual ?? "") }}'
                                                    "
                                                >
                                                <label class="form-check-label" for="top_international_piesa{{ $piesa->id }}">
                                                    {{ $loop->iteration }}. {{ $piesa->artist->nume ?? "" }} - {{ $piesa->nume }} - {{ $piesa->voturi }}
                                                </label>
                                            </div>
                                        </div>
                                @endforeach

                                @foreach ($piese->where('categorie', 'Propunere Top International') as $piesa)
                                    @if ($loop->first)
                                        <div class="col-lg-12 py-4 justify-content-center">
                                            <p class="py-2"></p>
                                            <h3 class="text-center">Propuneri</h3>
                                        </div>
                                    @endif
                                        <div class="col-lg-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="top_international_piesa" id="top_international_piesa{{ $piesa->id }}" value="{{ $piesa->id }}"
                                                    v-on:click="
                                                        international_trupa = '{{ addslashes($piesa->artist->nume ?? "") }}';
                                                        international_titlu = '{{ addslashes($piesa->nume) }}';
                                                        international_imagine = '{{ addslashes(env('APP_URL')) .
                                                            addslashes($piesa->artist->imagine->imagine_cale ?? "") .
                                                            addslashes($piesa->artist->imagine->imagine_nume ?? "") }}';
                                                        international_descriere = '{{ addslashes($piesa->artist->descriere ?? "") }}';
                                                        international_link_youtube = '{{ addslashes($piesa->link_youtube) }}';
                                                        international_link_interviu = '{{ addslashes($piesa->link_interviu) }}';
                                                        international_magazin_virtual = '{{ addslashes($piesa->artist->magazin_virtual ?? "") }}'
                                                    "
                                                >
                                                <label class="form-check-label" for="top_international_piesa{{ $piesa->id }}">
                                                    {{ $loop->iteration }}. {{ $piesa->artist->nume ?? "" }} - {{ $piesa->nume }} - {{ $piesa->voturi }}
                                                </label>
                                            </div>
                                        </div>
                                @endforeach


                                @if ($errors->first('top_international_piesa'))
                                    <div class="col-lg-12 px-2 my-2 alert alert-danger">
                                        {{ $errors->first('top_international_piesa') }}
                                    </div>
                                @elseif (session()->has('top_international_votat'))
                                    <div class="col-lg-12 px-2 my-2 alert alert-success">
                                        {{ session('top_international_votat') }}
                                    </div>
                                @elseif (session()->has('top_international_votat_deja'))
                                    <div class="col-lg-12 px-2 my-2 alert alert-danger">
                                        {{ session('top_international_votat_deja') }}
                                    </div>
                                @endif

                                <div class="col-lg-12 mb-3 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-danger border border-dark rounded-pill" name="action" value="top_international_voteaza">
                                        Votează
                                    </button>
                                </div>
                            </div>
                        </form>

                        <form class="needs-validation" novalidate method="POST" action="/voteaza-si-propune">
                        @csrf
                            <div class="form-row">
                                <div class="col-lg-12 justify-content-center">
                                    <label for="top_international_propunere" class="form-label">
                                        Adauga o noua propunere. Propunerea va intra in lista de mai sus numai dupa acordul Directorului Muzical
                                    </label>
                                    <input type="text" class="form-control"  name="top_international_propunere" id="top_international_propunere" aria-describedby="top_international_propunere">
                                </div>

                                @if ($errors->first('top_international_propunere'))
                                    <div class="col-lg-12 px-2 my-2 alert alert-danger">
                                        {{ $errors->first('top_international_propunere') }}
                                    </div>
                                @elseif (session()->has('top_international_propus'))
                                    <div class="col-lg-12 px-2 my-2 alert alert-success">
                                        {{ session('top_international_propus') }}
                                    </div>
                                @elseif (session()->has('top_international_propus_deja'))
                                    <div class="col-lg-12 px-2 my-2 alert alert-danger">
                                        {{ session('top_international_propus_deja') }}
                                    </div>
                                @endif

                                <div class="col-lg-12 mb-3 py-3 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-danger border border-dark rounded-pill"  name="action" value="top_international_propunere">Propune</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12 mb-2">
                                <img :src="international_imagine" alt="" width="100%">
                            </div>
                            <div v-cloak class="col-lg-12 mb-2">
                                    @{{ international_descriere }}
                            </div>
                            <div v-cloak v-if="international_link_youtube !== ''" class="col-lg-6">
                                <a :href="international_link_youtube" target="_blank">
                                    <h3>
                                        <i class="fab fa-youtube mr-1"></i>Youtube
                                    </h3>
                                </a>
                            </div>
                            <div v-cloak v-if="international_link_interviu !== ''"  class="col-lg-6">
                                <a :href="international_link_interviu" target="_blank">
                                    <h3>
                                        <i class="fas fa-microphone-alt mr-1"></i>Interviu
                                    </h3>
                                </a>
                            </div>
                            <div v-cloak v-if="international_magazin_virtual !== ''"  class="col-lg-12 my-2">
                                <a :href="international_magazin_virtual" target="_blank">
                                    <h3>
                                        <i class="fas fa-shopping-cart mr-1"></i>Magazin Virtual
                                    </h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    {{-- Despartitor topuri --}}
    <div class="row justify-content-center">
        <div class="col-md-12 mb-4">
        </div>
    </div>

    {{-- Topul Romanesc --}}
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="shadow-lg" style="border-radius: 40px 40px 40px 40px;">

                @if ($piese->where('categorie', 'Top Romanesc')->first()->artist->imagine ?? null)
                    <div class="row">
                        <div class="col-lg-12">
                            <img src="{{
                                            env('APP_URL') .
                                            $piese->where('categorie', 'Top Romanesc')->first()->artist->imagine->imagine_cale .
                                            $piese->where('categorie', 'Top Romanesc')->first()->artist->imagine->imagine_nume
                                }}" alt="" width="100%">
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <h3 class="text-white py-3 px-5" style="background-color:black">
                            Românești de azi
                        </h3>
                    </div>
                </div>

                {{-- @include ('errors') --}}

                <div class="row px-4">
                    <div class="col-lg-6">
                        <form class="needs-validation" novalidate method="POST" action="/voteaza-si-propune">
                        @csrf

                            <div class="form-row">
                                <div class="col-lg-12 pb-2 justify-content-center">
                                    <h3 class="text-center">Top</h3>
                                </div>
                                @foreach ($piese->where('categorie', 'Top Romanesc') as $piesa)
                                        <div class="col-lg-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="top_romanesc_piesa" id="top_romanesc_piesa{{ $piesa->id }}" value="{{ $piesa->id }}"
                                                    v-on:click="
                                                        romanesc_trupa = '{{ addslashes($piesa->artist->nume ?? "") }}';
                                                        romanesc_titlu = '{{ addslashes($piesa->nume) }}';
                                                        romanesc_imagine = '{{ addslashes(env('APP_URL')) .
                                                            addslashes($piesa->artist->imagine->imagine_cale ?? "") .
                                                            addslashes($piesa->artist->imagine->imagine_nume ?? "") }}';
                                                        romanesc_descriere = '{{ addslashes($piesa->artist->descriere ?? "") }}';
                                                        romanesc_link_youtube = '{{ addslashes($piesa->link_youtube) }}';
                                                        romanesc_link_interviu = '{{ addslashes($piesa->link_interviu) }}';
                                                        romanesc_magazin_virtual = '{{ addslashes($piesa->artist->magazin_virtual ?? "") }}'
                                                    "
                                                >
                                                <label class="form-check-label" for="top_romanesc_piesa{{ $piesa->id }}">
                                                    {{ $loop->iteration }}. {{ $piesa->artist->nume ?? "" }} - {{ $piesa->nume }} - {{ $piesa->voturi }}
                                                </label>
                                            </div>
                                        </div>
                                @endforeach

                                @foreach ($piese->where('categorie', 'Propunere Top Romanesc') as $piesa)
                                    @if ($loop->first)
                                        <div class="col-lg-12 py-4 justify-content-center">
                                            <p class="py-2"></p>
                                            <h3 class="text-center">Propuneri</h3>
                                        </div>
                                    @endif
                                        <div class="col-lg-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="top_romanesc_piesa" id="top_romanesc_piesa{{ $piesa->id }}" value="{{ $piesa->id }}"
                                                    v-on:click="
                                                        romanesc_trupa = '{{ addslashes($piesa->artist->nume ?? "") }}';
                                                        romanesc_titlu = '{{ addslashes($piesa->nume) }}';
                                                        romanesc_imagine = '{{ addslashes(env('APP_URL')) .
                                                            addslashes($piesa->artist->imagine->imagine_cale ?? "") .
                                                            addslashes($piesa->artist->imagine->imagine_nume ?? "") }}';
                                                        romanesc_descriere = '{{ addslashes($piesa->artist->descriere ?? "") }}';
                                                        romanesc_link_youtube = '{{ addslashes($piesa->link_youtube) }}';
                                                        romanesc_link_interviu = '{{ addslashes($piesa->link_interviu) }}';
                                                        romanesc_magazin_virtual = '{{ addslashes($piesa->artist->magazin_virtual ?? "") }}'
                                                    "
                                                >
                                                <label class="form-check-label" for="top_romanesc_piesa{{ $piesa->id }}">
                                                    {{ $loop->iteration }}. {{ $piesa->artist->nume ?? "" }} - {{ $piesa->nume }} - {{ $piesa->voturi }}
                                                </label>
                                            </div>
                                        </div>
                                @endforeach


                                @if ($errors->first('top_romanesc_piesa'))
                                    <div class="col-lg-12 px-2 my-2 alert alert-danger">
                                        {{ $errors->first('top_romanesc_piesa') }}
                                    </div>
                                @elseif (session()->has('top_romanesc_votat'))
                                    <div class="col-lg-12 px-2 my-2 alert alert-success">
                                        {{ session('top_romanesc_votat') }}
                                    </div>
                                @elseif (session()->has('top_romanesc_votat_deja'))
                                    <div class="col-lg-12 px-2 my-2 alert alert-danger">
                                        {{ session('top_romanesc_votat_deja') }}
                                    </div>
                                @endif

                                <div class="col-lg-12 mb-3 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-danger border border-dark rounded-pill" name="action" value="top_romanesc_voteaza">
                                        Votează
                                    </button>
                                </div>
                            </div>
                        </form>

                        <form class="needs-validation" novalidate method="POST" action="/voteaza-si-propune">
                        @csrf
                            <div class="form-row">
                                <div class="col-lg-12 justify-content-center">
                                    <label for="top_romanesc_propunere" class="form-label">
                                        Adauga o noua propunere. Propunerea va intra in lista de mai sus numai dupa acordul Directorului Muzical
                                    </label>
                                    <input type="text" class="form-control"  name="top_romanesc_propunere" id="top_romanesc_propunere" aria-describedby="top_romanesc_propunere">
                                </div>

                                @if ($errors->first('top_romanesc_propunere'))
                                    <div class="col-lg-12 px-2 my-2 alert alert-danger">
                                        {{ $errors->first('top_romanesc_propunere') }}
                                    </div>
                                @elseif (session()->has('top_romanesc_propus'))
                                    <div class="col-lg-12 px-2 my-2 alert alert-success">
                                        {{ session('top_romanesc_propus') }}
                                    </div>
                                @elseif (session()->has('top_romanesc_propus_deja'))
                                    <div class="col-lg-12 px-2 my-2 alert alert-danger">
                                        {{ session('top_romanesc_propus_deja') }}
                                    </div>
                                @endif

                                <div class="col-lg-12 mb-3 py-3 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-danger border border-dark rounded-pill"  name="action" value="top_romanesc_propunere">Propune</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12 mb-2">
                                <img :src="romanesc_imagine" alt="" width="100%">
                            </div>
                            <div v-cloak class="col-lg-12 mb-2">
                                    @{{ romanesc_descriere }}
                            </div>
                            <div v-cloak v-if="romanesc_link_youtube !== ''" class="col-lg-6">
                                <a :href="romanesc_link_youtube" target="_blank">
                                    <h3>
                                        <i class="fab fa-youtube mr-1"></i>Youtube
                                    </h3>
                                </a>
                            </div>
                            <div v-cloak v-if="romanesc_link_interviu !== ''"  class="col-lg-6">
                                <a :href="romanesc_link_interviu" target="_blank">
                                    <h3>
                                        <i class="fas fa-microphone-alt mr-1"></i>Interviu
                                    </h3>
                                </a>
                            </div>
                            <div v-cloak v-if="romanesc_magazin_virtual !== ''"  class="col-lg-12 my-2">
                                <a :href="romanesc_magazin_virtual" target="_blank">
                                    <h3>
                                        <i class="fas fa-shopping-cart mr-1"></i>Magazin Virtual
                                    </h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>
</body>
</html>
