@extends ('layouts.app')

@section('content')   
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="shadow-lg" style="border-radius: 40px 40px 40px 40px;">
                <div class="border border-secondary p-2" style="border-radius: 40px 40px 0px 0px; background-color:#e66800">
                    <h6 class="ml-4 my-0" style="color:white"><i class="fas fa-users mr-1"></i>Artisti / {{ $artist->nume }}</h6>
                </div>

                <div class="card-body py-2 border border-secondary" 
                    style="border-radius: 0px 0px 40px 40px;"
                    id="app1"
                >

                @include ('errors')   

                    <div class="table-responsive col-md-12 mx-auto">
                        <table class="table table-sm table-striped table-hover"
                        > 
                            <tr>
                                <td>
                                    Nume
                                </td>
                                <td>
                                    {{ $artist->nume }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Imagine
                                </td>
                                <td>
                                    @if ($artist->imagine)
                                        <a href="{{ env('APP_URL') . $artist->imagine->imagine_cale . $artist->imagine->imagine_nume }}" target="_blank">
                                            <img src="{{ env('APP_URL') . $artist->imagine->imagine_cale . $artist->imagine->imagine_nume }}" alt="" width="100%">
                                        </a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Link
                                </td>
                                <td>
                                    {{ $artist->link }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Descriere
                                </td>
                                <td>
                                    {{ $artist->descriere }}
                                </td>
                            </tr>
                        </table>
                    </div>
                                       
                    <div class="form-row mb-2 px-2">                                    
                        <div class="col-lg-12 d-flex justify-content-center">  
                            <a class="btn btn-primary btn-sm rounded-pill" href="/artisti">Pagină Artiști</a> 
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection