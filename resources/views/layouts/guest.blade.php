<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'AgroInventario') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:300,400,500,600,700,800,900&display=swap" rel="stylesheet"/>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
    --soil:    #3d2b1f;
    --bark:    #5c3d2e;
    --leaf:    #2d6a4f;
    --grass:   #40916c;
    --lime:    #52b788;
    --mint:    #74c69d;
    --mist:    #b7e4c7;
    --dew:     #d8f3dc;
    --sky:     #f0fdf4;
    --wheat:   #f5c842;
    --cream:   #fefdf7;
    --white:   #ffffff;
}

html, body { height: 100%; font-family: 'Figtree', sans-serif; -webkit-font-smoothing: antialiased; }

/* ══ SHELL ══ */
.auth-shell {
    display: flex;
    min-height: 100vh;
}

/* ══ PANEL IZQUIERDO ══ */
.auth-left {
    display: none;
    width: 44%;
    flex-shrink: 0;
    position: relative;
    overflow: hidden;
    flex-direction: column;
    justify-content: space-between;
    padding: 3rem;
    background: linear-gradient(160deg, #1b4332 0%, #2d6a4f 50%, #1b4332 100%);
}

@media (min-width: 920px) { .auth-left { display: flex; } }

/* Patrón de puntos sutil */
.auth-left::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(rgba(255,255,255,.06) 1px, transparent 1px);
    background-size: 28px 28px;
    pointer-events: none;
}

/* Círculos deco */
.deco-c1 {
    position: absolute;
    width: 500px; height: 500px;
    border-radius: 50%;
    border: 1px solid rgba(116,198,157,.1);
    top: -150px; right: -150px;
    pointer-events: none;
}
.deco-c2 {
    position: absolute;
    width: 320px; height: 320px;
    border-radius: 50%;
    border: 1px solid rgba(116,198,157,.07);
    bottom: 40px; left: -80px;
    pointer-events: none;
}

/* Brand */
.left-brand {
    position: relative;
    z-index: 2;
    display: flex;
    align-items: center;
    gap: .7rem;
    text-decoration: none;
}

.left-brand-icon {
    width: 42px; height: 42px;
    background: rgba(116,198,157,.15);
    border: 1px solid rgba(116,198,157,.3);
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
}
.left-brand-icon svg { width: 22px; height: 22px; }

.left-brand-text { display: flex; flex-direction: column; }
.left-brand-name { font-size: 1.1rem; font-weight: 800; color: #fff; letter-spacing: -.01em; }
.left-brand-sub  { font-size: .64rem; font-weight: 600; color: var(--mint); text-transform: uppercase; letter-spacing: .1em; opacity: .8; }

/* Central */
.left-body {
    position: relative;
    z-index: 2;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 2rem 0;
}

.left-badge {
    display: inline-flex;
    align-items: center;
    gap: .45rem;
    background: rgba(116,198,157,.12);
    border: 1px solid rgba(116,198,157,.22);
    color: var(--mint);
    border-radius: 999px;
    padding: .28rem .9rem .28rem .5rem;
    font-size: .72rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .08em;
    margin-bottom: 1.6rem;
    width: fit-content;
}

.left-badge-dot {
    width: 18px; height: 18px;
    background: rgba(116,198,157,.2);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
}
.left-badge-dot::after {
    content: '';
    width: 6px; height: 6px;
    border-radius: 50%;
    background: var(--mint);
    animation: blink 2s infinite;
}
@keyframes blink { 0%,100%{opacity:1} 50%{opacity:.25} }

.left-heading {
    font-size: clamp(1.7rem, 2.4vw, 2.3rem);
    font-weight: 900;
    color: #fff;
    line-height: 1.18;
    letter-spacing: -.03em;
    margin-bottom: 1.1rem;
}

.left-heading em {
    font-style: normal;
    background: linear-gradient(90deg, var(--wheat), var(--mint));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.left-desc {
    font-size: .9rem;
    color: rgba(255,255,255,.5);
    line-height: 1.75;
    max-width: 300px;
    margin-bottom: 2.2rem;
}

/* Ilustración SVG central izquierda */
.left-illus {
    width: 160px; height: 160px;
    margin: 0 0 2rem 0;
    opacity: .9;
}

/* Stats */
.left-stats {
    display: flex;
    gap: 1.8rem;
    margin-bottom: 2rem;
}
.lstat-val { font-size: 1.3rem; font-weight: 800; color: var(--mint); letter-spacing: -.02em; }
.lstat-lbl { font-size: .7rem; color: rgba(255,255,255,.4); text-transform: uppercase; letter-spacing: .06em; font-weight: 600; margin-top: .1rem; }

/* Features list */
.left-feats { position: relative; z-index: 2; }

.left-sep {
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(116,198,157,.3), transparent);
    margin: 0 0 1.5rem;
}

.left-feat {
    display: flex;
    align-items: center;
    gap: .65rem;
    margin-bottom: .7rem;
}

.left-feat-check {
    width: 20px; height: 20px;
    border-radius: 6px;
    background: rgba(116,198,157,.12);
    border: 1px solid rgba(116,198,157,.22);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}
.left-feat-check svg { width: 11px; height: 11px; }
.left-feat span { font-size: .82rem; color: rgba(255,255,255,.5); }

/* ══ PANEL DERECHO ══ */
.auth-right {
    flex: 1;
    background: var(--cream);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 3rem 1.5rem;
    position: relative;
}

/* Textura fondo sutil */
.auth-right::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(ellipse 60% 40% at 80% 20%, rgba(116,198,157,.1) 0%, transparent 60%),
        radial-gradient(ellipse 40% 30% at 20% 80%, rgba(245,200,66,.06) 0%, transparent 50%);
    pointer-events: none;
}

