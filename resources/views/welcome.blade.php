<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'AgroInventario') }} — Sistema de Inventario Agrícola</title>
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
    --harvest: #e9a825;
    --cream:   #fefdf7;
    --white:   #ffffff;
}

html { scroll-behavior: smooth; }

body {
    font-family: 'Figtree', sans-serif;
    background: var(--cream);
    color: var(--soil);
    overflow-x: hidden;
}

/* ═══════════════════════════════════════
   NAVBAR
═══════════════════════════════════════ */
.navbar {
    position: fixed;
    top: 0; left: 0; right: 0;
    z-index: 100;
    height: 68px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 2.5rem;
    background: rgba(255,255,255,.88);
    backdrop-filter: blur(14px);
    border-bottom: 1px solid rgba(64,145,108,.15);
    box-shadow: 0 2px 20px rgba(45,106,79,.06);
}

.brand {
    display: flex;
    align-items: center;
    gap: .7rem;
    text-decoration: none;
}

.brand-logo {
    width: 40px; height: 40px;
    background: linear-gradient(135deg, var(--leaf) 0%, var(--lime) 100%);
    border-radius: 11px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 12px rgba(45,106,79,.3);
}

.brand-logo svg { width: 22px; height: 22px; }

.brand-text { display: flex; flex-direction: column; }
.brand-name {
    font-size: 1.05rem;
    font-weight: 800;
    color: var(--leaf);
    line-height: 1;
    letter-spacing: -.01em;
}
.brand-sub {
    font-size: .65rem;
    font-weight: 500;
    color: var(--grass);
    text-transform: uppercase;
    letter-spacing: .1em;
    opacity: .75;
}

.nav-actions { display: flex; gap: .6rem; align-items: center; }

.nav-btn-ghost {
    padding: .42rem 1.1rem;
    border: 1.5px solid rgba(64,145,108,.35);
    color: var(--leaf);
    border-radius: 8px;
    font-weight: 600;
    font-size: .875rem;
    text-decoration: none;
    transition: all .2s;
}
.nav-btn-ghost:hover {
    background: var(--dew);
    border-color: var(--grass);
}

.nav-btn-fill {
    padding: .42rem 1.2rem;
    background: linear-gradient(135deg, var(--leaf) 0%, var(--grass) 100%);
    color: var(--white);
    border: none;
    border-radius: 8px;
    font-weight: 700;
    font-size: .875rem;
    text-decoration: none;
    box-shadow: 0 3px 12px rgba(45,106,79,.3);
    transition: all .2s;
}
.nav-btn-fill:hover {
    transform: translateY(-1px);
    box-shadow: 0 5px 18px rgba(45,106,79,.4);
}

/* ═══════════════════════════════════════
   HERO
═══════════════════════════════════════ */
.hero {
    min-height: 100vh;
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden;
    padding: 7rem 2.5rem 4rem;
}

/* Fondo degradado */
.hero-bg {
    position: absolute;
    inset: 0;
    background:
        radial-gradient(ellipse 80% 60% at 60% 40%, rgba(116,198,157,.13) 0%, transparent 70%),
        radial-gradient(ellipse 50% 50% at 90% 80%, rgba(245,200,66,.08) 0%, transparent 60%),
        linear-gradient(175deg, #f7fef9 0%, #edf8ef 50%, #fefdf7 100%);
    z-index: 0;
}

/* Olas decorativas abajo */
.hero-wave {
    position: absolute;
    bottom: -2px; left: 0; right: 0;
    z-index: 1;
}

.hero-inner {
    position: relative;
    z-index: 2;
    max-width: 1200px;
    margin: 0 auto;
    width: 100%;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
}

@media (max-width: 800px) {
    .hero-inner { grid-template-columns: 1fr; gap: 2.5rem; }
    .hero-visual { display: none; }
}

.hero-content {}

.hero-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: .5rem;
    background: linear-gradient(90deg, rgba(82,183,136,.15), rgba(82,183,136,.05));
    border: 1px solid rgba(82,183,136,.3);
    color: var(--leaf);
    border-radius: 999px;
    padding: .3rem 1rem .3rem .5rem;
    font-size: .78rem;
    font-weight: 700;
    letter-spacing: .06em;
    text-transform: uppercase;
    margin-bottom: 1.6rem;
}

