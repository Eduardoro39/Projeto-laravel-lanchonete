<nav class="col-md-3 bg-dark">
    <ul class="nav flex-column py-4 min-vh-100 textoCinza">
        <li class="nav-item mb-3 mt-1 {{ Route::currentRouteNamed('admin.dashboard') ? 'ativo' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="nav-link text-start d-inline-block mx-1 p-0" role="button" aria-current="page"> <i class="bi-window-sidebar mx-2 h4"></i> Dashboard </a>
        </li>

        <li class="nav-item my-2 {{ Route::currentRouteNamed('admin.comidas.index') || Route::currentRouteNamed('admin.comidas.create') ? 'ativo' : '' }}">
            <a href="#comidas" class="nav-link text-start d-inline-block mx-1 p-0" data-bs-toggle="collapse" onclick="document.getElementById('iconeSeta1').classList.toggle('giro');" role="button" aria-expanded="false" aria-controls="comidas" aria-current="page"> <i class="bi-egg mx-2 h4"></i> Comidas </a>
            <i class="bi-chevron-right float-end mx-lg-4 mx-sm-1" id="iconeSeta1"></i>

            <ul class="btn-toggle-nav collapse list-unstyled pb-2 px-5" id="comidas">
                <li><a href="{{ route('admin.comidas.index') }}" class="text-decoration-none"> Listar Comidas </a></li>
                <li><a href="{{ route('admin.comidas.create') }}" class="text-decoration-none"> Cadastrar Comida </a></li>
            </ul>
        </li>

        <li class="nav-item my-2 {{ Route::currentRouteNamed('admin.bebidas.index') || Route::currentRouteNamed('admin.bebidas.create') ? 'ativo' : '' }}">
            <a href="#bebidas" class="nav-link text-start d-inline-block mx-1 p-0" data-bs-toggle="collapse" onclick="document.getElementById('iconeSeta2').classList.toggle('giro');" role="button" aria-expanded="false" aria-controls="bebidas" aria-current="page"> <i class="bi-cup-straw mx-2 h4"></i> Bebidas </a>
            <i class="bi-chevron-right float-end mx-lg-4 mx-sm-1" id="iconeSeta2"></i>

            <ul class="btn-toggle-nav collapse list-unstyled pb-2 px-5" id="bebidas">
                <li><a href="{{ route('admin.bebidas.index') }}" class="text-decoration-none"> Listar Bebidas </a></li>
                <li><a href="{{ route('admin.bebidas.create') }}" class="text-decoration-none"> Cadastrar Bebida </a></li>
            </ul>
        </li>

        <li class="nav-item my-2 {{ Route::currentRouteNamed('admin.ingredientes.index') || Route::currentRouteNamed('admin.ingredientes.create') ? 'ativo' : '' }}">
            <a href="#ingredientes" class="nav-link text-start d-inline-block mx-1 p-0" data-bs-toggle="collapse" onclick="document.getElementById('iconeSeta3').classList.toggle('giro');" role="button" aria-expanded="false" aria-controls="ingredientes" aria-current="page"> <i class="bi-truck mx-2 h4"></i> Ingredientes </a>
            <i class="bi-chevron-right float-end mx-lg-4 mx-sm-1" id="iconeSeta3"></i>

            <ul class="btn-toggle-nav collapse list-unstyled pb-2 px-5" id="ingredientes">
                <li><a href="{{ route('admin.ingredientes.index') }}" class="text-decoration-none"> Listar Ingredientes </a></li>
                <li><a href="{{ route('admin.ingredientes.create') }}" class="text-decoration-none"> Cadastrar Ingrediente </a></li>
            </ul>
        </li>

        <li class="nav-item my-2 {{ Route::currentRouteNamed('admin.medidas.index') || Route::currentRouteNamed('admin.medidas.create') ? 'ativo' : '' }}">
            <a href="#medidas" class="nav-link text-start d-inline-block mx-1 p-0" data-bs-toggle="collapse" onclick="document.getElementById('iconeSeta4').classList.toggle('giro');" role="button" aria-expanded="false" aria-controls="medidas" aria-current="page"> <i class="bi-rulers mx-2 h4"></i> Medidas </a>
            <i class="bi-chevron-right float-end mx-lg-4 mx-sm-1" id="iconeSeta4"></i>

            <ul class="btn-toggle-nav collapse list-unstyled pb-2 px-5" id="medidas">
                <li><a href="{{ route('admin.medidas.index') }}" class="text-decoration-none"> Listar Medidas </a></li>
                <li><a href="{{ route('admin.medidas.create') }}" class="text-decoration-none"> Cadastrar Medida </a></li>
            </ul>
        </li>

        <li class="nav-item my-2 {{ Route::currentRouteNamed('admin.usuarios.index') || Route::currentRouteNamed('admin.usuarios.create') ? 'ativo' : '' }}">
            <a href="#usuarios" class="nav-link text-start d-inline-block mx-1 p-0" data-bs-toggle="collapse" onclick="document.getElementById('iconeSeta5').classList.toggle('giro');" role="button" aria-expanded="false" aria-controls="usuarios" aria-current="page"> <i class="bi-person mx-2 h4"></i> Usuários </a>
            <i class="bi-chevron-right float-end mx-lg-4 mx-sm-1" id="iconeSeta5"></i>

            <ul class="btn-toggle-nav collapse list-unstyled pb-2 px-5" id="usuarios">
                <li><a href="{{ route('admin.usuarios.index') }}" class="text-decoration-none"> Listar Usuários </a></li>
                <li><a href="{{ route('admin.usuarios.create') }}" class="text-decoration-none"> Cadastrar Usuário </a></li>
            </ul>
        </li>

        <li class="nav-item my-2 {{ Route::currentRouteNamed('admin.funcionarios.index') || Route::currentRouteNamed('admin.funcionarios.create') ? 'ativo' : '' }}">
            <a href="#funcionarios" class="nav-link text-start d-inline-block mx-1 p-0" data-bs-toggle="collapse" onclick="document.getElementById('iconeSeta6').classList.toggle('giro');" role="button" aria-expanded="false" aria-controls="funcionarios" aria-current="page"> <i class="bi-person mx-2 h4"></i> Funcionários </a>
            <i class="bi-chevron-right float-end mx-lg-4 mx-sm-1" id="iconeSeta6"></i>

            <ul class="btn-toggle-nav collapse list-unstyled pb-2 px-5" id="funcionarios">
                <li><a href="{{ route('admin.funcionarios.index') }}" class="text-decoration-none"> Listar Funcionários </a></li>
                <li><a href="{{ route('admin.funcionarios.create') }}" class="text-decoration-none"> Cadastrar Funcionário </a></li>
            </ul>
        </li>

        <li class="nav-item my-2 {{ Route::currentRouteNamed('admin.cidades.index') || Route::currentRouteNamed('admin.cidades.create') ? 'ativo' : '' }}">
            <a href="#cidades" class="nav-link text-start d-inline-block mx-1 p-0" data-bs-toggle="collapse" onclick="document.getElementById('iconeSeta7').classList.toggle('giro');" role="button" aria-expanded="false" aria-controls="cidades" aria-current="page"> <i class="bi-list mx-2 h4"></i> Cidades </a>
            <i class="bi-chevron-right float-end mx-lg-4 mx-sm-1" id="iconeSeta7"></i>

            <ul class="btn-toggle-nav collapse list-unstyled pb-2 px-5" id="cidades">
                <li><a href="{{ route('admin.cidades.index') }}" class="text-decoration-none"> Listar Cidades </a></li>
                <li><a href="{{ route('admin.cidades.create') }}" class="text-decoration-none"> Cadastrar Cidade </a></li>
            </ul>
        </li>

    </ul>
</nav>