/* Link volver (mobile) */
.back-link {
    display: none;
    align-items: center;
    gap: .4rem;
    color: var(--grass);
    font-size: .82rem;
    font-weight: 600;
    text-decoration: none;
    margin-bottom: 2rem;
    transition: color .2s;
}
.back-link:hover { color: var(--leaf); }
.back-link svg { width: 14px; height: 14px; }
@media (max-width: 919px) { .back-link { display: flex; } }

/* Caja del form */
.auth-box {
    position: relative;
    z-index: 1;
    width: 100%;
    max-width: 420px;
    background: var(--white);
    border: 1px solid rgba(116,198,157,.2);
    border-radius: 22px;
    padding: 2.5rem 2.25rem;
    box-shadow:
        0 4px 6px rgba(45,106,79,.04),
        0 20px 60px rgba(45,106,79,.08);
}

/* Top decorativo de la caja */
.auth-box::before {
    content: '';
    position: absolute;
    top: 0; left: 2rem; right: 2rem;
    height: 3px;
    background: linear-gradient(90deg, var(--leaf), var(--lime), var(--mint));
    border-radius: 0 0 4px 4px;
    opacity: .7;
}

/* ══ ENCABEZADO FORM ══ */
.fh { margin-bottom: 2rem; }

.fh-icon {
    width: 54px; height: 54px;
    border-radius: 15px;
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 1.1rem;
    background: linear-gradient(135deg, var(--dew), rgba(116,198,157,.15));
    border: 1px solid rgba(116,198,157,.25);
}
.fh-icon svg { width: 26px; height: 26px; }

