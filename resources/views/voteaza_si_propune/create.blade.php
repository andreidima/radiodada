@extends ('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="shadow-lg" style="border-radius: 40px 40px 40px 40px;">


        <div class="row" id="app1">
            <div class="col-lg-6">
                <form action='votare.php' method='post'>
                    <div class="form-row">
                        <div class="col-lg-12 pb-2 justify-content-center">
                            <h3 class="text-center">Top</h3>
                        </div>
                        @foreach ($piese->where('categorie', 'Top') as $piesa)
                                <div class="col-lg-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="voteazaPiesa" id="voteazaPiesa{{ $piesa->id }}" value="{{ $piesa->id }}"
                                            {{-- v-on:click="trupa = '{{ $piesa->artist }}';titlu = '{{ $piesa->titlu }}'" --}}
                                        >
                                        <label class="form-check-label" for="voteazaPiesa{{ $piesa->id }}">
                                            {{ $loop->index }}. {{ $piesa->artist }} - {{ $piesa->titlu }} - {{ $piesa->voturi }} 
                                        </label>
                                    </div>
                                </div>
                        @endforeach

                        @foreach ($piese->where('categorie', 'Propunere') as $piesa)
                            @if ($loop->first)
                                <div class="col-lg-12 py-4 justify-content-center">
                                    <h3 class="text-center">Propuneri</h3>
                                </div>                                
                            @endif                            
                                <div class="col-lg-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="voteazaPiesa" id="voteazaPiesa{{ $piesa->id }}" value="{{ $piesa->id }}"
                                            {{-- v-on:click="trupa = '{!! json_encode($piesa->artist) !!}';titlu = ''" --}}
                                            v-on:click="trupa = 'a';titlu = 'b'"
                                        >
                                        <label class="form-check-label" for="voteazaPiesa{{ $piesa->id }}">
                                            {{ $loop->index }}. {{ $piesa->artist }} - {{ $piesa->titlu }} - {{ $piesa->voturi }} 
                                        </label>
                                    </div>
                                </div>
                        @endforeach

                        <div class="col-lg-12 mb-3 py-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-danger border border-dark rounded-pill" value="Voteaza" name="Votează">
                                Votează
                            </button>
                        </div>
                    </div>
                </form>

                <form action='votare.php' method='post'>
                    <div class="form-row">
                        <div class="col-lg-12 justify-content-center">
                            <label for="PropunereNoua" class="form-label">
                                Adauga o noua propunere. Propunerea va intra in lista de mai sus numai dupa acordul Directorului Muzical
                            </label>
                            <input type="text" class="form-control"  name="Propunere" id="Propunere" aria-describedby="propunere">
                        </div>
                        <div class="col-lg-12 mb-3 py-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-danger border border-dark rounded-pill" value="Propune" name="Propune">Propune</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <h1>
                    {{-- {{ trupa }} --}}
                </h1>
                <h1>
                    {{-- {{ titlu }} --}}
                </h1>
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
@endsection