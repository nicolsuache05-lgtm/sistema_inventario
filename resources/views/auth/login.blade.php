<x-guest-layout>

    <!-- Encabezado -->
    <div class="fh">
        <div class="fh-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="#2d6a4f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 22V12M12 12C12 7 8 4 4 4c0 5 3 9 8 9zM12 12c0-5 4-8 8-8-1 5-4 9-8 9z"/>
            </svg>
        </div>
        <h1>Bienvenido</h1>
        <p>Ingresa al sistema de inventario agrícola</p>
    </div>

    @if (session('status'))
        <div class="status-ok">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="field">
            <label for="email">Correo electrónico</label>
            <div class="inp-wrap">
                <svg class="inp-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="20" height="16" x="2" y="4" rx="2"/>
                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                </svg>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                       required autofocus autocomplete="username"
                       placeholder="tu@correo.com"/>
            </div>
            @error('email')
                <div class="f-error">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Contraseña -->
        <div class="field">
            <label for="password">Contraseña</label>
            <div class="inp-wrap">
                <svg class="inp-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="18" height="11" x="3" y="11" rx="2" ry="2"/>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                </svg>
                <input type="password" id="password" name="password"
                       required autocomplete="current-password"
                       placeholder="••••••••"/>
            </div>
            @error('password')
                <div class="f-error">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Remember / Forgot -->
        <div class="field-row">
            <label class="check-lab">
                <input type="checkbox" name="remember" id="remember_me">
                Recordar sesión
            </label>
            @if (Route::has('password.request'))
                <a class="lnk" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
            @endif
        </div>

        <!-- Botón -->
        <button type="submit" class="btn-go">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                <polyline points="10 17 15 12 10 7"/>
                <line x1="15" y1="12" x2="3" y2="12"/>
            </svg>
            Entrar al sistema
        </button>

        @if (Route::has('register'))
            <p class="f-footer">
                ¿Sin cuenta aún? <a href="{{ route('register') }}">Regístrate gratis</a>
            </p>
        @endif
    </form>

</x-guest-layout>
