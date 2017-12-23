<div class="row">
    <div class="col s8 offset-s2">
        <h2 class="center">Nuevo mensaje</h2>
        <div class="row">
            <form action="{{ route('messages.update', $thread->id) }}" method="post">
                {{ method_field('put') }}
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">message</i>
                        <label for="message">Mensaje</label>
                        <textarea name="message" class="materialize-textarea" cols="30" rows="10">{{ old('message') }}</textarea>
                    </div>
                </div>
                @if(Auth::user()->role_id == 1)
                    <div class="row">
                        <div class="col s12">
                            @if($users->count() > 0)
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">supervisor_account</i>
                                    <select multiple name="recipients[]">
                                        <option value="" disabled selected>Añade más usuarios</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    <label>Usuarios</label>
                                  </div>
                            @endif
                        </div>
                    </div>
                @endif
                <div class="row center-align">
                    <div class="col s12">
                        <button type="submit" class="waves-effect waves-light btn">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>