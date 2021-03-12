@csrf

<div class="form-row mb-0 d-flex border-radius: 0px 0px 40px 40px" id="app1">
    <div class="form-group col-lg-12 px-2 mb-0">
        <div class="form-row">                                    
            <div class="form-group col-lg-12">  
                <label for="titlu" class="mb-0 pl-3">Titlu:*</label>                                      
                <input 
                    type="text" 
                    class="form-control form-control-sm rounded-pill {{ $errors->has('titlu') ? 'is-invalid' : '' }}" 
                    name="titlu" 
                    placeholder="" 
                    value="{{ old('titlu', $piesa->titlu) }}"
                    required> 
            </div>   
            <div class="form-group col-lg-12 ">  
                <label for="artist" class="mb-0 pl-3">Artist:</label>                                      
                <input 
                    type="text" 
                    class="form-control form-control-sm rounded-pill {{ $errors->has('artist') ? 'is-invalid' : '' }}" 
                    name="artist" 
                    placeholder="" 
                    value="{{ old('artist', $piesa->artist) }}"
                    required> 
            </div>   
            <div class="form-group col-lg-12 ">  
                <label for="categorie" class="mb-0 pl-3">Categorie:*</label>                                     
                <select name="categorie" class="custom-select custom-select-sm rounded-pill {{ $errors->has('client_deja_inregistrat') ? 'is-invalid' : '' }}">
                    <option value="">Selectează categorie</option> 
                    <option value="Top" {{ (old('categorie', $piesa->categorie) == "Top") ? 'selected' : '' }}>Top</option>
                    <option value="Propunere" {{ (old('categorie', $piesa->categorie) == "Propunere") ? 'selected' : '' }}>Propunere</option>
                </select>      
            </div> 
        </div>      
                                
        <div class="form-row py-2 justify-content-center">                                    
            <div class="col-lg-8 d-flex justify-content-center">  
                <button type="submit" class="btn btn-primary btn-sm mr-2 rounded-pill">{{ $buttonText }}</button> 
                {{-- <a class="btn btn-secondary btn-sm mr-4 rounded-pill" href="{{ $client_neserios->path() }}">Renunță</a>  --}}
                <a class="btn btn-secondary btn-sm mr-4 rounded-pill" href="/piese">Renunță</a> 
            </div>
        </div>
    </div>
</div>