.hero-eyebrow-dot {
    width: 22px; height: 22px;
    background: linear-gradient(135deg, var(--leaf), var(--mint));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.hero-eyebrow-dot svg { width: 12px; height: 12px; }

.hero-title {
    font-size: clamp(2.4rem, 5vw, 3.6rem);
    font-weight: 900;
    line-height: 1.1;
    letter-spacing: -.03em;
    color: var(--soil);
    margin-bottom: 1.4rem;
}

.hero-title .accent {
    background: linear-gradient(135deg, var(--leaf) 0%, var(--lime) 60%, var(--mint) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-title .accent-gold {
    background: linear-gradient(135deg, var(--harvest) 0%, var(--wheat) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-desc {
    font-size: 1.05rem;
    color: #5a6a5e;
    line-height: 1.75;
    max-width: 480px;
    margin-bottom: 2.4rem;
    font-weight: 400;
}

.hero-cta {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    margin-bottom: 3rem;
}

.cta-primary {
    display: inline-flex;
    align-items: center;
    gap: .55rem;
    padding: .85rem 2rem;
    background: linear-gradient(135deg, var(--leaf) 0%, var(--grass) 100%);
    color: var(--white);
    border-radius: 12px;
    font-weight: 700;
    font-size: 1rem;
    text-decoration: none;
    box-shadow: 0 6px 24px rgba(45,106,79,.35);
    transition: all .2s;
}
.cta-primary:hover { transform: translateY(-2px); box-shadow: 0 10px 32px rgba(45,106,79,.45); }
.cta-primary svg { width: 18px; height: 18px; }

.cta-secondary {
    display: inline-flex;
    align-items: center;
    gap: .55rem;
    padding: .85rem 2rem;
    background: var(--white);
    color: var(--leaf);
    border: 2px solid var(--mist);
    border-radius: 12px;
    font-weight: 700;
    font-size: 1rem;
    text-decoration: none;
    transition: all .2s;
}
.cta-secondary:hover { border-color: var(--lime); transform: translateY(-2px); }
.cta-secondary svg { width: 18px; height: 18px; }

/* Mini stats */
.hero-stats {
    display: flex;
    gap: 2rem;
    flex-wrap: wrap;
}

.hero-stat { display: flex; flex-direction: column; gap: .1rem; }
.hero-stat-val {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--leaf);
    letter-spacing: -.03em;
}
.hero-stat-lbl {
    font-size: .75rem;
    color: #8a9a8e;
    text-transform: uppercase;
    letter-spacing: .06em;
    font-weight: 600;
}

/* ── Ilustración hero ── */
.hero-visual {
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

.illus-wrap {
    position: relative;
    width: 420px;
    height: 420px;
}

.illus-circle-1 {
    position: absolute;
    inset: 0;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(116,198,157,.18) 0%, rgba(116,198,157,.04) 70%);
}

.illus-circle-2 {
    position: absolute;
    top: 10%; left: 10%; right: 10%; bottom: 10%;
    border-radius: 50%;
    border: 1.5px dashed rgba(82,183,136,.25);
    animation: spin-slow 30s linear infinite;
}

@keyframes spin-slow {
    from { transform: rotate(0deg); }
    to   { transform: rotate(360deg); }
}

.illus-center {
    position: absolute;
    inset: 20%;
    background: var(--white);
    border-radius: 50%;
    box-shadow: 0 20px 60px rgba(45,106,79,.15);
    display: flex;
    align-items: center;
    justify-content: center;
}

.illus-center svg { width: 110px; height: 110px; }

/* tarjetas flotantes */
.float-card {
    position: absolute;
    background: var(--white);
    border: 1px solid rgba(116,198,157,.3);
    border-radius: 14px;
    padding: .7rem 1rem;
    box-shadow: 0 8px 28px rgba(45,106,79,.12);
    display: flex;
    align-items: center;
    gap: .6rem;
    font-size: .8rem;
    font-weight: 700;
    color: var(--soil);
    white-space: nowrap;
}
.float-card .fc-icon {
    width: 32px; height: 32px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    flex-shrink: 0;
}
.float-card .fc-sub { font-size: .7rem; font-weight: 400; color: #8a9a8e; }

.float-card-1 {
    top: 8%; left: -10%;
    animation: float1 4s ease-in-out infinite;
}
.float-card-2 {
    bottom: 18%; right: -8%;
    animation: float2 5s ease-in-out infinite;
}
.float-card-3 {
    bottom: 5%; left: 5%;
    animation: float1 6s ease-in-out infinite reverse;
}

@keyframes float1 {
    0%,100% { transform: translateY(0); }
    50%      { transform: translateY(-10px); }
}
@keyframes float2 {
    0%,100% { transform: translateY(0); }
    50%      { transform: translateY(8px); }
}

/* ═══════════════════════════════════════
   SECCIÓN FEATURES
═══════════════════════════════════════ */
.section-features {
    padding: 6rem 2.5rem;
    background: var(--white);
    position: relative;
}

.section-features::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--mist), transparent);
}

.section-inner {
    max-width: 1100px;
    margin: 0 auto;
}

.section-label {
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 3.5rem;
}

.pill-label {
    display: inline-flex;
    align-items: center;
    gap: .4rem;
    background: var(--dew);
    color: var(--leaf);
    border: 1px solid var(--mist);
    border-radius: 999px;
    padding: .28rem .9rem;
    font-size: .74rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .08em;
    margin-bottom: 1rem;
}

.section-title {
    font-size: clamp(1.8rem, 3.5vw, 2.6rem);
    font-weight: 800;
    color: var(--soil);
    letter-spacing: -.03em;
    line-height: 1.15;
    margin-bottom: .8rem;
}

.section-title .g {
    background: linear-gradient(135deg, var(--leaf), var(--lime));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.section-sub {
    font-size: .975rem;
    color: #6b7a6e;
    max-width: 500px;
    text-align: center;
    line-height: 1.7;
}

/* Grid de features */
.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
    gap: 1.5rem;
}

.feat-card {
    background: var(--sky);
    border: 1px solid rgba(116,198,157,.2);
    border-radius: 18px;
    padding: 1.8rem 1.6rem;
    transition: all .25s;
    cursor: default;
    position: relative;
    overflow: hidden;
}

.feat-card::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--leaf), var(--lime));
    transform: scaleX(0);
    transform-origin: left;
    transition: transform .3s;
}

