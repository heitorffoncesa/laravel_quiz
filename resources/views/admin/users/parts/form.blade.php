<div class="form-group">
    <label for="role">Permissão</label>
    <select name="role" id="role" class="form-control">
        <option value="">Selecione a permissão...</option>

        @foreach($roles as $role)
            <option value="{{ $role->slug }}"
                {{ old('role', isset($user) ? $user->role->slug : '') === $role->slug ? 'selected' : '' }}
            >
                {{ $role->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="name">Nome</label>
    <input type="text"
           name="name"
           class="form-control"
           id="name"
           placeholder="Digite seu nome"
           value="{{ old('name', isset($user) && $user->name ? $user->name : null) }}"
    >
</div>

<div class="form-group">
    <label for="email">E-mail</label>
    <input type="text"
           name="email"
           class="form-control"
           id="email"
           placeholder="Digite seu e-mail"
           value="{{ old('email', isset($user) && $user->email ? $user->email : null) }}"
    >
</div>

@if($new)
    <div class="form-group">
        <label for="password">Senha</label>
        <input type="text"
               name="password"
               class="form-control"
               id="password"
               placeholder="Digite sua senha"
        >
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirmar senha</label>
        <input type="text"
               name="password_confirmation"
               class="form-control"
               id="password_confirmation"
               placeholder="Confirme sua senha"
        >
    </div>
@endif
