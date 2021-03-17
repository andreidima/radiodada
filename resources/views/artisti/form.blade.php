@csrf

<div class="form-row mb-0 d-flex border-radius: 0px 0px 40px 40px" id="app1">
    <div class="form-group col-lg-12 px-2 mb-0">
        <div class="form-row">                                    
            <div class="form-group col-lg-12">  
                <label for="nume" class="mb-0 pl-3">Artist:*</label>                                      
                <input 
                    type="text" 
                    class="form-control form-control-sm rounded-pill {{ $errors->has('nume') ? 'is-invalid' : '' }}" 
                    name="nume" 
                    placeholder="" 
                    value="{{ old('nume', $artist->nume) }}"
                    required> 
            </div>   
            <div class="form-group col-lg-12">
                <label for="imagine" class="mb-0 pl-3">
                    @if ($artist->imagine)
                        Schimbă imaginea actuală: {{ $artist->imagine->imagine_nume }}
                    @else
                        Adaugă imagine:
                    @endif

                </label>
                <input type="file" class="form-control-file" name="imagine" id="imagine">
            </div>                                   
            <div class="form-group col-lg-12">  
                <label for="link" class="mb-0 pl-3">Link:</label>                                      
                <input 
                    type="text" 
                    class="form-control form-control-sm rounded-pill {{ $errors->has('link') ? 'is-invalid' : '' }}" 
                    name="link" 
                    placeholder="" 
                    value="{{ old('link', $artist->link) }}"
                    required> 
            </div> 
            <div class="form-group col-lg-12 ">   
                <label for="descriere" class="mb-0 pl-3">Descriere</label>
                <textarea class="form-control rounded" name="descriere" rows="3">{{ old('descriere', $artist->descriere) }}</textarea>
            </div>   
        </div>      
                                
        <div class="form-row py-2 justify-content-center">                                    
            <div class="col-lg-8 d-flex justify-content-center">  
                <button type="submit" class="btn btn-primary btn-sm mr-2 rounded-pill">{{ $buttonText }}</button> 
                {{-- <a class="btn btn-secondary btn-sm mr-4 rounded-pill" href="{{ $client_neserios->path() }}">Renunță</a>  --}}
                <a class="btn btn-secondary btn-sm mr-4 rounded-pill" href="/artisti">Renunță</a> 
            </div>
        </div>
    </div>
</div>