.feat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 32px rgba(45,106,79,.12);
    border-color: var(--mist);
    background: var(--white);
}
.feat-card:hover::after { transform: scaleX(1); }

.feat-icon {
    width: 54px; height: 54px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.2rem;
    font-size: 1.5rem;
}

.feat-card h3 {
    font-size: 1.05rem;
    font-weight: 800;
    color: var(--soil);
    margin-bottom: .5rem;
    letter-spacing: -.02em;
}

.feat-card p {
    font-size: .875rem;
    color: #6b7a6e;
    line-height: 1.65;
}

/* ═══════════════════════════════════════
   SECCIÓN CÓMO FUNCIONA
═══════════════════════════════════════ */
.section-how {
    padding: 6rem 2.5rem;
    background: linear-gradient(180deg, var(--dew) 0%, var(--white) 100%);
}

.steps-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 2rem;
    margin-top: 3.5rem;
    position: relative;
}

.step-card {
    text-align: center;
    padding: 1.5rem 1rem;
}

.step-num {
    width: 48px; height: 48px;
    background: linear-gradient(135deg, var(--leaf), var(--lime));
    color: var(--white);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    font-weight: 800;
    margin: 0 auto 1.2rem;
    box-shadow: 0 6px 18px rgba(45,106,79,.3);
}

