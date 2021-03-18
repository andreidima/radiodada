@csrf

<div class="form-row mb-0 d-flex border-radius: 0px 0px 40px 40px" id="app1">
    <div class="form-group col-lg-12 px-2 mb-0">
        <div class="form-row">                                    
            <div class="form-group col-lg-12">  
                <label for="nume" class="mb-0 pl-3">Nume:*</label>                                      
                <input 
                    type="text" 
                    class="form-control form-control-sm rounded-pill {{ $errors->has('nume') ? 'is-invalid' : '' }}" 
                    name="nume" 
                    placeholder="" 
                    value="{{ old('nume', $piesa->nume) }}"
                    required> 
            </div>   
            <div class="form-group col-lg-12 ">                  
                    <label for="artist_id" class="mb-0 pl-3">Artist:</label>
                    <div class="">    
                        <select name="artist_id" 
                            class="custom-select custom-select-sm rounded-pill {{ $errors->has('artist_id') ? 'is-invalid' : '' }}" 
                        >
                                <option value='' selected>Selectează artist</option>
                            @foreach ($artisti as $artist)                           
                                <option 
                                    value='{{ $artist->id }}'
                                    {{ ($artist->id == old('artist_id', ($piesa->artist->id ?? ''))) ? 'selected' : '' }}
                                >{{ $artist->nume }} </option>                                                
                            @endforeach
                        </select>
                    </div>
            </div>                       
            <div class="form-group col-lg-12">  
                <label for="link_youtube" class="mb-0 pl-3">Link youtube:</label>                                      
                <input 
                    type="text" 
                    class="form-control form-control-sm rounded-pill {{ $errors->has('link_youtube') ? 'is-invalid' : '' }}" 
                    name="link_youtube" 
                    placeholder="" 
                    value="{{ old('link_youtube', $piesa->link_youtube) }}"
                    required> 
            </div>                       
            <div class="form-group col-lg-12">  
                <label for="link_interviu" class="mb-0 pl-3">Link interviu:</label>                                      
                <input 
                    type="text" 
                    class="form-control form-control-sm rounded-pill {{ $errors->has('link_interviu') ? 'is-invalid' : '' }}" 
                    name="link_interviu" 
                    placeholder="" 
                    value="{{ old('link_interviu', $piesa->link_interviu) }}"
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
            <div class="form-group col-lg-12">  
                <label for="voturi" class="mb-0 pl-3">Voturi:</label>                                      
                <input 
                    type="text" 
                    class="form-control form-control-sm rounded-pill {{ $errors->has('voturi') ? 'is-invalid' : '' }}" 
                    name="voturi" 
                    placeholder="" 
                    value="{{ old('voturi', $piesa->voturi) }}"
                    required> 
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