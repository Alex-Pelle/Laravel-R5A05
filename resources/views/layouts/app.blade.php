<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel de gestion')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>
<body>


<div class="py-4">
    @auth
        <div style="display: flex; justify-content: flex-end; align-items: center; font-size: 1rem; gap: 10px;">
            <p style="padding-right: 0"><strong>{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</strong></p>
            <p style="padding-right: 0">{{ Auth::user()->role }}</p>
            <form action="{{ route('logout') }}" method="GET" style="padding-right: 5%;">
                @csrf
                <button type="submit" style="cursor: pointer; background: none; border: none; padding-right: 0; color: inherit;">
                    <i class="fas fa-sign-out-alt" style="color: red; font-size: 1rem;" title="Se déconnecter"></i>
                </button>
            </form>
        </div>

    @endauth
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

