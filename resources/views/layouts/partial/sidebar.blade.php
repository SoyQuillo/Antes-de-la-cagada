<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="https://portalcolombia.terpel.com/static/images/terpel_logo_og.png" alt="EDS Terpel Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light px-4">EDS Terpel</span>
    </a>

    <div style="height: 10px"></div>
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('clients.index') }}" class="nav-link">
                        <i class="fa-solid fa-user nav-icon"></i>
                        <p>Clients</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link">
                        <i class="fa-solid fa-bread-slice nav-icon"></i>
                        <p>Products</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-money-bills"></i>
                        <p>
                        Orders
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('orders.create') }}" class="nav-link">
                                <i class="fa-solid fa-bread-slice nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('orders.index') }}" class="nav-link">
                        <i class="fa-solid fa-scroll nav-icon"></i>
                        <p>Bills</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<style>
    /* Estilos para el sidebar */
    .main-sidebar {
        background-color: #f4f6f9; /* Color de fondo del sidebar */
        color: #343a40; /* Color del texto del sidebar */
        border-right: 1px solid #d2d6de; /* Borde derecho */
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Sombreado */
        padding-top: 20px; /* Espaciado superior */
    }

    /* Estilos para el logo y el nombre de la marca */
    .brand-link {
        background-color: #f4f6f9; /* Color de fondo del logo y nombre de la marca */
        border-bottom: 1px solid #d2d6de; /* Borde inferior */
        padding: 10px; /* Espaciado */
        display: flex; /* Para alinear logo y texto */
        align-items: center; /* Centra verticalmente el contenido */
    }

    /* Estilos para los enlaces del sidebar */
    .nav-link {
        color: #343a40; /* Color del texto de los enlaces */
        padding: 10px 20px; /* Espaciado */
    }

    /* Estilos para los enlaces activos */
    .nav-link.active {
        background-color: #e9ecef; /* Color de fondo del enlace activo */
        border-left: 3px solid #007bff; /* Borde izquierdo */
        padding-left: 17px; /* Espaciado del texto */
    }

    /* Estilos para los enlaces al pasar el cursor */
    .nav-link:hover {
        background-color: #e9ecef; /* Color de fondo al pasar el cursor */
    }

    /* Estilos para los iconos */
    .nav-icon {
        margin-right: 10px; /* Margen derecho */
    }

    /* Estilos para las insignias */
    .badge {
        background-color: #007bff; /* Color de fondo */
        margin-left: auto; /* Margen izquierdo automático */
        margin-right: 20px; /* Margen derecho */
        padding: 5px 10px; 
    }
</style>