.step-card h4 {
    font-size: 1rem;
    font-weight: 700;
    color: var(--soil);
    margin-bottom: .5rem;
}

.step-card p {
    font-size: .85rem;
    color: #6b7a6e;
    line-height: 1.65;
}

/* ═══════════════════════════════════════
   BANNER CTA
═══════════════════════════════════════ */
.section-cta {
    padding: 5rem 2.5rem;
    background: linear-gradient(135deg, var(--leaf) 0%, #1b4332 100%);
    position: relative;
    overflow: hidden;
    text-align: center;
}

.section-cta::before {
    content: '';
    position: absolute;
    width: 600px; height: 600px;
    border-radius: 50%;
    border: 1px solid rgba(255,255,255,.06);
    top: -200px; right: -100px;
}
.section-cta::after {
    content: '';
    position: absolute;
    width: 400px; height: 400px;
    border-radius: 50%;
    border: 1px solid rgba(255,255,255,.04);
    bottom: -150px; left: -80px;
}

.cta-inner { position: relative; z-index: 1; }

.cta-pretitle {
    display: inline-block;
    background: rgba(255,255,255,.1);
    border: 1px solid rgba(255,255,255,.2);
    color: var(--mint);
    border-radius: 999px;
    padding: .3rem 1rem;
    font-size: .78rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .08em;
    margin-bottom: 1.5rem;
}

.cta-title {
    font-size: clamp(1.8rem, 4vw, 2.8rem);
    font-weight: 900;
    color: var(--white);
    letter-spacing: -.03em;
    line-height: 1.15;
    margin-bottom: 1.2rem;
}

.cta-desc {
    font-size: 1rem;
    color: rgba(255,255,255,.65);
    max-width: 480px;
    margin: 0 auto 2.5rem;
    line-height: 1.7;
}

.cta-btns {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.cta-btn-white {
    display: inline-flex;
    align-items: center;
    gap: .55rem;
    padding: .85rem 2rem;
    background: var(--white);
    color: var(--leaf);
    border-radius: 12px;
    font-weight: 700;
    font-size: 1rem;
    text-decoration: none;
    box-shadow: 0 6px 24px rgba(0,0,0,.15);
    transition: all .2s;
}
.cta-btn-white:hover { transform: translateY(-2px); box-shadow: 0 10px 32px rgba(0,0,0,.2); }

.cta-btn-outline {
    display: inline-flex;
    align-items: center;
    gap: .55rem;
    padding: .85rem 2rem;
    background: transparent;
    color: var(--white);
    border: 2px solid rgba(255,255,255,.3);
    border-radius: 12px;
    font-weight: 700;
    font-size: 1rem;
    text-decoration: none;
    transition: all .2s;
}
.cta-btn-outline:hover { background: rgba(255,255,255,.08); border-color: rgba(255,255,255,.5); }

/* ═══════════════════════════════════════
   FOOTER
═══════════════════════════════════════ */
footer {
    background: var(--soil);
    padding: 2.5rem 2.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 1rem;
}

.footer-brand {
    display: flex;
    align-items: center;
    gap: .6rem;
    text-decoration: none;
}

.footer-brand-icon {
    width: 34px; height: 34px;
    background: rgba(116,198,157,.15);
    border: 1px solid rgba(116,198,157,.25);
    border-radius: 9px;
    display: flex; align-items: center; justify-content: center;
}
.footer-brand-icon svg { width: 18px; height: 18px; }

.footer-brand-name {
    font-size: .95rem;
    font-weight: 700;
    color: var(--mint);
}

.footer-copy {
    font-size: .8rem;
    color: rgba(255,255,255,.35);
}

.footer-copy span { color: var(--mint); }
</style>
</head>
<body>

<!-- ══════════════════ NAVBAR ══════════════════ -->
<nav class="navbar">
    <a href="/" class="brand">
        <div class="brand-logo">
            <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 2a10 10 0 0 1 0 20"/>
                <path d="M12 2a10 10 0 0 0 0 20"/>
                <path d="M12 2c2.5 5 2.5 15 0 20"/>
                <path d="M2 12h20"/>
                <path d="M4.9 7h14.2M4.9 17h14.2"/>
            </svg>
        </div>
        <div class="brand-text">
            <span class="brand-name">{{ config('app.name', 'AgroInventario') }}</span>
            <span class="brand-sub">Sistema Agrícola</span>
        </div>
    </a>

    <div class="nav-actions">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="nav-btn-fill">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="nav-btn-ghost">Iniciar sesión</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="nav-btn-fill">Registrarse</a>
                @endif
            @endauth
        @endif
    </div>
</nav>

<!-- ══════════════════ HERO ══════════════════ -->
<section class="hero">
    <div class="hero-bg"></div>

    <div class="hero-inner">
        <!-- Contenido -->
        <div class="hero-content">
            <div class="hero-eyebrow">
                <div class="hero-eyebrow-dot">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22V12M12 12C12 7 8 4 4 4c0 5 3 9 8 9zM12 12c0-5 4-8 8-8-1 5-4 9-8 9z"/>
                    </svg>
                </div>
                Inventario Agrícola Inteligente
            </div>

            <h1 class="hero-title">
                Del campo a tus<br>
                <span class="accent">registros,</span> todo<br>
                bajo <span class="accent-gold">control</span>
            </h1>

            <p class="hero-desc">
                Gestiona tus insumos agrícolas, cosechas, proveedores y ventas desde una plataforma diseñada para el agro. Trazabilidad total, en tiempo real.
            </p>

            <div class="hero-cta">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="cta-primary">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="7" height="7" x="3" y="3" rx="1"/><rect width="7" height="7" x="14" y="3" rx="1"/><rect width="7" height="7" x="14" y="14" rx="1"/><rect width="7" height="7" x="3" y="14" rx="1"/></svg>
                            Ir al Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="cta-primary">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
                            Comenzar ahora
                        </a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="cta-secondary">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/></svg>
                            Crear cuenta gratis
                        </a>
                        @endif
                    @endauth
                @endif
            </div>

            <div class="hero-stats">
                <div class="hero-stat">
                    <span class="hero-stat-val">100%</span>
                    <span class="hero-stat-lbl">Trazabilidad</span>
                </div>
                <div class="hero-stat">
                    <span class="hero-stat-val">Tiempo real</span>
                    <span class="hero-stat-lbl">Stock actualizado</span>
                </div>
                <div class="hero-stat">
                    <span class="hero-stat-val">Multi-rol</span>
                    <span class="hero-stat-lbl">Control de acceso</span>
                </div>
            </div>
        </div>

        <!-- Ilustración -->
        <div class="hero-visual">
            <div class="illus-wrap">
                <div class="illus-circle-1"></div>
                <div class="illus-circle-2"></div>
                <div class="illus-center">
                    <!-- SVG agrícola central -->
                    <svg viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <!-- Sol -->
                        <circle cx="60" cy="28" r="12" fill="#f5c842" opacity=".9"/>
                        <line x1="60" y1="10" x2="60" y2="4" stroke="#f5c842" stroke-width="2.5" stroke-linecap="round"/>
                        <line x1="60" y1="52" x2="60" y2="46" stroke="#f5c842" stroke-width="2.5" stroke-linecap="round"/>
                        <line x1="42" y1="28" x2="36" y2="28" stroke="#f5c842" stroke-width="2.5" stroke-linecap="round"/>
                        <line x1="84" y1="28" x2="78" y2="28" stroke="#f5c842" stroke-width="2.5" stroke-linecap="round"/>
                        <line x1="47" y1="15" x2="43" y2="11" stroke="#f5c842" stroke-width="2.5" stroke-linecap="round"/>
                        <line x1="77" y1="45" x2="73" y2="41" stroke="#f5c842" stroke-width="2.5" stroke-linecap="round"/>
                        <line x1="73" y1="15" x2="77" y2="11" stroke="#f5c842" stroke-width="2.5" stroke-linecap="round"/>
                        <line x1="43" y1="45" x2="47" y2="41" stroke="#f5c842" stroke-width="2.5" stroke-linecap="round"/>
                        <!-- Tierra -->
                        <ellipse cx="60" cy="95" rx="42" ry="10" fill="#8B5E3C" opacity=".18"/>
                        <!-- Tallo principal -->
                        <path d="M60 88 Q60 72 60 60" stroke="#40916c" stroke-width="3.5" stroke-linecap="round"/>
                        <!-- Hoja izquierda -->
                        <path d="M60 75 Q45 65 38 55 Q50 58 60 70" fill="#52b788" opacity=".9"/>
                        <!-- Hoja derecha -->
                        <path d="M60 68 Q75 58 83 48 Q70 52 60 65" fill="#2d6a4f" opacity=".9"/>
                        <!-- Maceta / tierra -->
                        <path d="M42 88 Q60 84 78 88 L74 108 Q60 112 46 108 Z" fill="#5c3d2e" opacity=".75"/>
                        <path d="M38 86 Q60 82 82 86 Q82 90 60 90 Q38 90 38 86Z" fill="#3d2b1f" opacity=".5"/>
                        <!-- Pequeñas hojas -->
                        <circle cx="60" cy="60" r="8" fill="#74c69d" opacity=".8"/>
                        <circle cx="60" cy="60" r="4.5" fill="#b7e4c7" opacity=".7"/>
                    </svg>
                </div>

                <!-- Tarjetas flotantes -->
                <div class="float-card float-card-1">
                    <div class="fc-icon" style="background:#dcfce7;">🌱</div>
                    <div>
                        <div>Stock actualizado</div>
                        <div class="fc-sub">248 productos activos</div>
                    </div>
                </div>

                <div class="float-card float-card-2">
                    <div class="fc-icon" style="background:#fef9c3;">🌾</div>
                    <div>
                        <div>Cosecha registrada</div>
                        <div class="fc-sub">+12% este mes</div>
                    </div>
                </div>

                <div class="float-card float-card-3">
                    <div class="fc-icon" style="background:#dbeafe;">📦</div>
                    <div>
                        <div>Última compra</div>
                        <div class="fc-sub">Hace 2 horas</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ola -->
    <div class="hero-wave">
        <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <path d="M0,40 C360,80 1080,0 1440,40 L1440,80 L0,80 Z" fill="#ffffff"/>
        </svg>
    </div>
</section>

<!-- ══════════════════ FEATURES ══════════════════ -->
<section class="section-features">
    <div class="section-inner">
        <div class="section-label">
            <span class="pill-label">🌿 Módulos del sistema</span>
            <h2 class="section-title">Todo lo que necesita<br>tu <span class="g">operación agrícola</span></h2>
            <p class="section-sub">Desde el ingreso de insumos hasta la venta final, cada proceso del campo queda documentado y trazado.</p>
        </div>

        <div class="features-grid">
            <div class="feat-card">
                <div class="feat-icon" style="background:#dcfce7;">🌱</div>
                <h3>Productos e Insumos</h3>
                <p>Gestiona semillas, fertilizantes, agroquímicos y productos de cosecha con stock en tiempo real y alertas de mínimos.</p>
            </div>
            <div class="feat-card">
                <div class="feat-icon" style="background:#fef9c3;">🚜</div>
                <h3>Proveedores Agrícolas</h3>
                <p>Registra y administra tus proveedores de insumos, maquinaria y servicios del campo con historial completo.</p>
            </div>
            <div class="feat-card">
                <div class="feat-icon" style="background:#dbeafe;">📋</div>
                <h3>Compras y Entradas</h3>
                <p>Controla el ingreso de mercadería con detalle por lote, precio y proveedor. Historial auditado.</p>
            </div>
            <div class="feat-card">
                <div class="feat-icon" style="background:#fce7f3;">🌾</div>
                <h3>Ventas y Despachos</h3>
                <p>Registra ventas de producción agrícola, calcula ganancias automáticamente y genera reportes por período.</p>
            </div>
            <div class="feat-card">
                <div class="feat-icon" style="background:#ffedd5;">🔄</div>
                <h3>Devoluciones</h3>
                <p>Maneja devoluciones a proveedores y de clientes con trazabilidad de motivos y afectación de stock.</p>
            </div>
            <div class="feat-card">
                <div class="feat-icon" style="background:#ede9fe;">📊</div>
                <h3>Movimientos de Stock</h3>
                <p>Historial completo de cada movimiento: entradas, salidas, ajustes y transferencias con fecha y usuario.</p>
            </div>
        </div>
    </div>
</section>

<!-- ══════════════════ CÓMO FUNCIONA ══════════════════ -->
<section class="section-how">
    <div class="section-inner">
        <div class="section-label">
            <span class="pill-label">⚙️ Proceso simple</span>
            <h2 class="section-title">En marcha en <span class="g">minutos</span></h2>
            <p class="section-sub">Diseñado para que productores y administradores puedan empezar sin curva de aprendizaje.</p>
        </div>

        <div class="steps-grid">
            <div class="step-card">
                <div class="step-num">1</div>
                <h4>Crea tu cuenta</h4>
                <p>Regístrate y configura tu empresa agrícola, roles de usuario y categorías de productos.</p>
            </div>
            <div class="step-card">
                <div class="step-num">2</div>
                <h4>Carga tu catálogo</h4>
                <p>Ingresa tus insumos, productos de cosecha y proveedores en pocos pasos.</p>
            </div>
            <div class="step-card">
                <div class="step-num">3</div>
                <h4>Registra movimientos</h4>
                <p>Documenta compras, ventas y ajustes. El stock se actualiza automáticamente.</p>
            </div>
            <div class="step-card">
                <div class="step-num">4</div>
                <h4>Toma decisiones</h4>
                <p>Consulta el historial, detecta tendencias y optimiza tu operación con datos reales.</p>
            </div>
        </div>
    </div>
</section>

<!-- ══════════════════ CTA BANNER ══════════════════ -->
<section class="section-cta">
    <div class="cta-inner">
        <span class="cta-pretitle">🌿 Empieza hoy</span>
        <h2 class="cta-title">Tu campo merece<br>gestión de primer nivel</h2>
        <p class="cta-desc">Únete y lleva el control de tu inventario agrícola a otro nivel. Sin papeles, sin errores.</p>
        <div class="cta-btns">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="cta-btn-white">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="7" height="7" x="3" y="3" rx="1"/><rect width="7" height="7" x="14" y="3" rx="1"/><rect width="7" height="7" x="14" y="14" rx="1"/><rect width="7" height="7" x="3" y="14" rx="1"/></svg>
                        Abrir Dashboard
                    </a>
                @else
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="cta-btn-white">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/></svg>
                            Crear cuenta gratis
                        </a>
                    @endif
                    <a href="{{ route('login') }}" class="cta-btn-outline">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
                        Ya tengo cuenta
                    </a>
                @endauth
            @endif
        </div>
    </div>
</section>

<!-- ══════════════════ FOOTER ══════════════════ -->
<footer>
    <a href="/" class="footer-brand">
        <div class="footer-brand-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="#74c69d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 22V12M12 12C12 7 8 4 4 4c0 5 3 9 8 9zM12 12c0-5 4-8 8-8-1 5-4 9-8 9z"/>
            </svg>
        </div>
        <span class="footer-brand-name">{{ config('app.name', 'AgroInventario') }}</span>
    </a>
    <p class="footer-copy">&copy; {{ date('Y') }} <span>{{ config('app.name', 'AgroInventario') }}</span>. Todos los derechos reservados.</p>
</footer>

</body>
</html>
