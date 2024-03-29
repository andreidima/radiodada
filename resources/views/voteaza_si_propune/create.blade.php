{{-- Daca este vreun mesaj de la aplicatie, de succes sau de eroare, se reincarca topul respectiv --}}
{{-- @if ($errors->first('top_international_piesa') || (session()->has('top_international_votat')) || (session()->has('top_international_votat_deja'))
    || $errors->first('top_international_propunere') || session()->has('top_international_propus') || session()->has('top_international_propus_deja'))
    @php $top_incarcat = "top_international"; @endphp
@elseif ($errors->first('top_romanesc_piesa') || (session()->has('top_romanesc_votat')) || (session()->has('top_romanesc_votat_deja'))
    || $errors->first('top_romanesc_propunere') || session()->has('top_romanesc_propus') || session()->has('top_romanesc_propus_deja'))
    @php $top_incarcat = "top_romanesc"; @endphp
@endif
<script type="application/javascript">
    top_incarcat={!! json_encode($top_incarcat ?? '') !!}
</script> --}}


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
<body style="background-color:white">
<div class="container" id="app1">


    {{-- Alegere Topuri --}}

    <div class="row justify-content-center">
        <div class="col-md-4 mb-1">
            <a href="#top_international" class="text-dark btn"
                v-on:mouseover="schimbaCuloare('top_international_danger')"
                v-on:mouseleave="schimbaCuloare('top_international_white')"
                v-on:click="top_incarcat = 'top_international'"
                >
                <div class="row justify-content-center position-relative">
                    <div class="col-12">
                        <div class="text-white text-center mb-2" style="height:150px; background-color:black">
                            <h4 class="text-white py-4 px-3" style="background-color:black">
                                Cea mai 9 muzică bună
                                <br>
                                <br>
                                Top 10
                            </h4>
                        </div>

                        @if ($piese->where('categorie', 'Top International')->first()->artist->imagine ?? null)
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <img src="{{
                                                    env('APP_URL') .
                                                    $piese->where('categorie', 'Top International')->first()->artist->imagine->imagine_cale .
                                                    $piese->where('categorie', 'Top International')->first()->artist->imagine->imagine_nume
                                        }}" alt=""
                                        class="mw-100"
                                        >
                                    <br>
                                    {{ $piese->where('categorie', 'Top International')->first()->artist->nume ?? ''}}
                                    -
                                    {{ $piese->where('categorie', 'Top International')->first()->nume ?? ''}}
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-12 mb-1 position-absolute d-flex justify-content-center align-items-center"
                        style="top:120px;"
                        >
                        <div class="d-flex justify-content-center align-items-center" style="width:70px; height:70px; border-radius: 50px 50px 50px 50px;"
                            :class="[top_international_bg_color, top_international_text_color]"
                            >
                            <h3 class="pt-2">
                                <b>No/1</b>
                            </h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>


        <div class="col-md-4 mb-1">
            <a href="#top_romanesc" class="text-dark btn"
                v-on:mouseover="schimbaCuloare('top_romanesc_danger')"
                v-on:mouseleave="schimbaCuloare('top_romanesc_white')"
                v-on:click="top_incarcat = 'top_romanesc'"
                >
                <div class="row justify-content-center position-relative">
                    <div class="col-12">
                        <div class="text-white text-center mb-2" style="height:150px; background-color:black">
                            <h4 class="text-white pt-4 pb-5 px-3" style="background-color:black">
                                Românești de azi
                                <br>
                                <br>
                                Top 10
                            </h4>
                        </div>

                        @if ($piese->where('categorie', 'Top Romanesc')->first()->artist->imagine ?? null)
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <img src="{{
                                                    env('APP_URL') .
                                                    $piese->where('categorie', 'Top Romanesc')->first()->artist->imagine->imagine_cale .
                                                    $piese->where('categorie', 'Top Romanesc')->first()->artist->imagine->imagine_nume
                                        }}" alt=""
                                        class="mw-100"
                                        >
                                    <br>
                                    {{ $piese->where('categorie', 'Top Romanesc')->first()->artist->nume ?? ''}}
                                    -
                                    {{ $piese->where('categorie', 'Top Romanesc')->first()->nume ?? ''}}
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-12 mb-1 position-absolute d-flex justify-content-center align-items-center"
                        style="top:120px;"
                        >
                        <div class="d-flex justify-content-center align-items-center" style="width:70px; height:70px; border-radius: 50px 50px 50px 50px;"
                            :class="[top_romanesc_bg_color, top_romanesc_text_color]"
                            >
                            <h3 class="pt-2">
                                <b>No/1</b>
                            </h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        @if($piese->where('categorie', 'Top Cea mai bună muzică veche')->count() > 0)
        <div class="col-md-4 mb-1">
            <a href="#top_veche" class="text-dark btn"
                v-on:mouseover="schimbaCuloare('top_veche_danger')"
                v-on:mouseleave="schimbaCuloare('top_veche_white')"
                v-on:click="top_incarcat = 'top_veche'"
                >
                <div class="row justify-content-center position-relative">
                    <div class="col-12">
                        <div class="text-white text-center mb-2" style="height:150px; background-color:black">
                            <h4 class="text-white pt-4 pb-5 px-3" style="background-color:black">
                                Cea mai bună muzică veche
                                <br>
                                <br>
                                Top 10
                            </h4>
                        </div>

                        @if ($piese->where('categorie', 'Top Cea mai bună muzică veche')->first()->artist->imagine ?? null)
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <img src="{{
                                                    env('APP_URL') .
                                                    $piese->where('categorie', 'Top Cea mai bună muzică veche')->first()->artist->imagine->imagine_cale .
                                                    $piese->where('categorie', 'Top Cea mai bună muzică veche')->first()->artist->imagine->imagine_nume
                                        }}" alt=""
                                        class="mw-100"
                                        >
                                    <br>
                                    {{ $piese->where('categorie', 'Top Cea mai bună muzică veche')->first()->artist->nume ?? ''}}
                                    -
                                    {{ $piese->where('categorie', 'Top Cea mai bună muzică veche')->first()->nume ?? ''}}
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-12 mb-1 position-absolute d-flex justify-content-center align-items-center"
                        style="top:120px;"
                        >
                        <div class="d-flex justify-content-center align-items-center" style="width:70px; height:70px; border-radius: 50px 50px 50px 50px;"
                            :class="[top_veche_bg_color, top_veche_text_color]"
                            >
                            <h3 class="pt-2">
                                <b>No/1</b>
                            </h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endif
    </div>

    <div class="row">
        <div class="col-md-12">
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

            @if ($errors->first('top_veche_piesa'))
                <div class="col-lg-12 px-2 my-2 alert alert-danger">
                    {{ $errors->first('top_veche_piesa') }}
                </div>
            @elseif (session()->has('top_veche_votat'))
                <div class="col-lg-12 px-2 my-2 alert alert-success">
                    {{ session('top_veche_votat') }}
                </div>
            @elseif (session()->has('top_veche_votat_deja'))
                <div class="col-lg-12 px-2 my-2 alert alert-danger">
                    {{ session('top_veche_votat_deja') }}
                </div>
            @endif

            @if ($errors->first('top_veche_propunere'))
                <div class="col-lg-12 px-2 my-2 alert alert-danger">
                    {{ $errors->first('top_veche_propunere') }}
                </div>
            @elseif (session()->has('top_veche_propus'))
                <div class="col-lg-12 px-2 my-2 alert alert-success">
                    {{ session('top_veche_propus') }}
                </div>
            @elseif (session()->has('top_veche_propus_deja'))
                <div class="col-lg-12 px-2 my-2 alert alert-danger">
                    {{ session('top_veche_propus_deja') }}
                </div>
            @endif
        </div>
    </div>

    <div v-cloak v-if="top_incarcat == 'top_international'" id="top_international" class="row justify-content-center">
        <div class="col-md-12">

            {{-- Linie despartitoare --}}
            <hr class="my-5" style="height:5px; color:black; background-color:black">

            <div class="mb-2" style="border-radius: 40px 40px 40px 40px;">

                {{-- @include ('errors') --}}

                <div class="row px-4">
                    <div class="col-lg-6">

                        <h2 class="py-2 px-3">
                            <b>Cea mai 9 muzică bună</b>
                        </h2>

                        <form class="needs-validation" novalidate method="POST" action="/voteaza-si-propune">
                        @csrf

                            <div class="form-row">
                                <script type="application/javascript">
                                    internationalImagineInitiala={!!
                                        json_encode(
                                            env('APP_URL') .
                                            $piese->where('categorie', 'Top International')->first()->artist->imagine->imagine_cale .
                                            $piese->where('categorie', 'Top International')->first()->artist->imagine->imagine_nume
                                        ) !!}
                                </script>
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
                                                        international_descriere = {{ json_encode($piesa->artist->descriere ?? "") }};
                                                        international_link_youtube = '{{ addslashes($piesa->link_youtube) }}';
                                                        international_link_interviu = '{{ addslashes($piesa->link_interviu) }}';
                                                        international_magazin_virtual = '{{ addslashes($piesa->artist->magazin_virtual ?? "") }}'
                                                    "
                                                >
                                                <label class="form-check-label" for="top_international_piesa{{ $piesa->id }}">
                                                    {{ $loop->iteration }}. {{ $piesa->artist->nume ?? "" }} - {{ $piesa->nume }}
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
                                                        international_descriere = {{ json_encode($piesa->artist->descriere ?? "") }};
                                                        international_link_youtube = '{{ addslashes($piesa->link_youtube) }}';
                                                        international_link_interviu = '{{ addslashes($piesa->link_interviu) }}';
                                                        international_magazin_virtual = '{{ addslashes($piesa->artist->magazin_virtual ?? "") }}'
                                                    "
                                                >
                                                <label class="form-check-label" for="top_international_piesa{{ $piesa->id }}">
                                                    {{ $loop->iteration }}. {{ $piesa->artist->nume ?? "" }} - {{ $piesa->nume }}
                                                </label>
                                            </div>
                                        </div>
                                @endforeach



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



    {{-- Topul Romanesc --}}
    <div v-cloak v-if="top_incarcat == 'top_romanesc'" id="top_romanesc" class="row justify-content-center">
        <div class="col-md-12">

            {{-- Linie despartitoare --}}
            <hr class="my-5" style="height:5px; color:black; background-color:black">

            <div class="mb-2" style="border-radius: 40px 40px 40px 40px;">
                <div></div>

                <div class="row px-4">
                    <div class="col-lg-6">

                        <h2 class="py-2 px-3">
                            <b>Românești de azi</b>
                        </h2>

                        <form class="needs-validation" novalidate method="POST" action="/voteaza-si-propune">
                        @csrf

                            <div class="form-row">
                                <script type="application/javascript">
                                    romanescImagineInitiala={!!
                                        json_encode(
                                            env('APP_URL') .
                                            $piese->where('categorie', 'Top Romanesc')->first()->artist->imagine->imagine_cale .
                                            $piese->where('categorie', 'Top Romanesc')->first()->artist->imagine->imagine_nume
                                        ) !!}
                                </script>
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
                                                        romanesc_descriere = {{ json_encode($piesa->artist->descriere ?? "") }};
                                                        romanesc_link_youtube = '{{ addslashes($piesa->link_youtube) }}';
                                                        romanesc_link_interviu = '{{ addslashes($piesa->link_interviu) }}';
                                                        romanesc_magazin_virtual = '{{ addslashes($piesa->artist->magazin_virtual ?? "") }}'
                                                    "
                                                >
                                                <label class="form-check-label" for="top_romanesc_piesa{{ $piesa->id }}">
                                                    {{ $loop->iteration }}. {{ $piesa->artist->nume ?? "" }} - {{ $piesa->nume }}
                                                     {{-- - {{ $piesa->voturi ?? 0 }} --}}
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
                                                        romanesc_descriere = {{ json_encode($piesa->artist->descriere ?? "") }};
                                                        romanesc_link_youtube = '{{ addslashes($piesa->link_youtube) }}';
                                                        romanesc_link_interviu = '{{ addslashes($piesa->link_interviu) }}';
                                                        romanesc_magazin_virtual = '{{ addslashes($piesa->artist->magazin_virtual ?? "") }}'
                                                    "
                                                >
                                                <label class="form-check-label" for="top_romanesc_piesa{{ $piesa->id }}">
                                                    {{ $loop->iteration }}. {{ $piesa->artist->nume ?? "" }} - {{ $piesa->nume }}
                                                     {{-- - {{ $piesa->voturi ?? 0 }} --}}
                                                </label>
                                            </div>
                                        </div>
                                @endforeach

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


    {{-- Topul Veche --}}
    @if($piese->where('categorie', 'Top Cea mai bună muzică veche')->count() > 0)
    <div v-cloak v-if="top_incarcat == 'top_veche'" id="top_veche" class="row justify-content-center">
        <div class="col-md-12">

            {{-- Linie despartitoare --}}
            <hr class="my-5" style="height:5px; color:black; background-color:black">

            <div class="mb-2" style="border-radius: 40px 40px 40px 40px;">
                <div></div>

                <div class="row px-4">
                    <div class="col-lg-6">

                        <h2 class="py-2 px-3">
                            <b>Cea mai bună muzică veche</b>
                        </h2>

                        <form class="needs-validation" novalidate method="POST" action="/voteaza-si-propune">
                        @csrf

                            <div class="form-row">
                                <script type="application/javascript">
                                    vecheImagineInitiala={!!
                                        json_encode(
                                            env('APP_URL') .
                                            $piese->where('categorie', 'Top Cea mai bună muzică veche')->first()->artist->imagine->imagine_cale .
                                            $piese->where('categorie', 'Top Cea mai bună muzică veche')->first()->artist->imagine->imagine_nume
                                        ) !!}
                                </script>
                                @foreach ($piese->where('categorie', 'Top Cea mai bună muzică veche') as $piesa)
                                        <div class="col-lg-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="top_veche_piesa" id="top_veche_piesa{{ $piesa->id }}" value="{{ $piesa->id }}"
                                                    v-on:click="
                                                        veche_trupa = '{{ addslashes($piesa->artist->nume ?? "") }}';
                                                        veche_titlu = '{{ addslashes($piesa->nume) }}';
                                                        veche_imagine = '{{ addslashes(env('APP_URL')) .
                                                            addslashes($piesa->artist->imagine->imagine_cale ?? "") .
                                                            addslashes($piesa->artist->imagine->imagine_nume ?? "") }}';
                                                        veche_descriere = {{ json_encode($piesa->artist->descriere ?? "") }};
                                                        veche_link_youtube = '{{ addslashes($piesa->link_youtube) }}';
                                                        veche_link_interviu = '{{ addslashes($piesa->link_interviu) }}';
                                                        veche_magazin_virtual = '{{ addslashes($piesa->artist->magazin_virtual ?? "") }}'
                                                    "
                                                >
                                                <label class="form-check-label" for="top_veche_piesa{{ $piesa->id }}">
                                                    {{ $loop->iteration }}. {{ $piesa->artist->nume ?? "" }} - {{ $piesa->nume }}
                                                     {{-- - {{ $piesa->voturi ?? 0 }} --}}
                                                </label>
                                            </div>
                                        </div>
                                @endforeach

                                @foreach ($piese->where('categorie', 'Propunere Top Cea mai bună muzică veche') as $piesa)
                                    @if ($loop->first)
                                        <div class="col-lg-12 py-4 justify-content-center">
                                            <p class="py-2"></p>
                                            <h3 class="text-center">Propuneri</h3>
                                        </div>
                                    @endif
                                        <div class="col-lg-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="top_veche_piesa" id="top_veche_piesa{{ $piesa->id }}" value="{{ $piesa->id }}"
                                                    v-on:click="
                                                        veche_trupa = '{{ addslashes($piesa->artist->nume ?? "") }}';
                                                        veche_titlu = '{{ addslashes($piesa->nume) }}';
                                                        veche_imagine = '{{ addslashes(env('APP_URL')) .
                                                            addslashes($piesa->artist->imagine->imagine_cale ?? "") .
                                                            addslashes($piesa->artist->imagine->imagine_nume ?? "") }}';
                                                        veche_descriere = {{ json_encode($piesa->artist->descriere ?? "") }};
                                                        veche_link_youtube = '{{ addslashes($piesa->link_youtube) }}';
                                                        veche_link_interviu = '{{ addslashes($piesa->link_interviu) }}';
                                                        veche_magazin_virtual = '{{ addslashes($piesa->artist->magazin_virtual ?? "") }}'
                                                    "
                                                >
                                                <label class="form-check-label" for="top_veche_piesa{{ $piesa->id }}">
                                                    {{ $loop->iteration }}. {{ $piesa->artist->nume ?? "" }} - {{ $piesa->nume }}
                                                     {{-- - {{ $piesa->voturi ?? 0 }} --}}
                                                </label>
                                            </div>
                                        </div>
                                @endforeach

                                <div class="col-lg-12 mb-3 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-danger border border-dark rounded-pill" name="action" value="top_veche_voteaza">
                                        Votează
                                    </button>
                                </div>
                            </div>
                        </form>

                        <form class="needs-validation" novalidate method="POST" action="/voteaza-si-propune">
                        @csrf
                            <div class="form-row">
                                <div class="col-lg-12 justify-content-center">
                                    <label for="top_veche_propunere" class="form-label">
                                        Adaugă o nouă propunere. Propunerea va intra în lista de mai sus numai după acordul Directorului Muzical
                                    </label>
                                    <input type="text" class="form-control"  name="top_veche_propunere" id="top_veche_propunere" aria-describedby="top_veche_propunere">
                                </div>

                                <div class="col-lg-12 mb-3 py-3 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-danger border border-dark rounded-pill"  name="action" value="top_veche_propunere">Propune</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12 mb-2">
                                <img :src="veche_imagine" alt="" width="100%">
                            </div>
                            <div v-cloak class="col-lg-12 mb-2">
                                    @{{ veche_descriere }}
                            </div>
                            <div v-cloak v-if="veche_link_youtube !== ''" class="col-lg-6">
                                <a :href="veche_link_youtube" target="_blank">
                                    <h3>
                                        <i class="fab fa-youtube mr-1"></i>Youtube
                                    </h3>
                                </a>
                            </div>
                            <div v-cloak v-if="veche_link_interviu !== ''"  class="col-lg-6">
                                <a :href="veche_link_interviu" target="_blank">
                                    <h3>
                                        <i class="fas fa-microphone-alt mr-1"></i>Interviu
                                    </h3>
                                </a>
                            </div>
                            <div v-cloak v-if="veche_magazin_virtual !== ''"  class="col-lg-12 my-2">
                                <a :href="veche_magazin_virtual" target="_blank">
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
    @endif

</div>
</body>
</html>