.fh h1 {
    font-size: 1.55rem;
    font-weight: 900;
    color: var(--soil);
    letter-spacing: -.03em;
    margin-bottom: .3rem;
}
.fh p { font-size: .875rem; color: #7a8a7d; }

/* ══ CAMPOS ══ */
.field { margin-bottom: 1.1rem; }

.field > label {
    display: block;
    font-size: .72rem;
    font-weight: 800;
    color: #4a5a4d;
    text-transform: uppercase;
    letter-spacing: .07em;
    margin-bottom: .4rem;
}

.inp-wrap { position: relative; }

.inp-wrap .inp-icon {
    position: absolute;
    left: .875rem;
    top: 50%;
    transform: translateY(-50%);
    width: 16px; height: 16px;
    color: var(--mint);
    pointer-events: none;
    flex-shrink: 0;
}

.inp-wrap input {
    width: 100%;
    padding: .72rem .9rem .72rem 2.6rem;
    border: 1.5px solid #e2e8e4;
    border-radius: 11px;
    font-size: .925rem;
    font-family: 'Figtree', sans-serif;
    color: var(--soil);
    background: #fbfdf9;
    transition: border-color .2s, box-shadow .2s, background .2s;
    outline: none;
}

.inp-wrap input:focus {
    border-color: var(--lime);
    box-shadow: 0 0 0 4px rgba(82,183,136,.12);
    background: var(--white);
}

.inp-wrap input::placeholder { color: #c4cec6; }

.f-error {
    display: flex;
    align-items: center;
    gap: .3rem;
    font-size: .78rem;
    color: #dc2626;
    margin-top: .3rem;
}
.f-error svg { width: 12px; height: 12px; flex-shrink: 0; }

/* ══ FILA REMEMBER / FORGOT ══ */
.field-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: .5rem;
    margin-bottom: 1.5rem;
}

.check-lab {
    display: flex;
    align-items: center;
    gap: .45rem;
    font-size: .85rem;
    color: #5a6a5e;
    cursor: pointer;
    user-select: none;
}
.check-lab input { width: 15px; height: 15px; accent-color: var(--grass); }

.lnk {
    font-size: .85rem;
    font-weight: 700;
    color: var(--grass);
    text-decoration: none;
    transition: color .2s;
}
.lnk:hover { color: var(--leaf); text-decoration: underline; }

/* ══ BOTÓN ══ */
.btn-go {
    width: 100%;
    padding: .82rem;
    background: linear-gradient(135deg, var(--leaf) 0%, var(--grass) 100%);
    color: var(--white);
    border: none;
    border-radius: 12px;
    font-size: .975rem;
    font-weight: 800;
    font-family: 'Figtree', sans-serif;
    cursor: pointer;
    transition: all .2s;
    box-shadow: 0 5px 20px rgba(45,106,79,.32);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: .5rem;
    letter-spacing: -.01em;
}
.btn-go:hover {
    background: linear-gradient(135deg, #1b4332 0%, var(--leaf) 100%);
    transform: translateY(-2px);
    box-shadow: 0 8px 28px rgba(45,106,79,.42);
}
.btn-go svg { width: 18px; height: 18px; }

/* ══ STATUS ══ */
.status-ok {
    display: flex;
    align-items: center;
    gap: .5rem;
    background: var(--dew);
    border: 1px solid rgba(82,183,136,.3);
    color: var(--leaf);
    border-radius: 10px;
    padding: .65rem .9rem;
    font-size: .85rem;
    margin-bottom: 1.25rem;
}
.status-ok svg { width: 15px; height: 15px; flex-shrink: 0; }

/* ══ FOOTER FORM ══ */
.f-footer {
    text-align: center;
    margin-top: 1.4rem;
    font-size: .875rem;
    color: #7a8a7d;
}
.f-footer a { color: var(--grass); font-weight: 700; text-decoration: none; transition: color .2s; }
.f-footer a:hover { color: var(--leaf); text-decoration: underline; }
</style>
</head>
<body>
<div class="auth-shell">

    <!-- ═══ PANEL IZQUIERDO ═══ -->
    <div class="auth-left">
        <div class="deco-c1"></div>
        <div class="deco-c2"></div>

        <!-- Brand -->
        <a href="/" class="left-brand">
            <div class="left-brand-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="#74c69d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22V12M12 12C12 7 8 4 4 4c0 5 3 9 8 9zM12 12c0-5 4-8 8-8-1 5-4 9-8 9z"/>
                </svg>
            </div>
            <div class="left-brand-text">
                <span class="left-brand-name">{{ config('app.name', 'AgroInventario') }}</span>
                <span class="left-brand-sub">Sistema Agrícola</span>
            </div>
        </a>

        <!-- Body central -->
        <div class="left-body">
            <!-- Ilustración SVG agrícola -->
            <svg class="left-illus" viewBox="0 0 160 160" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- Tierra base -->
                <ellipse cx="80" cy="130" rx="65" ry="14" fill="#3d2b1f" opacity=".2"/>
                <!-- Tallo -->
                <path d="M80 118 Q80 95 80 75" stroke="#52b788" stroke-width="4" stroke-linecap="round"/>
                <!-- Hoja grande izq -->
                <path d="M80 100 Q58 85 46 68 Q64 74 80 95" fill="#40916c" opacity=".85"/>
                <!-- Hoja grande der -->
                <path d="M80 88 Q102 73 115 56 Q96 63 80 83" fill="#2d6a4f" opacity=".85"/>
                <!-- Hoja pequeña izq -->
                <path d="M80 80 Q68 72 62 62 Q72 66 80 77" fill="#52b788" opacity=".7"/>
                <!-- Flor/fruto arriba -->
                <circle cx="80" cy="68" r="13" fill="#f5c842" opacity=".9"/>
                <circle cx="80" cy="68" r="7"  fill="#e9a825"/>
                <!-- Pétalos -->
                <ellipse cx="80" cy="52" rx="4" ry="7" fill="#f5c842" opacity=".5" transform="rotate(0 80 68)"/>
                <ellipse cx="80" cy="52" rx="4" ry="7" fill="#f5c842" opacity=".5" transform="rotate(45 80 68)"/>
                <ellipse cx="80" cy="52" rx="4" ry="7" fill="#f5c842" opacity=".5" transform="rotate(90 80 68)"/>
                <ellipse cx="80" cy="52" rx="4" ry="7" fill="#f5c842" opacity=".5" transform="rotate(135 80 68)"/>
                <!-- Maceta -->
                <path d="M62 118 Q80 114 98 118 L93 140 Q80 144 67 140 Z" fill="#5c3d2e" opacity=".65"/>
                <rect x="57" y="114" width="46" height="7" rx="3.5" fill="#3d2b1f" opacity=".45"/>
                <!-- Suelo granular -->
                <circle cx="65" cy="128" r="2" fill="#8B5E3C" opacity=".3"/>
                <circle cx="75" cy="132" r="1.5" fill="#8B5E3C" opacity=".25"/>
                <circle cx="85" cy="130" r="2" fill="#8B5E3C" opacity=".3"/>
                <circle cx="93" cy="127" r="1.5" fill="#8B5E3C" opacity=".2"/>
            </svg>

            <div class="left-badge">
                <div class="left-badge-dot"></div>
                Sistema activo
            </div>

            <h2 class="left-heading">
                Del campo a los<br>
                registros, <em>todo<br>bajo control</em>
            </h2>

            <p class="left-desc">
                Plataforma diseñada para operaciones agrícolas. Trazabilidad, stock y reportes en tiempo real.
            </p>

            <div class="left-stats">
                <div>
                    <div class="lstat-val">100%</div>
                    <div class="lstat-lbl">Trazable</div>
                </div>
                <div>
                    <div class="lstat-val">Real</div>
                    <div class="lstat-lbl">Stock vivo</div>
                </div>
                <div>
                    <div class="lstat-val">Multi</div>
                    <div class="lstat-lbl">Roles</div>
                </div>
            </div>
        </div>

        <!-- Features -->
        <div class="left-feats">
            <div class="left-sep"></div>
            @foreach(['Insumos y cosecha', 'Compras y ventas', 'Proveedores agrícolas', 'Movimientos de stock'] as $f)
            <div class="left-feat">
                <div class="left-feat-check">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#74c69d" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                </div>
                <span>{{ $f }}</span>
            </div>
            @endforeach
        </div>
    </div>

    <!-- ═══ PANEL DERECHO ═══ -->
    <div class="auth-right">
        <div style="position:relative;z-index:1;width:100%;max-width:420px;">
            <a href="/" class="back-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
                Volver al inicio
            </a>
            <div class="auth-box">
                {{ $slot }}
            </div>
        </div>
    </div>

</div>
</body>
</html>
